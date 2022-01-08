<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth; 

class TransactionCategory extends Model
{
    use HasFactory;
    use CreatedUpdatedBy;

    protected $fillable=['name','type','notes'];
}
