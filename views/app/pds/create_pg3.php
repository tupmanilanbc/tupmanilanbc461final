@extend('layouts/frontend', ['title' => 'PDS Data Entry'])
@import(\App\Models\PDS)

<nav aria-label="...">
    <ul class="pagination">
        <li><a href="/app/pds/create/1">1 <span class="sr-only">(current)</span></a></li>
        <li><a href="/app/pds/create/2">2 <span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="/app/pds/create/3">3 <span class="sr-only">(current)</span></a></li>
        <li><a href="/app/pds/create/4">4 <span class="sr-only">(current)</span></a></li>
        <li><a href="/app/pds/create/5">5 <span class="sr-only">(current)</span></a></li>
    </ul>
</nav>

<ul class="nav nav-tabs">
    <li><a href="/app/pds/create/1">PERSONAL</a></li>
    <li><a href="/app/pds/create/2">EDUCATIONAL QUALIFICATIONS</a></li>
    <li class="active"><a data-toggle="tab" href="/app/pds/create/3">EXPERIENCE AND LENGTH OF SERVICE</a></li>
    <li><a href="/app/pds/create/4">PROFESSIONAL DEVELOPMENT, ACHIEVEMENTS, AND HONORS</a></li>
    <li><a href="/app/pds/create/5">RESEARCH</a></li>
</ul>

<center>
    <h3>2.0 EXPERIENCE AND LENGTH OF SERVICE</h3>
    <hr>
</center>
<h5>2.1 Service Record (includes full-time teaching, research, extension service, administrative experience, and
    industrial experience)
</h5>
<div class="well">
    <form class="multi-fields" data-post-route="/app/pds/ajax" data-db-model="ServiceRecord"
          onsubmit="return false;">
        <div class="row">
            <div class="col-md-12"><br>
                <label>Inclusive Dates</label>
                <input type="date" name="inclusive_dates" class="form-control" required>
            </div>
            <div class="col-md-12"><br>
                <label>Position Held</label>
                <input type="text" name="position_held" class="form-control" required>
            </div>
            <div class="col-md-12"><br>
                <label>Institution</label>
                <input type="text" name="institution" class="form-control" required>
            </div>
            <div class="col-md-12"><br>
                <label>Address</label>
                <input type="text" name="address" class="form-control" required>
            </div>
        </div>
        <br>
        <center>
            <p data-binding="flash"></p>
            <a data-binding="clear-fields" class="btn btn-warning">Clear</a>
            <button data-binding="save-data" class="btn btn-primary">Save</button>
        </center>
    </form>
</div>

@stop(['scripts' => js('/js/pds.js')])