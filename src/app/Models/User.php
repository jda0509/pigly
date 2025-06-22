<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    public function weightLogs()
    {
        return $this->hasMany(WeightLog::class);
    }

    public function weightTargets()
    {
        return $this->hasMany(WeightTarget::class);
    }
}