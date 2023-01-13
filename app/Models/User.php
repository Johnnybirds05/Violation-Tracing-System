<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $primaryKey = 'user_id';


    protected $fillable = [
        'qr_ref',
        'username',
        'lname',
        'fname',
        'mname',
        'suffix',
        'sex',
        'bdate',
        'pic_path',
        'province', 'city', 'barangay', 'street',
        'email', 'mobile_no',
        'driver_license_type',
        'driver_license_no',
        'expr_date',
        'is_verified',
        'password',
        'role',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //Eloguent
    public function province(){
        return $this->hasOne(Province::class, 'provCode', 'province');
    }

    public function city(){
        return $this->hasOne(City::class, 'citymunCode', 'city');
    }

    public function barangay(){
        return $this->hasOne(Barangay::class, 'brgyCode', 'barangay');
    }

    public function violations(){
        return $this->hasMany(Violator::class, 'user_id', 'user_id')
            ->with(['ordinance_penalty', 'ordinance']);
    }


}
