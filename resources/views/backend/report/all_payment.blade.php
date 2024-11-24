@extends('admin.admin_dashboard')
@section('admin')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.1/css/buttons.dataTables.min.css">
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">All Payment By Year Report</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Payment By Year Report <span class="badge rounded-pill bg-danger"> Total = ₦{{number_format($sumAmount,0)}}</span></li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">

            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <h3> Seach By Year : {{ $year }}</h3>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Date </th>
                            <th>Name </th>
                            <th>Email </th>
                            <th>Order Number </th>
                            <th>Amount </th>
                            <th>Method </th>
                            <th>Status </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $key => $item)
                        <tr>
                            <td> {{ $key+1 }} </td>
                            <td> {{ Carbon\Carbon::parse ($item->paid_at)->format('Y-m-d')}}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->user->email }}</td>
                            <td>{{ $item->invoice_no }}</td>
                            <td>₦{{ number_format($item->amount,0) }}</td>
                            <td> {{ $item->payment_type }}</td>
                            <td> {{ $item->status }}</td>



                        </tr>
                        @endforeach


                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SN</th>
                            <th>Date </th>
                            <th>Name </th>
                            <th>Email </th>
                            <th>Order Number </th>
                            <th>Amount </th>
                            <th>Status </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>



</div>


<!-- jQuery and DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.1/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip', // Add button elements
            buttons: [{
                    extend: 'excelHtml5',
                    title: 'All Payment',
                    text: 'Export to Excel'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'All Payment',
                    text: 'Export to PDF',
                    orientation: 'landscape',
                    pageSize: 'A4'
                }
            ]
        });
    });
</script>

@endsection
