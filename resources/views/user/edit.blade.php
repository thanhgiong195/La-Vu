@extends('layouts.master')
@section('title', 'Profile')

@section('content')

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('auth.editProfile') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row f-avatar">
                            <img src="<?php echo asset("storage/image/user.png")?>" alt="avatar" id="myAvatar">
                        <label class="txt-change">{{ __('auth.changeAvatar') }}</label>
                            <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp" accept="image/gif, image/jpeg, image/png" onchange="readURL(this);" style="opacity:0">
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('auth.name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('auth.email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  value="{{ $user->email }}" required>
                            </div>
                        </div>

                        <div>
                          <p onclick="showChangePass()" style="font-size: 14px">{{ __('auth.changePass') }}</p>
                        </div>

                        <div class="form-group row d-none passw">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('auth.password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                            </div>
                        </div>

                        <div class="form-group row d-none passw">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('auth.passwordCf') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('base.update')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
        $('#myAvatar')
            .attr('src', e.target.result)
            .width(150)
            .height(150);
        };

        reader.readAsDataURL(input.files[0]);
    }
  }

  function showChangePass() {
    $('.passw').toggleClass('d-none');
  }

  $("#myAvatar").click(function () {
    $("#avatarFile").trigger('click');
  });

  $(".txt-change").click(function () {
    $("#avatarFile").trigger('click');
  });
</script>

<style>
  #myAvatar {
    width:150px;
    height:150px;
    margin:auto;
    background-color: antiquewhite;
    border-radius: 50%;
  }

  #myAvatar:hover {
    cursor: pointer;
  }

  .f-avatar {
    position: relative;
  }

  .f-avatar:hover .txt-change {
    opacity: 1;
  }

  .txt-change {
    cursor: pointer;
    opacity: 0;
    position: absolute;
    left: 50%;
    bottom: 40px;
    transform: translateX(-50%);
    color: #fff;
    background-color: cornflowerblue;
    border-radius: 10px;
    font-size: 11px;
    padding: 0 6px;
    transition: 0.3s all;
  }
</style>
@endsection