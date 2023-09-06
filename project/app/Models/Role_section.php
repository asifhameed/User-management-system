<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
        'description',
        'status',
    ];

    public function permissions()
    {
        return $this->hasMany(Role_permission::class);
    }

    public function permissions_assign()
    {
        return $this->hasMany(Role_permissions_assign::class);
    }
}
