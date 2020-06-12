@extends('layouts.afterlogin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script>
    function printPDF() {
        var pdf = new jsPDF('p', 'pt', 'letter');
        pdf.setFontSize(18);
        var options = {
            background: '#fff' //background is transparent if you don't set it, which turns it black for some reason.
        };
        pdf.addHTML($('#pdf')[0], options, function() {
            pdf.save('locodetails.pdf');
        });
    }
</script>
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
                <div class="card-header center"> Hey {{$name}}, Welcome Back!</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div id="clock"></div>
                    <script src="{{asset('js/clock.js')}}"></script>
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
        <br/>
        <br/>
        <div id="pdf">
        <button onclick="printPDF()">Print as PDF</button>
        @if($role=='ADMIN')
        <h2>Details by HWH on: {{$date}}</h2>

        <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Loco No</th>
                        <th>HS</th>
                        <th>Train No</th>
                        <th>Source</th>
                        <th>Destination</th>
                        <th>Dept Date</th>
                        <th>Dept Time</th>
                        <th>Inspection</th>
                        <th>Inspec Date</th>
                        <th>Entered By</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($locodetailsTodayHWH as $ldtHWH)
                    <tr>
                        <td>{{ $ldtHWH->locono }}</td>
                        <td>{{ $ldtHWH->homeshed }}</td>
                        <td>{{ $ldtHWH->trainno }}</td>

                        <td>{{ $ldtHWH->source }}</td>
                        <td>{{ $ldtHWH->destination }}</td>
                        <td>{{ $ldtHWH->ddate }}</td>
                        <td>{{ $ldtHWH->time }}</td>
                        <td>{{ $ldtHWH->inspection }}</td>
                        <td>{{ $ldtHWH->idate }}</td>
                        <td>{{ $ldtHWH->enteredby }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No data found</td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
            <br/>
            <br/>
            <h2>Details By MLDT on: {{$date}}
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Loco No</th>
                        <th>HS</th>
                        <th>Train No</th>
                        <th>Source</th>
                        <th>Destination</th>
                        <th>Dept Date</th>
                        <th>Dept Time</th>
                        <th>Inspection</th>
                        <th>Inspec Date</th>
                        <th>Entered By</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($locodetailsTodayMLDT as $ldtMLDT)
                    <tr>
                        <td>{{ $ldtMLDT->locono }}</td>
                        <td>{{ $ldtMLDT->homeshed }}</td>
                        <td>{{ $ldtMLDT->trainno }}</td>

                        <td>{{ $ldtMLDT->source }}</td>
                        <td>{{ $ldtMLDT->destination }}</td>
                        <td>{{ $ldtMLDT->ddate }}</td>
                        <td>{{ $ldtMLDT->time }}</td>
                        <td>{{ $ldtMLDT->inspection }}</td>
                        <td>{{ $ldtMLDT->idate }}</td>
                        <td>{{ $ldtMLDT->enteredby }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No data found</td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
            <br/>
            <br/>
            <h2>Details by ASN on : {{$date}}</h2>
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Loco No</th>
                        <th>HS</th>
                        <th>Train No</th>
                        <th>Source</th>
                        <th>Destination</th>
                        <th>Dept Date</th>
                        <th>Dept Time</th>
                        <th>Inspection</th>
                        <th>Inspec Date</th>
                        <th>Entered By</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($locodetailsTodayASN as $ldtASN)
                    <tr>
                        <td>{{ $ldtASN->locono }}</td>
                        <td>{{ $ldtASN->homeshed }}</td>
                        <td>{{ $ldtASN->trainno }}</td>

                        <td>{{ $ldtASN->source }}</td>
                        <td>{{ $ldtASN->destination }}</td>
                        <td>{{ $ldtASN->ddate }}</td>
                        <td>{{ $ldtASN->time }}</td>
                        <td>{{ $ldtASN->inspection }}</td>
                        <td>{{ $ldtASN->idate }}</td>
                        <td>{{ $ldtASN->enteredby }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No data found</td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
            <br/>
            <br/>
            <h2>Details by SDAH on {{$date}}</h2>
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Loco No</th>
                        <th>HS</th>
                        <th>Train No</th>
                        <th>Source</th>
                        <th>Destination</th>
                        <th>Dept Date</th>
                        <th>Dept Time</th>
                        <th>Inspection</th>
                        <th>Inspec Date</th>
                        <th>Entered By</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($locodetailsTodaySDAH as $ldtSDAH)
                    <tr>
                        <td>{{ $ldtSDAH->locono }}</td>
                        <td>{{ $ldtSDAH->homeshed }}</td>
                        <td>{{ $ldtSDAH->trainno }}</td>

                        <td>{{ $ldtSDAH->source }}</td>
                        <td>{{ $ldtSDAH->destination }}</td>
                        <td>{{ $ldtSDAH->ddate }}</td>
                        <td>{{ $ldtSDAH->time }}</td>
                        <td>{{ $ldtSDAH->inspection }}</td>
                        <td>{{ $ldtSDAH->idate }}</td>
                        <td>{{ $ldtSDAH->enteredby }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No data found</td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
        @else
        <h2>Entered Loco Details on {{$date}} by: {{$division}}</h2>
        <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Loco No</th>
                        <th>HS</th>
                        <th>Train No</th>
                        <th>Source</th>
                        <th>Destination</th>
                        <th>Dept Date</th>
                        <th>Dept Time</th>
                        <th>Inspection</th>
                        <th>Inspec Date</th>
                        <th>Entered By</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($locodetailsToday as $ldt)
                    <tr>
                        <td>{{ $ldt->locono }}</td>
                        <td>{{ $ldt->homeshed }}</td>
                        <td>{{ $ldt->trainno }}</td>

                        <td>{{ $ldt->source }}</td>
                        <td>{{ $ldt->destination }}</td>
                        <td>{{ $ldt->ddate }}</td>
                        <td>{{ $ldt->time }}</td>
                        <td>{{ $ldt->inspection }}</td>
                        <td>{{ $ldt->idate }}</td>
                        <td>{{ $ldt->enteredby }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No data found</td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
        @endif


        </div>

        </div>
    </div>
</div>
@endsection
