<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Barang extends Model
{
    use HasFactory,
        Sortable;

    public $sortable = ['barangId','barangKode', 'barangNama', 'created_at', 'updated_at'];

    protected $table = 'barang';
    protected $primaryKey = 'barangId';
}
