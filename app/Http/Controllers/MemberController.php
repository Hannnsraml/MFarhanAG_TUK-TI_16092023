<?php

namespace App\Http\Controllers;

use App\Exports\MemberExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Member;
use App\Models\Organization;
use App\Models\Student;
use Illuminate\Http\Request;
use Exception;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::with('student')->with('organization')->get();
        $data = [
            'title' => 'Data Mahasiswa',
            'members' => $members,
        ];
        // return response()->json($members);
        return view('pages.member.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $organizations = Organization::all();
        $data = [
            'title' => 'Daftar Anggota UKM',
            'students' => $students,
            'organizations' => $organizations,
            'url' => route('member.index'),
        ];
        return view('pages.member.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate(
                [
                    'student_id' => 'required|integer',
                    'organization_id' => 'required|integer',
                ]
            );
            $member = Member::create($data);
            flash()->addSuccess('Data Pendaftaran Anggota UKM berhasil ditambah');
            return redirect()->route('member.show', $member->id);
        } catch (Exception $er) {
            flash()->addError($er->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $member = Member::with('student')->with('organization')->findOrFail($id);
        $students = Student::all();
        $organizations = Organization::all();
        $data = [
            'title' => $member->name,
            'member' => $member,
            'students' => $students,
            'organizations' => $organizations,
        ];
        return view('pages.member.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member = Member::with('student')->with('organization')->findOrFail($id);
        $students = Student::all();
        $organizations = Organization::all();
        $data = [
            'title' => $member->name,
            'member' => $member,
            'students' => $students,
            'organizations' => $organizations,
            'url' => route('member.update', $id),
        ];
        return view('pages.member.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $member = Member::with('student')->with('organization')->findOrFail($id);
            $data = $request->validate(
                [
                    'student_id' => 'required|integer',
                    'organization_id' => 'required|integer',
                ]
            );
            $member->update($data);
            flash()->addSuccess('Data Pendaftaran Anggota UKM berhasil diperbaharui');
            return redirect()->route('member.show', $member->id);
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
            $member = Member::with('student')->with('organization')->findOrFail($id);
            $member_name = $member->student->name;
            $ukm_name = $member->organization->ukm_name;
            $member->delete();
            flash()->addSuccess('Data Anggota ' . $member_name . ' UKM  ' . $ukm_name . ' berhasil dihapus');
            return redirect()->route('member.index');
        } catch (Exception $er) {
            flash()->addError($er->getMessage());
            return redirect()->back();
        }
    }

    public function print()
    {
        $members = Member::all();
        $data = [
            'title' => 'Data Mahasiswa',
            'members' => $members,
        ];
        return view('pages.member.print', $data);
    }

    public function export() 
    {
        // dd('ini mau');
        return Excel::download(new MemberExport, 'members.xlsx');
    }
}
