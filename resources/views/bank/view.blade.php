<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Branch</title>
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

        <table class="table">
            <tbody>                                
                <tr class="bg-{{$data->branch_verifyed == 1 ? 'info' : 'danger' }} text-white">
                    <td>Branch Status</td>
                    <td>{{$data->branch_verifyed == 1 ? "True" : "False" }} / {{$data->branch_comment}}</td>
                </tr>
                
                <tr class="bg-{{$data->brank_verifyed == 1 ? 'info' : 'danger' }} text-white">
                    <td>Bank Status</td>
                    <td>{{$data->brank_verifyed == 1 ? "True" : "False" }} / {{$data->bank_comment}}</td>
                </tr>

                <tr class="bg-{{$data->bdbank_verifyed == 1 ? 'info' : 'danger' }} text-white">
                    <td>Bank Status</td>
                    <td>{{$data->bdbank_verifyed == 1 ? "True" : "False" }} / {{$data->bdbank_comment}}</td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>{{$data->email}}</td>
                </tr>

                <tr>
                    <td>Name</td>
                    <td>{{$data->name}}</td>
                </tr>

                <tr>
                    <td>Phone</td>
                    <td>{{$data->phone}}</td>
                </tr>

                <tr>
                    <td>NID</td>
                    <td>{{$data->nid}}</td>
                </tr>

                <tr>
                    <td>Nomonee name</td>
                    <td>{{$data->nomonee_name}}</td>
                </tr>
                
                <tr>
                    <td>Nomonee relation</td>
                    <td>{{$data->nomonee_relation}}</td>
                </tr>

                <tr>
                    <td>Nomonee phone</td>
                    <td>{{$data->nomonee_phone}}</td>
                </tr>

                <tr>
                    <td>Nomonee NID</td>
                    <td>{{$data->nomonee_nid}}</td>
                </tr>

                <tr>
                    <td>Nomonee E-Tin</td>
                    <td>{{$data->nomonee_etin}}</td>
                </tr>

                <tr>
                    <td>ssssss</td>
                    <td>{{$data->nid}}</td>
                </tr>

                <tr>
                    <td>District</td>
                    <td>{{$data->district}}</td>
                </tr>

                <tr>
                    <td>State</td>
                    <td>{{$data->state}}</td>
                </tr>

                <tr>
                    <td>Aplication Aply Date</td>
                    <td>{{$data->created_at}}</td>
                </tr>

                <tr>
                    <td>ssssss</td>
                    <td>{{$data->nid}}</td>
                </tr>


            </tbody>
        </table>
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