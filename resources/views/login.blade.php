<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>{{ config('app.name') }} - Login</title>
</head>

<body>
    <div class="mask d-flex align-items-center gradient-custom-3">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card my-3" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            @if(Session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong>{{Session('success')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
                            <h2 class="text-uppercase text-center mb-4">Login to Your account</h2>

                            <form method="post" action="{{route('login')}}">
                                @csrf
                                <div class="form-outline mb-4">
                                    <input type="text" value="{{ old('email')?old('email'):'' }}" name="email"
                                        id="email"
                                        class="form-control form-control-md @error('email') is-invalid @enderror" />
                                    <label class="form-label" for="email">Your Email</label>
                                    @error('email')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="password"
                                        class="form-control form-control-md @error('password') is-invalid @enderror" />
                                    
                                    
                                    @error('password')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>



                                <div class="d-flex justify-content-center">
                                    <button type="submit"
                                        class="btn btn-dark btn-block btn-lg gradient-custom-4 text-light">Login</button>
                                </div>

                                <p class="text-center text-muted mt-2 mb-0">Don't have an account? <a
                                        href="{{route('register')}}" class="fw-bold text-body"><u>Click to
                                            Register</u></a></p>
                                <p class=" text-center mt-2"><a href=""
                                        class="fw-bold text-body"><u>Forgot Password?</u></a>
                                </p>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>


@section('content')


@endsection