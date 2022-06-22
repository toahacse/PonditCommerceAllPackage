<?php

namespace Pondit\PonditCommerce\Brand\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pondit\PonditCommerce\Brand\Models\Brand;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('brand::brands.index', ['brands' => $brands]);
    }

    public function create()
    {
        return view('brand::brands.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
 
            if ($request->file('picture')) {
                $data['picture'] = $this->uploadFile($request->picture, $request->name);
            }

            if($request->is_active){
                $data['is_active'] = $request->is_active;
            }else{
                $data['is_active'] = 0;
            }
            if($request->is_draft){
                $data['is_draft'] = $request->is_draft;
            }else{
                $data['is_draft'] = 0;
            }

            $brands = Brand::create($data);

            return redirect()
                            ->route('brands.index')
                            ->withMessage('Brand has been created successfully!');

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
        $brand = Brand::find($id);
        return view('brand::brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();

            $brand = Brand::find($id);

            if ($request->file('picture')) {
                $this->unlink($brand->picture);
                $data['picture'] = $this->uploadFile($request->picture, $request->name);
            }
            if($request->is_active){
                $data['is_active'] = $request->is_active;
            }else{
                $data['is_active'] = 0;
            }
            if($request->is_draft){
                $data['is_draft'] = $request->is_draft;
            }else{
                $data['is_draft'] = 0;
            }

            $brand->update($data);

            return redirect()
                            ->route('brands.index')
                            ->withMessage('Brand has been updated successfully!');

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
        $brand = Brand::withTrashed()->find($id);
        return view('brand::brands.show', compact('brand'));
    }
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()
                            ->route('brands.index')
                            ->withMessage('Brand has been deleted successfully!');
    }
    
    public function trashed()
    {
        $brands = Brand::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('brand::brands.trashed', ['brands' => $brands]);
    }

    public function trashed_restore($id)
    {
        $brand = Brand::withTrashed()->find($id);        
        $brand->restore();
        return redirect()
                            ->route('brands.index')
                            ->withMessage('Brand has been deleted successfully!');
    }

    public function trashed_destroy($id)
    {
        $brand = Brand::withTrashed()->find($id);
        $this->unlink($brand->picture); 
        $brand->forceDelete();
        return redirect()
                            ->route('brands.index')
                            ->withMessage('Brand has been deleted successfully!');
    }


 private function uploadFile($file, $name)
    {
        $folder = storage_path('/app/public/brand-images/');
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
        $pathToUpload = storage_path().'/app/public/brand-images/';
        if ($file != '' && file_exists($pathToUpload. $file)) {
            @unlink($pathToUpload. $file);
        }
    }



}
