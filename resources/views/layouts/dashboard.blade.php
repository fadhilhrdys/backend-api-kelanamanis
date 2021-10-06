<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('asset/css/main.css') }}" />
    <!-- Bootstrap 4 links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <!-- end -->
    <title>{{ $title }} | Kelana Manis</title>
</head>

<body class="py-3 pl-4">
    <!-- Header -->
    @include('components.dashboardheader')
    <!-- end -->

    <!-- main body -->
    <div class="container-fluid pt-4">
        <div class="row">
            <!-- side left panel -->
            @include('components.navigation')
            <!-- end left panel-->

            <!-- dashboard content -->
            @yield('dashboardcontent')
            <!-- end dashboard content -->
        </div>
    </div>
    <!-- end main body -->

    <!-- script -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        // Chart Report
        let labelValues = ["PENDING", "PROCCES", "SUCCESS"];
        let values = [ {{ $reports['PENDING'] }}, {{ $reports['PROCESS'] }}, {{ $reports['SUCCESS'] }}];
        let barColors = [
            "#df4759",
            "#ffc107",
            "#42ba96"
        ];
            
        new Chart("chart-status", {
            type: "doughnut",
            data: {
                labels: labelValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: values
                }]
            }
        });
    </script>
</body>

</html>