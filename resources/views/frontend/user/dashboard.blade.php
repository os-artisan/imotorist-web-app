@extends('frontend.layouts.app')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            Marcus Doe
                        </div>
                        <div class="profile-usertitle-job">
                            Developer
                        </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <div class="profile-userbuttons">
                        <button type="button" class="btn btn-success btn-sm">Follow</button>
                        <button type="button" class="btn btn-danger btn-sm">Message</button>
                    </div>
                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li class="active">
                                <a href="page_user_profile_1.html">
                                <i class="icon-home"></i> Overview </a>
                            </li>
                            <li>
                                <a href="page_user_profile_1_account.html">
                                <i class="icon-settings"></i> Account Settings </a>
                            </li>
                            <li>
                                <a href="page_user_profile_1_help.html">
                                <i class="icon-info"></i> Help </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
            </div>

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="profile-content">
                           Some user related content goes here...
                        </div>
                    </div>
                </div>
            </div>
        
        </div><!-- row -->

    </div><!-- container -->
@endsection
