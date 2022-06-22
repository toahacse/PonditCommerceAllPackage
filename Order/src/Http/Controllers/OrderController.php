<?php

namespace Pondit\PonditCommerce\Order\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pondit\PonditCommerce\Order\Models\Order;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;
use Pondit\PonditCommerce\Category\Models\Category;
use Pondit\PonditCommerce\Product\Models\Product;
use Pondit\PonditCommerce\Tag\Models\Tag;
use Pondit\PonditCommerce\UserInformation\Models\UserInformation;
use Milon\Barcode\DNS1D;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('order::orders.index', ['orders' => $orders]);
    }

    public function create()
    {
        $products = Product::all();
        $users = UserInformation::all();
        return view('order::orders.create', compact('products', 'users'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            
            $order_no = 1;
            $last_order_no = Order::withTrashed()->orderBy('id', 'desc')
                ->orderBy('created_at', 'desc')
                ->first();
     
            if (is_null($last_order_no)) {
                $data['order_no'] = $order_no;
            } else {
                $data['order_no'] = $last_order_no->order_no + 1;
            }

            if (is_null($last_order_no)) {
                $data['invoice_no'] = date('Ymd') . '-' . 1;
            } else {
                $splitInvoice = explode('-', $last_order_no->invoice_no);
                if (isset($splitInvoice[1])) {
                    $index = $splitInvoice[1] + 1;
                }
                $data['invoice_no'] = date('Ymd') . '-' . $index;
            }

            $data['barcode'] = DNS1D::getBarcodePNGPath($data['invoice_no'], 'C39');

            $data['order_date'] = date('Y-m-d H:i:s');

            $orders = Order::create($data);

            return redirect()
                            ->route('orders.index')
                            ->withMessage('Order has been created successfully!');

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
        $order = Order::find($id);
        $products = Product::all();
        $users = UserInformation::all();
        return view('order::orders.edit', compact('order', 'products', 'users'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();

            $order = Order::find($id);

            $order->update($data);

            return redirect()
                            ->route('orders.index')
                            ->withMessage('Order has been updated successfully!');

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
        $order = Order::withTrashed()->find($id);
        return view('order::orders.show', compact('order'));
    }
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()
                            ->route('orders.index')
                            ->withMessage('Order has been deleted successfully!');
    }
    
    public function trashed()
    {
        $orders = Order::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('order::orders.trashed', ['orders' => $orders]);
    }

    public function trashed_restore($id)
    {
        $order = Order::withTrashed()->find($id);        
        $order->restore();
        return redirect()
                            ->route('orders.index')
                            ->withMessage('Order has been deleted successfully!');
    }

    public function trashed_destroy($id)
    {
        $order = Order::withTrashed()->find($id);
        $order->forceDelete();
        return redirect()
                            ->route('orders.index')
                            ->withMessage('Order has been deleted successfully!');
    }


}
