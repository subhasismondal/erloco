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
        $division = Auth::user()->division;
        $role = Auth::user()->role;
        //$locodetails = Loco::all();
        if($role == 'ADMIN'){

            $locodetails = Loco::paginate(15);
        }else{
            $locodetails = Loco::where(['division' => $division])->paginate(15);
        }

        return view('loco.list', ['locodetails' => $locodetails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        return view('loco.add',['user' => $user]);
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
        $locono = $request->locono;
        $trainno = $request->trainno;
        $ddate = $request->ddate;
        $time = $request->time;
        $input = $request->input();
        $input['user_id'] = $userId;
        $locodetails = Loco::create($input);
        $id = Loco::where(['locono' =>$locono ])->value('id');
        if ($locodetails) {
            $request->session()->flash('success', 'Locodetails successfully added');
        } else {
            $request->session()->flash('error', 'Oops something went wrong, Locodetails not saved');
        }
        return view('loco.view',['locodetails' => $locodetails]);
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
            return redirect('loco')->with('error', 'Locodetails not found! Hari Om');
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

    public function search(Request $request)
              {

                    }
                }
