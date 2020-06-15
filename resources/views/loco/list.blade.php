@extends('layouts.afterlogin')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script>
/* $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#mytable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});*/
$(document).ready( function () {
    $('#mytable').DataTable();
} );
</script>
<script>
    function printPDF() {
        var pdf = new jsPDF('p', 'pt', 'letter');
        pdf.setFontSize(18);
        var options = {
            background: '#fff' //background is transparent if you don't set it, which turns it black for some reason.
        };
        pdf.addHTML($('#pdf')[0], options, function() {
            pdf.save('loco.pdf');
        });
    }

    function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  dir = "asc";
  while (switching) {
    switching = false;
    rows = table.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount ++;
    } else {
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}

</script>
<div class="container">
    <br>
    <div class="row justify-content-center" id="pdf">
        <div class="col-md-6">
            <h2>Loco Details</h2>
        </div>
        <div class="col-md-6">
            <div class="float-right">
                <a href="{{ route('loco.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Locodeatils</a>
                <button onclick="printPDF()">Print as PDF</button>
            </div>
        </div>

        <br>
        <div class="col-md-12">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif
            <table id="mytable" class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th onclick="sortTable(1)">Loco No</th>
                        <th>HS</th>
                        <th>Train No</th>
                        <th>Source</th>
                        <th>Destination</th>
                        <th onclick="sortTable(0)">Dept Date</th>
                        <th>Dept Time</th>
                        <th>Inspection</th>
                        <th>Inspec Date</th>
                        <th>Entered By</th>
                        <th>Edit/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($locodetails as $locodetail)
                    <tr>
                        <td>{{ $locodetail->locono }}</td>
                        <td>{{ $locodetail->homeshed }}</td>
                        <td>{{ $locodetail->trainno }}</td>

                        <td>{{ $locodetail->source }}</td>
                        <td>{{ $locodetail->destination }}</td>
                        <td>{{ $locodetail->ddate }}</td>
                        <td>{{ $locodetail->time }}</td>
                        <td>{{ $locodetail->inspection }}</td>
                        <td>{{ $locodetail->idate }}</td>
                        <td>{{ $locodetail->enteredby }}</td>
                        <td>
                            <div class="action_btn">
                                <div class="action_btn">
                                    <a href="{{ route('loco.edit', $locodetail->id)}}" class="btn btn-warning">Edit</a>
                                </div>
                                <div class="action_btn margin-left-10">
                                    <form action="{{ route('loco.destroy', $locodetail->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure to delete the Locodetails?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No data found</td>
                    </tr>

                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
    {!! $locodetails->appends(Request::all())->links() !!}
</div>
@endsection
