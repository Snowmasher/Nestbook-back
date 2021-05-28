<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Canario extends Model
{
    use HasFactory;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'num_anilla',
        'num_anilla_padre',
        'num_anilla_madre',
        'id_usuario',
        'sexo',
        'fecha_nacimiento',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    protected $table = 'canarios';

    protected $primaryKey = 'id';
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_suario' => 'integer'
    ];

    public function id_usuario(){
        return $this->belongsTo(User::class);
    }
}
