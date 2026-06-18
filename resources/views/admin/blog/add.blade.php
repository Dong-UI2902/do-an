@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card card-body">
                    <h4 class="card-title">Create New Blog</h4>
                    <form class="form-horizontal m-t-30" action="/manager/blog" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        @include('admin.blog.fields', ['button' => 'Create'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
