@extends('admin.layouts.app')

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Profile</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30">
                            <label for="avatar" style="cursor: pointer; position: relative; display: inline-block;"
                                title="Bấm vào đây để đổi ảnh đại diện">

                                <img src="{{ $user->avatar ? asset($user->avatar) : asset('admin/assets/images/users/5.jpg') }}"
                                    id="avatar-preview" class="rounded-circle" width="150" height="150"
                                    style="object-fit: cover; border: 2px solid #ddd;" />
                            </label>

                            <h4 class="card-title m-t-10">{{ $user->name }}</h4>
                            <h6 class="card-subtitle">Accounts Manager Amix corp</h6>

                            <div class="row text-center justify-content-md-center">
                                <div class="col-4">
                                    <a href="javascript:void(0)" class="link">
                                        <i class="icon-people"></i> <span class="font-medium">254</span>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="javascript:void(0)" class="link">
                                        <i class="icon-picture"></i> <span class="font-medium">54</span>
                                    </a>
                                </div>
                            </div>
                        </center>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="card-body"> <small class="text-muted">Email address </small>
                        <h6>{{ $user->email }}</h6> <small class="text-muted p-t-30 db">Phone</small>
                        <h6>{{ $user->phone }}</h6> <small class="text-muted p-t-30 db">Address</small>
                        <h6>{{ $user->address }}</h6>
                        <div class="map-box">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508"
                                width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div> <small class="text-muted p-t-30 db">Social Profile</small>
                        <br />
                        <button class="btn btn-circle btn-secondary"><i class="mdi mdi-facebook"></i></button>
                        <button class="btn btn-circle btn-secondary"><i class="mdi mdi-twitter"></i></button>
                        <button class="btn btn-circle btn-secondary"><i class="mdi mdi-youtube-play"></i></button>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material" action="/manager/profile" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <input type="file" id="avatar" name="avatar" accept="image/*" style="display: none;"
                                onchange="previewAvatar(this)">

                            <div class="form-group">
                                <label class="col-md-12">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $user->name }}" class="form-control form-control-line"
                                        name="name">
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
                                    <input type="email" value="{{ $user->email }}" class="form-control form-control-line"
                                        name="email" id="email" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="password" id="password"
                                        class="form-control form-control-line"
                                        placeholder="Leave blank if you do not want to change">
                                    @error('password')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group" id="confirm-password" style="display: none;">
                                <label class="col-md-12">Confirm Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control form-control-line" placeholder="Re-enter your new password">
                                </div>
                            </div>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const passwordInput = document.getElementById('password');
                                    const confirmBlock = document.getElementById('confirm-password');
                                    const confirmInput = document.getElementById('password_confirmation');

                                    passwordInput.addEventListener('input', function() {
                                        if (this.value.trim().length > 0) {
                                            confirmBlock.style.display = 'block';
                                        } else {
                                            confirmBlock.style.display = 'none';
                                            confirmInput.value = '';
                                        }
                                    });
                                });

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
                                    <input type="text" name="phone" value={{ $user->phone }}
                                        class="form-control form-control-line">
                                    @error('phone')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Message</label>
                                <div class="col-md-12">
                                    <textarea rows="5" class="form-control form-control-line"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Select Country</label>
                                <div class="col-sm-12">
                                    <select class="form-control form-control-line" name="country_id">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" @selected($country->id == $user->country_id)>
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
                            <div class="col-md-12 style-alerts">

                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <div class="d-flex align-items-center">
                                            <strong class="me-2">Success! </strong> {{ session('success') }}
                                        </div>
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <div class="d-flex align-items-center">
                                            <strong class="me-2">Error! </strong> {{ session('error') }}
                                        </div>
                                    </div>
                                @endif

                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection
