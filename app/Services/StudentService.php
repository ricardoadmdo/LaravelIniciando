<?php

namespace App\Services;

use App\Models\Student;

class StudentService
{
    public function createStudent(array $data)
    {
        return Student::create($data);
    }

    public function updateStudent(Student $student, array $data)
    {
        $student->update($data);
        return $student;
    }
}
