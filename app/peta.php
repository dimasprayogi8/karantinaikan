<?php
include 'classes/fungsi_rupiah.php';
include 'classes/database.php';

$mysqli = new Database();
$cari = $mysqli->show();

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/dist/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="assets/dist/css/jquery.dataTables.css">
    <link rel="stylesheet" href="assets/difst/css/sweetalert.css">
    <link rel="stylesheet" href="assets/dist/css/w3.css">
   
    <style>
       #map {
        height: 500px;
        width: 98%;
        margin: 20px auto;
       }
       .footer p{
         padding-top: 20px;
         padding-left: 30px;
         display: inline-block;

       }
       .footer ul{
         display: inline-block;
       }
       .footer li{
         display: inline;
         text-decoration: none;
         padding-right: 10px;
       }
       .container{
         margin-left: 1.3%;
       }
    </style>


  </head>
  <body>
    
    <div id="map" class="w3-card-4"></div>
   <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAWULxUVI8fI3jRnmaPil18-qr8kY7mAo&v=quarterly&callback=initMap">
    </script>
    <script type="text/javascript">
      function initMap() {

        var location = new Array();

          <?php
          if(isset($_POST['cari'])){
            $kec = $_POST['kec'];
            $koor = $mysqli->koordinat($kec);
            ?>
            location = [
            <?php
            while($row = $koor->fetch_assoc()){
				$t = duit($row['harga_lahan']);
		$kcmt = $row['kec'];	
		$kc = $mysqli->tampil_kecamatan($kcmt);
		$k=$kc->fetch_assoc();		
              ?>
              [<?php echo $row['latitude']; ?>,
              <?php echo $row['longitude']; ?>,
			  '<?php echo $row['nama_lokasi']; ?>',
              '<?php echo $row['desa']; ?>',
              '<?php echo $k['nama_kec']; ?>',
              <?php echo $row['jrk_sumber']; ?>,
			  <?php echo $row['jrk_pemasaran']; ?>,
              '<?php echo $row['dilalui_jln_utama']; ?>',
			  '<?php echo $t; ?>',
              <?php echo $row['point']; ?>],
              <?php
            }
           ?>
        ];
        var opt = {
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById('map'),opt);
        var infowindow = new google.maps.InfoWindow(),marker,i;
        var bounds = new google.maps.LatLngBounds();
        for (i = 0; i < location.length; i++) {
          /*
          load semua marker dari database
          */
          pos = new google.maps.LatLng(location[i][0],location[i][1]);
          bounds.extend(pos);
          marker = new google.maps.Marker({
            position: pos,
            map: map
          });
          /*
          menambahkan event click untuk menampilkan infowindow sesuai dengan marker yang di pilih
          */
          google.maps.event.addListener(marker,'click',(function(marker,i){
            return function(){
              infowindow.setContent('<h4><font color=blue>Lokasi '+location[i][2]+'</font><h4>'+
                                    '<h6>Desa: '+location[i][3]+'<br>'+
									'Kecamatan: '+location[i][4]+'</h6>'+
                                    '<h4><font color=blue>Point Potensi </font></h4>'+
                                    '<h6><font color=green >Jarak Bhn. Baku  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : '+location[i][5]+'<br>'+
                                    'Jarak Pemasaran &nbsp;&nbsp;&nbsp;&nbsp; : '+location[i][6]+'<br>'+
									'Dilalui Jln. Utama &nbsp;&nbsp;&nbsp; : '+location[i][7]+'<br>'+
									'Harga lahan per m2 : '+location[i][8]+'<br>'+
                                    'Nilai Potensi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : '+location[i][9]+'</font></h6>'
                                    );
              infowindow.open(map,marker);
            }
          })(marker,i));
        }
        map.fitBounds(bounds);
        <?php
      }else{
        ?>
        var mapOpt = {
          zoom: 3,
          center: new google.maps.LatLng(-6.7612234,108.1853978),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById('map'),mapOpt);
        <?php
      }
      ?>
    }
    </script>
    
  </body>
  
</html>
