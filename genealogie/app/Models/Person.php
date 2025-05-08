<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'created_by', 'first_name', 'last_name', 'birth_name', 'middle_names', 'date_of_birth',
    ];

    public function children()
    {
        return $this->belongsToMany(
            Person::class,
            'relationships',
            'parent_id',
            'child_id'
        );
    }

    public function parents()
    {
        return $this->belongsToMany(
            Person::class,
            'relationships',
            'child_id',
            'parent_id'
        );
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

