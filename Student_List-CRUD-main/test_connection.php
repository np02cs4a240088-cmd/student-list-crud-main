<?php
/**
 * Database Connection Test
 * Run this file to verify your database setup
 * Access: http://localhost/workshop8/test_connection.php
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>Database Connection Test</h2>";
echo "<hr>";

// Test 1: Check if db.php exists
echo "<h3>Test 1: Checking db.php file</h3>";
if (file_exists(__DIR__ . '/db.php')) {
    echo "✅ db.php file exists<br>";
} else {
    echo "❌ db.php file not found<br>";
    exit;
}

// Test 2: Try to connect to database
echo "<h3>Test 2: Database Connection</h3>";
try {
    $conn = require __DIR__ . '/db.php';
    echo "✅ Database connection successful<br>";
    echo "Connected to: school_db<br>";
} catch (Exception $e) {
    echo "❌ Database connection failed<br>";
    echo "Error: " . $e->getMessage() . "<br>";
    exit;
}

// Test 3: Check if students table exists
echo "<h3>Test 3: Students Table Check</h3>";
try {
    $stmt = $conn->query("SHOW TABLES LIKE 'students'");
    $table = $stmt->fetch();
    if ($table) {
        echo "✅ Students table exists<br>";
    } else {
        echo "❌ Students table not found<br>";
        echo "Please run setup.sql to create the table<br>";
        exit;
    }
} catch (Exception $e) {
    echo "❌ Error checking table<br>";
    echo "Error: " . $e->getMessage() . "<br>";
    exit;
}

// Test 4: Check table structure
echo "<h3>Test 4: Table Structure</h3>";
try {
    $stmt = $conn->query("DESCRIBE students");
    $columns = $stmt->fetchAll();
    echo "✅ Table structure:<br>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th></tr>";
    foreach ($columns as $column) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($column['Field']) . "</td>";
        echo "<td>" . htmlspecialchars($column['Type']) . "</td>";
        echo "<td>" . htmlspecialchars($column['Null']) . "</td>";
        echo "<td>" . htmlspecialchars($column['Key']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} catch (Exception $e) {
    echo "❌ Error checking table structure<br>";
    echo "Error: " . $e->getMessage() . "<br>";
}

// Test 5: Count records
echo "<h3>Test 5: Student Records Count</h3>";
try {
    $stmt = $conn->query("SELECT COUNT(*) as count FROM students");
    $result = $stmt->fetch();
    echo "✅ Total students in database: " . $result['count'] . "<br>";
} catch (Exception $e) {
    echo "❌ Error counting records<br>";
    echo "Error: " . $e->getMessage() . "<br>";
}

// Test 6: Sample data
echo "<h3>Test 6: Sample Data (First 5 Records)</h3>";
try {
    $stmt = $conn->query("SELECT * FROM students LIMIT 5");
    $students = $stmt->fetchAll();
    if (count($students) > 0) {
        echo "✅ Sample records:<br>";
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Course</th></tr>";
        foreach ($students as $student) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($student['id']) . "</td>";
            echo "<td>" . htmlspecialchars($student['name']) . "</td>";
            echo "<td>" . htmlspecialchars($student['email']) . "</td>";
            echo "<td>" . htmlspecialchars($student['course']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "⚠️ No records found. Table is empty.<br>";
        echo "You can add records through the application or run setup.sql<br>";
    }
} catch (Exception $e) {
    echo "❌ Error fetching records<br>";
    echo "Error: " . $e->getMessage() . "<br>";
}

echo "<hr>";
echo "<h3>✅ All Tests Completed!</h3>";
echo "<p><a href='public/index.php'>Go to Student Management Application →</a></p>";

echo "<style>
    body { font-family: Arial, sans-serif; padding: 20px; background: #f5f5f5; }
    h2 { color: #667eea; }
    h3 { color: #333; margin-top: 20px; }
    table { margin: 10px 0; background: white; }
    th { background: #667eea; color: white; }
    a { color: #667eea; text-decoration: none; font-weight: bold; }
    a:hover { text-decoration: underline; }
</style>";
?>
