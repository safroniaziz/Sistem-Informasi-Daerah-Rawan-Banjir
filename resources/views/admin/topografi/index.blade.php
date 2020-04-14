@extends('layouts.layout')
@section('title', 'Fuzzy Topografi')
@section('login_as', 'Administrator')
@section('user-login')
    @if (Auth::check())
    {{ Auth::user()->name }}
    @endif
@endsection
@section('user-login2')
    @if (Auth::check())
    {{ Auth::user()->name }}
    @endif
@endsection
@section('sidebar-menu')
    @include('admin/sidebar')
@endsection
@push('styles')
    <style>
        #detail:hover{
            text-decoration: underline !important;
            cursor: pointer !important;
            color:teal;
        }
    </style>
@endpush
@section('content')
    <section class="panel" style="margin-bottom:20px;">
        <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
            <i class="fa fa-home"></i>&nbsp;Nilai Fuzzy Topografi
        </header>
        <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
            <form action="" method="POST">

                <div class="row" style="margin-right:-15px; margin-left:-15px;">
                    <div class="col-md-12">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block" id="berhasil">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong><i class="fa fa-info-circle"></i>&nbsp;Berhasil: </strong> {{ $message }}
                            </div>
                            @else
                            <div class="alert alert-success alert-block" id="keterangan">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong> Berikut semua data fuzzy Topografi yang tersedia !!
                            </div>
                        @endif
                    </div>
                    {{ csrf_field() }} {{ method_field('PATCH') }}
                    <div class="col-md-12" style="margin-bottom:5px;">
                        <a href="{{ route('admin.fuzzy.rumus_topografi') }}" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i>&nbsp; Generate Nilai Fuzzy</a>
                    </div>
                    <div class="col-md-12 table-responsive">
                        <table class="table table-striped table-bordered" id="table" style="width:100%; ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>10 m</th>
                                    <th>20 m</th>
                                    <th>30 m</th>
                                    <th>40 m</th>
                                    <th>Skor 10 m</th>
                                    <th>Skor 20 m</th>
                                    <th>Skor 30 m</th>
                                    <th>Skor 40 m</th>
                                    <th>Jumlah</th>
                                    <th>Nilai Fuzzy</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($topografis as $topografi)
                                    <tr>
                                        <td> {{ $no++ }} </td>
                                        <td> {{ $topografi->nm_kecamatan }} </td>
                                        <td> {{ $topografi->nm_kelurahan }} </td>
                                        <td> {{ $topografi->m10 }} </td>
                                        <td> {{ $topografi->m20 }} </td>
                                        <td> {{ $topografi->m30 }} </td>
                                        <td> {{ $topografi->m40 }} </td>
                                        <td> {{ $topografi->m10_skor }} </td>
                                        <td> {{ $topografi->m20_skor }} </td>
                                        <td> {{ $topografi->m30_skor }} </td>
                                        <td> {{ $topografi->m40_skor }} </td>
                                        <td> {{ $topografi->jumlah }} </td>
                                        <td>
                                            @if ($topografi->nilai_fuzzy == null)
                                                <a style="color:red"><i>nilai fuzzy belum di generate</i></a>
                                                @else
                                                {{ $topografi->nilai_fuzzy }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').DataTable({
                responsive : true,
                "ordering": false,
            });
        } );

        function ubahBobot(id){
            $.ajax({
                url: "{{ url('admin/parameter') }}"+'/'+ id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modalubah').modal('show');
                    $('#id').val(data.id);
                    $('#bobot_parameter').val(data.bobot_parameter);
                },
                error:function(){
                    alert("Nothing Data");
                }
            });
        }

    </script>
@endpush
