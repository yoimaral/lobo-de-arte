<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'disabled_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Para asignar los campostipo fella en caso 
     * de querer realizar asignacones masivas
     *
     * @var array
     */
    protected $dates = [
        'disabled_at',
    ];

    /**
     * //Query Scope para la busqueda personalizada
     *
     * @param [type] $query
     * @param [type] $name
     * @return void
     */
    public function scopeName($query, $name)
    {
        if ($name)
            return $query->where('name', 'LIKE', "%$name%");
    }

    // public function scopeEmail($query, $email)
    // {
    //     if ($email)
    //         return $query->where('email', 'LIKE', "%$email%");
    // }
}
