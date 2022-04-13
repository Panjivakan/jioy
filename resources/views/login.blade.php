<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('front/css/login.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <div class="card card0 border-0">
            <div class="row d-flex">
                <div class="col-lg-6">
                    <div class="card1 pb-5">
                        {{-- <div class="row"> <img src="https://i.imgur.com/CXQmsmF.png" class="logo"> </div> --}}
                        <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="{{ asset('gambar/jioy.png') }}" class="image"> </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card2 card border-0 px-4 py-5">
                        <div class="row px-3 mb-4">
                            @if(session()->has('loginnyaError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('loginnyaError') }}
                            </div>
                            @endif
                            <h2 class="or text-center">Login</h2>
                            <div class="line"></div>
                        </div>

                        <form action="/login" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="mb-1">
                                <h6 class="mb-0 text-sm">Email Address</h6>
                            </label>
                            <input class="mb-4 form-control" type="text" name="email" value="{{ old('email') }}" placeholder="Masukkan Email Anda" required>
                            @error('email')
                                <div class="text-danger">Email tidak Sesuai !</div>   
                            @enderror
                        </div>
                        <div class="rform-group">
                            <label class="mb-1">
                                <h6 class="mb-0 text-sm">Password</h6>
                            </label>
                            <input class="form-control" type="password" name="password" placeholder="Masukkan password" required>
                        </div>
                        
                        {{-- <div class="row px-3 mb-4">
                            <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm">Remember me</label> </div> <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                        </div> --}}
                        <div class="row mb-3 px-3 mt-3"> <button type="submit" class="btn btn-primary text-center">Login</button> </div>
                    </form>
                        <div class="row mb-4 px-3"> <small class="font-weight-bold">Belum punya akun? <a href="/register" class="text-danger ">Daftar</a></small> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>