@extends('layouts.layout')
@section('title', 'Fuzzy Curah Hujan')
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
            <i class="fa fa-home"></i>&nbsp;Nilai Fuzzy Curah Hujan
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
                                <strong><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong> Berikut semua data fuzzy Curah Hujan yang tersedia !!
                            </div>
                        @endif
                    </div>
                    {{ csrf_field() }} {{ method_field('PATCH') }}
                    <div class="col-md-12" style="margin-bottom:5px;">
                        <a href="{{ route('admin.fuzzy.rumus_curah_hujan') }}" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i>&nbsp; Generate Nilai Skor</a>
                        <a href="{{ route('admin.fuzzy.rumus_fuzzy_curah_hujan') }}" class="btn btn-info btn-sm"><i class="fa fa-refresh"></i>&nbsp; Generate Nilai Fuzzy</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered" id="table" style="width:100%; ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Bulan</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>Nilai</th>
                                    <th>Nilai Skor</th>
                                    <th>Nilai Fuzzy</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($curahs as $pemukiman)
                                    <tr>
                                        <td> {{ $no++ }} </td>
                                        <td> {{ $pemukiman->tahun }} </td>
                                        <td> {{ $pemukiman->bulan }} </td>
                                        <td> {{ $pemukiman->nm_kecamatan }} </td>
                                        <td> {{ $pemukiman->nm_kelurahan }} </td>
                                        <td> {{ $pemukiman->nilai }} </td>
                                        <td>
                                            @if ($pemukiman->nilai_skor == null)
                                                <a style="color:red"><i>nilai skor belum di generate</i></a>
                                                @else
                                                {{ $pemukiman->nilai_skor }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pemukiman->nilai_fuzzy == null)
                                                <a style="color:red"><i>nilai fuzzy belum di generate</i></a>
                                                @else
                                                {{ $pemukiman->nilai_fuzzy }}
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
