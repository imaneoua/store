<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Item;

class Order extends Model
{
    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the order primary key (id)
     * $this->attributes['total'] - string - contains the order name
     * $this->attributes['user_id'] - int - contains the referenced user id
     * $this->attributes['created_at'] - timestamp - contains the order creation date
     * $this->attributes['updated_at'] - timestamp - contains the order update date
     * $this->user - User - contains the associated User
     * $this->items - Item[] - contains the associated items
     */
    public static function validate($request)
    {
        $request->validate([
            "total" => "required|numeric",
            "user_id" => "required|exists:users,id",
        ]);
    }
    
    public $id;


    //total
    public function getTotal()
    {
        return $this->attributes['total'];
    }
    public function setTotal($total)
    {
        $this->attributes['total'] = $total;
    }

    //user id
    public function getUserId()
    {
        return $this->attributes['user_id'];
    }
    public function setUserId($userId)
    {
        $this->attributes['user_id'] = $userId;
    }


    //created at 
    public function CreatedAt()
    {
        return $this->created_at->format('Y-m-d H:i:s');
    }

    //updeted at
    public function Updatedats()
    {
        return $this->hasMany(UpdatedAt::class);
    }

    //user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    //items
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    
}
