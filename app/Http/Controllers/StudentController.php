<?php

namespace App\Http\Controllers;

use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Student;
use Illuminate\Http\Request;
use Exception;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        $data = [
            'title' => 'Data Mahasiswa',
            'students' => $students,
        ];
        // return response()->json($students);
        return view('pages.student.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Data',
            'url' => route('student.index'),
        ];
        return view('pages.student.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate(
                [
                    'nim' => 'required|string|unique:students,nim',
                    'name' => 'required|string',
                    'ttl' => 'required|string',
                    'alamat' => 'required|string',
                ],
                [
                    'nim.unique' => 'NIM yang dimasukkan telah terdaftar!'
                ]
            );
            $student = Student::create($data);
            flash()->addSuccess('Data Mahasiswa berhasil ditambah');
            return redirect()->route('student.show', $student->id);
        } catch (Exception $er) {
            flash()->addError($er->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        $data = [
            'title' => $student->name,
            'student' => $student,
        ];
        return view('pages.student.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $data = [
            'title' => 'Edit Mahasiswa',
            'url' => route('student.update', $id),
            'student' => $student,
        ];
        return view('pages.student.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $student = Student::findOrFail($id);
            $data = $request->validate(
                [
                    'nim' => 'required|string|unique:students,nim',
                    'name' => 'required|string',
                    'ttl' => 'required|string',
                    'alamat' => 'required|string',
                ],
                [
                    'nim.unique' => 'NIM yang dimasukkan telah terdaftar!'
                ]
            );
            $student->update($data);
            flash()->addSuccess('Data Mahasiswa berhasil diperbaharui');
            return redirect()->route('student.show', $student->id);
        } catch (Exception $er) {
            flash()->addError($er->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $student = Student::findOrFail($id);
            $student_name = $student->name;
            $student->delete();
            flash()->addSuccess('Data Mahasiswa ' . $student_name . ' berhasil dihapus');
            return redirect()->route('student.index');
        } catch (Exception $er) {
            flash()->addError($er->getMessage());
            return redirect()->back();
        }
    }

    public function print()
    {
        $students = Student::all();
        $data = [
            'title' => 'Data Mahasiswa',
            'students' => $students,
        ];
        return view('pages.student.print', $data);
    }

    public function export() 
    {
        // dd('ini mau');
        return Excel::download(new StudentsExport, 'students.xlsx');
    }
}
