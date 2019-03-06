@extend('layouts/frontend', ['title' => 'PDS Data Entry'])
@import(\App\Models\PDS)

<nav aria-label="...">
    <ul class="pagination">
        <li class="active"><a href="/app/pds/create/1">1 <span class="sr-only">(current)</span></a></li>
        <li><a href="/app/pds/create/2">2 <span class="sr-only">(current)</span></a></li>
        <li><a href="/app/pds/create/3">3 <span class="sr-only">(current)</span></a></li>
        <li><a href="/app/pds/create/4">4 <span class="sr-only">(current)</span></a></li>
        <li><a href="/app/pds/create/5">5 <span class="sr-only">(current)</span></a></li>
    </ul>
</nav>

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="/app/pds/create/1">PERSONAL</a></li>
    <li><a href="/app/pds/create/2">EDUCATIONAL QUALIFICATIONS</a></li>
    <li><a href="/app/pds/create/3">EXPERIENCE AND LENGTH OF SERVICE</a></li>
    <li><a href="/app/pds/create/4">PROFESSIONAL DEVELOPMENT, ACHIEVEMENTS, AND HONORS</a></li>
    <li><a href="/app/pds/create/5">RESEARCH</a></li>
</ul>

<?php $pds = PDS::where('user_id', Session::get('client')->id); ?>
{if $pds->exists()}
    <?php $pds = $pds->first(); ?>
    {!Form::bind($pds,'/app/pds/store/1')!}
{else}
    {!Form::open('/app/pds/store/1')!}
{endif}

<br>
<br>
    <center>
        <h3>Personal Data Sheet</h3>
        {!Session::getFlash('flash')!}
        <hr>
    </center>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group{!!empty(errors('firstname'))?' has-error':''!}">
                <label>First name</label>
                {!Form::text('firstname',fields('firstname'),['class'=>'form-control'])!}
                <i class="text-error">{!errors('firstname')!}</i>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group{!!empty(errors('middlename'))?' has-error':''!}">
                <label>Middle name/initial</label>
                {!Form::text('middlename',fields('middlename'),['class'=>'form-control'])!}
                <i class="text-error">{!errors('middlename')!}</i>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group{!!empty(errors('lastname'))?' has-error':''!}">
                <label>Last name</label>
                {!Form::text('lastname',fields('lastname'),['class'=>'form-control'])!}
                <i class="text-error">{!errors('lastname')!}</i>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group{!!empty(errors('civil_status'))?' has-error':''!}">
                <label>Civil Status</label>
                {!Form::select('civil_status',null,['' =>
                '--------','single'=>'single','married'=>'married','widowed'=>'widowed','divorced'=>'divorced','separated'=>'separated'],
                ['class'=>'form-control'])!}
                <i class="text-error">{!errors('civil_status')!}</i>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group{!!empty(errors('dob'))?' has-error':''!}">
                <label>Date of Birth</label>
                {!Form::date('dob',fields('dob'),['class'=>'form-control'])!}
                <i class="text-error">{!errors('dob')!}</i>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group{!!empty(errors('home_address'))?' has-error':''!}">
                <label>Home address</label>
                {!Form::text('home_address',fields('home_address'),['class'=>'form-control'])!}
                <i class="text-error">{!errors('home_address')!}</i>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group{!!empty(errors('mailing_address'))?' has-error':''!}">
                <label>Mailing address</label>
                {!Form::text('mailing_address',fields('mailing_address'),['class'=>'form-control'])!}
                <i class="text-error">{!errors('mailing_address')!}</i>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group{!!empty(errors('telephone_number'))?' has-error':''!}">
                <label>Telephone number</label>
                {!Form::text('telephone_number',fields('telephone_number'),['class'=>'form-control'])!}
                <i class="text-error">{!errors('telephone_number')!}</i>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group{!!empty(errors('mobile_number'))?' has-error':''!}">
                <label>Mobile number</label>
                {!Form::text('mobile_number',fields('mobile_number'),['class'=>'form-control'])!}
                <i class="text-error">{!errors('mobile_number')!}</i>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group{!!empty(errors('college'))?' has-error':''!}">
                <label>College</label>
                {!Form::text('college',fields('college'),['class'=>'form-control'])!}
                <i class="text-error">{!errors('college')!}</i>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group{!!empty(errors('rank'))?' has-error':''!}">
                <label>Present Rank/Sub-rank</label>
                {!Form::select('rank',fields('rank'),['Instructor 1'=>'Instructor 1','Instructor 2'=>'Instructor 2','Instructor 3'=>'Instructor 3','Asst. Professor 1'=>'Asst. Professor 1','Asst. Professor 2'=>'Asst. Professor 2','Asst. Professor 3'=>'Asst. Professor 3','Asst. Professor 4'=>'Asst. Professor 4','Asso. Professor 1'=>'Asso. Professor 1','Asso. Professor 2'=>'Asso. Professor 2','Asso. Professor 3'=>'Asso. Professor 3','Asso. Professor 4'=>'Asso. Professor 4','Asso. Professor 5'=>'Asso. Professor 5','Professor 1'=>'Professor 1','Professor 2'=>'Professor 2','Professor 3'=>'Professor 3','Professor 4'=>'Professor 4','Professor 5'=>'Professor 5','Professor 6'=>'Professor 6','College/University Professor'=>'College/University Professor'],['class'=>'form-control'])!}
                <i class="text-error">{!errors('rank')!}</i>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group{!!empty(errors('department'))?' has-error':''!}">
                <label>Department</label>
                {!Form::text('department',fields('department'),['class'=>'form-control'])!}
                <i class="text-error">{!errors('department')!}</i>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group{!!empty(errors('appointment_status'))?' has-error':''!}">
                <label>Appointment Status</label>
                {!Form::text('appointment_status',fields('appointment_status'),['class'=>'form-control'])!}
                <i class="text-error">{!errors('appointment_status')!}</i>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group{!!empty(errors('last_appointment_date'))?' has-error':''!}">
                <label>Appointment Date</label>
                {!Form::date('last_appointment_date',fields('last_appointment_date'),['class'=>'form-control'])!}
                <i class="text-error">{!errors('last_appointment_date')!}</i>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group{!!empty(errors('date_submitted'))?' has-error':''!}">
                <label>Date Submitted</label>
                {!Form::date('date_submitted',fields('date_submitted'),['class'=>'form-control'])!}
                <i class="text-error">{!errors('date_submitted')!}</i>
            </div>
        </div>

        <div class="col-md-12">
            <hr>
            <center>
                <label for="confirm">
                    <input type="checkbox" id="confirm"
                           onchange="if(this.checked == true){document.querySelector('#i_confirm').removeAttribute('disabled')}else {document.querySelector('#i_confirm').setAttribute('disabled','disabled')}">
                    I hereby certify the correctness and accuracy of the
                    above-mentioned statements and facts.
                </label><br>
                <button disabled id="i_confirm" class="btn btn-success"><i class="fa fa-send"></i>
                    {if PDS::where('user_id', Session::get('client')->id)->exists()}
                    Update
                    {else}
                    Submit
                    {endif}
                </button>
            </center>
        </div>
    </div><!--row-->

{!Form::close()!}

@stop()