<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CreatedUpdatedBy;

class PaymentMethod extends Model
{
    use HasFactory;
    use CreatedUpdatedBy;

    protected $fillable=['name','notes'];
}
