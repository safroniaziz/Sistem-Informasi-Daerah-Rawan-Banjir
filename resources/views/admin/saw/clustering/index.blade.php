@extends('layouts.layout')
@section('title', 'Matriks Clustering')
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
            <i class="fa fa-home"></i>&nbsp;Nilai Matriks Clustering
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
                                <strong><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong> Berikut semua data Matriks Clustering yang tersedia !!
                            </div>
                        @endif
                    </div>
                    {{ csrf_field() }} {{ method_field('PATCH') }}
                    <div class="col-md-12">
                        <a href="{{ route('admin.saw.rumus_clustering') }}" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i>&nbsp; Generate Nilai Clustering</a>
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
                                    <th>C3 (Kelas Tinggi Tanah)</th>
                                    <th>C4 (Bantaran Sungai)</th>
                                    <th>Jumlah</th>
                                    <th>Clustering</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($clusterings as $clustering)
                                    <tr
                                        @if ($clustering->clustering == "Sangat Tinggi")
                                            style="background:#f52c11; color:white;"
                                            @elseif($clustering->clustering == "Tinggi")
                                            style="background:#ed891f; color:white;"
                                            @elseif($clustering->clustering == "Sedang")
                                            style="background:#f9fc14;"
                                            @elseif($clustering->clustering == "Rendah")
                                            style="background:#0ff24b;"
                                            @elseif($clustering->clustering == "Sangat Rendah")
                                            style="background:#3c7d4d;"
                                        @endif
                                    >
                                        <td> {{ $no++ }} </td>
                                        <td> {{ $clustering->tahun }} </td>
                                        <td> {{ $clustering->bulan }} </td>
                                        <td> {{ $clustering->nm_kecamatan }} </td>
                                        <td> {{ $clustering->nm_kelurahan }} </td>
                                        <td> {{ $clustering->c1 }} </td>
                                        <td> {{ $clustering->c2 }} </td>
                                        <td> {{ $clustering->c3 }} </td>
                                        <td> {{ $clustering->c4 }} </td>
                                        <td> {{ $clustering->jumlah }} </td>
                                        <td> {{ $clustering->clustering }} </td>
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
