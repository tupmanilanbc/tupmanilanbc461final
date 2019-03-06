@extend('layouts/admin', ['title' => 'Uploaded Documents'])

<div class="cms-ctrl">
    <button onclick="cms.fetch()"><img src="/cms/img/30px/refresh.png" class="img-responsive"> Refresh</button>
    <a class="info" href="/app/docs/upload"><img src="/cms/img/30px/upload.png" class="img-responsive"> Upload Files</a>
</div>

<div id="ctr" data-url="/admin/docs/fetch" class="well"></div>

@stop()