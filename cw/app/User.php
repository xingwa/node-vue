<?php
namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable;
    
    protected $table = 'role_manage';
    
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'id',
    ];
    
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
    
    /**
     * JWT
     */
    public function getUserInfo()
    {
        return [
            'id'=>$this->getKey(),
            'username'=>$this->username
            
        ];
    }
    
    /**
     * JWT
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    
    /**
     * JWT
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}