<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $fillable = ['name', 'fonts', 'route', 'parent_id', 'is_hidden', 'sort', 'status'];

    public function scopePublic($query)
    {
        return $query->where('is_hidden', 0);
    }
}
