<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function getDegreeWith($target_person_id)
    {
        $visited = [$this->id];
        $current_level = [$this->id];
        $degree = 0;

        while (!empty($current_level)) {
            $degree++;
            if ($degree > 25) {
                return false;
            }

            $neighbors = DB::table('relationships')
                ->whereIn('parent_id', $current_level)
                ->pluck('child_id')
                ->merge(
                    DB::table('relationships')
                        ->whereIn('child_id', $current_level)
                        ->pluck('parent_id')
                )
                ->unique()
                ->diff($visited)
                ->values();

            if ($neighbors->contains($target_person_id)) {
                return $degree;
            }

            $visited = array_merge($visited, $neighbors->all());
            $current_level = $neighbors->all();
        }

        return false;
    }
}

