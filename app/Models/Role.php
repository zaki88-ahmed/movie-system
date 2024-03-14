<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $fillable = ['name', "guard_name"];
    protected $hidden = ['id', 'created_at', 'updated_at', 'deleted_at'];


   public function permissions()
   {
       return $this->hasmany(Role::class, 'role_has_permissions', 'role_id', 'permission_id');
   }

}
