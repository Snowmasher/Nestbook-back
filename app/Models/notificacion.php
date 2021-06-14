<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class notificacion extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_from',
        'id_to',
        'tipo',
        'conetido',
        'aceptada'
    ];

    protected $table = 'notificacions';

    protected $primaryKey = 'id';
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_from' => 'integer',
        'id_to' => 'integer'
    ];

    public function id_from(){
        return $this->belongsTo(User::class);
    }

    public function id_to(){
        return $this->belongsTo(User::class);
    }
}
