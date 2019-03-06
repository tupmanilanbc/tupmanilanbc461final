@extend('layouts/admin', ['title' => 'Activity Logs'])

    <div class="cms-ctrl">
        <button onclick="cms.fetch()"><img src="/cms/img/30px/refresh.png" class="img-responsive"> Refresh</button>
    </div>

    <div id="ctr" data-url="/admin/activity/fetch" class="well"></div>

@stop()