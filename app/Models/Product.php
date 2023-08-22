<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use Illuminate\Support\Str;

class Product extends Model
{

    protected $fillable = ["name"];

    public static function sumPricesByQuantities($products, $productsInSession)
    {
        $total = 0;
        foreach ($products as $product) {
            $total = $total + ($product->price * $productsInSession[$product->id]);
        }
        return $total;
    }



    //name
    public function getName()
    {
        return ucfirst($this->attributes['name']);
    }

    //description
    public function Description()
    {
        return Str::limit($this->attributes['description'], 255);
    }

    //image
    public function getImage()
    {
        return asset('images/' . $this->image_path);
    }

    //Price

    public function Price()
    {
        return '$' . number_format($this->attributes['price'], 2);
    }
    
    public static function validate($request)
    {
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|numeric|gt:0",
            'image' => 'image',
        ]);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
