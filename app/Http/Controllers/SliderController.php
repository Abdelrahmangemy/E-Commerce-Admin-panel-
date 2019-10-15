<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sliders;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Sliders::orderBy('id','DESC')->paginate(5);
        return view('sliders.index',compact('data'))
            ->with('i', ($request->input('slider', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('sliders.create',compact('roles'));
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();


        $slider = Sliders::create($this->getInput($request));
        #$page->assignRole($request->input('roles'));


        return redirect()->route('sliders.index')
                        ->with('success','Slider created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = Sliders::find($id);
        return view('sliders.show',compact('slider'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Sliders::find($id);


        return view('sliders.edit',compact('slider','roles','pageRole'));
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();


        $slider =  Sliders::find($id);
        $slider->update($this->getInput($request));
        DB::table('model_has_roles')->where('model_id',$id)->delete();


        return redirect()->route('sliders.index')
                        ->with('success','Slider updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sliders::find($id)->delete();
        return redirect()->route('sliders.index')
                        ->with('success','Slider deleted successfully');
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