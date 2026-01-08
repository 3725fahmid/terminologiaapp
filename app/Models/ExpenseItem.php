<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ExpenseCategory;

class ExpenseItem extends Model
{
    use HasFactory;
    
    protected $fillable = ['name']; // or whatever column you use for category name


    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class);
    }
}

