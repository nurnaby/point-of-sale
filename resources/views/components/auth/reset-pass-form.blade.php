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
                                <h3 class="">Set New Password</h3>

                            </div>


                            <div class="form-body">

                                <form method="POST" class="row g-3" action="#">
                                    @csrf

                                    <div class="col-12">
                                        <label for="inputChoosePassword" class="form-label">New Password</label>
                                        <div class="input-group" id="show_hide_password">
                                            <input type="password" name="password" class="form-control border-end-0"
                                                id="password" placeholder="Enter Password" required>
                                            <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                    class='bx bx-hide'></i></a>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputChoosePassword" class="form-label">Conform Password</label>
                                        <div class="input-group" id="show_hide_password">
                                            <input type="password" name="Cpassword" class="form-control border-end-0"
                                                id="cpassword" placeholder="Enter Password" required>
                                            <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                    class='bx bx-hide'></i></a>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button onclick="ResetPass()" class="btn btn-primary"><i
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
    async function ResetPass() {
        let password = document.getElementById('password').value;
        let cpassword = document.getElementById('cpassword').value;

        if (password.length === 0) {
            errorToast('Password is required')
        } else if (cpassword.length === 0) {
            errorToast('Confirm Password is required')
        } else if (password !== cpassword) {
            errorToast('Password and Confirm Password must be same')
        } else {
            showLoader()
            let res = await axios.post("/reset-password", {
                password: password
            });
            hideLoader();
            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                setTimeout(function() {
                    window.location.href = "/userLogin";
                }, 1000);
            } else {
                errorToast(res.data['message'])
            }
        }

    }
</script>
