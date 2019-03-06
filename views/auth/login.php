<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login &mdash; {{ APP_NAME }} </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/core.css">
</head>
<body  style="background-image: url({{'../img/tupmanila.jpeg'}}) ; background-repeat: no-repeat; background-size: cover;  background-position: center;">
<div class="wrap" style="background-color: rgba(46,50,50,0.83);height: 700px;">
    <div class="container">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <br>
            <br>
            <div class="well nsh">
                {!Form::open(route('auth.attempt'))!}
                <h3 class="help-block text-center"><b>Sign In</b></h3>
                <center><img id="image" height="100" src="/img/tuplogo.png"/></center>
                <hr>
                <div class="form-group{{!empty(errors('username')) ? ' has-error':''}}">
                    {!Form::text('username',fields('username'),['class'=>'form-control','placeholder'=>'Username:'])!}
                    <i class="text-danger">{{errors('username')}}</i>
                </div>
                <div class="form-group{{!empty(errors('password')) ? ' has-error':''}}">
                    {!Form::password('password',null,['class'=>'form-control','placeholder'=>'Password:'])!}
                    <i class="text-danger">{{errors('password')}}</i>
                </div>
                <i class="has-error">{!Session::getFlash('flash')!}</i>

                <a href="/register">Don't have an account yet? Sign Up</a><br><br>
                <button type="submit" class="btn btn-success" style="width: 100%;"><i
                            class="glyphicon glyphicon-log-in"></i> Login
                </button>
                {!Form::close()!}
            </div>
            <br>
            <p class="text-center underline"><a href="/">© 2019 TUP Manila Web-based NBC 461<br>
                    All rights reserved.
                </a></p>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

</body>
</html>