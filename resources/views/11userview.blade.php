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


@include('header')


    <table class="table" style="width: 30%; margin: 20px auto 0;">

        <tbody>
            @foreach($data as $data)

            <tr class="bg-{{$data->branch_verifyed == 1 ? 'info' : 'danger' }} text-white">
                <td class="text-light bg-info">Search Id</td>
                <td class="text-light bg-info">{{ $search_id }}</td>
            </tr>

            <tr class="bg-{{$data->branch_verifyed == 1 ? 'info' : 'danger' }} text-white">
                <td>Branch Status</td>
                <td>{{$data->branch_verifyed == 1 ? "Verified" : "Not verified" }} 
                    <!-- / {{$data->branch_comment}} -->
                </td>
            </tr>

            <tr class="bg-{{$data->brank_verifyed == 1 ? 'info' : 'danger' }} text-white">
                <td>Bank Status</td>
                <td>{{$data->brank_verifyed == 1 ? "Verified" : "Not verified" }} 
                    <!-- / {{$data->bank_comment}} -->
                </td>
            </tr>

            <tr class="bg-{{$data->bdbank_verifyed == 1 ? 'info' : 'danger' }} text-white">
                <td>Bangladesh Bank Status</td>
                <td>{{$data->bdbank_verifyed == 1 ? "Verified" : "Not verified" }} 
                    <!-- / {{$data->bdbank_comment}} -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>




    <div class="text-center bg-info text-light" style="width: 30%; margin: 20px auto 0; font-size: 20px;">
        @if($bdbank_generateId)

        <?php
        function encryptText($string, $key) {
            $encrypted = openssl_encrypt($string, 'aes-256-cbc', $key, 0, '1234567890123456');
            return base64_encode($encrypted);
        }
        $string = $bdbank_generateId;
        $encryptedText = encryptText($string, "secret_key");
    ?>

        {{ "Verified Id :" }}
        <br />
        {{ $encryptedText }}


        @else

        @endif



    </div>





    <div style="width: 30%; margin: 20px auto 0; border-radius:20px;">
        <a href="{{url('/fdrstatus')}}" class="btn btn-primary" style="border-radius:10px;">Back</a>
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