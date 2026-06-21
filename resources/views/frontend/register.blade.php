@extends('frontend.layouts.app')
@section('content')
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form class="form-horizontal form-material" action="/register" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="col-md-12">Avatar</label>
                                <div class="col-md-12">
                                    <input type="file" id="avatar" name="avatar" accept="image/*"
                                        onchange="previewAvatar(this)">
                                    @error('avatar')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="name">
                                    @error('name')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" class="form-control form-control-line" name="email"
                                        id="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="password" id="password"
                                        class="form-control form-control-line" />
                                    @error('password')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group" id="confirm-password">
                                <label class="col-md-12">Confirm Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control form-control-line">
                                </div>
                            </div>
                            <script>
                                function previewAvatar(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function(e) {
                                            document.getElementById('avatar-preview').src = e.target.result;
                                        }

                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>
                            <div class="form-group">
                                <label class="col-md-12">Phone No</label>
                                <div class="col-md-12">
                                    <input type="text" name="phone" class="form-control form-control-line">
                                    @error('phone')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Address</label>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control form-control-line">
                                    @error('address')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Select Country</label>
                                <div class="col-sm-12">
                                    <select class="form-control form-control-line" name="country_id">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            @include('layouts.status')
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">Signup</button>
                                </div>
                            </div>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section>
@endsection
