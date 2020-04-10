@extends('layouts.layout')
@section('title', 'Nilai Sub Parameter')
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
            <i class="fa fa-home"></i>&nbsp;Data Nilai Sub Parameter
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
                            @elseif ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block" id="berhasil">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong><i class="fa fa-close"></i>&nbsp;Gagal: </strong> {{ $message }}
                            </div>
                            @else
                            <div class="alert alert-success alert-block" id="keterangan">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong> Berikut semua data nilai sub parameter yang tersedia !!
                            </div>
                        @endif
                    </div>
                    {{ csrf_field() }} {{ method_field('PATCH') }}
                    <div class="col-md-12">
                        <a onclick="tambahBulan()" class="btn btn-primary btn-sm" style="color:white; cursor:pointer;"><i class="fa fa-plus"></i>&nbsp; Tambah Nilai sub Parameter</a>
                        <table class="table table-striped table-bordered" id="table" style="width:100%; ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>Parameter</th>
                                    <th>Sub Parameter</th>
                                    <th>Tahun</th>
                                    <th>Bulan</th>
                                    <th>Nilai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($nilais as $nilai)
                                    <tr>
                                        <td> {{ $no++ }} </td>
                                        <td> {{ $nilai->nm_kecamatan }} </td>
                                        <td> {{ $nilai->nm_kelurahan }} </td>
                                        <td> {{ $nilai->nm_parameter }} </td>
                                        <td> {{ $nilai->nm_sub_parameter }} </td>
                                        <td> {{ $nilai->tahun }} </td>
                                        <td> {{ $nilai->nm_bulan }} </td>
                                        <td> {{ $nilai->nilai }} </td>
                                        <td>
                                            <a onclick="ubahNilai({{ $nilai->id }})" class="btn btn-info btn-sm" style="color:white; cursor:pointer;"><i class="fa fa-edit"></i></a>
                                            <a onclick="hapusNilai({{ $nilai->id }})" class="btn btn-danger btn-sm" style="color:white; cursor:pointer;"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <!-- Modal hapus -->
                            <div class="modal modal-default fade" id="modalhapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('admin.nilai_sub_parameter.delete') }} " method="POST">
                                        <div class="modal-header modal-header-danger">
                                            <p style="font-size:15px;" class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i>&nbsp;Form Ubah Data nilai</p>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{ csrf_field() }} {{ method_field("DELETE") }}
                                            <input type="hidden" name="nilai_id" id="nilai_id" >
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
                        </table>
                        <!-- Modal tambah -->
                        <div class="modal modal-default fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header modal-header-danger">
                                    <p style="font-size:15px;" class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i>&nbsp;Form Ubah Bobot Parameter</p>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('admin.nilai_sub_parameter.post') }} " method="POST">
                                    <div class="modal-body">
                                        {{ csrf_field() }} {{ method_field("POST") }}
                                        <input type="hidden" name="id" >
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pilih Kecamatan</label>
                                            <select name="kecamatan_id" id="kecamatan_id" class="form-control" required id="">
                                                <option value="" selected disabled>-- pilih kecamatan --</option>
                                                @foreach ($kecamatans as $kecamatan)
                                                    <option value="{{ $kecamatan->id }}"> {{ $kecamatan->nm_kecamatan }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pilih Kelurahan</label>
                                            <select name="kelurahan_id" id="kelurahan_id" class="form-control" required id="">
                                                <option value="" selected disabled>-- pilih kelurahan --</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pilih Parameter</label>
                                            <select name="parameter_id" id="parameter_id" class="form-control" required id="">
                                                <option value="" selected disabled>-- pilih parameter --</option>
                                                @foreach ($parameters as $parameter)
                                                    <option value="{{ $parameter->id }}"> {{ $parameter->nm_parameter }} </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pilih Sub Parameter</label>
                                            <select name="sub_parameter_id" id="sub_parameter_id" class="form-control" required id="">
                                                <option value="" selected disabled>-- pilih sub parameter --</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pilih Tahun</label>
                                            <select name="tahun_id" class="form-control" required id="">
                                                <option value="" selected disabled>-- pilih tahun --</option>
                                                @foreach ($tahuns as $tahun)
                                                    <option value="{{ $tahun->id }}"> {{ $tahun->tahun }} </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pilih Bulan</label>
                                            <select name="bulan_id" class="form-control" required id="">
                                                <option value="" selected disabled>-- pilih bulan --</option>
                                                @foreach ($bulans as $bulan)
                                                    <option value="{{ $bulan->id }}"> {{ $bulan->nm_bulan }} </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nilai Parameter</label>
                                            <input type="text" class="form-control" name="nilai" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger btn-sm"  style="color:white;" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                                        <button type="submit" class="btn btn-primary btn-sm" style="color:white"><i class="fa fa-check-circle"></i>&nbsp; Simpan</button>
                                    </div>
                                </form>

                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal ubah -->
                    <div class="modal modal-default fade" id="modalubah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="{{ route('admin.nilai_sub_parameter.update') }} " method="POST">
                                <div class="modal-content">
                                    <div class="modal-header modal-header-danger">
                                        <p style="font-size:15px;" class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i>&nbsp;Form Ubah Bobot Parameter</p>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                            {{ csrf_field() }} {{ method_field("PATCH") }}
                                            <input type="hidden" name="id" id="id">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Pilih Kecamatan</label>
                                                <select name="kecamatan_id" id="kecamatan_id" class="form-control" required id="">
                                                    <option value="" selected disabled>-- pilih kecamatan --</option>
                                                    @foreach ($kecamatans as $kecamatan)
                                                        <option value="{{ $kecamatan->id }}"> {{ $kecamatan->nm_kecamatan }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Pilih Kelurahan</label>
                                                <select name="kelurahan_id" id="kelurahan_id" class="form-control" required id="">
                                                    <option value="" selected disabled>-- pilih kelurahan --</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Pilih Parameter</label>
                                                <select name="parameter_id" id="parameter_id2" class="form-control" required id="">
                                                    <option value="" selected disabled>-- pilih parameter --</option>
                                                    @foreach ($parameters as $parameter)
                                                        <option value="{{ $parameter->id }}"> {{ $parameter->nm_parameter }} </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Pilih Sub Parameter</label>
                                                <select name="sub_parameter_id" id="sub_parameter_id2" class="form-control" required id="">
                                                    <option value="" selected disabled>-- pilih sub parameter --</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Pilih Tahun</label>
                                                <select name="tahun_id" id="tahun_id" class="form-control" required id="">
                                                    <option value="" selected disabled>-- pilih tahun --</option>
                                                    @foreach ($tahuns as $tahun)
                                                        <option value="{{ $tahun->id }}"> {{ $tahun->tahun }} </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Pilih Bulan</label>
                                                <select name="bulan_id" id="bulan_id" class="form-control" required id="">
                                                    <option value="" selected disabled>-- pilih bulan --</option>
                                                    @foreach ($bulans as $bulan)
                                                        <option value="{{ $bulan->id }}"> {{ $bulan->nm_bulan }} </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nilai Parameter</label>
                                                <input type="text" class="form-control" name="nilai" id="nilai" required>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger btn-sm"  style="color:white;" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                                        <button type="submit" class="btn btn-primary btn-sm" style="color:white"><i class="fa fa-check-circle"></i>&nbsp; Simpan Perubahan</button>
                                    </div>
                                </div>
                            </form>
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

        function tambahBulan(){
            $('#modaltambah').modal('show');
        }

        function ubahNilai(id){
            $.ajax({
                url: "{{ url('admin/nilai_sub_parameter') }}"+'/'+ id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modalubah').modal('show');
                    $('#id').val(data.id);
                    $('#kelurahan_id').val(data.kelurahan_id);
                    $('#sub_parameter_id').val(data.sub_parameter_id);
                    $('#tahun_id').val(data.tahun_id);
                    $('#bulan_id').val(data.bulan_id);
                    $('#nilai').val(data.nilai);
                },
                error:function(){
                    alert("Nothing Data");
                }
            });
        }

        function hapusNilai(id){
            $('#modalhapus').modal('show');
            $('#nilai_id').val(id);
        }

        $(document).ready(function(){
            $(document).on('change','#kecamatan_id',function(){
                // alert('berhasil');
                var kecamatan_id = $(this).val();
                var div = $(this).parent().parent();
                var op=" ";
                $.ajax({
                type :'get',
                url: "{{ url('admin/nilai_sub_parameter/cari_kelurahan') }}",
                data:{'kecamatan_id':kecamatan_id},
                    success:function(data){
                        op+='<option value="0" selected disabled>-- pilih kelurahan --</option>';
                        for(var i=0; i<data.length;i++){
                            op+='<option value="'+data[i].id+'">'+data[i].nm_kelurahan+'</option>';
                        }
                        div.find('#kelurahan_id').html(" ");
                        div.find('#kelurahan_id').append(op);
                    },
                        error:function(){
                    }
                });
            })
        });

        $(document).ready(function(){
            $(document).on('change','#kecamatan_id2',function(){
                // alert('berhasil');
                var kecamatan_id = $(this).val();
                var div = $(this).parent().parent();
                var op=" ";
                $.ajax({
                type :'get',
                url: "{{ url('admin/nilai_sub_parameter/cari_kelurahan') }}",
                data:{'kecamatan_id':kecamatan_id},
                    success:function(data){
                        op+='<option value="0" selected disabled>-- pilih kelurahan --</option>';
                        for(var i=0; i<data.length;i++){
                            op+='<option value="'+data[i].id+'">'+data[i].nm_kelurahan+'</option>';
                        }
                        div.find('#kelurahan_id2').html(" ");
                        div.find('#kelurahan_id2').append(op);
                    },
                        error:function(){
                    }
                });
            })
        });

        $(document).ready(function(){
            $(document).on('change','#parameter_id',function(){
                // alert('berhasil');
                var parameter_id = $(this).val();
                var div = $(this).parent().parent();
                var op=" ";
                $.ajax({
                type :'get',
                url: "{{ url('admin/nilai_sub_parameter/cari_sub_parameter') }}",
                data:{'parameter_id':parameter_id},
                    success:function(data){
                        op+='<option value="0" selected disabled>-- pilih sub parameter --</option>';
                        for(var i=0; i<data.length;i++){
                            op+='<option value="'+data[i].id+'">'+data[i].nm_sub_parameter+'</option>';
                        }
                        div.find('#sub_parameter_id').html(" ");
                        div.find('#sub_parameter_id').append(op);
                    },
                        error:function(){
                    }
                });
            })
        });

        $(document).ready(function(){
            $(document).on('change','#parameter_id2',function(){
                // alert('berhasil');
                var parameter_id = $(this).val();
                var div = $(this).parent().parent();
                var op=" ";
                $.ajax({
                type :'get',
                url: "{{ url('admin/nilai_sub_parameter/cari_sub_parameter') }}",
                data:{'parameter_id':parameter_id},
                    success:function(data){
                        op+='<option value="0" selected disabled>-- pilih sub_parameter --</option>';
                        for(var i=0; i<data.length;i++){
                            op+='<option value="'+data[i].id+'">'+data[i].nm_sub_parameter+'</option>';
                        }
                        div.find('#sub_parameter_id2').html(" ");
                        div.find('#sub_parameter_id2').append(op);
                    },
                        error:function(){
                    }
                });
            })
        });

    </script>
@endpush
