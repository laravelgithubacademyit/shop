<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class OrderController extends Controller
{


    public function create()
    {
        return view('client.orders.create', [
            'items' => Cart::getItems(),
            'totalAmount' => Cart::totalAmount(),
            'totalItems' => Cart::totalItems()
        ]);
    }

    public function store(Request $request)
    {
        $order = Order::query()->create([
            'amount' => Cart::totalAmount(),
            'address' => $request->get('address')
        ]);

        foreach (Cart::getItems() as $item){

            $product = $item['product'];
            $productQty  = $item['quantity'];

            $order->details()->create([
                'product_id' => $product->id,
                'unit_amount' => $product->cost_with_discount,
                'count' => $productQty,
                'total_amount' => $productQty * $product->cost_with_discount
            ]);
        }

        Cart::removeAll();

        $invoice = (new Invoice)->amount($order->amount);

        return Payment::purchase($invoice, function($driver, $transactionId) use ($order){
            $order->update([
                'transaction_id' => $transactionId
            ]);
        })->pay()->render();


        return redirect()->back();
    }

    public function callback(Request $request)
    {
        $order = Order::query()->where('transaction_id', $request->get('Authority'))->first();

        $order->update([
            'payment_status' => $request->get('Status')
        ]);

        return redirect(route('client.orders.show', $order));
    }

    public function show(Order $order)
    {
        return view('client.orders.show', [
            'order' => $order
        ]);
    }

}
