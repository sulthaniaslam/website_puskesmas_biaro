<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">@yield('title_admin')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">@yield('title_admin')</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        @if (session()->has('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
        @endif
    </div><!-- /.container-fluid -->
</div>