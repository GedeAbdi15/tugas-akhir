<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class data_masuk extends Model
{
    use HasFactory;
    use Sortable;

    protected $guarded = ['id'];

    public $sortable = [
        'nomor_dokumen', 'tgl_masuk'
    ];
}
