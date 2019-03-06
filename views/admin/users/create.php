@extend('layouts/admin', ["title" => 'Add an account'])

    <br>

<h3>
    Add new account for CMS
</h3>
<hr>

    {!Form::open(route('admin.users.store'),['enctype'=>'multipart/form-data'])!}

    <div class="row">
        <div class="col-md-6">
            <div class="well">
                <div class="form-group{!!empty(errors('firstname'))?' has-error':''!}">
                    <label>First Name*</label>
                    {!Form::text('firstname',fields('firstname'),['class'=>'form-control'])!}
                    <i class="text-error">{!errors('firstname')!}</i>
                </div>

                <div class="form-group{!!empty(errors('lastname'))?' has-error':''!}">
                    <label>Last Name*</label>
                    {!Form::text('lastname',fields('lastname'),['class'=>'form-control'])!}
                    <i class="text-error">{!errors('lastname')!}</i>
                </div>

                <div class="form-group{!!empty(errors('email'))?' has-error':''!}">
                    <label>E-mail *</label>
                    {!Form::email('email',fields('email'),['class'=>'form-control','placeholder'=>'ex: johndoe@mail.dev'])!}
                    <i class="text-error">{!errors('email')!}</i>
                </div>

                <div class="form-group{!!empty(errors('number'))?' has-error':''!}">
                    <label>Number *</label>
                    {!Form::number('number',fields('number'),['class'=>'form-control','placeholder'=>'Format: 0000000000'])!}
                    <i class="text-error">{!errors('number')!}</i>
                </div>

                <div class="form-group{!!empty(errors('position'))?' has-error':''!}">
                    <label>Work/Role</label>
                    {!Form::text('position',fields('position'),['class'=>'form-control','placeholder'=>'ex: Employee, Project Manager, etc.'])!}
                    <i class="text-error">{!errors('position')!}</i>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="well">
                <div class="form-group{!!empty(errors('role'))?' has-error':''!}">
                    <label>Access Level *</label>
                    {!Form::select('role',fields('role'),[''=>'------','administrator'=>'Admin','Client'=>'Client'],['class'=>'form-control'])!}
                    <i class="text-error">{!errors('role')!}</i>
                </div>

                <div class="form-group{!!empty(errors('username'))?' has-error':''!}">
                    <label>Username *</label>
                    {!Form::text('username',fields('username'),['class'=>'form-control'])!}
                    <i class="text-error">{!errors('username')!}</i>
                </div>

                <div class="form-group{!!empty(errors('password'))?' has-error':''!}">
                    <label>Password *</label>
                    {!Form::password('password',fields('password'),['class'=>'form-control','placeholder'=>'At least 8 characters long'])!}
                    <i class="text-error">{!errors('password')!}</i>
                </div>

                <div class="form-group{!!empty(errors('confirm-password'))?' has-error':''!}">
                    <label>Confirm Password *</label>
                    {!Form::password('confirm-password',fields('confirm-password'),['class'=>'form-control'])!}
                    <i class="text-error">{!errors('confirm-password')!}</i>
                </div>

                <div class="form-group{!!empty(errors('avatar'))?' has-error':''!}">
                    <label>Choose Avatar</label>
                    {!Form::file('avatar',fields('avatar'),['class'=>'form-control'])!}
                    <i class="text-error">{!errors('avatar')!}</i>
                </div>
            </div>
        </div>
    </div>
    <hr>
    {!Session::getFlash('flash')!}
    <button class="btn btn-lg btn-primary pull-right">Submit >>></button>
    <br><br><br>
    {!Form::close()!}

@stop()