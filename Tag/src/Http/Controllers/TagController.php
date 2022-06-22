<?php

namespace Pondit\PonditCommerce\Tag\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pondit\PonditCommerce\Tag\Models\Tag;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('id', 'desc')->get();
        return view('tag::tags.index', ['tags' => $tags]);
    }

    public function create()
    {
        return view('tag::tags.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
 
            if($request->is_active){
                $data['is_active'] = $request->is_active ;
            }else{
                $data['is_active'] = 0;
            }
            if($request->is_popular){
                $data['is_popular'] = $request->is_popular;
            }else{
                $data['is_popular'] = 0;
            }

            $tags = Tag::create($data);

            return redirect()
                            ->route('tags.index')
                            ->withMessage('Tag has been created successfully!');

        } 
        catch (Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
        catch (QueryException $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tag::tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();

            $tag = Tag::find($id);

            if($request->is_active){
                $data['is_active'] = $request->is_active ;
            }else{
                $data['is_active'] = 0;
            }
            if($request->is_popular){
                $data['is_popular'] = $request->is_popular;
            }else{
                $data['is_popular'] = 0;
            }

            $tag->update($data);

            return redirect()
                            ->route('tags.index')
                            ->withMessage('Tag has been updated successfully!');

        } 
        catch (Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
        catch (QueryException $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function show($id)
    {
        $tag = Tag::withTrashed()->find($id);
        return view('tag::tags.show', compact('tag'));
    }
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()
                            ->route('tags.index')
                            ->withMessage('Tag has been deleted successfully!');
    }
    
    public function trashed()
    {
        $tags = Tag::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('tag::tags.trashed', ['tags' => $tags]);
    }

    public function trashed_restore($id)
    {
        $tag = Tag::withTrashed()->find($id);        
        $tag->restore();
        return redirect()
                            ->route('tags.index')
                            ->withMessage('Tag has been restored successfully!');
    }

    public function trashed_destroy($id)
    {
        $tag = Tag::withTrashed()->find($id);
        
        $tag->forceDelete();
        return redirect()
                            ->route('tags.index')
                            ->withMessage('Tag has been deleted successfully!');
    }



}
