<?php

namespace Pondit\PonditCommerce\Cart\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pondit\PonditCommerce\Cart\Models\Cart;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::orderBy('id', 'desc')->get();
        return view('cart::carts.index', ['carts' => $carts]);
    }

    public function create()
    {
        return view('cart::carts.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
           
            if ($request->file('picture')) {
                $data['picture'] = $this->uploadFile($request->picture, $request->product_title);
            }
            $carts = Cart::create($data);

            return redirect()
                            ->route('carts.index')
                            ->withMessage('Cart has been created successfully!');

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
        $cart = Cart::find($id);
        return view('cart::carts.edit', compact('cart'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();

            $cart = Cart::find($id);

            if ($request->file('picture')) {
                $this->unlink($cart->picture);
                $data['picture'] = $this->uploadFile($request->picture, $request->product_title);
            }

            $cart->update($data);

            return redirect()
                            ->route('carts.index')
                            ->withMessage('Cart has been updated successfully!');

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
        $cart = Cart::withTrashed()->find($id);
        return view('cart::carts.show', compact('cart'));
    }
    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()
                            ->route('carts.index')
                            ->withMessage('Cart has been deleted successfully!');
    }
    
    public function trashed()
    {
        $carts = Cart::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('cart::carts.trashed', ['carts' => $carts]);
    }

    public function trashed_restore($id)
    {
        $cart = Cart::withTrashed()->find($id);        
        $cart->restore();
        return redirect()
                            ->route('carts.index')
                            ->withMessage('Cart has been deleted successfully!');
    }

    public function trashed_destroy($id)
    {
        $cart = Cart::withTrashed()->find($id);
        $this->unlink($cart->picture);
        
        $cart->forceDelete();
        return redirect()
                            ->route('carts.index')
                            ->withMessage('Cart has been deleted successfully!');
    }






    private function uploadFile($file, $name)
    {
        $folder = storage_path('/app/public/cart-images/');
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
        $pathToUpload = storage_path().'/app/public/cart-images/';
        if ($file != '' && file_exists($pathToUpload. $file)) {
            @unlink($pathToUpload. $file);
        }
    }

}
