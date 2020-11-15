@extends('layouts.admin.admin')
@section('content')

    <div class="row pt-2 pb-2">
        <div class="col-sm-6">
            <h4 class="page-title">User Profile</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-right">
                @php
                    $paths = explode('/',Request::path());
                @endphp
                @foreach ($paths as $path)
                    <li class="breadcrumb-item"><a href="javaScript:void();">{{ $path }}</a></li>
                @endforeach
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card profile-card-2">
                <div class="card-img-block">
                    <img class="img-fluid" src="/contents/admin/assets/images/gallery/31.jpg" alt="Card image cap">
                </div>
                <div class="card-body pt-5">
                    <img src="{{ asset(''.$user->photo) }}" alt="profile-image" class="profile">
                    <h5 class="card-title">{{ $user->name }} {{ $user->last_name }}</h5>
                    {{-- <p class="card-text">
                        Some quick example text to build on the card title and make up the bulk of the
                        card's content.
                    </p>
                    <div class="icon-block">
                        <a href="javascript:void();"><i class="fa fa-facebook bg-facebook text-white"></i></a>
                        <a href="javascript:void();"> <i class="fa fa-twitter bg-twitter text-white"></i></a>
                        <a href="javascript:void();"> <i class="fa fa-google-plus bg-google-plus text-white"></i></a>
                    </div> --}}
                </div>
                <div class="card-body border-top border-light d-none">
                    <div class="media align-items-center">
                        <div>
                            <img src="assets/images/timeline/html5.svg" class="skill-img" alt="skill img">
                        </div>
                        <div class="media-body text-left ml-3">
                            <div class="progress-wrapper">
                                <p>HTML5 <span class="float-right">65%</span></p>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar" style="width:65%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="media align-items-center">
                        <div><img src="assets/images/timeline/bootstrap-4.svg" class="skill-img" alt="skill img"></div>
                        <div class="media-body text-left ml-3">
                            <div class="progress-wrapper">
                                <p>Bootstrap 4 <span class="float-right">50%</span></p>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar" style="width:50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="media align-items-center">
                        <div><img src="assets/images/timeline/angular-icon.svg" class="skill-img" alt="skill img"></div>
                        <div class="media-body text-left ml-3">
                            <div class="progress-wrapper">
                                <p>AngularJS <span class="float-right">70%</span></p>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar" style="width:70%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="media align-items-center">
                        <div><img src="assets/images/timeline/react.svg" class="skill-img" alt="skill img"></div>
                        <div class="media-body text-left ml-3">
                            <div class="progress-wrapper">
                                <p>React JS <span class="float-right">35%</span></p>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar" style="width:35%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#profile" data-toggle="pill"
                                class="nav-link active"><i class="icon-user"></i> <span class="hidden-xs">Profile</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#messages" data-toggle="pill" class="nav-link"><i
                                    class="icon-envelope-open"></i> <span class="hidden-xs">Messages</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i
                                    class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                        </li>
                    </ul>

                    <div class="tab-content p-3">
                        <div class="tab-pane active" id="profile">
                            <h5 class="mb-3">User Profile</h5>
                            <div class="row">
                                {{-- <div class="col-md-6">
                                    <h6>About</h6>
                                    <p>
                                        Web Designer, UI/UX Engineer
                                    </p>
                                    <h6>Hobbies</h6>
                                    <p>
                                        Indie music, skiing and hiking. I love the great outdoors.
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <h6>Recent badges</h6>
                                    <a href="javascript:void();" class="badge badge-dark badge-pill">html5</a>
                                    <a href="javascript:void();" class="badge badge-dark badge-pill">react</a>
                                    <a href="javascript:void();" class="badge badge-dark badge-pill">codeply</a>
                                    <a href="javascript:void();" class="badge badge-dark badge-pill">angularjs</a>
                                    <a href="javascript:void();" class="badge badge-dark badge-pill">css3</a>
                                    <a href="javascript:void();" class="badge badge-dark badge-pill">jquery</a>
                                    <a href="javascript:void();" class="badge badge-dark badge-pill">bootstrap</a>
                                    <a href="javascript:void();" class="badge badge-dark badge-pill">responsive-design</a>
                                    <hr>
                                    <span class="badge badge-primary"><i class="fa fa-user"></i> 900 Followers</span>
                                    <span class="badge badge-success"><i class="fa fa-cog"></i> 43 Forks</span>
                                    <span class="badge badge-danger"><i class="fa fa-eye"></i> 245 Views</span>
                                </div> --}}
                                <div class="col-md-12">
                                    {{-- <h5 class="mt-2 mb-3"><span class="fa fa-clock-o ion-clock float-right"></span> Recent
                                        Activity</h5> --}}
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <strong>First Name  </strong>
                                                    </td>
                                                    <td style="width: 3px" >:</td>
                                                    <td>{{ $user->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>Last Name  </strong>
                                                    </td>
                                                    <td style="width: 3px" >:</td>
                                                    <td>{{ $user->last_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>Email  </strong>
                                                    </td>
                                                    <td style="width: 3px" >:</td>
                                                    <td>{{ $user->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>Phone Number  </strong>
                                                    </td>
                                                    <td style="width: 3px" >:</td>
                                                    <td>{{ $user->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>Created At  </strong>
                                                    </td>
                                                    <td style="width: 3px" >:</td>
                                                    <td>{{ $user->created_at->format('d-M-Y h:i:s a').'   ( '. $user->created_at->diffForHumans().' )' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                        </div>
                        <div class="tab-pane" id="messages">
                            <div class="alert alert-info alert-dismissible d-none" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <div class="alert-icon">
                                    <i class="icon-info"></i>
                                </div>
                                <div class="alert-message">
                                    <span><strong>Info!</strong> Lorem Ipsum is simply dummy text.</span>
                                </div>
                            </div>
                            <div class="table-responsive d-none">
                                <table class="table table-hover table-striped">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="float-right font-weight-bold">3 hrs ago</span> Here is your a
                                                link to the latest summary report from the..
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="float-right font-weight-bold">Yesterday</span> There has been a
                                                request on your account since that was..
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="float-right font-weight-bold">9/10</span> Porttitor vitae
                                                ultrices quis, dapibus id dolor. Morbi venenatis lacinia rhoncus.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="float-right font-weight-bold">9/4</span> Vestibulum tincidunt
                                                ullamcorper eros eget luctus.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="float-right font-weight-bold">9/4</span> Maxamillion ais the
                                                fix for tibulum tincidunt ullamcorper eros.
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="edit">
                            <form action="{{ route('admin_user_profile_update') }}" class="profile_update_form" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">First name <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="name" value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Last name <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="last_name" value="{{ $user->last_name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="email" name="email" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Phone Number <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="phone" value="{{ $user->phone }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Change profile Pic <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input class="form-control" style="height: 43px;" name="photo" type="file">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Old Password <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" name="old_password" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Password <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" name="password" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Confirm password <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" name="confirm_password" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        {{-- <input type="reset" class="btn btn-secondary" value="Cancel"> --}}
                                        <input type="submit" class="btn btn-primary profile_update_btn" value="Save Changes">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
