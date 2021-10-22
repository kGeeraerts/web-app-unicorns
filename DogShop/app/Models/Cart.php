<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'session_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id',
        'available_from',
    ];

    public function dogs() {
        return $this->morphedByMany(Dog::class, 'cartable');
    }

    public function products() {
        return $this->morphedByMany(Product::class, 'cartable');
    }

    public function customer() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
