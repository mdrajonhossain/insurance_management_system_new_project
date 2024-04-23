<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('public/user/styles.css') }}" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body>

    <!-- Header -->
    @include('bank.header')

    @include('bank.leftbar')


    <!-- Content -->
    <div class="content">
        <div class="table-responsive">
            <div class="bg-info text-white p-3 mb-5">Bank Dashboard</div>

            <div class="container">
                <div class="row">

                    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card bg-info">   
                            <div class="card-body mx-auto">
                                <a href="#" class="btn btn-blue text-white">Open A/C</a>
                                <div class="text-white mx-auto text-center">10</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card bg-info">   
                            <div class="card-body mx-auto">
                                <a href="#" class="btn btn-blue text-white">Fix Deposite (FDR)</a>
                                <div class="text-white mx-auto text-center">10</div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card bg-info">   
                            <div class="card-body mx-auto">
                                <a href="#" class="btn btn-blue text-white">Create Cards</a>
                                <div class="text-white mx-auto text-center">10</div>
                            </div>
                        </div>
                    </div>



                    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card bg-info">   
                            <div class="card-body mx-auto">
                                <a href="#" class="btn btn-blue text-white">Debit cards</a>
                                <div class="text-white mx-auto text-center">10</div>
                            </div>
                        </div>
                    </div>

                     
                  
                </div>
            </div>


        </div>
    </div>




    <!-- Bootstrap JS and dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>

</body>

</html>