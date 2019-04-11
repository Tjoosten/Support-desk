<?php 

namespace App\Repositories; 

use Illuminate\Database\Eloquent\Model;

/**
 * Class TagsRepository 
 * 
 * @package App\Repositories
 */
class TagsRepository extends Model 
{
    /**
     * Method for deleting the tag in the application. 
     * 
     * @return void 
     */
    public function processDelete(): void 
    {
        if ($this->delete()) { // The tag is deleted in the database storage.
            auth()->user()->logActivity($this, 'Tags', 'Has deleted an issue tag with the name ' . $this->name);
            flash("The ticket tag with the name <strong>{$this->name}</strong> has been deleted in the application.")->info()->important();
        }
    }
}