<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personal Data Sheet</title>
    <link rel="stylesheet" href="/css/core.css">
</head>
<body>

@import(App\Models\PDS)
@import(App\Models\User)
@import(App\Models\Rating)

<div class="pd50">
    <?php
    $pds = \App\Models\PDS::where('user_id', $rating->user_id)->first();
    $prevRating = Rating::where('user_id', $rating->user_id)->limit(2)->order('id','asc')->get();
    if (count($prevRating) <= 1) {
        @$prevRating[1]->rate_educ_qual = 0;
        @$prevRating[1]->rate_exp_length = 0;
        @$prevRating[1]->rate_prof_honors = 0;
    }
    // $prevRating[0] = a record before last
    // $prevRating[1] = the very last record
    ?>

    <div class="pull-left">
        <h5>Reproduced by HRMO, TUP-Manila <br>
            <small>
                {{Date('M Y')}}<br>
                For NBC 461 (7<sup>th</sup> Cycle Evaluation) <br>
                for the period March 1, 2013 - April - 30, 2019
            </small>
        </h5>

    </div>
    <div class="clearfix"></div>

    <center>
        <h4 class="nothing bold text-uppercase">TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES <br>
            <small>Ayala Boulevard, Ermita, Manila</small>
        </h4>
    </center>

    <br>
    <br>

    <div class="row">
        <div class="col-md-2">
            <h5>Name of Faculty: </h5>
        </div>
        <div class="col-md-4">
            <input style="font-size: 14px;" class="underlined-input" disabled value="{{$pds->lastname}}, {{$pds->firstname}} {{$pds->middlename}}."></input>
        </div>
        <div class="col-md-2">
            <h5>College/Campus: </h5>
        </div>
        <div class="col-md-4">
            <input style="font-size: 14px;" class="underlined-input" disabled value="{{$pds->college}}"></input>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-2">
            <h5>Present Rank: </h5>
        </div>
        <div class="col-md-4">
            <input style="font-size: 14px;" class="underlined-input" disabled value="{{$pds->rank}}"></input>
        </div>
        <div class="col-md-2">
            <h5>Department: </h5>
        </div>
        <div class="col-md-4">
            <input style="font-size: 14px;" class="underlined-input" disabled value="{{$pds->department}}"></input>
        </div>
    </div>

    <br>

    <center>
        <h4 class="bold text-uppercase">
            PASUC Common Criteria For Evaluation of Faculty <br>NBC 461
        </h4>

        <br><br><br>

        <h5 class="bold">SUMMARY OF POINTS</h5>
    </center>

    <table class="table table-bordered">
        <tr>
            <th>Major Components</th>
            <th>Maximum Points</th>
            <th>Previous Points as of {{!empty($prevRating[0]->date_certified)?$prevRating[0]->date_certified:date('Y-m-d',$rating->created)}}</th>
            <th>Additional Points as of {{!empty($prevRating[1]->date_certified)?$prevRating[1]->date_certified:date('Y-m-d',$rating->created)}}</th>
            <th>Total</th>
        </tr>
        <tr>
            <td>1.0 Educational Qualification</td>
            <td><b>85</b></td>
            <td><b>{{!empty($prevRating[0]->rate_educ_qual)?$prevRating[0]->rate_educ_qual:0}}</b></td>
            <td><b>{{!empty($prevRating[1]->rate_educ_qual)?$prevRating[1]->rate_educ_qual:0}}</b></td>
            <td>{{!empty($prevRating[0]->rate_educ_qual)? $prevRating[1]->rate_educ_qual + $prevRating[0]->rate_educ_qual:$prevRating[1]->rate_educ_qual}}</td>
        </tr>

        <tr>
            <td>2.0 Experience and Length of Service</td>
            <td><b>25</b></td>
            <td>{{!empty($prevRating[0]->rate_exp_length)?$prevRating[0]->rate_exp_length:0}}</td>
            <td>{{!empty($prevRating[1]->rate_exp_length)?$prevRating[1]->rate_exp_length:0}}</td>
            <td>{{!empty($prevRating[0]->rate_exp_length)? $prevRating[1]->rate_exp_length + $prevRating[0]->rate_exp_length:$prevRating[1]->rate_exp_length}}</td>
        </tr>
        <tr>
            <td>3.0 Professional Development Achievement and Honors</td>
            <td><b>90</b></td>
            <td>{{!empty($prevRating[0]->rate_prof_honors)?$prevRating[0]->rate_prof_honors:0}}</td>
            <td>{{!empty($prevRating[1]->rate_prof_honors)?$prevRating[1]->rate_prof_honors:0}}</td>
            <td>{{!empty($prevRating[0]->rate_prof_honors)? $prevRating[1]->rate_prof_honors + $prevRating[0]->rate_prof_honors:$prevRating[1]->rate_prof_honors}}</td>
        </tr>
        <tr>
            <td>TOTAL</td>
            <td></td>
            <td>{{$prevRating[0]->rate_educ_qual + $prevRating[0]->rate_exp_length + $prevRating[0]->rate_prof_honors}}</td>
            <td>{{$prevRating[1]->rate_educ_qual + $prevRating[1]->rate_exp_length + $prevRating[1]->rate_prof_honors}}</td>
            <td>{{$prevRating[0]->rate_educ_qual + $prevRating[0]->rate_exp_length + $prevRating[0]->rate_prof_honors + $prevRating[1]->rate_educ_qual + $prevRating[1]->rate_exp_length + $prevRating[1]->rate_prof_honors}}</td>
        </tr>

    </table>

    <br>
    <br>
    <br>

    <div class="row">
        <div class="col-md-5">
            <h5>Local Evaluation Committee:</h5>
            <br>
            <br>
            <input type="text" disabled class="underlined-input">
            <center><h5>Chairman</h5></center>
            <br><br>
            <center>
                <h5>Members</h5>
            </center>
            <input type="text" disabled class="underlined-input"><br><br>
            <input type="text" disabled class="underlined-input"><br><br>
            <input type="text" disabled class="underlined-input"><br><br>
            <input type="text" disabled class="underlined-input">
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-5">
            <h5>Review Committee:</h5>
            <br>
            <br>
            <input type="text" disabled class="underlined-input">
            <center><h5>Chairman</h5></center>
            <br><br>
            <center>
                <h5>Members</h5>
            </center>
            <input type="text" disabled class="underlined-input"><br><br>
            <input type="text" disabled class="underlined-input"><br><br>
            <input type="text" disabled class="underlined-input"><br><br>
            <input type="text" disabled class="underlined-input">
        </div>
    </div>

</div><!--WELL-->


<style>
    .underlined-input {
        background: white;
        width: 100%;
        border: none;
        border-bottom: 1px solid #414141;
        text-align: center;
        margin-top: 0px;
    }
</style>


<script>
    window.onload = function() {
        window.print();
    }
</script>

</body>
</html>