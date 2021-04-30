@extends('admin.app')
@section('css')
    <style>
        #container {
            height: 400px;
        }

        .highcharts-figure, .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        #datatable {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        #datatable caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }
        #datatable th {
            font-weight: 600;
            padding: 0.5em;
        }
        #datatable td, #datatable th, #datatable caption {
            padding: 0.5em;
        }
        #datatable thead tr, #datatable tr:nth-child(even) {
            background: #f8f8f8;
        }
        #datatable tr:hover {
            background: #f1f7ff;
        }


    </style>
@stop

@section('content')
    <!-- page content -->
    <div class="left_col" role="main">
        <h2>Welcome - {{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>
    </div>
    <!-- page content -->
    <div class="right_col" role="main">
        <h2>View Poll Result</h2>
        <figure class="highcharts-figure">
            <div id="container"></div>
            <p class="highcharts-description">

            </p>

            <table id="datatable">
                <thead>
                <tr>
                    <th></th>
                    <th>Jane</th>
                    <th>John</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <th>Apples</th>
                    <td>6</td>
                    <td>4</td>
                </tr>
                <tr>
                    <th>Pears</th>
                    <td>2</td>
                    <td>0</td>
                </tr>
                <tr>
                    <th>Plums</th>
                    <td>5</td>
                    <td>11</td>
                </tr>
                <tr>
                    <th>Bananas</th>
                    <td>1</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th>Oranges</th>
                    <td>2</td>
                    <td>4</td>
                </tr>
                </tbody>
            </table>
        </figure>





        </div>
    <!-- /page content -->
@endsection


@push('script')
    <script>
        Highcharts.chart('container', {
            data: {
                table: 'datatable'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Poll Results'
            },
            yAxis: {
                allowDecimals: true,
                title: {
                    text: 'Votes'
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        this.point.y + ' ' + this.point.name.toLowerCase();
                }
            },
            series: [{
                name: 'Jane',
                data: [1, 0, 4]
            }, {
                name: 'John',
                data: [5, 7, 3]
            }]
        });
    </script>

@endpush
