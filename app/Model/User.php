<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $dateFormat = 'U';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'first_name', 'last_name', 'signup_date', 'signup_ip', 'status',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'signup_ip', 'status', 'created_at', 'updated_at',
    ];

    public function getEmailAttribute($value)
    {
        return $value;
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
        return $this;
    }

    public function getPasswordAttribute($value)
    {
        return $value;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = $value;
        return $this;
    }

    public function getFirstNameAttribute($value)
    {
        return $value;
    }

    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucwords(strtolower($value));
        return $this;
    }

    public function getLastNameAttribute($value)
    {
        return $value;
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucwords(strtolower($value));
        return $this;
    }

    public function getSignupDateAttribute($value)
    {
        return $value;
    }

    public function setSignupDateAttribute($value)
    {
        $this->attributes['signup_date'] = ucwords(strtolower($value));
        return $this;
    }

    public function getSignupIpAttribute($value)
    {
        return $value;
    }

    public function setSignupIpAttribute($value)
    {
        $this->attributes['signup_ip'] = ucwords(strtolower($value));
        return $this;
    }

    public function getStatusAttribute($value)
    {
        return $value;
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = ucwords(strtolower($value));
        return $this;
    }

    public function getCreatedAttribute($value)
    {
        return $value;
    }

    public function setCreatedAttribute($value)
    {
        $this->attributes['created'] = ucwords(strtolower($value));
        return $this;
    }
}
