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
        <h2 style="font-size: 20px; font-weight: bolder; margin-top: 05px; margin-bottom: 30px;">FDR Manage </h2>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="font-size: 14px; color: rgb(33, 111, 237);">Name</th>
                        <th style="font-size: 14px; color: rgb(33, 111, 237);">Phone</th>
                        <th style="font-size: 14px; color: rgb(33, 111, 237);">Bank</th>
                        <th style="font-size: 14px; color: rgb(33, 111, 237);">Branch</th>
                        <th style="font-size: 14px; color: rgb(33, 111, 237);">Application type</th>
                        <th style="font-size: 14px; color: rgb(33, 111, 237);">Id</th>
                        <th style="font-size: 14px; color: rgb(33, 111, 237);">Verify</th>
                        <th style="font-size: 14px; color: rgb(33, 111, 237);">View</th>
                        <th style="font-size: 14px; color: rgb(33, 111, 237);">Branch Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $info)
                    <tr>
                        <td>{{$info->name }}</td>
                        <td>{{$info->phone }}</td>
                        <td>{{$info->bank_name }}</td>
                        <td>{{$info->branch_name }}</td>
                        <td>{{$info->service_name }}</td>
                        <td>{{$info->genarate_id }}</td>
                        <!-- <td>{{ $info->branch_verifyed == 0 ? "False" : "True" }}</td> -->
                        <td>
                            @if($info->branch_verifyed)
                            
                            @if($info->brank_verifyed == 1)
                            <span class="text-info">Verified</div>
                            @else
                            <button type="button" class="btn btn-{{ $info->brank_verifyed == 1 ? 'info' : 'danger' }}"
                                data-bs-toggle="modal"
                                data-bs-target="#exampleModal_{{ $info->fd_id }}">{{ $info->brank_verifyed == 1 ? 'Verify' : 'Reject' }}</button>
                            @endif
                            
                            @else
                            Branch not Received
                        @endif
        </td>
        <td>
            <a href="{{ url('/bank/views/' . $info->fd_id) }}" class="btn btn-info btn-block">View</a>
        </td>
        <td>
            <a href="{{ url('/bank/status/' . $info->user_id . '/' . ($info->auth_status == 1 ? 0 : 1)) }}"
                class="btn btn-{{ $info->auth_status == 1 ? 'info' : 'danger' }} btn-block">{{ $info->auth_status == 1 ? "Active" : "Inactive" }}</a>
        </td>
        </tr>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal_{{ $info->fd_id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel_{{ $info->fd_id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title fs-5" id="exampleModalLabel_{{ $info->fd_id }}">{{$info->name }}
                        </h3>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/bank/approve')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" value="{{ $info->fd_id }}" name="id" hidden>
                            <div class="form-group">
                                <label for="selectOption">Decition Approve/Reject:</label>
                                <select class="form-control" id="selectOption" name="Approve" required>
                                    <option value="" disabled selected>Select an option</option>
                                    <option value="1">Verify</option>
                                    <option value="0">Reject</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="textArea">Commend:</label>
                                <textarea class="form-control" name="commend" required id="textArea"
                                    rows="3">{{ $info->bank_comment }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- Add more rows as needed -->
        </tbody>
        </table>
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