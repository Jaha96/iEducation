@extends('go._layouts.master')
@section('style')

    <link href="/vendor/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/datatables/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="/vendor/datatables/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/datatables/css/select.bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/datatables/css/editor.bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/datatables/css/dataTables.tableTools.css" rel="stylesheet">
    <style>
        .content {
            padding: 30px 30px 40px !important;
        }
        .dataTables_paginate{
            margin-top: 10px !important;
        }
        table{
            border-bottom: solid 1px #cccccc !important;
        }
        th{
            font-weight: bold !important;
        }
    </style>
@endsection

@section('content')
    <div id="page">
        <header>
            <h1><i class="icon-user"></i> Хэрэглэгчид</h1>
            <div class="dash-title">
                {{ Auth::user()->name }}
            </div>
        </header>

        <section class="content">
            <table id="filter" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Гишүүн</th>
                    <th>Үйлдвэрлэгч</th>
                    <th>Модел</th>
                    <th>Сэлбэгийн ангилал</th>
                    <th>Дэд ангилал</th>
                    <th>Код</th>
                    <th>Утас</th>
                </tr>
                </thead>
            </table>

            <div class="tab-footer clearfix">
                <div class="pull-right">
                    <div class="tools"></div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/js/dataTables.bootstrap.min.js"></script>
    <script src="/vendor/datatables/js/dataTables.select.min.js"></script>
    <script src="/vendor/datatables/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/js/buttons.bootstrap.min.js"></script>
    {{--<script src="/vendor/datatables/js/dataTables.editor.min.js"></script>--}}
    {{--<script src="/vendor/datatables/js/editor.bootstrap.min.js"></script>--}}
    <script src="/vendor/datatables/js/dataTables.tableTools.js"></script>

    {{--<script src="/vendor/datatables/js/buttons.flash.min.js"></script>--}}
    {{--<script src="/vendor/datatables/js/jszip.min.js"></script>--}}
    {{--<script src="/vendor/datatables/js/pdfmake.min.js"></script>--}}
    {{--<script src="/vendor/datatables/js/vfs_fonts.js"></script>--}}
    {{--<script src="/vendor/datatables/js/buttons.html5.min.js"></script>--}}
    {{--<script src="/vendor/datatables/js/buttons.print.min.js"></script>--}}

    <script>
        $(function () {
            var url = "/go/filter";
            if (document.getElementById("filter") !== null) {
//                $('#filter').dataTable().fnDestroy();
                $('#filter').dataTable({
                    ajax: {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: url,
                        type: 'POST'
                    },
                    processing: true,
                    serverSide: true,
                    scrollY: "428px",
                    scrollCollapse: true,
                    columns: [
                        {data: "name"},
                        {data: "factory_name"},
                        {data: "model_name"},
                        {data: "category_name"},
                        {data: "sub_category_name"},
                        {data: "ad_code"},
                        {data: "phone"}
                    ],
                    order: [[0, "desc"]],
                    deferRender: true,
                    iDisplayLength: 25,
                    language: {
                        processing: "Түр хүлээнэ үү...",
                        search: "Хайх:",
                        lengthMenu: "Хуудсанд харагдах тоо _MENU_",
                        info: "Нийт _TOTAL_",
                        infoEmpty: "Нийт: 0",
                        infoPostFix: "",
                        loadingRecords: "Ачааллаж байна...",
                        zeroRecords: "Мэдээлэл олдсонгүй",
                        emptyTable: "Мэдээлэл олдсонгүй",
                        paginate: {
                            first: "Эхэнд",
                            previous: "Өмнөх",
                            next: "Дараах",
                            last: "Төгсгөлд"
                        },
                        aria: {
                            sortAscending: ": Өсөх дарааллаар эрэмбэлэх",
                            sortDescending: ": Буурах дарааллаар эрэмбэлэх"
                        },
                        select: {
                            rows: "Дэлгэцэнд: 25 бичлэг"
                        }
                    }
                });
            }
        });
    </script>
@endsection
