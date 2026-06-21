<div class="col-md-12 style-alerts">

    @if (session('success'))
        <div class="alert alert-success show" role="alert"
            style="color: #155724; background-color: #d4edda; border: 1px solid #c3e6cb; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
            <div class="d-flex align-items-center">
                <strong class="me-2" style="color: #155724;">Success!</strong>
                <span style="color: #155724;">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible show" role="alert"
            style="color: #721c24; background-color: #f8d7da; border-color: #f5c6cb; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
            <div class="d-flex align-items-center">
                <strong class="me-2" style="color: #721c24;">Error! </strong>
                <span style="color: #721c24;">{{ session('error') }}</span>
            </div>
        </div>
    @endif

</div>
