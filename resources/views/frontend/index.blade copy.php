@extends('layouts.front')
@section('maps')
<div class="col-lg-12 col-md-12 portfolio-item filter-app">
    <form action="{{ route('peta_saw') }}" method="POST">
        {{ csrf_field() }} {{ method_field('POST') }}
       <div class="row">
            <div class="form-group col-md-6">
                <label for="">Pilih Tahun</label>
                <select name="tahun" id="tahun" class="form-control" required>
                    <option value="" selected disabled>-- pilih tahun --</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="">Pilih Bulans</label>
                <select name="bulan" id="bulan" class="form-control" required>
                    <option value="" selected disabled>-- pilih bulan --</option> 
                    <option value="januari">januari</option>
                    <option value="februari">februari</option>
                    <option value="maret">maret</option>
                    <option value="april">April</option>
                    <option value="mei">Mei</option>
                    <option value="juni">Juni</option>
                    <option value="juli">Juli</option>
                    <option value="agustus">Agustus</option>
                    <option value="september">September</option>
                    <option value="oktober">Oktober</option>
                    <option value="november">November</option>
                    <option value="desember">Desember</option>
                </select>
            </div>
            <div class="col-md-12" style="margin-bottom:10px; text-align:center;">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-searach"></i>&nbsp; Tampilkan Peta</button>
            </div>
       </div>
    </form>
    <div id="maps" style="width: 100%; height:600px;">
    </div> 
</div>
@endsection
@push('scripts')
<script>
    var map;
      var initMap = function() {
           map = new google.maps.Map(document.getElementById('maps'), {
              zoom: 12,
              center: {lat: -3.8251718, lng: 102.2345377},
              mapTypeId: google.maps.MapTypeId.HYBRID
          });

          <?php for($i=0;$i<count($rawa);$i++){?>
                  var pasanganTitikRawaa = [
                      <?php for($i=0;$i<count($rawa);$i++){?>
                          {lat:<?php echo $rawa[$i]['lat'] ?>, lng:<?php echo $rawa[$i]['long']?>},
                      <?php }?>
                  ];

                  var rawa = new google.maps.Polygon({
                      paths: pasanganTitikRawaa,
                      strokeColor: '#8a1652',
                      strokeOpacity: 0.8,
                      strokeWeight: 3,
                      fillColor: '#8a1652',
                      fillOpacity: 0.35
                  });

                  rawa.setMap(map);
          <?php }?>

          <?php for($i=0;$i<count($bentiring);$i++){?>
                  var pasanganTitikbentiringa = [
                      <?php for($i=0;$i<count($bentiring);$i++){?>
                          {lat:<?php echo $bentiring[$i]['lat'] ?>, lng:<?php echo $bentiring[$i]['long']?>},
                      <?php }?>
                  ];

                  var bentiring = new google.maps.Polygon({
                      paths: pasanganTitikbentiringa,
                      strokeColor: '#b099a5',
                      strokeOpacity: 0.8,
                      strokeWeight: 3,
                      fillColor: '#b099a5',
                      fillOpacity: 0.35
                  });

                  bentiring.setMap(map);
          <?php }?>

          <?php for($i=0;$i<count($bentiringpermai);$i++){?>
                  var pasanganTitikbentiringpermaia = [
                      <?php for($i=0;$i<count($bentiringpermai);$i++){?>
                          {lat:<?php echo $bentiringpermai[$i]['lat'] ?>, lng:<?php echo $bentiringpermai[$i]['long']?>},
                      <?php }?>
                  ];

                  var bentiringpermai = new google.maps.Polygon({
                      paths: pasanganTitikbentiringpermaia,
                      strokeColor: '#6d9ff2',
                      strokeOpacity: 0.8,
                      strokeWeight: 3,
                      fillColor: '#6d9ff2',
                      fillOpacity: 0.35
                  });

                  bentiringpermai.setMap(map);
          <?php }?>

          <?php for($i=0;$i<count($beringin);$i++){?>
                  var pasanganTitikberingina = [
                      <?php for($i=0;$i<count($beringin);$i++){?>
                          {lat:<?php echo $beringin[$i]['lat'] ?>, lng:<?php echo $beringin[$i]['long']?>},
                      <?php }?>
                  ];

                  var beringin = new google.maps.Polygon({
                      paths: pasanganTitikberingina,
                      strokeColor: '#0fa1e0',
                      strokeOpacity: 0.8,
                      strokeWeight: 3,
                      fillColor: '#0fa1e0',
                      fillOpacity: 0.35
                  });

                  beringin.setMap(map);
          <?php }?>

          <?php for($i=0;$i<count($limun);$i++){?>
                  var pasanganTitiklimuna = [
                      <?php for($i=0;$i<count($limun);$i++){?>
                          {lat:<?php echo $limun[$i]['lat'] ?>, lng:<?php echo $limun[$i]['long']?>},
                      <?php }?>
                  ];

                  var limun = new google.maps.Polygon({
                      paths: pasanganTitiklimuna,
                      strokeColor: '#ebba34',
                      strokeOpacity: 0.8,
                      strokeWeight: 3,
                      fillColor: '#ebba34',
                      fillOpacity: 0.35
                  });

                  limun.setMap(map);
          <?php }?>

          <?php for($i=0;$i<count($pematang);$i++){?>
                  var pasanganTitikpematanga = [
                      <?php for($i=0;$i<count($pematang);$i++){?>
                          {lat:<?php echo $pematang[$i]['lat'] ?>, lng:<?php echo $pematang[$i]['long']?>},
                      <?php }?>
                  ];

                  var pematang = new google.maps.Polygon({
                      paths: pasanganTitikpematanga,
                      strokeColor: '#2de349',
                      strokeOpacity: 0.8,
                      strokeWeight: 3,
                      fillColor: '#2de349',
                      fillOpacity: 0.35
                  });

                  pematang.setMap(map);
          <?php }?>

          <?php for($i=0;$i<count($pasar);$i++){?>
                  var pasanganTitikpasara = [
                      <?php for($i=0;$i<count($pasar);$i++){?>
                          {lat:<?php echo $pasar[$i]['lat'] ?>, lng:<?php echo $pasar[$i]['long']?>},
                      <?php }?>
                  ];

                  var pasar = new google.maps.Polygon({
                      paths: pasanganTitikpasara,
                      strokeColor: '#00ffff',
                      strokeOpacity: 0.8,
                      strokeWeight: 3,
                      fillColor: '#00ffff',
                      fillOpacity: 0.35
                  });

                  pasar.setMap(map);
          <?php }?>

          <?php for($i=0;$i<count($kampung);$i++){?>
                  var pasanganTitikkampunga = [
                      <?php for($i=0;$i<count($kampung);$i++){?>
                          {lat:<?php echo $kampung[$i]['lat'] ?>, lng:<?php echo $kampung[$i]['long']?>},
                      <?php }?>
                  ];

                  var kampung = new google.maps.Polygon({
                      paths: pasanganTitikkampunga,
                      strokeColor: '#ff00ff',
                      strokeOpacity: 0.8,
                      strokeWeight: 3,
                      fillColor: '#ff00ff',
                      fillOpacity: 0.35
                  });

                  kampung.setMap(map);
          <?php }?>

          <?php for($i=0;$i<count($sukamerindu);$i++){?>
                  var pasanganTitiksukamerindua = [
                      <?php for($i=0;$i<count($sukamerindu);$i++){?>
                          {lat:<?php echo $sukamerindu[$i]['lat'] ?>, lng:<?php echo $sukamerindu[$i]['long']?>},
                      <?php }?>
                  ];

                  var sukamerindu = new google.maps.Polygon({
                      paths: pasanganTitiksukamerindua,
                      strokeColor: '#ff8000',
                      strokeOpacity: 0.8,
                      strokeWeight: 3,
                      fillColor: '#ff8000',
                      fillOpacity: 0.35
                  });

                  sukamerindu.setMap(map);
          <?php }?>

          <?php for($i=0;$i<count($tanjungagung);$i++){?>
                  var pasanganTitiksukamerindua = [
                      <?php for($i=0;$i<count($tanjungagung);$i++){?>
                          {lat:<?php echo $tanjungagung[$i]['lat'] ?>, lng:<?php echo $tanjungagung[$i]['long']?>},
                      <?php }?>
                  ];

                  var tanjungagung = new google.maps.Polygon({
                      paths: pasanganTitiksukamerindua,
                      strokeColor: '#e60000',
                      strokeOpacity: 0.8,
                      strokeWeight: 3,
                      fillColor: '#e60000',
                      fillOpacity: 0.35
                  });

                  tanjungagung.setMap(map);
          <?php }?>

          <?php for($i=0;$i<count($tanjungjaya);$i++){?>
                  var pasanganTitiksukamerindua = [
                      <?php for($i=0;$i<count($tanjungjaya);$i++){?>
                          {lat:<?php echo $tanjungjaya[$i]['lat'] ?>, lng:<?php echo $tanjungjaya[$i]['long']?>},
                      <?php }?>
                  ];

                  var tanjungjaya = new google.maps.Polygon({
                      paths: pasanganTitiksukamerindua,
                      strokeColor: '#4287f5',
                      strokeOpacity: 0.8,
                      strokeWeight: 3,
                      fillColor: '#4287f5',
                      fillOpacity: 0.35
                  });

                  tanjungjaya.setMap(map);
          <?php }?>

          <?php for($i=0;$i<count($semarang);$i++){?>
                  var pasanganTitiksukamerindua = [
                      <?php for($i=0;$i<count($semarang);$i++){?>
                          {lat:<?php echo $semarang[$i]['lat'] ?>, lng:<?php echo $semarang[$i]['long']?>},
                      <?php }?>
                  ];

                  var semarang = new google.maps.Polygon({
                      paths: pasanganTitiksukamerindua,
                      strokeColor: '#bf73eb',
                      strokeOpacity: 0.5,
                      strokeWeight: 3,
                      fillColor: '#bf73eb',
                      fillOpacity: 0.35
                  });

                  semarang.setMap(map);
          <?php }?>

          <?php for($i=0;$i<count($surabaya);$i++){?>
                  var pasanganTitiksukamerindua = [
                      <?php for($i=0;$i<count($surabaya);$i++){?>
                          {lat:<?php echo $surabaya[$i]['lat'] ?>, lng:<?php echo $surabaya[$i]['long']?>},
                      <?php }?>
                  ];

                  var surabaya = new google.maps.Polygon({
                      paths: pasanganTitiksukamerindua,
                      strokeColor: '#eb73d3',
                      strokeOpacity: 0.8,
                      strokeWeight: 3,
                      fillColor: '#eb73d3',
                      fillOpacity: 0.35
                  });

                  surabaya.setMap(map);
          <?php }?>

      }

     
      initMap()

</script>
@endpush