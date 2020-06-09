@extends('layouts.afterlogin')
<style>
   #loco {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#loco td, #loco th {
  border: 1px solid #ddd;
  padding: 8px;
}

#loco tr:nth-child(even){background-color: #f2f2f2;}

#loco tr:hover {background-color: #ddd;}

#loco th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div id="clock"></div>
                    <script src="{{asset('js/clock.js')}}"></script>

                    <h1> Hey {{$name}}, Welcome Back! </h1>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <h3>Loco Details Count Divisionwise</h3>
        <table  id='loco'>
            <tr>
                <th>Entered By</th>
                <th>Date</th>
                <th>Total Count</th>
            </tr>
            <tr>
                <td>HWH</td>
                <td>{{$date}}</td>
                <td>{{$totalcountHWH}}</td>
            </tr>
            <tr>
                <td>MLDT</td>
                <td>{{$date}}</td>
                <td>{{$totalcountMLDT}}</td>
            </tr>
            <tr>
                <td>ASN</td>
                <td>{{$date}}</td>
                <td>{{$totalcountASN}}</td>
            </tr>
        </table>
        <br>
    </div>
</div>
@endsection
