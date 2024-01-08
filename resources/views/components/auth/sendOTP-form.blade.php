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
                                <h3 class="">Send OTP</h3>

                            </div>


                            <div class="form-body">

                                <form method="POST" class="row g-3" action="#">
                                    @csrf
                                    <div class="col-12 mb-4">
                                        <label for="inputEmailAddress"
                                            class="form-label  @error('email') is-invalid @enderror">Your Email
                                            Address</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Email Address" name="email" class="" required>
                                        @error('email')
                                            <span class="alert alert-danger">{{ $message }}</span>
                                        @enderror

                                    </div>



                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <button onclick="VerifyEmail()" class="btn btn-primary"><i
                                            class="bx bxs-lock-open"></i>Next</button>
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
<!--end row-->
</div>

<script>
    async function VerifyEmail() {
        let email = document.getElementById('email').value;
        if (email.length === 0) {
            errorToast('Please enter your email address')
        } else {
            showLoader();
            let res = await axios.post('/send-otp', {
                email: email
            });
            hideLoader();
            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message'])
                sessionStorage.setItem('email', email);
                setTimeout(function() {
                    window.location.href = '/verifyotp';
                }, 1000)
            } else {
                errorToast(res.data['message'])
            }
        }

    }
</script>
