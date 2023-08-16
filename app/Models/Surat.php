<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Surat extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'id',
        'nomor',
        'pengirim',
        'waktu',
        'lampiran',
        'perihal',
        'penerima',
        'isi',
        'tempat',
        'tembusan',
        'id_pengesah',
        'id_unit_penerbit',
        'id_jenis_surat'
    ];
    protected $table = 'surat';

    public function scopeJoinJenisPenerbitPengesah()
    {
        return $this->join('jenis_surat', 'surat.id_jenis_surat', 'jenis_surat.id')
            ->join('unit_penerbit', 'surat.id_unit_penerbit', 'unit_penerbit.id')
            ->join('pengesah', 'surat.id_pengesah', 'pengesah.id')
            ->select(
                'surat.id',
                'surat.nomor',
                'surat.pengirim',
                'surat.waktu',
                'surat.lampiran',
                'surat.perihal',
                'surat.penerima',
                'surat.isi',
                'surat.tempat',
                'surat.tembusan',
                'jenis_surat.jenis',
                'unit_penerbit.unit',
                'pengesah.nama',
            );
    }
}
