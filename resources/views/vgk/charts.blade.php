@extends('vgk.index)

@section('charts')
    <script type="text/javascript">
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        function drawWinsChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Games');
            data.addColumn('number', 'Results');
            data.addRows([
                ['Wins', {{ $stats['numeric']->wins }}],
                ['Losses', {{ $stats['numeric']->losses }}],
                ['OT', {{ $stats['numeric']->ot }}]
            ]);

            var options = {'title':'VGK Win Loss Tracker',
                'width':400,
                'height':250};

            var chart = new google.visualization.PieChart(document.getElementById('chart_div_wins'));
            chart.draw(data, options);
        }

        function drawShotsAllowedChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Taken');
            data.addColumn('number', 'Allowed');
            data.addRows([
                ['Taken', {{ $stats['numeric']->shotsPerGame }}],
                ['Allowed', {{ $stats['numeric']->shotsAllowed }}],
            ]);

            var options = {'title':'VGK Avg. Shots Taken/Allowed Per Game',
                'width':400,
                'height':250};

            var chart = new google.visualization.PieChart(document.getElementById('chart_div_shots'));
            chart.draw(data, options);
        }

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {
            drawWinsChart();
            drawShotsAllowedChart();
        }
    </script>
@endsection
