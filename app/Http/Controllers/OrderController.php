<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;

class OrderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dishes = Dish::orderBy('id','desc')->get();
        $tables = Table::orderBy('id','desc')->get();
        $statusArray = config('res.order_status');
        $status = array_flip($statusArray); 
        $orders = Order::where('status',4)->get();
        return view('order_form',compact('dishes','tables','status','orders'));
    }

    public function submit(Request $request)
    {
        $data = array_filter($request->except('_token','table'));
        //$request->table = (int)$request->table;
        $orderId = rand();

        foreach ($data as $key => $val) {
            if($val > 1) {
                for ($i = 0; $i < $val; $i++) {
                    $this->saveOrder($orderId,$key,$request);
                }
            }else{
                $this->saveOrder($orderId,$key,$request);
            }
        }
        return redirect('/')->with('message','Order Submitted');
    }

    public function saveOrder($orderId,$dish_id,$request)
    {

        $order = new Order();
        $order->order_id = $orderId;
        $order->dish_id = $dish_id;
        $order->table_id = $request->table;
        $order->status = config('res.order_status.new');

        $order->save();
    }

    public function serve(Order $order)
    {
        $order->status = config('res.order_status.done');

        $order->save();
        return redirect('/')->with('message','Order done served to Customer');
    }
}
