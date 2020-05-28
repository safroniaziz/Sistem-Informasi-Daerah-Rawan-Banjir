@extends('layouts.layout')
@section('title', 'Dashboard')
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
            <i class="fa fa-home"></i>&nbsp;Data Kelurahan
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
                                <strong><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong> Berikut semua data kelurahan yang tersedia !!
                            </div>
                        @endif
                    </div>
                    {{ csrf_field() }} {{ method_field('PATCH') }}
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered" id="table" style="width:100%; ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kecamatans</th>
                                    <th>Nama Kelurahan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($kelurahans as $kelurahan)
                                    <tr>
                                        <td> {{ $no++ }} </td>
                                        <td> {{ $kelurahan->nm_kecamatan }} </td>
                                        <td> {{ $kelurahan->nm_kelurahan }} </td>
                                        <td>
                                            <a onclick="ubahBobot({{ $kelurahan->id }})" class="btn btn-info btn-sm" style="color:white; cursor:pointer;"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal ubah -->
                    <div class="modal modal-default fade" id="modalubah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header modal-header-danger">
                                <p style="font-size:15px;" class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i>&nbsp;Form Ubah Bobot Kelurahan</p>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.parameter.update') }} " method="POST">
                                    {{ csrf_field() }} {{ method_field("PATCH") }}
                                    <input type="hidden" name="id" id="id">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Kelurahan</label>
                                        <input type="text" class="form-control" name="nm_kelurahan" id="nm_kelurahan">
                                        <small id="emailHelp" class="form-text text-muted"><i>field harus diisi !!</i></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Kecamatan</label>
                                        <select name="kecamatan_id" id="kecamatan_id" class="form-control" required>
                                            <option value="" selected disabled>-- pilih kecamatan --</option>
                                            @foreach ($kecamatans as $kecamatan)
                                                <option value="{{ $kecamatan->id }}">{{ $kecamatan->nm_kecamatan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm"  style="color:white;" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                                <button type="submit" class="btn btn-primary btn-sm" style="color:white"><i class="fa fa-check-circle"></i>&nbsp; Simpan Perubahan</button>
                            </div>
                        </div>
                        </div>
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
                url: "{{ url('admin/kelurahan') }}"+'/'+ id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modalubah').modal('show');
                    $('#id').val(data.id);
                    $('#nm_kelurahan').val(data.nm_kelurahan);
                    $('#kecamatan_id').val(data.kecamatan_id);
                },
                error:function(){
                    alert("Nothing Data");
                }
            });
        }

    </script>
@endpush
