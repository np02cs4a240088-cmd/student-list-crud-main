<?php

require_once __DIR__ . '/../vendor/autoload.php';

// Get database connection
$db = require_once __DIR__ . '/../db.php';

// Import classes
use App\Models\Student;
use App\Controllers\StudentController;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\FileViewFinder;
use Illuminate\View\Factory as BladeFactory;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Events\Dispatcher;

// Setup Blade
$filesystem = new Filesystem();
$eventDispatcher = new Dispatcher();

// Create the Blade compiler
$compiler = new BladeCompiler($filesystem, __DIR__ . '/../cache/views');

// Set up the engine resolver
$resolver = new EngineResolver();
$resolver->register('blade', function() use ($compiler) {
    return new CompilerEngine($compiler);
});

// Create the view finder
$finder = new FileViewFinder($filesystem, [__DIR__ . '/../app/views']);

// Create the view factory
$blade = new BladeFactory($resolver, $finder, $eventDispatcher);

// Add the .blade.php extension
$finder->addExtension('blade.php');

// Initialize dependencies
$studentModel = new Student($db);
$controller = new StudentController($studentModel, $blade);

// Get the requested page from URL parameters
$page = $_GET['page'] ?? 'index';
$id = $_GET['id'] ?? null;

// Simple routing system
try {
    switch ($page) {
        case 'index':
            $controller->index();
            break;

        case 'create':
            $controller->create();
            break;

        case 'store':
            $controller->store();
            break;

        case 'edit':
            if ($id) {
                $controller->edit($id);
            } else {
                echo "Invalid student ID";
            }
            break;

        case 'update':
            if ($id) {
                $controller->update($id);
            } else {
                echo "Invalid student ID";
            }
            break;

        case 'delete':
            if ($id) {
                $controller->delete($id);
            } else {
                echo "Invalid student ID";
            }
            break;

        default:
            $controller->index();
            break;
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
