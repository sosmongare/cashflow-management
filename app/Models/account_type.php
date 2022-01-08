<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth; //must have this for authentication

class account_type extends Model
{
    use HasFactory;
    use CreatedUpdatedBy;

    protected $fillable = ['account_type'];

     
}
