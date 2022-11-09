@extends('layouts.main')

@section('content')
    <div id="chart-container"></div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <figure class="highcharts-figure">
        <div id="container"></div>
        <p><span class="fw-bold">Total de ideas: </span>{{ count($ideas)}}</p>
    </figure>
@endsection

@section('scripts')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    $(function(){
        let data = <?php echo json_encode($datos); ?>;
        let consolidado = [data[0][0], data[1][0], data[2][0]];
        Highcharts.setOptions({
            lang: {
                viewFullscreen: "Ver en pantalla completa",
                printChart: "Imprimir",
                downloadCSV: "Descargar CSV",
                downloadJPEG: "Descargar JPEG",
                downloadPDF: "Descargar PDF",
                downloadPNG: "Descargar PNG",
                downloadSVG: "Descargar SVG",
                downloadXLS: "Descargar XLS",
                viewData: "Ver tabla de datos"

            }
        });
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Consolidado de proyectos'
            },
            xAxis: {
                categories: [
                    'Tecnologías virtuales',
                    'Electrónica y telecomunicaciones',
                    'Bio y nanotecnología'
                ],
                crosshair: true
            },
            yAxis: {
                title: {
                useHTML: true,
                text: 'Cantidad'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                pointPadding: 0.2,
                borderWidth: 0
                }
            },
            series: [{
                name: 'Ideas',
                data: consolidado
    
            }]
        });
    })
</script>
@endsection