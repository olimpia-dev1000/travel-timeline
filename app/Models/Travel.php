<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    protected $table = 'travels';
    protected $fillable = ['user_id', 'country', 'city', 'year', 'month', 'description', 'private', 'travel_pictures'];

    // Relationship to user

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship to financial expenses

    public function financialExpenses()
    {
        return $this->hasMany(FinancialExpense::class, 'travel_id');
    }
}
