<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class TicketRepository 
 * 
 * @package App\Repositories 
 */
Class TicketRepository extends Model
{
    /**
     * Eloquent query scope for getting all the open or closed tickets
     * 
     * @param  Builder $query       The query builder instance from eloquent 
     * @param  bool    $condition   The indicator that indicates we need open of closed tickets.
     * @return Builder
     */
    public function scopeOpen(Builder $query, bool $condition): Builder 
    {
        return $query->where('is_open', $condition);    
    }
}