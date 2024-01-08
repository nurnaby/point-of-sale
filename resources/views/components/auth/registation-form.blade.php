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


                            </div>
                            <div class="form-body">



                                <div class="col-12">
                                    <label for="inputEmailAddress"
                                        class="form-label  @error('email') is-invalid @enderror">First Name</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="First Name"
                                        name="firstName" class="">
                                    @error('email')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="col-12">
                                    <label for="inputEmailAddress"
                                        class="form-label  @error('email') is-invalid @enderror">Lest Name</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="Lest Name"
                                        name="lastName" class="" required>


                                </div>
                                <div class="col-12">
                                    <label for="inputEmailAddress"
                                        class="form-label  @error('email') is-invalid @enderror">Email
                                        Addriss</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email"
                                        name="email" class="" required>
                                    @error('email')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="col-12">
                                    <label for="inputEmailAddress"
                                        class="form-label  @error('email') is-invalid @enderror">Mobile
                                        Number</label>
                                    <input type="number" class="form-control" id="mobile" placeholder="Lest Name"
                                        name="mobile" class="" required>
                                    @error('email')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror

                                </div>



                                <div class="col-12 mb-2">
                                    <label for="inputChoosePassword" class="form-label">Enter
                                        Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password" name="password" class="form-control border-end-0"
                                            id="password" placeholder="Enter Password" required>
                                        <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                class='bx bx-hide'></i></a>
                                    </div>
                                </div>


                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <button onclick="onRegistration()" class="btn btn-primary"><i
                                            class="bx bxs-lock-open"></i>Sign
                                        in</button>
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
    async function onRegistration() {

        let firstName = document.getElementById('firstName').value;
        let lastName = document.getElementById('lastName').value;
        let email = document.getElementById('email').value;
        let mobile = document.getElementById('mobile').value;
        let password = document.getElementById('password').value;

        if (email.length === 0) {
            errorToast('Email is required')
        } else if (firstName.length === 0) {
            errorToast('First Name is required')
        } else if (lastName.length === 0) {
            errorToast('Last Name is required')
        } else if (mobile.length === 0) {
            errorToast('Mobile is required')
        } else if (password.length === 0) {
            errorToast('Password is required')
        } else {
            showLoader();
            let res = await axios.post("/user-registration", {
                email: email,
                firstName: firstName,
                lastName: lastName,
                mobile: mobile,
                password: password
            })
            hideLoader();
            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                setTimeout(function() {
                    window.location.href = '/userLogin'
                }, 2000)
            } else {
                errorToast(res.data['message'])
            }
        }
    }
</script>
