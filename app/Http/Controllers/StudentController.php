<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Http\Requests\Students\StoreStudentRequest;
use App\Http\Requests\Students\UpdateStudentRequest;
use App\Services\StudentService;

class StudentController extends Controller
{
    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index()
    {
        $students = Student::all();
        return response()->json($students, 200);
    }

    public function store(StoreStudentRequest $request)
    {
        $student = $this->studentService->createStudent($request->validated());
        return response()->json(['student' => $student, 'message' => 'Estudiante creado con éxito'], 201);
    }

    public function show($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }
        return response()->json($student, 200);
    }

    public function update(UpdateStudentRequest $request, $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }
        $updatedStudent = $this->studentService->updateStudent($student, $request->validated());
        return response()->json(['student' => $updatedStudent, 'message' => 'Estudiante actualizado'], 200);
    }

    public function delete($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }
        $student->delete();
        return response()->json(['message' => 'Estudiante eliminado'], 200);
    }
}
