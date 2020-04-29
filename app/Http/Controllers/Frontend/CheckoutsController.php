<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Cart;
use Auth;

class CheckoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $payments=Payment::orderBy('priority','asc')->get();
        return view('frontend.pages.checkouts',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
        'name'  => 'required',
        'phone_no'  => 'required',
        'shipping_address'  => 'required',
        'payment_method_id'  => 'required'
        ]);
        $order = new Order();
        if ($request->payment_method_id != 'cash_in') {
          if ($request->transaction_id == NULL || empty($request->transaction_id)) {
            session()->flash('sticky_error', 'Hãy nhập mã giao dịch của bạn');
            return back();
          }
        }
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone_no = $request->phone_no;
        $order->shipping_address = $request->shipping_address;
        $order->message = $request->message;
        $order->ip_address = request()->ip();
        $order->transaction_id = $request->transaction_id;
        if (Auth::check()) {
          $order->user_id = Auth::id();
        }
        $order->payment_id = Payment::where('short_name', $request->payment_method_id)->first()->id;
        $order->save();
        foreach (Cart::totalCarts() as $cart) {
          $cart->order_id = $order->id;
          $cart->save();
        }
        session()->flash('success', 'Bạn đã đặt hàng thành công !!! Chờ đợi xác nhận từ admin.');
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
