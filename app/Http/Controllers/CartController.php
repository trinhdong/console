<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckOutRequest;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\User;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function Cart()
    {
        $cartContent = Cart::getContent();
        $cartTotal = Cart::getTotal();
        return view('page.shopping_cart', ['cartContent' => $cartContent, 'cartTotal' => $cartTotal]);
    }

    public function addProductCart($id)
    {
        $productBuy = Product::query()->where('id', $id)->first();
        Cart::add([
            'id' => $id,
            'name' => $productBuy->product_name,
            'quantity' => 1,
            'price' => $productBuy->price,
            'attributes' => array('image' => $productBuy->image ?? '')
        ]);
        Cart::getContent();
        return redirect('gio-hang');
    }

    public function deleteProductCart($id)
    {
        Cart::remove($id);
        return redirect('gio-hang');
    }

    public function updateProductCart(Request $request)
    {
        $id = intval($request->get('id'));
        $quantity = intval($request->get('quantity'));
        Cart::update($id, ['quantity' => array('relative' => false, 'value' => $quantity)]);
        return redirect('gio-hang');
    }

    public function getCheckOut()
    {
        $cartContent = Cart::getContent();
        $cartTotal = Cart::getTotal();
        return view('page.checkout', ['cartContent' => $cartContent, 'cartTotal' => $cartTotal]);
    }

    public function postCheckOut(Request $request)
    {
        $cartContent = Cart::getContent();
        $order = new Order();
        $order->user_id = intval($request->input('user_id'));
        $order->total_price = str_replace(',', '', Cart::getTotal());
        $order->note = $request->input('note');
        $order->save();

        if (count($cartContent) > 0) {
            foreach ($cartContent as $key => $cart) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $cart->id;
                $orderDetail->quantity = $cart->quantity;
                $orderDetail->price = $cart->price;
                $orderDetail->save();
            }
        }
        Cart::clear();

        return redirect('dat-hang')->with('success', 'Đặt hàng thành công');
    }
}
