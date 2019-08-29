@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container-fluid main" style="height:50vh;">
            <div class="row align-items-center" style="height:100%">

                <div class="col-md-9">

                    <div class="container content">

                        <h2 class="mt-5 mb-5" style=" font-weight: bolder; color: #898dbf;">پروفایل</h2>

                        <hr>

                        <div class="row" style="height:100%">
                            <div class="col-sm-2">
                                <div class="card">
                                    <div class="card-body">

                                        <img src="/upload/avatar/{{$user->avatar}}"
                                             style="height:80px; width:80px; float:left; border-radius:50%; margin-right: 25%; margin-top: 10%;">

                                        <br>

                                        @if(auth()->user() and  $user->id==auth()->id())

                                            @if(auth()->user()->avatar=='default.jpg')
                                                <form enctype="multipart/form-data"
                                                      action="{{route('member.avatar_upload')}}" method="post">
                                                    @csrf
                                                    <input type="file" name="avatar">
                                                    <button type="submit" class="btn btn-sm btn-primary"
                                                            style="color:white;font-weight:600">submit
                                                    </button>
                                                </form>
                                            @endif

                                            @if($user->avatar!='default.jpg')

                                                <form action="{{route('member.avatar_delete', $user->id)}}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn-sm btn-danger label" type="submit">Delete Photo
                                                    </button>
                                                </form>

                                            @endif

                                        @endif


                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <form  action="" method="post"  enctype="multipart/form-data">
                                    @csrf
                                    <p>اپلود صدا</p>
                                    <input type="file" name="sabk_id">
                                    <input type="text" name="title">

                                    <button type="submit" class="btn btn-sm btn-primary"
                                            style="color:white;font-weight:600">submit
                                    </button>

                                </form>
                            </div>
                            <div class="col-sm-6">
                                <div class="container">

                                    <form class="abc" action="{{route('member.store',$user->id)}}" method="post">
                                        @csrf

                                        <div class="form-group">

                                            <label for=fullName>نام</label>

                                            <input type="text" class="form-control" name="name" placeholder="Name"
                                                   value="{{ old('name') ?? $user->name }}" required>
                                            <span class=" text-primary">نام</span>

                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="control-label col-sm-2">پسورد</label>

                                            <input type="password" class="form-control" name="password" id="password"
                                                   placeholder="Password">
                                            <span class=" text-primary">پسورد</span>

                                        </div>
                                        <div class="form-group ">

                                            <label for=patogh>هیئت محل</label>
                                            <input class="form-control" name="patogh"
                                                   value="{{old('patogh') ?? $user->patogh}} ">
                                            <span class="text-primary">هیئت محل</span>


                                        </div>
                                        <div class="form-group ">

                                            <label for=bio>بیو</label>
                                            <textarea type="text" class="form-control" name="bio"
                                                      value="{{old('bio') ?? $user->bio}} ">
                                            </textarea>
                                            <span class="text-primary">بیو</span>


                                        </div>
                                        <div class="form-group ">

                                            <label for=language_singer>language_singer</label>
                                            <input type="text" class="form-control" name="language_singer"
                                                   value="{{old('language_singer') ?? $user->language_singer}} ">
                                            <span class="text-primary">language_singer</span>


                                        </div>
                                        <div class="form-group ">

                                            <label for=birthday>تولد</label>
                                            <input type="date" class="form-control" name="birthday"
                                                   value="{{old('birthday') ?? $user->birthday}} ">
                                            <span class="text-primary">تاریخ تولد</span>


                                        </div>
                                        <div class="form-group">

                                            <label for=extra_art>extra_art</label>

                                            <input type="text" class="form-control" name="extra_art"
                                                   placeholder="extra_art"
                                                   value="{{ old('extra_art') ?? $user->extra_art }}">
                                            <span class="text-primary">extra_art</span>


                                        </div>


                                        <div class="row mt-5">

                                            <div class="col">

                                                <button type="submit" class="btn btn-primary btn-block">Save Changes
                                                </button>

                                            </div>

                                    </form>


                                    <div class="col">
                                        <form action="{{ route('member.destroy', $user->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"
                                                    onclick="return confirm('مطمعنید ک میخواهید دلیت کنیند؟')">
                                                Delete Account
                                            </button>
                                        </form>

                                    </div>


                                </div>


                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


@endsection
