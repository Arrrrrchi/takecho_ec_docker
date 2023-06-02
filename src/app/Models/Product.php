<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Image;
use App\Models\Stock;



class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'name',
        'information',
        'price',
        'is_selling',
        'sort_order',
        'category_id',
        'image1',
        'image2',
        'image3',
        'image4',
    ];

    public function admin ()
    {
        return $this->belongsTo(Admin::class);
    }

    public function category ()
    {
        return $this->belongsTo(Category::class);
    }

    public function imageFirst ()
    {
        return $this->belongsTo(Image::class, 'image1', 'id');
    }

    public function imageSecond ()
    {
        return $this->belongsTo(Image::class, 'image2', 'id');
    }

    public function imageThird ()
    {
        return $this->belongsTo(Image::class, 'image3', 'id');
    }

    public function imageFourth ()
    {
        return $this->belongsTo(Image::class, 'image4', 'id');
    }

    public function stock ()
    {
        return $this->hasMany(Stock::class);
    }
}
