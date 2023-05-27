<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'filename',
    ];

    public function admin ()
    {
        return $this->belongsTo(Admin::class);
    }
}
