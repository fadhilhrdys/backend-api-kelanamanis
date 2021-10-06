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
    @include('components.header')
    <!-- end -->

    <!-- main body -->
    <div class="container-fluid pt-4">
        <div class="row">
            <!-- side left panel -->
            @include('components.navigation')
            <!-- end left panel-->

            <!-- dashboard content -->
            @yield('content')
            <!-- end dashboard content -->
        </div>
    </div>
    <!-- end main body -->

    <!-- script -->
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        // // modal detail menu
        // $(function($) {
        //     $('#modal-menu').on('show.bs.modal', function(e) {
        //         let button = $(e.relatedTarget);
        //         let modal = $(this);
                
        //         modal.find('.modal-body').load(button.data("remote"));
        //     });
        // })
    </script>

    {{-- <div class="modal fade" id="modal-menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Detail Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</body> --}}

</html>