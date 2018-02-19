<?php

namespace Vadiasov\Tags\Controllers;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Vadiasov\Tags\Requests\TagRequest;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = 'tags';
        $user   = Auth::user();
        $tags   = Tag::all();
        
        return view('tags::admin.tags.index', compact(
            'active',
            'user',
            'tags'
        ));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'roles';
        $user   = Auth::user();
        
        return view('tags::admin.tags.create', compact(
            'active',
            'user'
        ));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \Vadiasov\Tags\Requests\TagRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $tag = new Tag([
            'name'        => $request->name,
            'description' => $request->description,
        ]);
        
        $tag->save();
        
        return redirect(route('admin/tags'))->with('status', 'New Tag has been created!');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $active = 'tags';
        $user   = Auth::user();
        $tag    = Tag::whereId($id)->first();
        
        return view('tags::admin.tags.edit', compact(
            'active',
            'user',
            'tag'
        ));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param \Vadiasov\Tags\Requests\TagRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        $tag = Tag::whereId($id)->first();
        
        $tag->name        = $request->name;
        $tag->description = $request->description;
        
        $tag->save();
        
        return redirect(route('admin/tags'))->with('status', 'The Tag has been edited!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::whereId($id);
        
        $tag->delete();
        
        return redirect(route('admin/tags'))->with('status', 'The Tag has been deleted!');
    }
}
