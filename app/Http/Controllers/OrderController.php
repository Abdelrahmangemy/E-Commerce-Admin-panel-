<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Spatie\Permission\Models\Role;
use DB;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $data = Order::orderBy('id','DESC')->paginate(5);
        return view('orders.index',compact('data'))
            ->with('i', ($request->input('order', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('orders.create',compact('roles'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'nullable|min:4|max:255',
        ]);
        $input = $request->all();


        $order = Order::create($this->getInput($request));
        #$page->assignRole($request->input('roles'));


        return redirect()->route('orders.index')
                        ->with('success','Order created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $order->update(['seen' => 1]);
        return view('orders.show',compact('order'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('orders.edit',compact('order','roles'));
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
        $this->validate($request, [
            'title' => 'nullable|min:4|max:255',
        ]);

        $input = $request->all();


        $order =  Order::find($id);
        $order->update($this->getInput($request));
        DB::table('model_has_roles')->where('model_id',$id)->delete();


        return redirect()->route('orders.index')
                        ->with('success','Order updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::find($id)->delete();
        return redirect()->route('orders.index')
                        ->with('success','Order deleted successfully');
    }
    private function getInput(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->only('title');
        $input['image']   = uploading()->singleImage('image'); 
        return $input;
    }
}
