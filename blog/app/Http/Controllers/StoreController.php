<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Orders;
use App\OrderDetails;
use App\Products;
class StoreController extends Controller
{
    public function index(Request $request)
    {
    	$products = DB::table('products')->get();
    	$user = $request->user()->name;
    	return view('store.index',[
    		'products'=>$products,
    		'user'=>$user,
    	]);
    }
    public function order(Request $request,$productName)
    {
        //http://stackoverflow.com/questions/35721125/about-laravel-eloquent-how-to-get-specified-column-value-in-database
        //https://laravel.com/docs/5.4/eloquent#inserts
        $request->user()->orders()->create([
            'user_id' => $request->user()->id,
        ]);
        $orders = Orders::where('user_id',$request->user()->id)->get();
        $product = Products::select('product_id')->where('name','=',$productName)->first();
        foreach ($orders as $order) {
            OrderDetails::create([
                'order_id'=>$order->order_id,
                'product_id'=>$product->product_id,
            ]);
        }
        return response()->json('success', 200);
    }
    public function cancelOrder(Request $request,$productName)
    {
        $orders = Orders::where('user_id',$request->user()->id)->first();
        $product = Products::select('product_id')->where('name','=',$productName)->first();
        Orders::where('user_id',$request->user()->id)->delete();
        OrderDetails::where([
            ['order_id',$orders->order_id],
            ['product_id',$product->product_id]])->delete();
    }

    public function showOrder(Request $request)
    {
        $details = OrderDetails::where('user_id',$request->user()->id)->get();
        
    }

    public function about(Request $request)
    {
    	return view('store.about',[
    		'user'=>$request->user()->name,
    	]);
    }
}
