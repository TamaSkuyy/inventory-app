<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Auth;

class Penerimaan extends Model
{
    use HasFactory,
        Sortable;

    public $sortable = ['terimaId','terimaNomor', 'terimaTgl', 'created_at', 'updated_at'];

    protected $table = 'penerimaan';
    protected $primaryKey = 'terimaId';

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
