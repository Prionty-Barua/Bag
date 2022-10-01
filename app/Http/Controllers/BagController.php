<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bag;

class BagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bags =Bag::latest()->paginate('5');

        return view('bags.index',compact('bags'))
        ->with('i',(request()->input('pages',1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'brand'=>'required',
            'founded'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();

        if ($image = $request->file('image')){
            $destinationPath ='image/';
            $profileImage =date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath,$profileImage);
            $input['image'] = "$profileImage";
        }
        Bag::create($input);
        return redirect()->route('bags.index')
        ->with('success','Bag created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bag $bag)
    {
        return view('bags.show',compact('bag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bag $bag)
    {
        return view('bags.edit',compact('bag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Bag $bag)
    {
        $request->validate([
            'name'=>'required',
            'brand'=>'required',
            'founded'=>'required'
        ]);
        $input = $request->all();

        if($image = $request->file('iamge')){
            $destinationPath = 'image/';
            $profileImage =date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destination, $profileImage);
            $input['image'] ="$profileImage";
        }else{
            unset($input['image']);
        }
        
        $bag->update($input);

        return redirect()->route('bags.index')
        ->with('success','Bag updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bag $bag)
    {
        $bag->delete();

        return redirect()->route('bags.index')
        ->with('success','Bag deleted successfully');
    }
}
