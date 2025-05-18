<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseConfirmation extends Model
{protected $fillable = [
        'name',
        'email',
        'phone',
        'resort_name',
        'package',
        'transaction_id',
        'status',
        'amount',
        'us_time',
        'purchased_date',
        'certificate_expire',
        'invoice_number',
        'card_type',
        'card_number',
        'sign_path',
    ];

    use HasFactory;
}
