@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
<table id="example1" class="table key-buttons text-md-nowrap">
    <thead>
        <tr>
            <th style="width: 80px" class="border-bottom-0">#</th>
            <th class="border-bottom-0">رقم الفاتورة</th>
            <th class="border-bottom-0">تاريخ الفاتورة</th>
            <th class="border-bottom-0">تاريخ الاستحقاق</th>
            <th class="border-bottom-0">المنتج</th>
            <th class="border-bottom-0">القسم</th>
            <th class="border-bottom-0">الخصم</th>
            <th class="border-bottom-0">نسبة الضريبة</th>
            <th class="border-bottom-0">قيمة الضريبة</th>
            <th class="border-bottom-0">الاجمالي</th>
            <th class="border-bottom-0">الحالة</th>
            <th class="border-bottom-0">ملاحظات</th>
            <th class="border-bottom-0">العمليات</th>
            <th class="border-bottom-0">رابط الفاتورة</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 0;
        @endphp
        @foreach ($invoices as $invoice)
            @php
                $i++;
            @endphp
            <tr>
                <td>{{ $i }}</td>
                <td><a href="{{ url('InvoicesDetails') }}/{{ $invoice->id }}">{{ $invoice->invoice_number }}</a>
                </td>
                <td>{{ $invoice->invoice_Date }}</td>
                <td>{{ $invoice->Due_date }}</td>
                <td>{{ $invoice->product }}</td>
                <td>{{ $invoice->Section->sectionName }}</td>
                <td>{{ $invoice->Discount }}</td>
                <td>{{ $invoice->Value_VAT }}</td>
                <td>{{ $invoice->Rate_VAT }}</td>
                <td>{{ $invoice->Total }}</td>
                <td>
                    @if ($invoice->Value_Status == 1)
                        <span class="text-success">{{ $invoice->Status }}</span>
                    @elseif ($invoice->Value_Status == 2)
                        <span class="text-danger">{{ $invoice->Status }}</span>
                    @else
                        <span class="text-warning">{{ $invoice->Status }}</span>
                    @endif
                </td>
                <td>{{ $invoice->note }}</td>
                <td>
                    <a href="{{ url('InvoicesDetails') }}/{{ $invoice->id }}" target="_blank"> تفاصيل
                        الفاتورة</a>
                </td>
                <td>{{ url('InvoicesDetails') }}/{{ $invoice->id }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
@endsection
