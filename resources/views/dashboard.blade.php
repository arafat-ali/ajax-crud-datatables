@extends('layouts.master')

@section('extra_styles')
    <link href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.jqueryui.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/scroller/2.3.0/css/scroller.jqueryui.min.css" id="app-style" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="page-content">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Welcome to Test Application</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    {{-- <h4 class="card-title">Note</h4>
                    <p class="card-title-desc">Only use ajax to create new user, edit and delete user.</p>
                    <h6 class="mb-3">Already user table and roles table there. No need to create that</h6>
                    <p style="color:#c40b0b">Delete all instructions in tabs when you complete</p> --}}

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#adduser" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Add new user</span>
                            </a>
                        </li>
                        <li class="nav-item" id="userlist-show">
                            <a class="nav-link" data-toggle="tab" href="#userlist" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">User list</span>
                            </a>
                        </li>

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="adduser" role="tabpanel">
                            @include('partialComponents.createUser')
                        </div>
                        <div class="tab-pane" id="userlist" role="tabpanel">
                            @include('partialComponents.userList')
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection


@section('extra_scripts')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.jqueryui.min.js"></script>
<script src="https://cdn.datatables.net/scroller/2.3.0/js/dataTables.scroller.min.js"></script>
<script src="{{asset('/assets/js/user/index.js')}}"></script>
<script>

    window.onload = function(){
        getRoles('role_id');
    }

    $(function () {
        userList()
    });

</script>
@endsection

