<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use App\User;
use Spatie\Permission\Models\Role;
use DB;

class ContactController extends Controller
{
    public function index(Request $request)
    {
    $data = Contact::orderBy('id','DESC')->paginate(5);
        return view('admin.contacts.index',compact('data'))
            ->with('i', ($request->input('contact', 1) - 1) * 5);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        $contact ->update(['status' => 1]);
        return view('admin.contacts.show',compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::find($id)->delete();
        return redirect()->route('contacts.index')
                        ->with('success','Contact deleted successfully');
    }

    public function confirmation($id)
    {
        $contact = Contact::findOrFail($id);
        return view($this->view . 'delete' ,compact('contact'));
    }

    private function getInput(Request $request)
    {

        $input = $request->only('title','name');
 
        return $input;
    }
}
