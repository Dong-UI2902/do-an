@extends('frontend.layouts.app')
@section('content')
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        <form action="/login" method="POST">
                            @csrf
                            <input type="Email" placeholder="Email" name="email" />
                            <input type="password" placeholder="password" name="password" />
                            <span>
                                <input type="checkbox" class="checkbox" name="remember">
                                Keep me signed in
                            </span>
                            @include('layouts.status')
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div><!--/login form-->
                </div>
            </div>
        </div>
    </section>
@endsection
