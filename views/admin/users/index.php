@extend('layouts/admin', ['title' => 'User Accounts', 'subheading' => 'All other accounts'])

    <div class="cms-ctrl">
        <button onclick="cms.fetch()"><img src="/cms/img/30px/refresh.png" class="img-responsive"> Refresh</button>
        {if Session::user()->role == 'superadmin'}
        <a class="info" href="{!route('admin.users.create')!}"><img src="/cms/img/30px/insert.png" class="img-responsive"> Create an Account</a>
        {endif}
    </div>

    <div id="ctr" data-url="{!route('admin.users.fetch')!}" class="well"></div>

@stop()