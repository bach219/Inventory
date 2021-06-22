<?php

namespace App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Employee extends Authenticatable implements JWTSubject
{

    //  protected $fillable = [
    //     'name', 'email', 'phone','address','sallery','photo','nid','joining_date'
    // ];

    public function getJWTIdentifier()
    {
       return $this->getKey();
    }

    /**
     * @inheritDoc
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
 