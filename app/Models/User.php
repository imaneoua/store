<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Order;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the user primary key (id)
     * $this->attributes['name'] - string - contains the user name
     * $this->attributes['email'] - string - contains the user email
     * $this->attributes['email_verified_at'] - timestamp - contains the user email verification date
     * $this->attributes['password'] - string - contains the user password
     * $this->attributes['remember_token'] - string - contains the user password
     * $this->attributes['role'] - string - contains the user role (client or admin)
     * $this->attributes['balance'] - int - contains the user balance
     * $this->attributes['created_at'] - timestamp - contains the user creation date
     * $this->attributes['updated_at'] - timestamp - contains the user update date
     * * $this->orders - Order[] - contains the associated orders

     */


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'balance',
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


    public $id;

    //name
    public function Name()
    {
        return ucfirst($this->attributes['name']);
    }

    //email
    public function Email()
   {
    return $this->email;

   }

   //password
    public function Password()
    {
        return $this->attributes['password'];
    }
    

    //role
    public function Role()
    {
        return $this->attributes['role'];
    }


    //balance
    public function Balance()
    {
        return $this->attributes['balance'];
    }
   

    //created at 
    public function CreatedAt()
    {
        return $this->created_at->format('Y-m-d H:i:s');
    }

    //updated at
    public function Updatedats()
    {
        return $this->hasMany(UpdatedAt::class);
    }

    //orders
    public function orders()
    {
    return $this->hasMany(Order::class);
    }
   

}
