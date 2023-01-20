@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">قائمة الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تفاصيل الفاتورة</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="col-xl-12">
                <!-- div -->
                <div class="card mg-b-20" id="tabs-style2">
                    <div class="card-body ">

                        <div class="text-wrap ">
                            <div class="example ">
                                <div class="panel panel-primary tabs-style-2 ">
                                    <div class=" tab-menu-heading ">
                                        <div class="tabs-menu1 ">
                                            <!-- Tabs -->
                                            <ul class="nav panel-tabs main-nav-line ">
                                                <li><a href="#tab4" class="nav-link active" data-toggle="tab"
                                                        data-ur1313m3t="true">معلومات الفاتورة</a></li>
                                                <li><a href="#tab5" class="nav-link" data-toggle="tab"
                                                        data-ur1313m3t="true">حالات الدفع</a></li>
                                                <li><a href="#tab6" class="nav-link" data-toggle="tab"
                                                        data-ur1313m3t="true">المرفقات</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body tabs-menu-body main-content-body-right border ">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab4">
                                                <div class="table-responsive mt-15">

                                                    <table class="table table-striped" style="text-align:center">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">رقم الفاتورة</th>
                                                                <td>{{ $invoices->invoice_number }}</td>
                                                                <th scope="row">تاريخ الاصدار</th>
                                                                <td>{{ $invoices->invoice_Date }}</td>
                                                                <th scope="row">تاريخ الاستحقاق</th>
                                                                <td>{{ $invoices->Due_date }}</td>
                                                                <th scope="row">القسم</th>
                                                                <td>{{ $invoices->Section->sectionName }}</td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">المنتج</th>
                                                                <td>{{ $invoices->product }}</td>
                                                                <th scope="row">مبلغ التحصيل</th>
                                                                <td>{{ $invoices->Amount_collection }}</td>
                                                                <th scope="row">مبلغ العمولة</th>
                                                                <td>{{ $invoices->Amount_Commission }}</td>
                                                                <th scope="row">الخصم</th>
                                                                <td>{{ $invoices->Discount }}</td>
                                                            </tr>


                                                            <tr>
                                                                <th scope="row">نسبة الضريبة</th>
                                                                <td>{{ $invoices->Rate_VAT }}</td>
                                                                <th scope="row">قيمة الضريبة</th>
                                                                <td>{{ $invoices->Value_VAT }}</td>
                                                                <th scope="row">الاجمالي مع الضريبة</th>
                                                                <td>{{ $invoices->Total }}</td>
                                                                <th scope="row">الحالة الحالية</th>

                                                                @if ($invoices->Value_Status == 1)
                                                                    <td><span
                                                                            class="badge badge-pill badge-success">{{ $invoices->Status }}</span>
                                                                    </td>
                                                                @elseif($invoices->Value_Status == 2)
                                                                    <td><span
                                                                            class="badge badge-pill badge-danger">{{ $invoices->Status }}</span>
                                                                    </td>
                                                                @else
                                                                    <td><span
                                                                            class="badge badge-pill badge-warning">{{ $invoices->Status }}</span>
                                                                    </td>
                                                                @endif
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">ملاحظات</th>
                                                                <td>{{ $invoices->note }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab5">

                                                <table id="example1"
                                                    class="table key-buttons text-md-nowrap table-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-bottom-0">#</th>
                                                            <th class="border-bottom-0">رقم الفاتورة</th>
                                                            <th class="border-bottom-0">نوع المنتج</th>
                                                            <th class="border-bottom-0">القسم</th>
                                                            <th class="border-bottom-0">حالة الدفع</th>
                                                            <th class="border-bottom-0">تاريخ الدفع</th>
                                                            <th class="border-bottom-0">ملاحظات</th>
                                                            <th class="border-bottom-0">تاريخ الاضافة</th>
                                                            <th class="border-bottom-0">المستخدم</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($invoiceDetails as $invoice)
                                                            <tr>
                                                                <td>{{ $invoice->id }}</td>
                                                                <td>{{ $invoice->invoice_number }}</td>
                                                                <td>{{ $invoice->product }}</td>
                                                                <td>{{ $invoices->Section->sectionName }}</td>
                                                                <td>
                                                                    @if ($invoice->Value_Status == 1)
                                                                        <span
                                                                            class="badge badge-pill badge-success">{{ $invoice->Status }}</span>
                                                                    @elseif ($invoice->Value_Status == 2)
                                                                        <span
                                                                            class="badge badge-pill badge-danger">{{ $invoice->Status }}</span>
                                                                    @else
                                                                        <span
                                                                            class="badge badge-pill badge-warning">{{ $invoice->Status }}</span>
                                                                    @endif
                                                                </td>
                                                                <td>{{ $invoice->Payment_Date }}</td>
                                                                <td>{{ $invoice->note }}</td>
                                                                <td>{{ $invoice->created_at }}</td>
                                                                <td>{{ $invoice->user }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>


                                            </div>
                                            <div class="tab-pane" id="tab6">
                                                <div class="card-body">
                                                    <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                                                    <h5 class="card-title">اضافة مرفقات</h5>
                                                    @can('اضافة مرفق')
                                                        <form method="post" action="{{ url('/InvoiceAttachments') }}"
                                                            enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="customFile"
                                                                    name="file_name" required>
                                                                <input type="hidden" id="customFile" name="invoice_number"
                                                                    value="{{ $invoices->invoice_number }}">
                                                                <input type="hidden" id="invoice_id" name="invoice_id"
                                                                    value="{{ $invoices->id }}">
                                                                <label class="custom-file-label" for="customFile">حدد
                                                                    المرفق</label>
                                                            </div><br><br>
                                                            <button type="submit" class="btn btn-primary btn-sm "
                                                                name="uploadedFile">تاكيد</button>
                                                        </form>
                                                    @endcan
                                                </div>
                                                <table id="example1"
                                                    class="table key-buttons text-md-nowrap table-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-bottom-0">#</th>
                                                            <th class="border-bottom-0">اسم الملف</th>
                                                            <th class="border-bottom-0">قام باضافته</th>
                                                            <th class="border-bottom-0">تاريخ الاضافة</th>
                                                            <th class="border-bottom-0">العمليات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($invoiceAttatchment as $attachment)
                                                            <tr>
                                                                <td>{{ $attachment->id }}</td>
                                                                <td>{{ $attachment->file_name }}</td>
                                                                <td>{{ $attachment->Created_by }}</td>
                                                                <td>{{ $attachment->created_at }}</td>
                                                                <td colspan="2">

                                                                    <a class="btn btn-outline-success btn-sm"
                                                                        href="{{ url('View_file') }}/{{ $invoices->invoice_number }}/{{ $attachment->file_name }}"
                                                                        role="button"><i class="fas fa-eye"></i>&nbsp;
                                                                        عرض</a>

                                                                    <a class="btn btn-outline-info btn-sm"
                                                                        href="{{ url('download') }}/{{ $invoices->invoice_number }}/{{ $attachment->file_name }}"
                                                                        role="button"><i
                                                                            class="fas fa-download"></i>&nbsp;
                                                                        تحميل</a>

                                                                    @can('حذف المرفق')
                                                                        <button class="btn btn-outline-danger btn-sm"
                                                                            data-toggle="modal"
                                                                            data-file_name="{{ $attachment->file_name }}"
                                                                            data-invoice_number="{{ $attachment->invoice_number }}"
                                                                            data-id_file="{{ $attachment->id }}"
                                                                            data-target="#delete_file">حذف</button>
                                                                    @endcan


                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">حذف المرفق</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('delete_file') }}" method="post">

                            {{ csrf_field() }}
                            <div class="modal-body">
                                <p class="text-center">
                                <h6 style="color:red"> هل انت متاكد من عملية حذف المرفق ؟</h6>
                                </p>

                                <input type="hidden" name="id_file" id="id_file" value="">
                                <input type="hidden" name="file_name" id="file_name" value="">
                                <input type="hidden" name="invoice_number" id="invoice_number" value="">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                                <button type="submit" class="btn btn-danger">تاكيد</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container closed -->
    </div>
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
    <script>
        $('#delete_file').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_file = button.data('id_file')
            var file_name = button.data('file_name')
            var invoice_number = button.data('invoice_number')
            var modal = $(this)
            modal.find('.modal-body #id_file').val(id_file);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #invoice_number').val(invoice_number);
        })
    </script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
