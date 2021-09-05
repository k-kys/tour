<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Relationship 1-n (inverse) to Payment
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    /**
     * Relationship 1-n (inverse) to User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
