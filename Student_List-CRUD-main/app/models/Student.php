<?php

namespace App\Models;

use PDO;

class Student
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Retrieve all students
     */
    public function all()
    {
        $stmt = $this->db->query('SELECT * FROM students');
        return $stmt->fetchAll();
    }

    /**
     * Retrieve a single student by ID
     */
    public function find($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM students WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    /**
     * Insert a new student
     */
    public function create($name, $email, $course)
    {
        $stmt = $this->db->prepare('INSERT INTO students (name, email, course) VALUES (?, ?, ?)');
        return $stmt->execute([$name, $email, $course]);
    }

    /**
     * Update an existing student
     */
    public function update($id, $name, $email, $course)
    {
        $stmt = $this->db->prepare('UPDATE students SET name = ?, email = ?, course = ? WHERE id = ?');
        return $stmt->execute([$name, $email, $course, $id]);
    }

    /**
     * Delete a student record
     */
    public function delete($id)
    {
        $stmt = $this->db->prepare('DELETE FROM students WHERE id = ?');
        return $stmt->execute([$id]);
    }
}
