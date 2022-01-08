<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Account as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth; //must have this for authentication

class Account extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

      protected $fillable = [
        'account_name',
        'account_number',
        'opening_balance',
        'description',
        'account_type',
        'account_status'
    ];

    public static function boot()
        {
            parent::boot();
            static::creating(function($model)
                {
                    $user = Auth::user();
                    $model->created_by = $user->id;
                });
                static::updating(function($model)
                {
                    $user = Auth::user();
                    $model->updated_by = $user->id;
                });
        }

}
