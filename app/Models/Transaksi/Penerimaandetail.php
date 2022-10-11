<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Auth;

class Penerimaandetail extends Model
{
    use HasFactory,
        Sortable;

    public $sortable = ['terimadId','terimadKdBarang', 'terimadNmBarang', 'created_at', 'updated_at'];

    protected $table = 'penerimaan_detail';
    protected $primaryKey = 'terimadId';

    public static function boot()
    {
       parent::boot();
       static::creating(function($model)
       {
           $user = Auth::user();
           $model->created_user = $user->name;
       });
       static::updating(function($model)
       {
           $user = Auth::user();
           $model->updated_user = $user->name;
       });
   }
}
