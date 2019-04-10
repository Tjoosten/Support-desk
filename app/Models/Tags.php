<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Tags 
 * 
 * @package App\Models
 */
class Tags extends Model
{
    /**
     * Mass-assignable fields for the database table.
     * 
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * Data relation for the tickets that are attached to the tag. 
     * 
     * @return HasMany
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, 'tag_id');
    }
}
