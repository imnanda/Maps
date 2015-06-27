<?php
include('model/skalaUsaha.php');

$skala = new skalaUsaha();
?>

<script type="text/javascript">
    'use strict';
    $(function () {
        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [
            {
                <?php
                $dataSkala = $skala->ambilData('Kecil');
                $jumlahUsahaKecil = mysqli_num_rows($dataSkala);
                ?>
                value: <?php echo $jumlahUsahaKecil ?>,
                color: "#f56954",
                highlight: "#f56954",
                label: "Kecil"
            },
            {
                <?php
                $dataSkala = $skala->ambilData('Menengah');
                $jumlahUsahaMenengah = mysqli_num_rows($dataSkala);
                ?>
                value: <?php echo $jumlahUsahaMenengah ?>,
                color: "#00a65a",
                highlight: "#00a65a",
                label: "Menengah"
            },
            {
                <?php
                $dataSkala = $skala->ambilData('Mikro');
                $jumlahUsahaMikro = mysqli_num_rows($dataSkala);
                ?>
                value: <?php echo $jumlahUsahaMikro ?>,
                color: "#f39c12",
                highlight: "#f39c12",
                label: "Mikro"
            }
        ];
        var pieOptions = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke: true,
            //String - The colour of each segment stroke
            segmentStrokeColor: "#fff",
            //Number - The width of each segment stroke
            segmentStrokeWidth: 1,
            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            //Number - Amount of animation steps
            animationSteps: 100,
            //String - Animation easing effect
            animationEasing: "easeOutBounce",
            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate: true,
            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale: false,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: false,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
            //String - A tooltip template
            tooltipTemplate: "<%=value %> Usaha <%=label%>"
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions);
        //-----------------
        //- END PIE CHART -
        //-----------------
    });
</script>