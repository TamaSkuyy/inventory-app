<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Auth;

class Barang extends Model
{
    use HasFactory,
        Sortable;

    public $sortable = ['barangId','barangKode', 'barangNama', 'created_at', 'updated_at'];

    protected $table = 'barang';
    protected $primaryKey = 'barangId';

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
