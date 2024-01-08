<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
            <div class="col mx-auto">
                <div class="mb-4 text-center">
                    <img src="{{ asset('admin_backend/assets/images/logo-img.png') }}" width="180" alt="" />
                </div>
                <div class="card">
                    {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="text-center">
                                <h3 class="">Enter OTP Code</h3>

                            </div>


                            <div class="form-body">

                                <form method="POST" class="row g-3" action="#">
                                    @csrf
                                    <div class="col-12">
                                        <label for="inputEmailAddress"
                                            class="form-label  @error('email') is-invalid @enderror">Enter 4 Digit OTP
                                            Code</label>
                                        <input type="text" class="form-control" id="otp"
                                            placeholder="Enter OTP code" name="otp" class="" required>


                                    </div>



                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button onclick="VerifyOtp()" class="btn btn-primary"><i
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
    async function VerifyOtp() {
        let otp = document.getElementById('otp').value;
        if (otp.length !== 4) {
            errorToast('Invalid OTP')
        } else {
            showLoader();
            let res = await axios.post('/verify-otp', {
                otp: otp,
                email: sessionStorage.getItem('email')
            })
            hideLoader();

            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message'])
                sessionStorage.clear();
                setTimeout(() => {
                    window.location.href = '/resetPassword'
                }, 1000);
            } else {
                errorToast(res.data['message'])
            }
        }
    }
</script>
