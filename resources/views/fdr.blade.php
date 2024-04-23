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
    <?php
        $bank = \App\Models\Bankdatamodel::all();
    ?>
    <!-- Navbar -->
    @include('header')
 

    <!-- Hero Section -->
    <section class="hero-section py-5 h-screen">
        <div class="container">
            <div class="content">
                <p style="font-size: 18px; color: black; margin-top: 20px;">New FDR Application</p>
                <p style="font-size: 13px; color: #FF0000; line-height: 18px;">* marked fields are mandatory</p>
                <div class="container" style="font-size: 12px !important; background: #F5F6F9; margin-bottom: 40px;">
                    <form action="{{url('/fdrformsend')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h4
                            style="margin-top: 20px; padding-left: 0px; font-size: 20px; background-color: #006DD5; padding: 12px; color: #fff;font-size: 18px; line-height: 24px; margin-bottom: 0px;">
                            Details</h4>
                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-4">
                                <label for="exampleInputEmail1" class="form-label"
                                    style="font-weight: bold; font-size: 14px;">Name</label>
                                <span style="color: red; font-size: 13px; line-height: 18px;">*</span>
                                <input type="text" class="form-control" name="name" pattern="[a-zA-Z\s]+" required>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputEmail1" class="form-label"
                                    style="font-weight: bold; font-size: 14px;">Mobile Number</label>
                                <span style="color: red; font-size: 13px; line-height: 18px;">*</span>
                                <input type="number" class="form-control" name="mobile_number" required>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputEmail1" class="form-label"
                                    style="font-weight: bold; font-size: 14px;">E-mail</label>
                                <span style="color: red; font-size: 13px; line-height: 18px;">*</span>
                                <input type="email" class="form-control" name="email"
                                    pattern="[a-z0-9_%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                            </div>
                        </div>

                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-4">
                                <label for="exampleInputEmail1" class="form-label"
                                    style="font-weight: bold; font-size: 14px;">ETIN
                                    (If available )</label>

                                <input type="number" class="form-control" name="etin">
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputEmail1" class="form-label"
                                    style="font-weight: bold; font-size: 14px;">NID
                                    Number</label>
                                <span style="color: red; font-size: 13px; line-height: 18px;">*</span>
                                <input type="number" class="form-control" name="nid_number" required>
                            </div>
                            <div class="col-md-4">
                                <label for="formFileLg" class="form-label"
                                    style="font-weight: bold; font-weight: bold; font-size: 14px;">
                                    Copy of NID</label>
                                <span style="color: red; font-size: 13px; line-height: 18px;">*</span>
                                <input class="form-control form-control" id="formFileLg" name="file" type="file">

                            </div>
                        </div>

                        <div class="row" style="margin-top:20px;">

                            <div class="col-md-4">
                                <label for="exampleInputEmail1" class="form-label"
                                    style="font-weight: bold; font-size: 14px;">Nominee’s Name</label>
                                <span style="color: red; font-size: 13px; line-height: 18px;">*</span>
                                <input type="text" class="form-control" name="nominee_name" pattern="[a-zA-Z\s]+"
                                    required>
                            </div>

                            <div class="col-md-4 ml-4">
                                <label for="exampleInputEmail1" class="form-label"
                                    style="font-weight: bold; font-size: 14px;">Nominee’s Mobile Number</label>
                                <span style="color: red; font-size: 13px; line-height: 18px;">*</span>
                                <input type="number" class="form-control" name="nominee_number" required>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputEmail1" class="form-label"
                                    style="font-weight: bold; font-size: 14px;">Relation with Nominee</label>
                                <span style="color: red; font-size: 13px; line-height: 18px;">*</span>
                                <input type="text" class="form-control" name="relation" required>

                            </div>
                        </div>

                        <div class="row" style="margin-top: 20px;">

                            <div class="col-md-4">
                                <label for="exampleInputEmail1" class="form-label"
                                    style="font-weight: bold; font-size: 14px;">Nominee’s NID/Smart NID No</label>
                                <span style="color: red; font-size: 13px; line-height: 18px;">*</span>
                                <input type="number" class="form-control" name="nominee_nid" required>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputEmail1" class="form-label"
                                    style="font-weight: bold; font-size: 14px;">Nominee’s ETIN</label>
                                <span style="color: red; font-size: 13px; line-height: 18px;"></span>
                                <input type="number" class="form-control" name="nominee_etin" pattern="[a-zA-Z\s]+"
                                    required>
                            </div>

                            <div class="col-md-4">
                                <label for="formFileLg" class="form-label"
                                    style="font-weight: bold; font-weight: bold; font-size: 14px;">
                                    Nominee’s Copy of NID</label>
                                <span style="color: red; font-size: 13px; line-height: 18px;">*</span>
                                <input class="form-control form-control" id="formFileLg" name="upload" type="file">
                            </div>

                            <div class="col-md-4">
                                <label for="bankSelect" class="form-label"
                                    style="font-weight: bold; font-size: 14px;">Service type</label>
                                <select class="form-select" id="bankSelect" name="service_name" required>
                                    <option value="">Select Service</option>
                                    <option value="Account opening">Account opening</option>
                                    <option value="Fixed Deposit Receipt">Fixed Deposit Receipt</option>
                                    <option value="Credit cards">Credit cards</option>
                                    <option value="Debit cards">Debit cards</option>
                                    <option value="Advancements of loans">Advancements of loans</option>
                                </select>
                            </div>


                        </div>

                        <h4
                            style="margin-top: 30px; padding-left: 40px; font-size: 20px; background-color: #006DD5; padding: 12px; color: #fff;font-size: 18px; line-height: 24px; margin-bottom: 0px;">
                            Address Details</h4>

                        <div class="row" style=" margin-top:20px;">
                            <div class="col-md-4">
                                <label for="exampleInputEmail1" class="form-label"
                                    style="font-weight: bold; font-size: 14px;">Pin
                                    Code <span style="font-size: 10px !important"> <span
                                            style="color: red; font-size: 13px; line-height: 18px;">* </span>Enter
                                        Atleast 4
                                        digit</span></label>
                                <input type="text" class="form-control" name="code" pattern=".*\d{4,}.*"
                                    title="Please enter at least 4 digits" required>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputEmail1" class="form-label"
                                    style="font-weight: bold; font-size: 14px;">District</label>
                                <span style="color: red; font-size: 13px; line-height: 18px;">*</span>
                                <input type="text" class="form-control" name="district" pattern="[a-zA-Z-\s]+" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label"
                                    style="font-weight: bold; font-size: 14px;">State</label>
                                <span style="color: red; font-size: 13px; line-height: 18px;">*</span>
                                <input type="text" class="form-control" name="state" pattern="[a-zA-Z-\s]+" required>
                            </div>
                        </div>




                        <h4
                            style="margin-top: 30px; padding-left: 40px; font-size: 20px; background-color: #006DD5; padding: 12px; color: #fff;font-size: 18px; line-height: 24px; margin-bottom: 0px;">
                            Bank and Agent Details</h4>

                        <div class="row" style=" margin-top:20px;">
                            <!-- <div class="col-md-4">
                                <label for="exampleInputEmail1" class="form-label"
                                    style="font-weight: bold; font-size: 14px;">Bank
                                    Name</label>
                                <span style="color: red; font-size: 13px; line-height: 18px;">*</span>
                                <input type="text" class="form-control" name="bank_name" pattern="[a-zA-Z\s]+" required>
                            </div> -->

                            <div class="col-md-4">
                                <label for="bankSelect" class="form-label"
                                    style="font-weight: bold; font-size: 14px;">Bank Name</label>
                                <span style="color: red; font-size: 13px; line-height: 18px;">*</span>
                                <select onchange="bankchangeadd(this.value)" class="form-select" id="bankSelect"
                                    name="bankid" required>
                                    <option value="" selected disabled>Select bank</option>
                                    @if($bank)
                                    @foreach($bank as $banks)
                                    <option value="{{$banks->id}}">{{$banks->bank_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>



                            <div class="col-md-4">
                                <label for="bankSelect" class="form-label"
                                    style="font-weight: bold; font-size: 14px;">Agent's Name</label>
                                <span style="color: red; font-size: 13px; line-height: 18px;">*</span>
                                <select class="form-select" id="branchselcet" name="branchid" required disabled>
                                </select>
                            </div>


                            <div class="col-md-4 mb-2">
                                <label for="exampleFormControlTextarea1" class="form-label"
                                    style="font-weight: bold; font-size: 14px;" name="textarea">Comment</label>
                                <textarea class="form-control" name="comment" id="exampleFormControlTextarea1"
                                    rows="2"></textarea>
                            </div>
                        </div>



                        <div style="margin-bottom: 40px; ">
                            <input type="submit" style="margin-right: 4px; width: 100px; border-radius: 20px;"
                                class="btn btn-primary" value="Submit">
                            <!-- <button type="submit" class="btn btn-primary" style="margin-right: 4px; width: 100px;" name="button">Register</button> -->
                            <button type="reset" class="btn btn-outline-secondary"
                                style="width: 100px; border-radius: 20px;">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
    </section>

    <!-- Footer -->
    <!-- <footer class="footer bg-dark text-light text-center py-3">
        <div class="container">
            <span>&copy; 2024 Bank Name. All rights reserved.</span>
        </div>
    </footer> -->

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


<!-- sdaf -->

    <script>
    function bankchangeadd(value) {
        // Replace {id} with the actual value passed to the function
        const apiUrl = `/bank_management/api/getbranch/${value}`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                var selectElement = document.getElementById("branchselcet");
                selectElement.innerHTML = ""; // Clear existing options

                if (data.branch.length !== 0) {
                    selectElement.disabled = false;
                    data.branch.forEach(function(agentName) {
                        var option = document.createElement("option");
                        option.text = agentName.branch_name;
                        option.value = agentName.id;
                        selectElement.add(option);
                    });
                } else {
                    var option = document.createElement("option");
                    option.text = "Select branch";
                    option.value = "";
                    selectElement.add(option);
                    selectElement.disabled = true;
                }
            })
            .catch(error => {
                console.error('Error fetching branch data:', error);
            });
    }
    </script>



</body>

</html>