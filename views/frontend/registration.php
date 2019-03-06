<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login &mdash; {{ APP_NAME }} </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/core.css">
    <link rel="stylesheet" href="/css/fontawesome.css">
</head>
<body>

{!Form::open('/register/store')!}

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <center>
                <h3>Sign Up <br>
                    <small>Register and update your personal information.</small>
                </h3>
            </center>
            <div class="well">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{!!empty(errors('firstname'))?' has-error':''!}">
                            <label>First Name</label>
                            {!Form::text('firstname', null, ['class'=>'form-control','required'=>'required'])!}
                            <i class="text-error">{!errors('firstname')!}</i>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{!!empty(errors('lastname'))?' has-error':''!}">
                            <label>Last Name</label>
                            {!Form::text('lastname', null, ['class'=>'form-control','required'=>'required'])!}
                            <i class="text-error">{!errors('lastname')!}</i>
                        </div>
                    </div>
                </div>

                <div class="form-group{!!empty(errors('email'))?' has-error':''!}">
                    <label>Email</label>
                    {!Form::email('email', null, ['class'=>'form-control','required'=>'required'])!}
                    <i class="text-error">{!errors('email')!}</i>
                </div>

                <div class="form-group{!!empty(errors('department'))?' has-error':''!}">
                    <label>Department</label>
                    {!Form::text('department', null, ['class'=>'form-control','required'=>'required'])!}
                    <i class="text-error">{!errors('department')!}</i>
                </div>

                <div class="form-group{!!empty(errors('username'))?' has-error':''!}">
                    <label>Username</label>
                    {!Form::text('username', null, ['class'=>'form-control','required'=>'required'])!}
                    <i class="text-error">{!errors('username')!}</i>
                </div>

                <div class="form-group{!!empty(errors('password'))?' has-error':''!}">
                    <label>Password</label>
                    {!Form::password('password', null, ['class'=>'form-control','required'=>'required'])!}
                    <i class="text-error">{!errors('password')!}</i>
                </div>

                <div class="form-group{!!empty(errors('confirm-password'))?' has-error':''!}">
                    <label>Confirm Password</label>
                    {!Form::password('confirm-password', null, ['class'=>'form-control','required'=>'required'])!}
                    <i class="text-error">{!errors('confirm-password')!}</i>
                </div>

                {!Session::getFlash('flash')!}
                <button class="expand btn btn-success btn-lg"><i class="fa fa-sign-in"></i> Submit</button>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <center><a href="/"><i class="fa fa-arrow-left"></i> Take me home</a></center>
        </div>
    </div>
</div>

{!Form::close()!}


</body>
</html>