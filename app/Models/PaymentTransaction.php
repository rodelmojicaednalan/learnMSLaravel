<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    use HasFactory;

    protected $table = 'payment_transactions';

    protected $primaryKey = 'id';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_date',
        'description',
        'amount',
        'transaction_id',
        'transaction_type',
        'transaction_type_readable_name',
        'user_id'
    ];

    /**
     * Get the user's formatted amount.
     *
     * @param  string  $value
     * @return string
     */
    public function getAmountAttribute($value)
    {
        return 'SGD ' . number_format($value,2);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
