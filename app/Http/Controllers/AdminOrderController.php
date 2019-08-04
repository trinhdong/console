<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query()
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*',  'orders.id as order_id', 'orders.status as order_status')
            ->orderBy('id', 'desc');
        if ($_GET['status'] == 'processed') {
            $users = $users->where('orders.status', '<>', 0)->get();
            return view('admin.orders.index_processed', compact('users'));
        }

        $users = $users->where('orders.status', '==', 0)->get();
        return view('admin.orders.index', compact('users'));
    }

    public function view($id)
    {
        $userInfo = User::getUserInfoByUserId($id);
        $orderInfo = Order::getOrderInfoByUserId($id);
        return view('admin.orders.view', ['orderInfo' => $orderInfo, 'userInfo' => $userInfo]);
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->input('status');
        $order->save();
        return back()->with(Controller::notification(ORDER_SUCCESS));
    }

    public function delete($id)
    {
        Order::destroy($id);
        return back()->with(Controller::notification(DELETE));
    }
}
