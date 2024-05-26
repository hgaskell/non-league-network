<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_name',
        'slug',
        'player_image',
        'player_dob',
        'player_bio',
        'player_height',
        'player_preferred_foot',
        'player_status',
        'position_id',
        'region_id',
        'user_id'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query
                ->where('player_name', 'like', '%' . $search . '%')
        );

        $query->when($filters['region'] ?? false, fn($query, $region) =>
            $query->whereHas('region', fn($query) => 
                $query->where('slug',$region)
            )
        );

        $query->when($filters['position'] ?? false, fn($query, $position) =>
            $query->whereHas('position', fn($query) => 
                $query->where('slug', $position)
            )
        );
    }

    public function scopeActive($query)
    {
        return $query->where('player_status',true);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}


