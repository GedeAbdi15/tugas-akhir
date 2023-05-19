<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class DataModel extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = [
        'nomor_dokumen',
        'keterangan_khusus',
        'file',
        'kategori'
    ];

    public $sortable = [
        'nomor_dokumen', 'kategori'
    ];

}
