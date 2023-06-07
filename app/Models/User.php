<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'fullname',
        'email',
        'password',
        'date_of_birth',
        'place_of_birth',
        'gender',
        'address',
        'date_of_entry',
        'registration_number',
        'phone',
        'photo',
        'business_unit_id'
    ];

    protected $with = ['departement'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function departement(){
        return $this->belongsTo(Departement::class);
    }

    public function userRole(){
        return $this->belongsTo('Spatie\Permission\Models\Role', 'id', 'id');
    }

    public function bussiness_units()
    {
        return $this->hasMany(BussinessUnit::class);
    }
}
