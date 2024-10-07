<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialExpense extends Model
{
    use HasFactory;

    protected $table = 'financial_expenses';
    protected $fillable = ['user_id', 'travel_id', 'expenses_categories_id', 'amount', 'description'];

    // Relationship to User

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship to Travel

    public function travel()
    {
        return $this->belongsTo(Travel::class, 'travel_id');
    }
}
