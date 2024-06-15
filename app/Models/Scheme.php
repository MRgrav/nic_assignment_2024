<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    use HasFactory;

    protected $table = "schemes";

    protected $fillable = [
        "scheme_code",
        "scheme_name",
        "central_state_scheme",
        "financial_year",
        "state_disbursement",
        "central_disbursement",
        "total_disbursement",
    ];
}
