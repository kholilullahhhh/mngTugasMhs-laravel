<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', // ID pengguna yang membuat agenda
        'kelas_id', // ID kelas terkait agenda
        'judul',
        // 'tempat_kegiatan',
        'tgl_kegiatan',
        'tgl_selesai',
        'jam_mulai',
        'deskripsi_kegiatan',
        'status', //aktif tidaknya kegitan itu
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    // public function report()
    // {
    //     return $this->hasOne(Report::class);
    // }
}
