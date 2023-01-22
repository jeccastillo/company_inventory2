<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Orders, OrderCustomer, AppliancesWorkingStocks};
use App\Http\Resources\OrderResource;


class OrdersController extends Controller
{

    public function viewAllOrders(){        
        $orders = OrderResource::collection(Orders::all());        
        return view('backend.orders.view_all_orders',compact('orders'));        
    }

    public function viewOrder($id){
        $order = Orders::find($id);        
        return view('backend.orders.view_order',compact('order'));

    }

    public function orderPackItem(Request $request){        
        $item = OrderCustomer::find($request->id);
        $item->working_stock_id = $request->working_stock_id;
        $item->status = "packed";
        $item->update();
     
        $stock = AppliancesWorkingStocks::find($request->working_stock_id);
        $stock->status = 1;
        $stock->update();

        return redirect()->route('orders.view',$item->order_id);
    }

    public function orderDelivered(Request $request){


        $allPacked = true;
        $order =  Orders::findOrFail($request->id);
        $order->status = 'done';
       
        $items= $order->orders;

        DB::beginTransaction();
        foreach($items as $item){
            if($item->status == 'packed'){
                $item->status = 'delivered';
                $item->update();
            }else{
                $allPacked = false;
            }
            
            
        }
        if($allPacked){
            DB::commit();
            $order->update();
            return redirect()->route('orders.view',$request->id);
        }
        else{
            DB::rollback();
            $notification = array(
                'message' => 'Some items are not packed', 
                'alert-type' => 'error',
            );
            return redirect()->route('orders.view',$request->id)->with($notification); 
        }
        
        
    }



}
