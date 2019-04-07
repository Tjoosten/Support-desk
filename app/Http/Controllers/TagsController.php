<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class TagsController 
 * 
 * @package App\Http\Controller
 */
class TagsController extends Controller
{
    /**
     * TagsController constructor 
     * 
     * @return void
     */
    public function __construct() 
    {
        $this->middleware(['auth', 'role:admin', 'forbid-banned-user']);
    }
}
