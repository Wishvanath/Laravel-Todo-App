<?php

namespace App\Http\Controllers;

// use the Todo class/Model
use App\Todo;
use Illuminate\Http\Request;
// use the session to display the flash message.
use Session;

class TodosController extends Controller
{
    // define index method
    public function index(){
        $data = Todo::all();
        return view('todos')->with('fetch_data',$data);
    }
    // define store method to save the database
    public function store(Request $request){
        // to check the request
        // dd($request -> all());
        /* to save the data into the database.
        we will create a new instance variable of the Todo class and will 
        do operation.
        */
        $save_data = new Todo;

        $save_data->todo = $request->txt_item;
        // now call this save_data instance will call the save method.
        $save_data->save();

        // show the flash message 
        Session::flash('success','Added new items..');

        // now next thing is redirect to the back page.
        return redirect()->back();

    }
    // define the delete functionality
    public function delete($id){
        // do your stuff here
        // to check the retrun value of the particulr id. 
        // dd($id);
        // first step find that particular id 
         $find_id = Todo::find($id);   
        // then delete it from the database.
        $find_id ->delete();
        // show the flash message 
        Session::flash('success','Deleted one items..');
        // now redirect to the user
        return redirect()->back();

    }
    // define here update method
    public function update($id){
        // to check the id in the browser
        // dd($id);
        // now the concept is we are going to pass this data into the new view and we will do operation there.
        // so first thing is fine the data
        $update_id = Todo::find($id);
        // now return the view and data.
        return view('update')->with('update_data', $update_id);
    }
    public function save(Request $request, $id){
        // to check the form request.
        // dd($request->all());  
        //find that particular id in database.
        $update_data = Todo::find($id);

        // now make changes in the database field.

        $update_data->todo = $request->txt_update;
        $update_data->completed = 0;
        // now save your created instances.
        $update_data->save();
        
        // show the flash message 
        Session::flash('success','Updated items..');

        // redirect back to your page.
        return redirect()->route('todos');
    }
    // define the completed method.
    public function completed($id){
        // dd($id);
        // now find the todo list 
        $find_item = Todo::find($id);
        //now edit the completed field in our database
        $find_item->completed = 1;
        $find_item->save();
        // redirect to the page
        
        // show the flash message 
        Session::flash('success','Item has completed');
        return redirect()->back();
    }
}

