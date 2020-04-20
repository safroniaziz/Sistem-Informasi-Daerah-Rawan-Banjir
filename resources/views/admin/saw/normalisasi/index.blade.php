@extends('layouts.layout')
@section('title', 'Matriks Normalisasi')
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
            <i class="fa fa-home"></i>&nbsp;Nilai Matriks Normalisasi
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
                                <strong><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong> Berikut semua data Matriks Normalisasi yang tersedia !!
                            </div>
                        @endif
                    </div>
                    {{ csrf_field() }} {{ method_field('PATCH') }}
                    <div class="col-md-12">
                        <a href="{{ route('admin.saw.rumus_benefit') }}" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i>&nbsp; Generate Nilai Benefit</a>
                        <a href="{{ route('admin.saw.rumus_cost') }}" class="btn btn-info btn-sm"><i class="fa fa-refresh"></i>&nbsp; Generate Nilai Cost</a>
                    </div>
                    <div class="col-md-12 table-responsive">
                        <table class="table table-striped table-bordered" id="table" style="width:100%; ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Bulan</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>C1 (Pemukiman)</th>
                                    <th>C2 (Curah Hujan)</th>
                                    <th>C3 (Topografi)</th>
                                    <th>C4 (Bantaran Sungai)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($normalisasis as $normalisasi)
                                    <tr>
                                        <td> {{ $no++ }} </td>
                                        <td> {{ $normalisasi->tahun }} </td>
                                        <td> {{ $normalisasi->bulan }} </td>
                                        <td> {{ $normalisasi->nm_kecamatan }} </td>
                                        <td> {{ $normalisasi->nm_kelurahan }} </td>
                                        <td> {{ $normalisasi->c1 }} </td>
                                        <td> {{ $normalisasi->c2 }} </td>
                                        <td> {{ $normalisasi->c3 }} </td>
                                        <td> {{ $normalisasi->c4 }} </td>
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
    </script>
@endpush
