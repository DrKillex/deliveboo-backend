<?php

namespace App\Http\Controllers\Api;

use Braintree_Transaction;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Braintree\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Payment(Request $request)
    {   
        $data = $request->all();
        $nonce = $data['nonce'];
        $status = Transaction::sale([
            'amount' => $data['totalPrice'],
            'paymentMethodNonce' => $nonce,
        ]);

        $order = new Order();
        $order->name = $data['name'];
        $order->surname = $data['surname'];
        $order->address = $data['address'];
        $order->email = $data['email'];
        $order->telephone = $data['telephone'];
        $order->total_price = $data['totalPrice'];
        if($status->success===true){
            $order->payment_state = 1;
        } else {
            $order->payment_state = 0;
        }
        $order->save();

        $cart = $data['cart'];

        foreach ($cart as $product) {
            $product_id = $product['id'];
            $quantity = $product['quantity'];
            $order->products()->attach($product_id, ['quantity' => $quantity]);
        }

        return response()->json($status);
        // return $status;
    }
}
