<?php

namespace App\Http\Controllers;

use App\Exports\OrganizationsExport;
use App\Models\Organization;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Exception;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations = Organization::all();
        $data = [
            'title' => 'Data UKM',
            'organizations' => $organizations,
        ];
        // return response()->json($organization);
        return view('pages.organization.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Data',
            'url' => route('organization.index'),
        ];
        return view('pages.organization.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate(
                [
                    'ukm_name' => 'required|string',
                    'deskripsi' => 'required|string',
                ]
            );
            $organization = Organization::create($data);
            flash()->addSuccess('Data UKM ' . $organization->ukm_name . ' berhasil ditambah');
            return redirect()->route('organization.show', $organization->id);
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
        $organization = Organization::findOrFail($id);
        $data = [
            'title' => $organization->name,
            'organization' => $organization,
        ];
        return view('pages.organization.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $organization = Organization::findOrFail($id);
        $data = [
            'title' => 'Edit UKM',
            'url' => route('organization.update', $id),
            'organization' => $organization,
        ];
        return view('pages.organization.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $organization = Organization::findOrFail($id);
            $data = $request->validate(
                [
                    'ukm_name' => 'required|string',
                    'deskripsi' => 'required|string',
                ]
            );
            $organization->update($data);
            flash()->addSuccess('Data UKM berhasil diperbaharui');
            return redirect()->route('organization.show', $organization->id);
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
            $organization = Organization::findOrFail($id);
            $organization_name = $organization->ukm_name;
            $organization->delete();
            flash()->addSuccess('Data UKM ' . $organization_name . ' berhasil dihapus');
            return redirect()->route('organization.index');
        } catch (Exception $er) {
            flash()->addError($er->getMessage());
            return redirect()->back();
        }
    }

    public function print()
    {
        $organizations = Organization::all();
        $data = [
            'title' => 'Data Mahasiswa',
            'organizations' => $organizations,
        ];
        return view('pages.organization.print', $data);
    }

    public function export()
    {
        // dd('ini mau');
        return Excel::download(new OrganizationsExport, 'organization.xlsx');
    }
}
