<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <title>{{ config('app.name') }} - Register</title>
</head>
<body>
<div class="mask d-flex align-items-center gradient-custom-3">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card my-3" style="border-radius: 15px;">
            <div class="card-body p-5">
              @if(Session::has('success'))
              <div class="alert alert-success">{{Session::get('success')}}</div>
              @endif
              <h2 class="text-uppercase text-center mb-4">Create an account</h2>

              <form method="post" action="{{route('register')}}">
                @csrf

                <div class="form-outline mb-4">
                  <input type="text" value="{{ old('name')?old('name'):'' }}" name="name" id="name" class="form-control form-control-md @error('name') is-invalid @enderror" />
                  <label class="form-label" for="name">Your Name</label>
                  @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="form-outline mb-4">
                  <input type="text" value="{{ old('phone')?old('phone'):'' }}" name="phone" id="phone" class="form-control form-control-md @error('phone') is-invalid @enderror" />
                  <label class="form-label" for="phone">Your Phone</label>
                  @error('phone')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="form-outline mb-4">
                  <input type="text" value="{{ old('email')?old('email'):'' }}" name="email" id="email" class="form-control form-control-md @error('email') is-invalid @enderror" />
                  <label class="form-label" for="email">Your Email</label>
                  @error('email')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="form-outline mb-4">
                    <select class="form-select @error('role') is-invalid @enderror" value="{{ old('role')?old('role'):'' }}" name="role" aria-label="Default select example">
                    <option value="" selected>Open this select menu</option>
                    <option value="tenant">Tenant</option>
                    <option value="landlord">Landlord</option>
                    </select>
                    <label class="form-label" for="password">Your Role</label>
                  @error('role')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="password" class="form-control form-control-md @error('password') is-invalid @enderror" />
                  <label class="form-label" for="password">Enter Password</label>
                  @error('password')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                
                <div class="form-outline mb-4">
                  <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-md @error('password_confirmation') is-invalid @enderror" />
                  <label class="form-label" for="password_confirmation">Confirm Password</label>
                  @error('password_confirmation')<div class="text-danger">{{ $message }}</div>@enderror
                </div>

                <div class="form-check d-flex justify-content-center mb-3">
                  <input class="form-check-input me-2 @error('terms') is-invalid @enderror" value="on" type="checkbox" name="terms"/>
                  <label class="form-check-label" for="check">
                  <a href="#!" class="text-primary">I agree to <u>Terms and conditions</u></a>
                  </label>
                  
                </div>
                @error('terms')<div class="text-danger text-center">{{ $message }}</div>@enderror

                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-dark btn-block btn-lg gradient-custom-4 text-light">Register</button>
                </div>

                <p class="text-center text-muted mt-2 mb-0">Have already an account? <a href="{{route('login')}}"
                    class="fw-bold text-primary"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
  

@section('content')
   

@endsection
