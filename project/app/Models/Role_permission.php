<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tag_action',
        'display_name',
        'description',
        'section_id_fk',
        'status',
    ];

    public function role_sections()
    {
        return $this->belongsTo(Role_section::class, 'section_id_fk');
    }
}
