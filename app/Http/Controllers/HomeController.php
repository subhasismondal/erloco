<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use App\Loco;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $division = Auth::user()->division;
        $name = Auth::user()->name;
        $date=date('d-m-Y');
        //$createdat = Loco::where('created_at', '>=', Carbon::today())->count();
        $totalcountHWH = Loco::where([['created_at','>=', Carbon::today()],['division','=','HWH']])->count();
        $totalcountMLDT = Loco::where([['created_at','>=', Carbon::today()],['division','=','MLDT']])->count();
        $totalcountASN = Loco::where([['created_at','>=', Carbon::today()],['division','=','ASN']])->count();
        $totalcountSDAH = Loco::where(['division' => 'SDAH'])->count();
        return view('home',['name'=>$name,'date'=>$date,'totalcountHWH'=>$totalcountHWH,'totalcountMLDT'=>$totalcountMLDT,'totalcountASN'=>$totalcountASN]);
    }
}
