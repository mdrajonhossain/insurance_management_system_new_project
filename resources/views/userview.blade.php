<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
    /* Add your custom styles here */
    </style>
</head>

<body>
    <!-- Navbar -->
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Bank Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/fdr')}}">FDR</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{url('/fdrstatus')}}">FDR Status</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->

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

    <!-- Footer -->
    <!-- <footer class="footer bg-dark text-light text-center py-3">
        <div class="container">
            <span>&copy; 2024 Bank Name. All rights reserved.</span>
        </div>
    </footer> -->

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>