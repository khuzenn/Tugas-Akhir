<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
      integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
      crossorigin=""/>
        <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
        crossorigin=""></script>
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/cluster/dist/MarkerCluster.css" />
	  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/cluster/dist/MarkerCluster.Default.css" />
	  <script src="<?= base_url()?>assets/plugins/cluster/dist/leaflet.markercluster-src.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
  </head>
  <body >
    <div class="page">
      <div class="page-wrapper">
        <div class="container-xl">
          <!-- Page title -->
          <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="h2 mb-0 me-2">Kabkot/AP Group</div>
                      <div class="ms-auto lh-1">
                      </div>
                    </div>
                    <div class="d-flex align-items-baseline">
                      <div class="h7 mb-0 me-2">
                        Aktif : 27 &nbsp Banned : 1
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="h2 mb-0 me-2">Access Point</div>
                      <div class="ms-auto lh-1">
                      </div>
                    </div>
                    <div class="d-flex align-items-baseline">
                      <div class="h7 mb-0 me-2">
                        Online : 251 &nbsp Offline : 1
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="h2 mb-0 me-2">Status</div>
                      <div class="ms-auto lh-1">
                      </div>
                    </div>
                    <div class="d-flex align-items-baseline">
                      <div class="h7 mb-0 me-2">
                        Clients : 2751 &nbsp Session : 732
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <div class="col-xxl-12 pt-5">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Maps &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </h3>
                <div id="chart-mentions" class="chart-lg-"></div>
                <div id="map" style="height: 400px; position: relative;"></div>
                <script type="text/javascript">
                var map = L.map('map').setView([-6.9353384,107.5549372], 8);

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                var MyIcon = new L.icon({
                  iconUrl: "<?php echo base_url(); ?>assets/images/wifi-pin.png",
                  iconSize: [25, 25],
                  iconAnchor: [20, 45],
                  popupAnchor: [1, -34],
                  popupAnchor: [1, -34],
						      shadowSize: [60, 35]
                });

                var markers = L.markerClusterGroup();
				
                <?php foreach ($ap as $key => $value){ ?>
                  
                  var lokasi = L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>],{icon: MyIcon})
                  .bindPopup("<label><b><?= $value->kota ?></b></label><br><p><b>Dinas/AP Group :</b> <?= $value->ap_group ?><br><b>Alamat :</b> <?= $value->ap_name ?><br><b>Longitude :</b> <?= $value->longitude ?><br><b>Latitude :</b> <?= $value->latitude ?></p>")
                
                    L.circle(
                    [<?= $value->latitude ?>, <?= $value->longitude ?>], {
                      color: "green",
                      radius: 100
                    }
                  ).addTo(map);
                  
                  markers.addLayer(lokasi);
                  map.addLayer(markers);
                  map.fitBounds(markers.getBounds());
                <?php } ?>
                </script>
                </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xxl-11 mt-10">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Client Statistik</h3>
                <canvas id="myChart" style="width:600%;max-width:600px"></canvas>
                <script>
                const xValues = [08,10,12,14,16,18,20,22,00,02,04];
                const yValues = [500,1000,1500,2000,2500,3000,3500,4000,4500,5000,5500];

                new Chart("myChart", {
                  type: "line",
                  data: {
                    labels: xValues,
                    datasets: [{
                      fill: false,
                      lineTension: 0,
                      backgroundColor: "rgba(0,0,255,1.0)",
                      borderColor: "rgba(0,0,255,0.1)",
                      data: yValues
                    }]
                  },
                  options: {
                    legend: {display: false},
                    scales: {
                      yAxes: [{ticks: {min: 0, max:5500}}],
                    }
                  }
                });
                </script>
              </div>
            </div>
          </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

