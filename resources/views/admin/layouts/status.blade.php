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
