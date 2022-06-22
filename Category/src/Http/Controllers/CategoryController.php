<?php

namespace Pondit\PonditCommerce\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pondit\PonditCommerce\Category\Models\Category;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('category::categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('category::categories.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
 
            if ($request->file('picture')) {
                $data['picture'] = $this->uploadFile($request->picture, $request->title);
            }

            if($request->is_draft){
                $data['is_draft'] = $request->is_draft;
            }else{
                $data['is_draft'] = 0;
            }

            $categories = Category::create($data);

            return redirect()
                            ->route('categories.index')
                            ->withMessage('Category has been created successfully!');

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
        $category = Category::find($id);
        return view('category::categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();

            $category = Category::find($id);

            if ($request->file('picture')) {
                $this->unlink($category->picture);
                $data['picture'] = $this->uploadFile($request->picture, $request->name);
            }
            if($request->is_draft){
                $data['is_draft'] = $request->is_draft;
            }else{
                $data['is_draft'] = 0;
            }

            $category->update($data);

            return redirect()
                            ->route('categories.index')
                            ->withMessage('Category has been updated successfully!');

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
        $category = Category::withTrashed()->find($id);
        return view('category::categories.show', compact('category'));
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()
                            ->route('categories.index')
                            ->withMessage('Category has been deleted successfully!');
    }
    
    public function trashed()
    {
        $categories = Category::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('category::categories.trashed', ['categories' => $categories]);
    }

    public function trashed_restore($id)
    {
        $category = Category::withTrashed()->find($id);        
        $category->restore();
        return redirect()
                            ->route('categories.index')
                            ->withMessage('Category has been deleted successfully!');
    }

    public function trashed_destroy($id)
    {
        $category = Category::withTrashed()->find($id);
        $this->unlink($category->picture); 
        $category->forceDelete();
        return redirect()
                            ->route('categories.index')
                            ->withMessage('Category has been deleted successfully!');
    }


 private function uploadFile($file, $name)
    {
        $folder = storage_path('/app/public/category-images/');
        if (!File::exists($folder)) {
            $folderCreate = File::makeDirectory($folder, 0775, true, true);  
            if (!isset($folderCreate))
                throw new Exception("Could not permission for creating folder on storage path.", 1);
        }
        $timestamp = str_replace([' ', ':'], '', now());
        $file_name = $timestamp .'-'.$name. '.' .$file->getClientOriginalExtension();
        $file->move($folder, $file_name);
 
        return $file_name;
    }
 
    private function unlink($file)
    {
        $pathToUpload = storage_path().'/app/public/category-images/';
        if ($file != '' && file_exists($pathToUpload. $file)) {
            @unlink($pathToUpload. $file);
        }
    }



}
