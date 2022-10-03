<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Auth;

class Pelanggan extends Model
{
    use HasFactory,
        Sortable;

    public $sortable = ['pelId','pelKode', 'pelNama', 'created_at', 'updated_at'];

    protected $table = 'pelanggan';
    protected $primaryKey = 'pelId';

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
