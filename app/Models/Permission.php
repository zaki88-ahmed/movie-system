<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';

    protected $fillable = ['name'];
    protected $hidden = ['id', 'created_at', 'updated_at', 'deleted_at'];


//    public function roles()
//    {
//        return $this->belongsToMany(Permission::class, 'role_has_permissions', 'role_id', 'permission_id');
//    }

}
