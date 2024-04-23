<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .branch {
        display: none;
    }

    .bank {
        display: none;
    }
    </style>
</head>

<body>


    <?php
        $bank = \App\Models\Bankdatamodel::all();
    ?>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('User Registration') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/user_register') }}">
                            @csrf
                            <!-- CSRF Protection -->

                            <!-- Name Field -->
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email Address Field -->
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Password Field -->
                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <!-- User Type Dropdown -->
                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">User Type</label>
                                <div class="col-md-6">
                                    <select id="type" class="form-control" name="usertype" required
                                        onchange="handleTypeChange()">
                                        <option value="" selected disabled>Select type</option>
                                        <option value="0">Branch</option>
                                        <option value="1">Bank</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Branch Fields -->
                            <div class="branch" id="branchFields">
                                <div class="form-group row">
                                    <label for="bank-name" class="col-md-4 col-form-label text-md-right">Bank
                                        Name</label>
                                    <div class="col-md-6">
                                        <select id="bank-name" class="form-control" name="bankid">
                                            <option value="" selected disabled>Select bank</option>
                                            @if($bank)
                                            @foreach($bank as $banks)
                                            <option value="{{$banks->id}}">{{$banks->bank_name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="branch-name" class="col-md-4 col-form-label text-md-right">Branch
                                        Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="branch-name" class="form-control" name="branch_name">
                                    </div>
                                </div>
                            </div>

                            <!-- Bank Fields -->
                            <div class="bank" id="bankFields">
                                <div class="form-group row">
                                    <label for="bank-name" class="col-md-4 col-form-label text-md-right">Bank
                                        Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="bank-name" class="form-control" name="bank_name">
                                    </div>
                                </div>
                            </div>

                            <!-- Register Button -->
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @if(Route::currentRouteName() == 'register')
    <script>
        window.location = "{{ route('login') }}";
    </script>
    @endif

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    function handleTypeChange() {
        var selectElement = document.getElementById("type");
        var branchFields = document.getElementById("branchFields");
        var bankFields = document.getElementById("bankFields");

        if (selectElement.value === "0") {
            branchFields.style.display = "block";
            bankFields.style.display = "none";
        } else if (selectElement.value === "1") {
            branchFields.style.display = "none";
            bankFields.style.display = "block";
        } else {
            branchFields.style.display = "none";
            bankFields.style.display = "none";
        }
    }
    </script>
</body>

</html>