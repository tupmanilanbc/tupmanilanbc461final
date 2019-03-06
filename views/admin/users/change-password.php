@extend('layouts/admin', ["title" => 'Setup a new password', 'subheading' => 'Setup a new password for my account'])

    {!Form::bind($user,route('admin.users.savePass'),['enctype'=>'multipart/form-data'])!}
    {!Form::hidden('id')!}

    <a href="{!route('admin.users.edit')!}" class="btn btn-sm btn-success">Edit my info</a>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="well">
                <div class="form-group{!!empty(errors('new-password'))?' has-error':''!}">
                    <label>Enter new Password *</label>
                    {!Form::password('new-password',fields('new-password'),['class'=>'form-control'])!}
                    <i class="text-error">{!errors('new-password')!}</i>
                </div>

                <div class="form-group{!!empty(errors('confirm-password'))?' has-error':''!}">
                    <label>Confirm new Password *</label>
                    {!Form::password('confirm-password',fields('confirm-password'),['class'=>'form-control'])!}
                    <i class="text-error">{!errors('confirm-password')!}</i>
                </div>

                <hr>

                <div class="form-group{!!empty(errors('current-password'))?' has-error':''!}">
                    <label>Enter Current Password to save changes *</label>
                    {!Form::password('current-password',fields('current-password'),['class'=>'form-control'])!}
                    <i class="text-error">{!errors('current-password')!}</i>
                </div>
            </div>
        </div>

        <div class="col-md-6"></div>
    </div>
    <hr>
    {!Session::getFlash('flash')!}
    <button class="btn btn-lg btn-primary pull-right">Submit >>></button>
    <br><br><br>
    {!Form::close()!}

@stop()