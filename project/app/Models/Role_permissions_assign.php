<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_permissions_assign extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id_fk',
        'section_id_fk',
        'permission_names',
    ];
    

    public function rolse()
    {
        return $this->belongsTo(Role::class, 'role_id_fk');
    }

    public function role_sections()
    {
        return $this->belongsTo(Role_section::class, 'section_id_fk');
    }
}
