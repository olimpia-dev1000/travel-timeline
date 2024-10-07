<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpensesCategory extends Model
{
    use HasFactory;

    protected $table = 'expenses_categories';
    protected $fillable = ['user_id', 'category'];

    // Relationship to user

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
