<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;
use App\Models\Tags;
use App\Http\Requests\TagsValidator;
use Illuminate\Http\RedirectResponse;

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

    /**
     * Method for displaying all the tags in the application. 
     * 
     * @param  Tags $tags The database model entity for te issue tags in the application.
     * @return Renderable
     */
    public function index(Tags $tags): Renderable 
    {
        return view('tags.index', ['tags' => $tags->simplePaginate()]);
    }

    /**
     * Method for displaying the create view for a new category tag. 
     * 
     * @return Renderable
     */
    public function create(): Renderable 
    {
        return view('tags.create');
    }

    /**
     * Method for storing an issue tag in the application. 
     * 
     * @param  TagsValidator $input The form request class that handles the validation. 
     * @param  Tags          $tag   The database model instance from the issue tags. 
     * @return RedirectResponse
     */
    public function store(TagsValidator $input, Tags $tag): RedirectResponse 
    {
        if ($issueTag = $tag->create($input->all())) {
            auth()->user()->logActivity($issueTag, 'Tags', 'Heeft een ticket categorie aangemaakt met de naam ' . $issueTag->name);
            flash("The ticket tag with the name {$issueTag->name} has been created.")->success();
        }

        return redirect()->route('tags.dashboard');
    }

    /**
     * Method or displaying the information (edit form) from the given tag. 
     * 
     * @param  Tags $tag The storage entity from the given tag. 
     * @return Renderable
     */
    public function show(Tags $tag): Renderable 
    {
        $tickets = $tag->tickets()->take(10)->latest()->get();
        return view('tags.show', compact('tag', 'tickets')); 
    }

    /**
     * Method for deleting a ticket tag in the application. 
     * 
     * @param  Tags $tag The database entity form the given tag.
     * @return RedirectResponse 
     */
    public function destroy(Request $request, Tags $tag): RedirectResponse 
    {
        if ($tag->delete()) { // The tag is deleted in the database storage.
            auth()->user()->logActivity($tag, 'Tags', 'Has deleted an issue tag with the name ' . $tag->name);
            flash("The ticket tag with the name <strong>{$tag->name}</strong> has been deleted in the application.")->info()->important();
        }

        return redirect()->route('tags.dashboard');
    }
}
