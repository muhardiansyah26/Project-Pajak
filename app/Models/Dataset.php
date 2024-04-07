<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
    use HasFactory;
    protected $fillable = [
        'nop_sppt',
        'nm_wp_sppt',
        'jalan_op',
        'jln_wp_sppt',
        'nm_kelurahan',
        'nm_kecamatan',
        'thn_pajak_sppt',
        'nilai_sppt',
    ];
}
