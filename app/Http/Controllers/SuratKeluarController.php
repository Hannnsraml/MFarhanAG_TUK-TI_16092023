<?php

namespace App\Http\Controllers;

use App\Models\Pengesah;
use App\Models\Surat;
use App\Models\UnitPenerbit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $surat_keluar = Surat::with('media')->JoinJenisPenerbitPengesah()
            ->where('id_jenis_surat', 2)
            ->get();
        $data = [
            'title' => 'Data Surat Keluar',
            'surat_keluar' => $surat_keluar,
        ];
        return view('pages.surat-keluar.index', $data);
    }

    public function show($id)
    {
        $surat_keluar = Surat::with('media')->JoinJenisPenerbitPengesah()->findOrFail($id);
        $data = [
            'title' => 'Surat Keluar Nomor ' . $surat_keluar->nomor,
            'surat_keluar' => $surat_keluar,
        ];
        return view('pages.surat-keluar.show', $data);
    }

    public function print()
    {
        $surat_keluar = Surat::with('media')->JoinJenisPenerbitPengesah()
            ->where('id_jenis_surat', 2)
            ->get();
        $data = [
            'title' => 'Data Surat Keluar',
            'surat_keluar' => $surat_keluar,
        ];
        return view('pages.surat-keluar.print', $data);
    }

    public function create()
    {
        $unit_penerbit = UnitPenerbit::all();
        $pengesah = Pengesah::all();
        $data = [
            'title' => 'Tambah Data Keluar',
            'url' => route('surat-keluar.store'),
            'unit_penerbit' => $unit_penerbit,
            'pengesah' => $pengesah,
        ];
        return view('pages.surat-keluar.form', $data);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate(
                [
                    'id_jenis_surat' => 'required|numeric',
                    'nomor' => 'required|string|unique:surat,nomor',
                    'pengirim' => 'required|string',
                    'waktu' => 'required|string',
                    'lampiran' => 'required|string',
                    'perihal' => 'required|string',
                    'penerima' => 'required|string',
                    'isi' => 'required|string',
                    'id_unit_penerbit' => 'required|numeric',
                    'tempat' => 'required|string',
                    'id_pengesah' => 'required|numeric',
                    'tembusan' => 'required|string',
                    'surat_file' => 'required|max:5120',
                ],
                [
                    'nomor.unique' => 'Nomor Surat yang dimasukkan telah terdaftar!'
                ]
            );
            $surat_keluar = Surat::create($data);
            if ($request->hasFile('surat_file') && $request->file('surat_file')->isValid()) {
                if ($surat_keluar->addMediaFromRequest('surat_file')->toMediaCollection('surat_file')) {
                    flash()->addSuccess('Surat Keluar berhasil ditambahkan');
                    return redirect()->route('surat-keluar.show', $surat_keluar->id);
                }
            }
        } catch (Exception $er) {
            flash()->addError($er->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $unit_penerbit = UnitPenerbit::all();
        $pengesah = Pengesah::all();
        $surat_keluar = Surat::findOrFail($id);
        $data = [
            'title' => 'Edit Surat Keluar',
            'url' => route('surat-keluar.update', $id),
            'unit_penerbit' => $unit_penerbit,
            'pengesah' => $pengesah,
            'surat_keluar' => $surat_keluar,
        ];
        return view('pages.surat-keluar.form', $data);
    }

    public function update(Request $request, $id)
    {
        try {
            $surat_keluar = Surat::findOrFail($id);
            $data = $request->validate(
                [
                    'id_jenis_surat' => 'required|numeric',
                    'nomor' => 'required|string',
                    'pengirim' => 'required|string',
                    'waktu' => 'required|string',
                    'lampiran' => 'required|string',
                    'perihal' => 'required|string',
                    'penerima' => 'required|string',
                    'isi' => 'required|string',
                    'id_unit_penerbit' => 'required|numeric',
                    'tempat' => 'required|string',
                    'id_pengesah' => 'required|numeric',
                    'tembusan' => 'required|string',
                    'surat_file' => 'max:5120',
                ]
            );
            $surat_keluar->update($data);
            if ($request->hasFile('surat_file') && $request->file('surat_file')->isValid()) {
                if (
                    Storage::delete($surat_keluar->media('surat_file')->first()->getUrl()) &&
                    $surat_keluar->clearMediaCollection('surat_file') &&
                    $surat_keluar->addMediaFromRequest('surat_file')->toMediaCollection('surat_file')
                ) {
                    flash()->addSuccess('Surat Keluar berhasil diperbarui');
                    return redirect()->route('surat-keluar.show', $surat_keluar->id);
                }
            }
            flash()->addSuccess('Surat Keluar berhasil diperbarui');
            return redirect()->route('surat-keluar.show', $surat_keluar->id);
        } catch (Exception $er) {
            flash()->addError($er->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $surat_keluar = Surat::findOrFail($id);
            $surat_keluar_nomor = $surat_keluar->nomor;
            $surat_keluar->delete();
            flash()->addSuccess('Surat Keluar nomor ' . $surat_keluar_nomor . ' berhasil dihapus');
            return redirect()->route('surat-keluar.index');
        } catch (Exception $er) {
            flash()->addError($er->getMessage());
            return redirect()->back();
        }
    }
}
