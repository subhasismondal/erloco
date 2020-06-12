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
        $role = Auth::user()->role;
        if ($role == 'USER') {
            $date = date('d-m-Y');
            $totalcountHWH = Loco::where([['created_at', '>=', Carbon::today()], ['division', '=', 'HWH']])->count();
            $totalcountMLDT = Loco::where([['created_at', '>=', Carbon::today()], ['division', '=', 'MLDT']])->count();
            $totalcountASN = Loco::where([['created_at', '>=', Carbon::today()], ['division', '=', 'ASN']])->count();
            $totalcountSDAH = Loco::where(['division' => 'SDAH'])->count();

            // $locodetailstodayHWH = Loco::where([['created_at','>=', Carbon::today()],['division','=','HWH']]);
            $locodetailsToday = Loco::where([['created_at', '>=', Carbon::today()], ['division', '=', $division]])->get();
            return view('home', ['name' => $name, 'date' => $date,'totalcountHWH' => $totalcountHWH, 'totalcountMLDT' => $totalcountMLDT, 'totalcountASN' => $totalcountASN, 'division' => $division,'locodetailsToday' => $locodetailsToday,'role'=>$role]);
        } else if ($role == 'ADMIN') {
            $date = date('d-m-Y');
            //$createdat = Loco::where('created_at', '>=', Carbon::today())->count();
            $totalcountHWH = Loco::where([['created_at', '>=', Carbon::today()], ['division', '=', 'HWH']])->count();
            $totalcountMLDT = Loco::where([['created_at', '>=', Carbon::today()], ['division', '=', 'MLDT']])->count();
            $totalcountASN = Loco::where([['created_at', '>=', Carbon::today()], ['division', '=', 'ASN']])->count();
            $totalcountSDAH = Loco::where(['division' => 'SDAH'])->count();
            $locodetailsTodayHWH = Loco::where([['created_at', '>=', Carbon::today()], ['division', '=', 'HWH']])->get();
            $locodetailsTodayMLDT = Loco::where([['created_at', '>=', Carbon::today()], ['division', '=', 'MLDT']])->get();
            $locodetailsTodayASN = Loco::where([['created_at', '>=', Carbon::today()], ['division', '=', 'ASN']])->get();
            $locodetailsTodaySDAH = Loco::where([['created_at', '>=', Carbon::today()], ['division', '=', 'SDAH']])->get();
            return view('home', ['name' => $name, 'date' => $date, 'division' => $division, 'role'=>$role,'totalcountHWH' => $totalcountHWH, 'totalcountMLDT' => $totalcountMLDT, 'totalcountASN' => $totalcountASN,'locodetailsTodayHWH' => $locodetailsTodayHWH,'locodetailsTodayMLDT' => $locodetailsTodayMLDT,'locodetailsTodayASN' => $locodetailsTodayASN,'locodetailsTodaySDAH' => $locodetailsTodaySDAH]);
        }
    }
}
