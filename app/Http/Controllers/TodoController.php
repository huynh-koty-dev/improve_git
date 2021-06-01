<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Auth;
use App\Http\Requests\AddNewRequest;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (empty($request->search)) {
            $todos = Todo::where('user_id', Auth::id())
            ->orderBy('id', 'DESC')
            ->paginate(5);

            return view('home', ['todos' => $todos]);    
        } else {
            $text_search = $request->search;
            $todos = Todo::where('title', 'LIKE', '%'.$text_search.'%')
            ->where('user_id', Auth::id())
            ->orderBy('id', 'DESC')
            ->simplePaginate(5);
            $count = count($todos);
            
            return view('search', compact('todos','text_search','count'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewRequest $request)
    {
        //
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $store = Todo::create($input);
        if ($store) {
            return \redirect()->route('todos.index');
        } else {

            return \redirect()->route('todos.create');
        }
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
        $todo = Todo::findOrFail($id);
        
        return view('edit', ['todo' =>  $todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddNewRequest $request, $id)
    {
        //
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $todo = Todo::find($id);
        $update = $todo->update($input);
        if ($update) {
            return \redirect()->route('todos.index');
        } else {

            return \redirect()->route('todos.edit');
        }
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
        $todo = Todo::findOrFail($id);
        $todo->delete();
        
        return \redirect()->route('todos.index');
    }
}
