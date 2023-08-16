<?php

namespace App\Http\Controllers;

use App\Models\Pengesah;
use App\Models\Surat;
use App\Models\UnitPenerbit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    public function index()
    {
        $surat_masuk = Surat::with('media')->JoinJenisPenerbitPengesah()
            ->where('id_jenis_surat', 1)
            ->get();
        $data = [
            'title' => 'Data Surat Masuk',
            'surat_masuk' => $surat_masuk,
        ];
        return view('pages.surat-masuk.index', $data);
    }

    public function show($id)
    {
        $surat_masuk = Surat::with('media')->JoinJenisPenerbitPengesah()->findOrFail($id);
        $data = [
            'title' => 'Surat Masuk Nomor ' . $surat_masuk->nomor,
            'surat_masuk' => $surat_masuk,
        ];
        return view('pages.surat-masuk.show', $data);
    }

    public function print()
    {
        $surat_masuk = Surat::with('media')->JoinJenisPenerbitPengesah()
            ->where('id_jenis_surat', 1)
            ->get();
        $data = [
            'title' => 'Data Surat Masuk',
            'surat_masuk' => $surat_masuk,
        ];
        return view('pages.surat-masuk.print', $data);
    }

    public function create()
    {
        $unit_penerbit = UnitPenerbit::all();
        $pengesah = Pengesah::all();
        $data = [
            'title' => 'Tambah Data Masuk',
            'url' => route('surat-masuk.store'),
            'unit_penerbit' => $unit_penerbit,
            'pengesah' => $pengesah,
        ];
        return view('pages.surat-masuk.form', $data);
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
            $surat_masuk = Surat::create($data);
            if ($request->hasFile('surat_file') && $request->file('surat_file')->isValid()) {
                if ($surat_masuk->addMediaFromRequest('surat_file')->toMediaCollection('surat_file')) {
                    flash()->addSuccess('Surat Masuk berhasil ditambahkan');
                    return redirect()->route('surat-masuk.show', $surat_masuk->id);
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
        $surat_masuk = Surat::findOrFail($id);
        $data = [
            'title' => 'Edit Surat Masuk',
            'url' => route('surat-masuk.update', $id),
            'unit_penerbit' => $unit_penerbit,
            'pengesah' => $pengesah,
            'surat_masuk' => $surat_masuk,
        ];
        return view('pages.surat-masuk.form', $data);
    }

    public function update(Request $request, $id)
    {
        try {
            $surat_masuk = Surat::findOrFail($id);
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
            $surat_masuk->update($data);
            if ($request->hasFile('surat_file') && $request->file('surat_file')->isValid()) {
                if (
                    Storage::delete($surat_masuk->media('surat_file')->first()->getUrl()) &&
                    $surat_masuk->clearMediaCollection('surat_file') &&
                    $surat_masuk->addMediaFromRequest('surat_file')->toMediaCollection('surat_file')
                ) {
                    flash()->addSuccess('Surat Masuk berhasil diperbarui');
                    return redirect()->route('surat-masuk.show', $surat_masuk->id);
                }
            }
            flash()->addSuccess('Surat Masuk berhasil diperbarui');
            return redirect()->route('surat-masuk.show', $surat_masuk->id);
        } catch (Exception $er) {
            flash()->addError($er->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $surat_masuk = Surat::findOrFail($id);
            $surat_masuk_nomor = $surat_masuk->nomor;
            $surat_masuk->delete();
            flash()->addSuccess('Surat Masuk nomor ' . $surat_masuk_nomor . ' berhasil dihapus');
            return redirect()->route('surat-masuk.index');
        } catch (Exception $er) {
            flash()->addError($er->getMessage());
            return redirect()->back();
        }
    }
}
