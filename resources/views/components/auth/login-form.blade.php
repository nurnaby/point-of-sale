<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
            <div class="col mx-auto">
                <div class="mb-4 text-center">
                    <img src="{{ asset('admin_backend/assets/images/logo-img.png') }}" width="180" alt="" />
                </div>
                <div class="card">

                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="text-center">
                                <h3 class="">Sign up</h3>
                                <p>Don't have an account yet? <a href="authentication-signup.html">Sign up
                                        here</a>
                                </p>
                            </div>


                            <div class="form-body">



                                <div class="col-12">
                                    <label for="inputEmailAddress"
                                        class="form-label  @error('email') is-invalid @enderror">Email
                                        Address</label>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="Email Address" name="email" class="" required>
                                    @error('email')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="col-12 mb-4">
                                    <label for="inputChoosePassword" class="form-label">Enter
                                        Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password" name="password" class="form-control border-end-0"
                                            id="password" placeholder="Enter Password" required>
                                        <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                class='bx bx-hide'></i></a>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="d-grid">
                                        {{-- <a class="btn btn-primary" href="{{ url('/userRegistration') }}">Sign Up
                                            </a> --}}

                                        <button onclick="SubmitLogin()" class="btn btn-primary"><i
                                                class="bx bxs-lock-open"></i>Sign in</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>
<script>
    async function SubmitLogin() {
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        if (email.length === 0) {
            errorToast("Email is required");
        } else if (password.length === 0) {
            errorToast("Password is required");

        } else {

            showLoader();
            let res = await axios.post("/user-login", {
                email: email,
                password: password
            });
            hideLoader();
            if (res.status === 200 && res.data['status'] === 'success') {

                window.location.href = "/dashboard";

            } else {

                errorToast(res.data['message']);
                // window.location.href = "/userLogin";
            }
        }
    }
</script>
