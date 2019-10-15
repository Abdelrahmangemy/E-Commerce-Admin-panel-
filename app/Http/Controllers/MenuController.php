<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

class MenuController extends Controller
{
    public function index(Request $request)
    {
    $data = Menu::orderBy('id','DESC')->paginate(5);
        return view('menus.index',compact('data'))
            ->with('i', ($request->input('menu', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Role::pluck('name','name')->all();
        return view('menus.create',compact('menus'));
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
            'title' => 'required|min:4|max:255',
            'link' => 'required|string|min:10',
            'parent_id' => 'nullable|string',
            'status' => 'nullable|boolean'
        ]);
        $input = $request->all();


        $menu = Menu::create($this->getInput($request));
        #$page->assignRole($request->input('roles'));


        return redirect()->route('menus.index')
                        ->with('success','Menu created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::find($id);
        return view('menus.show',compact('menu'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        $menus = Role::where('id','!=',$id)->pluck('name','name')->all();

        return view('menus.edit',compact('menu','menus','pageRole'));
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
            'title' => 'required|min:4|max:255',
            'link' => 'required|string|min:10',
            'parent_id' => 'nullable|string',
            'status' => 'nullable|boolean'
        ]);

        $input = $request->all();


        $menu = Menu::find($id);
        $menu->update($this->getInput($request));
        DB::table('model_has_roles')->where('model_id',$id)->delete();


        return redirect()->route('menus.index')
                        ->with('success','Menu updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::find($id)->delete();
        return redirect()->route('menus.index')
                        ->with('success','Menu deleted successfully');
    }
    private function getInput(Request $request)
    {

        $input = $request->only('title','link');
 
        return $input;
    }
}
