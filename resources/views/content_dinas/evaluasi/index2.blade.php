@extends('Dashboard.Dinas.evaluasi')
@section('content-crud')
<div class="row">
  <div class="col-lg-12">
    <div class="panel">
      <div id="mapping_posko"></div>
      <div id="mapping_relawan"></div>
    </div>
    <!-- <iframe class="page-header" width="100%" height="900" src="https://app.powerbi.com/view?r=eyJrIjoiMzg2ZDM0YTItN2YzMS00ZmMzLWFiZmEtODIzYTNjZDc0ZGEwIiwidCI6ImJkMDgwN2VjLWM5MzAtNDlhZS05OTM5LTM4YWJkN2UyZmYzNSIsImMiOjEwfQ%3D%3D" frameborder="0" allowFullScreen="true"></iframe> -->
  </div>
</div>
<style>
    #kpi{
        width: 50%;
        float: left;
    }
    #chart_tim{
        width: 50%;
        float: right;
    }
</style>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/maps/modules/offline-exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/id/id-all.js"></script>
<script src="https://code.highcharts.com/mapdata/custom/asia.js"></script>
<script src="https://code.highcharts.com/mapdata/custom/world-palestine-highres.js"></script>
<script src="https://code.highcharts.com/mapdata/custom/world-eckert3-highres.js"></script>
<script src="https://code.highcharts.com/mapdata/custom/world-highres3.js"></script>
<script src="https://code.highcharts.com/mapdata/custom/world-robinson-highres.js"></script>
<script src="https://code.highcharts.com/mapdata/custom/world-continents.js"></script>
<script src="https://code.highcharts.com/mapdata/custom/world.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.3.6/proj4.js"></script>
<script>
    

    Highcharts.mapChart('mapping_posko', {
        chart: {
            map: 'custom/world',
            height: '40%'
        },

        title: {
            text: 'Peta Persebaran Posko'
        },

        mapNavigation: {
            enabled: true
        },

        tooltip: {
            headerFormat: '',
            pointFormat: '<b>{point.name}</b><br>{point.kab}<br>Lat: {point.lat}, Lon: {point.lon}'
        },

        series: [{
            // Use the gb-all map with no data as a basemap
            name: 'Basemap',
            // mapData: Highcharts.maps['countries/id/id-all'],
            borderColor: 'green',
            //nullColor: 'rgba(200, 200, 200, 0.3)',
            showInLegend: false
        }, {
            name: 'Separators',
            type: 'mapline',
            nullColor: '#707070',
            showInLegend: false,
            enableMouseTracking: false
        }, {
            // Specify points using lat/lon
            type: 'mappoint',
            name: 'Posko',
            color: Highcharts.getOptions().colors[0],
            tooltip: {
                headerFormat: '',
                pointFormat: '<b>{point.name}</b><br>{point.alamat}<br>{point.kab}<br>Lat: {point.lat}, Lon: {point.lon}'
            },
            data: [
            {
                name: {!!json_encode($all_posko[0])!!},
                kab: {!!json_encode($all_kab[0])!!},
                alamat: {!!json_encode($alamat_lengkap_posko[0])!!},
                lon: {!!json_encode($latitude[0])!!},
                lat: {!!json_encode($longitude[0])!!}
            },{
                name: {!!json_encode($all_posko[1])!!},
                kab: {!!json_encode($all_kab[1])!!},
                alamat: {!!json_encode($alamat_lengkap_posko[1])!!},
                lon: {!!json_encode($latitude[1])!!},
                lat: {!!json_encode($longitude[1])!!}
            }]
        }, {
            // Specify points using lat/lon
            type: 'mappoint',
            name: 'Relawan',
            color: Highcharts.getOptions().colors[1],
            tooltip: {
                headerFormat: '',
                pointFormat: '<b>{point.name}</b><br>{point.alamat}<br>{point.ahli}<br>Lat: {point.lat}, Lon: {point.lon}'
            },
            //data belom dipanggil menggunakan perulangan
            data: [
            {
                name: {!!json_encode($all_relawan[2])!!},
                ahli: {!!json_encode($keahlian[2])!!},
                alamat: {!!json_encode($alamat_lengkap_relawan[2])!!},
                lat: {!!json_encode($lat_relawan[2])!!},
                lon: {!!json_encode($long_relawan[2])!!}
            },{
                name: {!!json_encode($all_relawan[1])!!},
                ahli: {!!json_encode($keahlian[1])!!},
                alamat: {!!json_encode($alamat_lengkap_relawan[1])!!},
                lat: {!!json_encode($lat_relawan[1])!!},
                lon: {!!json_encode($long_relawan[1])!!}
            }]
        }]
        });
</script>
@endsection
