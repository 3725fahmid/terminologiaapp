<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ExpenseItem;

class ExpenseCategory extends Model
{
    use HasFactory;

    // ✅ Allow mass assignment for these fields
    protected $fillable = [
        'name',
        'description',
        'created_by',
    ];


    public function expenseItems()
    {
        return $this->hasMany(ExpenseItem::class, 'category_id');
    }

}
