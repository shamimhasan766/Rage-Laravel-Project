
@extends('frontend.master')
@section('link')
<!-- Template CSS -->
<link rel="stylesheet" href="{{ asset('profile/') }}/main5103.css?v=6.0" />
<style>
    .dashboard-menu ul li a.active{
        background: linear-gradient(180deg, #FED700 0%, #F78914 100%);
    }
</style>
@endsection


@section('content')

<main class="main pages">
    <!-- start wpo-page-title -->
    <section class="wpo-page-title">
        <h2 class="d-none">Hide</h2>
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="wpo-breadcumb-wrap">
                        <ol class="wpo-breadcumb-wrap">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="product.html">My Account</a></li>
                        </ol>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->
    <div class="page-content pt-50 pb-50">
        @if ($errors->any())
            <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li class="container">{{ $error }}</li>
            @endforeach
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            <div>
                                @if (Auth::guard('customer')->user()->photo)
                                <img height="150" width="150" class="d-block m-auto mb-3" style="border-radius: 100% !important;" src="{{ asset(Auth::guard('customer')->user()->photo) }}" alt="">
                                @else
                                <img height="150" width="150" class="d-block m-auto mb-3" style="border-radius: 100% !important;" id="" src="{{ Avatar::create(Auth::guard('customer')->user()->name)->toBase64() }}" alt="">
                                @endif
                                <h5 class="d-block m-auto mb-3 text-center">{{ Auth::guard('customer')->user()->name }}</h5>
                            </div>
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="password-tab" data-bs-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="true"><i class="fi-rs-user mr-10"></i>Password</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class='nav-link' href='{{ route('customer.logout') }}'><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content account dashboard-content pl-50">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Hello {{ Auth::guard('customer')->user()->name }}!</h3>
                                        </div>
                                        <div class="card-body">
                                            <p>
                                                From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>,<br />
                                                manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Your Orders</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Total</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>#1357</td>
                                                            <td>March 45, 2020</td>
                                                            <td>Processing</td>
                                                            <td>$125.00 for 2 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#2468</td>
                                                            <td>June 29, 2020</td>
                                                            <td>Completed</td>
                                                            <td>$364.00 for 5 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#2366</td>
                                                            <td>August 02, 2020</td>
                                                            <td>Completed</td>
                                                            <td>$280.00 for 3 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Orders tracking</h3>
                                        </div>
                                        <div class="card-body contact-from-area">
                                            <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <form class="contact-form-style mt-30 mb-50" action="#" method="post">
                                                        <div class="input-style mb-20">
                                                            <label>Order ID</label>
                                                            <input name="order-id" placeholder="Found in your order confirmation email" type="text" />
                                                        </div>
                                                        <div class="input-style mb-20">
                                                            <label>Billing email</label>
                                                            <input name="billing-email" placeholder="Email you used during checkout" type="email" />
                                                        </div>
                                                        <button class="submit submit-auto-width" type="submit">Track</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade pt-150" id="address" role="tabpanel" aria-labelledby="address-tab">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card mb-3 mb-lg-0">
                                                @if (session('address'))
                                                    <div class="alert alert-success">{{ session('success') }}</div>
                                                @endif
                                                <div class="card-header">
                                                    <h3 class="mb-0">Billing Address</h3>
                                                </div>
                                                @if (Auth::guard('customer')->user()->address && Auth::guard('customer')->user()->country_id && Auth::guard('customer')->user()->city_id)
                                                <div class="card-body billing-adress">
                                                    <address>
                                                       {{Auth::guard('customer')->user()->address}}
                                                    </address>
                                                    <p>{{ Auth::guard('customer')->user()->Country->name }} ,</p>
                                                    <p>{{ Auth::guard('customer')->user()->City->name }}</p>
                                                    <a class="btn-small" onclick="editAddress()">Edit</a>
                                                </div>
                                                @else
                                                <div class="card-body billing-adress">
                                                    <a class="btn-small" onclick="editAddress()">Add Address</a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Shipping Address</h5>
                                                </div>
                                                <div class="card-body">
                                                    <address>
                                                        4299 Express Lane<br />
                                                        Sarasota, <br />FL 34249 USA <br />Phone: 1.941.227.4444
                                                    </address>
                                                    <p>Sarasota</p>
                                                    <a href="#" class="btn-small">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                    <div class="card">
                                        @if (session('success'))
                                            <div class="alert alert-success">{{ session('success') }}</div>
                                        @endif
                                        <div class="card-header">
                                            <h5>Account Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('customer.account.details') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Full Name <span class="required">*</span></label>
                                                        <input value="{{ Auth::guard('customer')->user()->name }}" required="" class="form-control" name="name" type="text" />
                                                        {!! $errors->has('name') ? '<strong class="text-danger">' . $errors->first('name') . '</strong>' : '' !!}
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Email Address <span class="required">*</span></label>
                                                        <input required="" value="{{ Auth::guard('customer')->user()->email }}" class="form-control" disabled name="email" type="email" />
                                                        {!! $errors->has('email') ? '<strong class="text-danger">' . $errors->first('email') . '</strong>' : '' !!}
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Phone Number <span class="required">*</span></label>
                                                        <input class="form-control" value="{{ Auth::guard('customer')->user()->phone }}" name="phone" type="tel" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Zip Code <span class="required">*</span></label>
                                                        <input  class="form-control" value="{{ Auth::guard('customer')->user()->zip }}" name="zip" type="number" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <img src="" height="200" id="blah" alt="">
                                                        <label class="d-block">Profile Picture <span class="required">*</span></label>
                                                        <input  class="form-control pt-3" name="photo" type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" />
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                    @if (session('pass_success'))
                                            <div class="alert alert-success">{{ session('pass_success') }}</div>
                                        @endif
                                    @if (session('error'))
                                            <div class="alert alert-success">{{ session('error') }}</div>
                                        @endif
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Change Password</h5>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('customer.password.update') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label>Current Password <span class="required">*</span></label>
                                                        <input class="form-control" name="current_password" type="password" />
                                                        {!! $errors->has('current_password') ? '<strong class="text-danger">' . $errors->first('current_password') . '</strong>' : '' !!}
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>New Password <span class="required">*</span></label>
                                                        <input  class="form-control" name="password" type="password" />
                                                        {!! $errors->has('password') ? '<strong class="text-danger">' . $errors->first('password') . '</strong>' : '' !!}
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Confirm Password <span class="required">*</span></label>
                                                        <input class="form-control" name="password_confirmation" type="password" />
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Update Password</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Template  JS -->
@endsection
@section('scripts')
<script>
function editAddress() {
    var billingAddr = document.querySelector('.billing-adress');

    // Clear existing content
    billingAddr.innerHTML = '';

    // Create form element
    var form = document.createElement('form');
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission
        let csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
        let Url = "{{ route('customer.update.address') }}";

        var formData = new FormData(form);
        formData.append('_token', csrfToken);
        var selectedCountry = formData.get('country');
        var selectedCity = formData.get('city');
        var address = formData.get('address');

        $.ajax({
            type: 'POST',
            url: Url,
            contentType: false,
            processData: false,
            data: formData,
            success: function(response){
                window.location.reload();
            },
            error: function(xhr, status, error) {
                if (xhr.status === 422) { // 422 status code for validation errors
                var errors = xhr.responseJSON.errors;
                var errorMessage = '';
                // Loop through validation errors and concatenate them into a single string
                Object.keys(errors).forEach(function(key) {
                    errorMessage += errors[key][0] + '\n';
                });
                // Show the concatenated error message in an alert
                alert(errorMessage);
            } else {
                console.error(error); // Log other types of errors
            }
            }
        })
    });

    // Create country select tag
    var countrySelect = document.createElement('select');
    countrySelect.name = 'country';
    countrySelect.innerHTML = `<option value="{{ Auth::guard('customer')->user()->Country->id ?? '' }}">{{ Auth::guard('customer')->user()->Country->name ?? 'Select Country' }}</option>`;
    var countries = <?php echo json_encode($countries); ?>;
    countries.forEach(function(country) {
        var option = document.createElement('option');
        option.value = country.id;
        option.text = country.name;
        countrySelect.appendChild(option);
    });
    countrySelect.classList.add('form-select', 'mb-3');
    form.appendChild(countrySelect);

    // Add event listener to country select
    countrySelect.addEventListener('change', function() {
        var selectedCountry = this.value;
        var citySelect = document.querySelector('.city-select');

        // Clear existing city options
        citySelect.innerHTML = `<option value="">Select City</option>`;

        // Fetch city data for the selected country
        var category_id = $(this).val()

        let csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
        let Url = "{{ route('customer.get.city') }}";

        let formData = new FormData();
        formData.append('_token', csrfToken);
        formData.append('country_id', selectedCountry);

        $.ajax({
            type: 'POST',
            url: Url,
            contentType: false,
            processData: false,
            data: formData,
            success: function(response){
                $('.city-select').html(response)
            }
        })
    });

    form.appendChild(countrySelect);

    // Create city select tag
    var citySelect = document.createElement('select');
    citySelect.name = 'city';
    citySelect.innerHTML = `<option value="{{ Auth::guard('customer')->user()->City->id ?? '' }}">{{ Auth::guard('customer')->user()->City->name ?? 'Select City' }}</option>`;
    citySelect.classList.add('form-select', 'mb-3', 'city-select');
    form.appendChild(citySelect);

    // Create textarea
    var addressTextarea = document.createElement('textarea');
    addressTextarea.name = 'address';
    addressTextarea.setAttribute('rows', '4');
    addressTextarea.value ='{{ Auth::guard("customer")->user()->address ?? '' }}';
    addressTextarea.setAttribute('placeholder', 'Enter your address');
    form.appendChild(addressTextarea);

    // Create "Save Changes" button
    var saveChangesBtn = document.createElement('button');
    saveChangesBtn.type = 'submit';
    saveChangesBtn.textContent = 'Save Changes';
    form.appendChild(saveChangesBtn);

    billingAddr.appendChild(form);
}

</script>
@endsection
