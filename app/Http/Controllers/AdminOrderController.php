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
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.orders.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        //
    }
}
