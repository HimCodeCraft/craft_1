<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $todos=Todo::all();
        // dd($todos);
        return view('todos.index',compact('todos'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('todos.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255',
            'description'=>'nullable'
        ]);

        Todo::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>false
        ]);

        return redirect()->route('todos.index')->with('success','Todo cretaed successfully!');

    }
    
    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
        return view('todos.index');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        //
        return view('todos.create',compact('todo'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title'=>'required|max:255',
            'decription'=>'nullable'
        ]);

        $todo->update([
            'title'=>$request->title,
            'description'=>$request->description,
        ]);

        return redirect()->route('todos.index')->with('success','Todo update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
    
        $todo->delete();
        return redirect()->route('todos.index')->with('success','data deleted successfully!');
    }
}
