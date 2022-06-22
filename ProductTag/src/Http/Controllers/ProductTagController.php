<?php

namespace Pondit\PonditCommerce\ProductTag\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pondit\PonditCommerce\ProductTag\Models\ProductTag;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;
use Pondit\PonditCommerce\Category\Models\Category;
use Pondit\PonditCommerce\Product\Models\Product;
use Pondit\PonditCommerce\Tag\Models\Tag;

class ProductTagController extends Controller
{
    public function index()
    {
        $product_tags = ProductTag::orderBy('id', 'desc')->get();
        return view('producttag::product_tags.index', ['product_tags' => $product_tags]);
    }

    public function create()
    {
        $products = Product::all();
        $tags = Tag::all();
        return view('producttag::product_tags.create', compact('products', 'tags'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
 
            $product_tags = ProductTag::create($data);

            return redirect()
                            ->route('product-tags.index')
                            ->withMessage('ProductTag has been created successfully!');

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
        $product_tag = ProductTag::find($id);
        $products = Product::all();
        $tags = Tag::all();
        return view('producttag::product_tags.edit', compact('product_tag', 'products', 'tags'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();

            $product_tag = ProductTag::find($id);

            $product_tag->update($data);

            return redirect()
                            ->route('product-tags.index')
                            ->withMessage('ProductTag has been updated successfully!');

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
        $product_tag = ProductTag::withTrashed()->find($id);
        return view('producttag::product_tags.show', compact('product_tag'));
    }
    public function destroy($id)
    {
        $product_tag = ProductTag::find($id);
        $product_tag->delete();
        return redirect()
                            ->route('product-tags.index')
                            ->withMessage('ProductTag has been deleted successfully!');
    }
    
    public function trashed()
    {
        $product_tags = ProductTag::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('producttag::product_tags.trashed', ['product_tags' => $product_tags]);
    }

    public function trashed_restore($id)
    {
        $product_tag = ProductTag::withTrashed()->find($id);        
        $product_tag->restore();
        return redirect()
                            ->route('product-tags.index')
                            ->withMessage('ProductTag has been deleted successfully!');
    }

    public function trashed_destroy($id)
    {
        $product_tag = ProductTag::withTrashed()->find($id);
        $product_tag->forceDelete();
        return redirect()
                            ->route('product-tags.index')
                            ->withMessage('ProductTag has been deleted successfully!');
    }


}
