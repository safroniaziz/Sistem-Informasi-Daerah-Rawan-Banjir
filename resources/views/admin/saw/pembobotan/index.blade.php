@extends('layouts.layout')
@section('title', 'Matriks Pembobotan')
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
            <i class="fa fa-home"></i>&nbsp;Nilai Matriks Pembobotan
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
                                <strong><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong> Berikut semua data Matriks Pembobotan yang tersedia !!
                            </div>
                        @endif
                    </div>
                    {{ csrf_field() }} {{ method_field('PATCH') }}
                    <div class="col-md-12">
                        <a href="{{ route('admin.saw.rumus_pembobotan') }}" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i>&nbsp; Generate Nilai Pembobotan</a>
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
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($pembobotans as $pembobotan)
                                    <tr>
                                        <td> {{ $no++ }} </td>
                                        <td> {{ $pembobotan->tahun }} </td>
                                        <td> {{ $pembobotan->bulan }} </td>
                                        <td> {{ $pembobotan->nm_kecamatan }} </td>
                                        <td> {{ $pembobotan->nm_kelurahan }} </td>
                                        <td> {{ $pembobotan->c1 }} </td>
                                        <td> {{ $pembobotan->c2 }} </td>
                                        <td> {{ $pembobotan->c3 }} </td>
                                        <td> {{ $pembobotan->c4 }} </td>
                                        <th> {{ $pembobotan->jumlah }} </th>
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
