@extend('layouts/frontend', ['title' => 'PDS Data Entry'])
@import(\App\Models\EducationalAttainment)
@import(\App\Models\AdditionalCredits)

<nav aria-label="...">
    <ul class="pagination">
        <li><a href="/app/pds/create/1">1 <span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="/app/pds/create/2">2 <span class="sr-only">(current)</span></a></li>
        <li><a href="/app/pds/create/3">3 <span class="sr-only">(current)</span></a></li>
        <li><a href="/app/pds/create/4">4 <span class="sr-only">(current)</span></a></li>
        <li><a href="/app/pds/create/5">5 <span class="sr-only">(current)</span></a></li>
    </ul>
</nav>

<ul class="nav nav-tabs">
    <li><a href="/app/pds/create/1">PERSONAL</a></li>
    <li class="active"><a data-toggle="tab" href="/app/pds/create/2">EDUCATIONAL QUALIFICATIONS</a></li>
    <li><a href="/app/pds/create/3">EXPERIENCE AND LENGTH OF SERVICE</a></li>
    <li><a href="/app/pds/create/4">PROFESSIONAL DEVELOPMENT, ACHIEVEMENTS, AND HONORS</a></li>
    <li><a href="/app/pds/create/5">RESEARCH</a></li>
</ul>

<center>
    <h3>1.0 EDUCATIONAL QUALIFICATIONS</h3>
    <hr>
</center>
<h5>1.1 Highest relevant academic degree or educational attainment and additional equivalent degree
    earned related to the present position
</h5>
<div class="well">
    <form class="multi-fields" data-post-route="/app/pds/ajax" data-db-model="EducationalAttainment"
          onsubmit="return false;">
        <div class="row">
            <div class="col-md-3">
                <label>Degree Earned</label>
                <input type="text" name="degree_earned" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label>Specialization</label>
                <input type="text" name="specialization" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label>Institution</label>
                <input type="text" name="institution" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label>Year obtained</label>
                <input type="text" name="year_obtained" class="form-control" required>
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


<br>
<hr><br>


<h5>1.2 Additional credits earned towards an appropriate higher degree</h5>
<div class="well">
    <form class="multi-fields" data-post-route="/app/pds/ajax" data-db-model="AdditionalCredits"
          onsubmit="return false;">
        <div class="row">
            <div class="col-md-4">
                <label>Baccalaureate</label>
                <input type="text" name="baccalaureate" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label>Master's</label>
                <input type="text" name="masters" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label>Doctoral</label>
                <input type="text" name="doctoral" class="form-control" required>
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