@extends('layouts.layout')
@section('title', 'Koordinat Kelurahan')
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
            <i class="fa fa-home"></i>&nbsp;Data Koordinat Kelurahan
        </header>
        <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
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
                            <strong><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong> Berikut semua data kooordinat kelurahan yang tersedia !!
                        </div>
                    @endif
                </div>
                <div class="col-md-12">
                    <a onclick="tambahKoordinat()" class="btn btn-primary btn-sm" style="color:white; cursor:pointer;"><i class="fa fa-plus"></i>&nbsp; Tambah Koordinat</a>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="table" style="width:100%; ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kelurahan</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($koordinats as $koordinat)
                                <tr>
                                    <td> {{ $no++ }} </td>
                                    <td> {{ $koordinat->nm_kelurahan }} </td>
                                    <td> {{ $koordinat->lat }} </td>
                                    <td> {{ $koordinat->long }} </td>
                                    <td>
                                        <a onclick="ubahKoordinat({{ $koordinat->id }})" class="btn btn-info btn-sm" style="color:white; cursor:pointer;"><i class="fa fa-edit"></i></a>
                                        <a onclick="hapusKoordinat({{ $koordinat->id }})" class="btn btn-danger btn-sm" style="color:white; cursor:pointer;"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Modal tambah -->
                    <div class="modal modal-default fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header modal-header-danger">
                                    <p style="font-size:15px;" class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i>&nbsp;Form Ubah Bobot Kelurahan</p>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('admin.koordinat.add') }} " method="POST">

                                    <div class="modal-body">
                                        {{ csrf_field() }} {{ method_field("POST") }}
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pilih Kelurahan :</label>
                                            <select name="kelurahan_id" class="form-control" id="" required>
                                                <option value="" selected disabled>-- pilih kelurahan --</option>
                                                @foreach ($kelurahans as $kelurahan)
                                                    <option value=" {{ $kelurahan->id }} "> {{ $kelurahan->nm_kelurahan }} </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Latitude :</label>
                                            <input type="text" class="form-control" required name="latitude">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Longitude :</label>
                                            <input type="text" class="form-control" required name="longitude">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger btn-sm"  style="color:white;" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                                        <button type="submit" class="btn btn-primary btn-sm" style="color:white"><i class="fa fa-check-circle"></i>&nbsp; Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <form action="{{ route('admin.koordinat.update') }} " method="POST">
                                {{ csrf_field() }} {{ method_field("PATCH") }}
                                <input type="hidden" name="id" id="id">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Pilih Kelurahan :</label>
                                        <select name="kelurahan_id" class="form-control" id="kelurahan_id" required>
                                            <option value="" selected disabled>-- pilih kelurahan --</option>
                                            @foreach ($kelurahan2s as $kelurahan)
                                                <option value=" {{ $kelurahan->id }} "> {{ $kelurahan->nm_kelurahan }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Latitude :</label>
                                        <input type="text" class="form-control" id="latitude" required name="latitude">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Longitude :</label>
                                        <input type="text" class="form-control" id="longitude" required name="longitude">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-sm"  style="color:white;" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                                    <button type="submit" class="btn btn-primary btn-sm" style="color:white"><i class="fa fa-check-circle"></i>&nbsp; Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal hapus -->
            <div class="modal modal-default fade" id="modalhapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('admin.koordinat.delete') }} " method="POST">
                        <div class="modal-header modal-header-danger">
                            <p style="font-size:15px;" class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i>&nbsp;Form Ubah Data Bulan</p>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ csrf_field() }} {{ method_field("DELETE") }}
                            <input type="hidden" name="id" id="koordinat_id" >
                            Apakah anda yakin akan menghapus data?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-sm"  style="color:white;" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                            <button type="submit" class="btn btn-primary btn-sm" style="color:white"><i class="fa fa-check-circle"></i>&nbsp; Ya, Hapus</button>
                        </div>
                    </form>

                </div>
                </div>
            </div>
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

        function tambahKoordinat(){
            $('#modaltambah').modal('show');
        }

        function ubahKoordinat(id){
            $.ajax({
                url: "{{ url('admin/koordinat_kelurahan') }}"+'/'+ id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modalubah').modal('show');
                    $('#id').val(data.id);
                    $('#kelurahan_id').val(data.kelurahan_id);
                    $('#latitude').val(data.lat);
                    $('#longitude').val(data.long);
                },
                error:function(){
                    alert("Nothing Data");
                }
            });
        }

        function hapusKoordinat(id){
            $('#modalhapus').modal('show');
            $('#koordinat_id').val(id);
        }

    </script>
@endpush
