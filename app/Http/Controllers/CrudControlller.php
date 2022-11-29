<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Session;

class CrudControlller extends Controller
{
    public function showData()
    {
        // $showData = Crud::all();
        $showData = Crud::simplepaginate(5);
        return view('show_data', compact('showData'));
    }
    public function addData()
    {
        return view('add_data');
    }
    public function storeData(Request $request)
    {

        $rules = [
            'name' => 'required|max:12',
            'email' => 'required|email|unique:cruds,email',
        ];
        $cm = [
            'name.required' => 'Enter your name',
            'name.max' => 'Your name can not containt more than 10 ch',
            'email.requered' => 'Enter your email',
            'email.email' => 'Email must be a valid email',
        ];

        $this->validate($request, $rules, $cm);

        $crud = new Crud();
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->save();

        Session::flash('msg', 'Data successfuly added');


        return redirect('/');
    }
    public function editData($id = nul)
    {
        $editData = Crud::find($id);
        return view('edit_data', compact('editData'));
    }
    public function updateData(Request $request, $id)
    {

        $rules = [
            'name' => 'required|max:12',
            'email' => 'required|email|unique:cruds,email',
        ];
        $cm = [
            'name.required' => 'Enter your name',
            'name.max' => 'Your name can not containt more than 10 ch',
            'email.requered' => 'Enter your email',
            'email.email' => 'Email must be a valid email',
        ];

        $this->validate($request, $rules, $cm);

        $crud = Crud::find($id);
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->save();

        Session::flash('msg', 'Data successfuly update');


        return redirect('/');
    }
    public function deleteData($id = null)
    {
        $deleteData = Crud::find($id);
        $deleteData->delete();
        Session::flash('msg', 'Data successfully Deleted');
        return redirect('/');
    }
}
