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
                                <h3 class="">Registion </h3>
                                <p>Don't have an account yet? <a href="authentication-signup.html">Sign up
                                        here</a>
                                </p>
                            </div>


                            <div class="form-body">

                                <form method="POST" class="row g-3" action="#">
                                    @csrf
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
                                    <div class="col-12">
                                        <label for="inputChoosePassword" class="form-label">Enter
                                            Password</label>
                                        <div class="input-group" id="show_hide_password">
                                            <input type="password" name="password" class="form-control border-end-0"
                                                id="inputChoosePassword" placeholder="Enter Password" required>
                                            <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                    class='bx bx-hide'></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                                checked>
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-end"> <a href="authentication-forgot-password.html">Forgot
                                            Password ?</a>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="bx bxs-lock-open"></i>Sign in</button>
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
