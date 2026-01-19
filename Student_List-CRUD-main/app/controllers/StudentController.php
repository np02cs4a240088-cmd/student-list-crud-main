<?php

namespace App\Controllers;

use App\Models\Student;
use Illuminate\View\Factory as BladeFactory;

class StudentController
{
    private $student;
    private $blade;

    public function __construct(Student $student, BladeFactory $blade)
    {
        $this->student = $student;
        $this->blade = $blade;
    }

    /**
     * Display all students
     */
    public function index()
    {
        $students = $this->student->all();
        echo $this->blade->make('students.index', ['students' => $students])->render();
    }

    /**
     * Show the form for adding a new student
     */
    public function create()
    {
        echo $this->blade->make('students.create')->render();
    }

    /**
     * Process the form submission for adding a student
     */
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $course = $_POST['course'] ?? '';

            if (!empty($name) && !empty($email) && !empty($course)) {
                $this->student->create($name, $email, $course);
                header('Location: ?page=index');
                exit;
            }
        }
    }

    /**
     * Show the form for editing an existing student
     */
    public function edit($id)
    {
        $student = $this->student->find($id);
        if ($student) {
            echo $this->blade->make('students.edit', ['student' => $student])->render();
        } else {
            echo "Student not found";
        }
    }

    /**
     * Process the form submission for updating a student
     */
    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $course = $_POST['course'] ?? '';

            if (!empty($name) && !empty($email) && !empty($course)) {
                $this->student->update($id, $name, $email, $course);
                header('Location: ?page=index');
                exit;
            }
        }
    }

    /**
     * Delete a student record
     */
    public function delete($id)
    {
        $this->student->delete($id);
        header('Location: ?page=index');
        exit;
    }
}
