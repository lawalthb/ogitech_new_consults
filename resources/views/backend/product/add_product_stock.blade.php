@extends('admin.admin_dashboard')
@section('admin')


    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Add Stock to Product</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Stock</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Add Stock</h5>
            <hr />

            <form id="myForm" method="post" action="{{ route('store.add.stock') }}">
                @csrf

                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">


                                <div class="form-group mb-3">
                                    <label for="inputProductTitle" class="form-label">Vendor Name</label>

                                    <select name="vendor_id" class="form-control" id="vendor_id">
                                        <option value="">Select Vendor</option>
                                        @foreach($activeVendor as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Product Name </label>


                                    <select name="product_id" class="form-select" id="product_id">
                                        <option>When you have selected vendor name</option>


                                    </select>
                                </div>







                                <div class="form-group mb-3">
                                    <label for="inputProductDescription" class="form-label">Comment</label>
                                    <textarea name="comment" class="form-control" id="inputProductDescription" rows="3"></textarea>
                                </div>





                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">


                                    <div class="form-group col-md-6">
                                        <label for="inputCostPerPrice" class="form-label">Product Price</label>
                                        <input type="text" name="purchase_price" class="form-control" id="purchase_price">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputStarPoints" class="form-label">Qty In</label>
                                        <input type="text" name="qty" class="form-control" require value="" id="qty" placeholder="Enter quantity">




                                    </div>

                                    <div class="col-12">
                                        <div class="d-grid">
                                            <label for="inputPrice" class="form-label">Amount</label>
                                            <input type="text" name="amount" class="form-control" require id="amount" readonly>

                                        </div>



                                        <hr>


                                        <div class="col-12">
                                            <div class="d-grid">
                                                <input type="submit" class="btn btn-primary px-4" value="Add" />

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
                </div>

            </form>

        </div>

    </div>



    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    product_name: {
                        required: true,
                    },

                    product_qty: {
                        required: true,
                    },
                    brand_id: {
                        required: true,
                    },
                    category_id: {
                        required: true,
                    },
                    subcategory_id: {
                        required: true,
                    },
                },
                messages: {
                    product_name: {
                        required: 'Please Enter Product Name',
                    },
                    short_descp: {
                        required: 'Please Enter Short Description',
                    },



                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>



    <script type="text/javascript">
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(100)
                                        .height(80); //create image element
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>



    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="vendor_id"]').on('change', function() {
                var vendor_id = $(this).val();
                if (vendor_id) {
                    $.ajax({
                        url: "{{ url('/vendorproduct/ajax') }}/" + vendor_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {

                            $('select[name="product_id"]').html('');
                            var d = $('select[name="product_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="product_id"]').append('<option value="' + value.id + '">' + value.product_name + '</option>');
                            });
                        },

                    });
                } else {
                    alert('danger');
                }
            });
        });




        $(document).ready(function() {
            // Attach change event listeners to the purchase price and quantity fields
            $('#purchase_price, #qty').on('input', function() {
                // Get the values of the purchase price and qty fields
                var purchasePrice = parseFloat($('#purchase_price').val()) || 0;
                var qty = parseFloat($('#qty').val()) || 0;

                // Calculate the amount by multiplying purchase price and qty
                var amount = purchasePrice * qty;

                // Display the result in the amount field
                $('#amount').val(amount.toFixed(2)); // Assuming you want to display the amount with two decimal places
            });
        });
    </script>
   

    @endsection
