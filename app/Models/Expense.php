<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_expense')
            ->withPivot('quantity', 'amount', 'details');
    }
    // public function category(){
    //     return $this->belongsTo(Category::class);
    // }
}
