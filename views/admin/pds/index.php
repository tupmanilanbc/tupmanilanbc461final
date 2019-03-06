@extend('layouts/admin', ['title' => 'PDS Record'])

<h4><i class="fa fa-database"></i> Personal Data Sheet <br>
    <small>All in here are members who filled out their information.</small>
</h4>

<div class="cms-ctrl">
    <button onclick="cms.fetch()"><img src="/cms/img/30px/refresh.png" class="img-responsive"> Refresh</button>
    <a href="/admin/pds/report"><img src="/cms/img/30px/insert.png" class="img-responsive"> Create a report...</a>
</div>

<div id="ctr" data-url="{!route('admin.pds.fetch')!}" class="well pd05"></div>

@stop()