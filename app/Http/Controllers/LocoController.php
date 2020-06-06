<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Loco;

class LocoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;

        //$locodetails = Loco::all();
        $locodetails = Loco::paginate(10);
        return view('loco.list', ['locodetails' => $locodetails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loco.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        $input = $request->input();
        $input['user_id'] = $userId;
        $locodetails = Loco::create($input);
        if ($locodetails) {
            $request->session()->flash('success', 'Locodetails successfully added');
        } else {
            $request->session()->flash('error', 'Oops something went wrong, Locodetails not saved');
        }
        return redirect('loco');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userId = Auth::user()->id;
        $locodetails = Loco::where(['id' => $id])->first();
        if (!$locodetails) {
            return redirect('loco')->with('error', 'Locodetails not found');
        }
        return view('loco.view', ['locodetails' => $locodetails]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userId = Auth::user()->id;
        $locodetails = Loco::where(['id' => $id])->first();
        if ($locodetails) {
            return view('loco.edit', ['locodetails' => $locodetails]);
        } else {
            return redirect('loco')->with('error', 'Lododetails not found');
        }
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
        $userId = Auth::user()->id;
        $locodetails = Loco::find($id);
        if (!$locodetails) {
            return redirect('loco')->with('error', 'loco not found.');
        }
        $input = $request->input();
        $input['user_id'] = $userId;
        $locono = $locodetails->update($input);
        if ($locono) {
            return redirect('loco')->with('success', 'Locodetail successfully updated.');
        } else {
            return redirect('loco')->with('error', 'Oops something went wrong. Locodetail not updated');
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
        $userId = Auth::user()->id;
    $locodetails = Loco::where(['id' => $id])->first();
    $respStatus=$respMsg = '';
    if (!$locodetails) {
        $respStatus = 'success';
        $respMsg = 'Locodetails not found';
    }
    $locoDelStatus = $locodetails->delete();
    if ($locoDelStatus) {
        $respStatus = 'success';
        $respMsg = 'Locodetails deleted successfully';
    } else {
        $respStatus = 'error';
        $respMsg = 'Oops something went wrong. Locodetails not deleted successfully';
    }
    return redirect('loco')->with($respStatus, $respMsg);
    }
}
