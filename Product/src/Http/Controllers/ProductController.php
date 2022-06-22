<?php

namespace Pondit\PonditCommerce\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pondit\PonditCommerce\Product\Models\Product;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;
use Pondit\PonditCommerce\Brand\Models\Brand;
use Pondit\PonditCommerce\Category\Models\Category;
use Pondit\PonditCommerce\Label\Models\Label;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('product::product.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $labels = Label::all();
        return view('product::product.create', compact('categories', 'brands','labels'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
           
            if ($request->file('picture')) {
                $data['picture'] = $this->uploadFile($request->picture, $request->title);
            }
            if($request->is_new){
                $data['is_new'] = $request->is_new ;
            }else{
                $data['is_new'] = 0;
            }
            if($request->is_active){
                $data['is_active'] = $request->is_active ;
            }else{
                $data['is_active'] = 0;
            }
            if($request->is_draft){
                $data['is_draft'] = $request->is_draft;
            }else{
                $data['is_draft'] = 0;
            }

            $products = Product::create($data);

            return redirect()
                            ->route('products.index')
                            ->withMessage('Product has been created successfully!');

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
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        $labels = Label::all();

        return view('product::product.edit', compact('product','categories', 'brands','labels'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();

            $product = Product::find($id);

            if ($request->file('picture')) {
                $this->unlink($product->picture);
                $data['picture'] = $this->uploadFile($request->picture, $request->title);
            }
            if($request->is_new){
                $data['is_new'] = $request->is_new ;
            }else{
                $data['is_new'] = 0;
            }
            if($request->is_active){
                $data['is_active'] = $request->is_active ;
            }else{
                $data['is_active'] = 0;
            }
            if($request->is_draft){
                $data['is_draft'] = $request->is_draft;
            }else{
                $data['is_draft'] = 0;
            }

            $product->update($data);

            return redirect()
                            ->route('products.index')
                            ->withMessage('Product has been updated successfully!');

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
        $product = Product::withTrashed()->find($id);
        return view('product::product.show', compact('product'));
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()
                            ->route('products.index')
                            ->withMessage('Product has been deleted successfully!');
    }
    
    public function trashed()
    {
        $products = Product::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('product::product.trashed', ['products' => $products]);
    }

    public function trashed_restore($id)
    {
        $product = Product::withTrashed()->find($id);        
        $product->restore();
        return redirect()
                            ->route('products.index')
                            ->withMessage('Product has been deleted successfully!');
    }

    public function trashed_destroy($id)
    {
        $product = Product::withTrashed()->find($id);
        $this->unlink($product->picture);
        
        $product->forceDelete();
        return redirect()
                            ->route('products.index')
                            ->withMessage('Product has been deleted successfully!');
    }






    private function uploadFile($file, $name)
    {
        $folder = storage_path('/app/public/product-images/');
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
        $pathToUpload = storage_path().'/app/public/product-images/';
        if ($file != '' && file_exists($pathToUpload. $file)) {
            @unlink($pathToUpload. $file);
        }
    }

}
