<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'admins';

    protected $fillable = ['salary', 'isSuperAdmin', 'user_id'];
    protected $hidden = ['updated_at', 'created_at'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
