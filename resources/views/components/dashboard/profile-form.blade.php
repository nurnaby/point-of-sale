<div class="page-wrapper">

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">User Profile</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">User Profilep</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    {{-- <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="#" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                <div class="mt-3">
                                    <h4></h4>
                                    <p class="text-secondary mb-1"></p>
                                    <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>

                                </div>
                            </div>
                            <hr class="my-4" />

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-globe me-2 icon-inline">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="2" y1="12" x2="22" y2="12">
                                            </line>
                                            <path
                                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                            </path>
                                        </svg>Website</h6>
                                    <span class="text-secondary">https://codervent.com</span>
                                </li>




                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-facebook me-2 icon-inline text-primary">
                                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                            </path>
                                        </svg>Facebook</h6>
                                    <span class="text-secondary">codervent</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}


                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input readonly type="email" id="email" class="form-control"
                                            value="" name="name" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">First Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" id="firstName" class="form-control" value=""
                                            name="email" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Lest Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" id="lastName" class="form-control" value=""
                                            name="phone" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone Number</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="mobile" id="mobile" class="form-control" value=""
                                            name="mobile" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" id="password" class="form-control" value=""
                                            name="password" />
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <button onclick="onUpdate()" class="btn btn-primary px-4">Update
                                            profile</button>

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

<script>
    getProfile();
    async function getProfile() {
        showLoader();
        let res = await axios.get("/user-profile")
        hideLoader();
        if (res.status === 200 && res.data['status'] === 'success') {
            let data = res.data['data'];
            document.getElementById('email').value = data['email'];
            document.getElementById('firstName').value = data['firstName'];
            document.getElementById('lastName').value = data['lastName'];
            document.getElementById('mobile').value = data['mobile'];
            document.getElementById('password').value = data['password'];
        } else {
            errorToast(res.data['message'])
        }

    }

    async function onUpdate() {


        let firstName = document.getElementById('firstName').value;
        let lastName = document.getElementById('lastName').value;
        let mobile = document.getElementById('mobile').value;
        let password = document.getElementById('password').value;

        if (firstName.length === 0) {
            errorToast('First Name is required')
        } else if (lastName.length === 0) {
            errorToast('Last Name is required')
        } else if (mobile.length === 0) {
            errorToast('Mobile is required')
        } else if (password.length === 0) {
            errorToast('Password is required')
        } else {
            showLoader();
            let res = await axios.post("/user-update", {
                firstName: firstName,
                lastName: lastName,
                mobile: mobile,
                password: password
            })
            hideLoader();
            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                await getProfile();
            } else {
                errorToast(res.data['message'])
            }
        }
    }
</script>
