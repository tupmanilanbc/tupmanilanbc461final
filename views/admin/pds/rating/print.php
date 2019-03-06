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

<hr>
<div class="well">
    <?php
    $pds = \App\Models\PDS::where('user_id', $rating->user_id)->first();
    ?>

    <div class="well nsh" style="border: 1px solid #E1E1E1">
        <h4 class="pull-left nothing text-uppercase bold">{{$pds->lastname}}, {{$pds->firstname}}
            {{$pds->middlename}}</h4>
        <h5 class="nothing bold pull-right text-uppercase">TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES</h5>
        <div class="clearfix"></div>
    </div>

    <table class="table table-condensed">
        <tr>
            <th>Section/Description</th>
            <th>Points <br>Earned</th>
            <th>Max.<br>Points</th>
            <th>*Points to<br> &nbsp; &nbsp; earn</th>
        </tr>
        <tr>
            <td>1. EDUCATIONAL QUALIFICATION</td>
            <td><b>{{$rating->rate_educ_qual}}</b></td>
            <td><b>85</b></td>
            <td><b>{{85 - $rating->rate_educ_qual}}</b></td>
        </tr>

        <tr>
            <td>2. EXPERIENCE & LENGTH OF SERVICE</td>
            <td><b>{{$rating->rate_exp_length}}</b></td>
            <td><b>25</b></td>
            <td><b>{{25 - $rating->rate_exp_length}}</b></td>
        </tr>
        <tr>
            <td>3. PROFESSIONAL ACHIEVEMENT & HONORS</td>
            <td><b>{{$rating->rate_prof_honors}}</b></td>
            <td><b>90</b></td>
            <td><b>{{90 - $rating->rate_prof_honors}}</b></td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3-1. Discoveries, Patented inventions, innovations, published books,
                etc
            </td>
            <td>{{$rating->rate_discoveries}}</td>
            <td><b>30</b></td>
            <td>{{30 - $rating->rate_discoveries}}</td>
        </tr>

        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3-2. Expert services, training and active participation in
                professional/technical activities
            </td>
            <td>{{$rating->rate_expert_svcs}}</td>
            <td><b>30</b></td>
            <td>{{30 - $rating->rate_expert_svcs}}</td>
        </tr>

        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3-2-1 Trainings and Seminars</td>
            <td>{{$rating->rate_membership}}</td>
            <td><b>10</b></td>
            <td>{{10 - $rating->rate_membership}}</td>
        </tr>

        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3-2-2 Expert services rendered</td>
            <td>{{$rating->rate_expert_svcs}}</td>
            <td><b>20</b></td>
            <td>{{20 - $rating->rate_expert_svcs}}</td>
        </tr>

        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3-3. Membership in Professional organization/honor societies and
                honors received
            </td>
            <td>{{$rating->rate_membership}}</td>
            <td><b>10</b></td>
            <td>{{10 - $rating->rate_membership}}</td>
        </tr>

        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3-4. Awards of distinction received</td>
            <td>{{$rating->rate_awards}}</td>
            <td></td>
            <td>{{$rating->rate_awards}}</td>
        </tr>

        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3-5. Community Outreach</td>
            <td>{{$rating->rate_comm_outreach}}</td>
            <td><b>5</b></td>
            <td>{{5 - $rating->rate_comm_outreach}}</td>
        </tr>

        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3-6. Professional Examination</td>
            <td>{{$rating->rate_prof_exam}}</td>
            <td><b>10</b></td>
            <td>{{10 - $rating->rate_prof_exam}}</td>
        </tr>

        <tr>
            <td><h4>TOTAL POINTS: </h4></td>
            <td><h4><b>{{$rating->rate_educ_qual + $rating->rate_exp_length + $rating->rate_prof_honors}}</b></h4></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <hr>
    <hr style="position:relative;top: -13px">
    <h5 class="npm"><i>* Highest possible points that can still be earned on each section/sub-section.</i></h5>

    <br>
    <br>
    <br>
    <br>

    <center>
        <h5>CERTIFIED TRUE AND CORRECT AS OF {{$rating->date_certified}}<br><br><br>
            FELIPE RONALD M. ARGAMOSA <br>
            DIRECTOR, PASUC ZONAL EVALUATION AND COMPUTERIZATION CENTER <br>
            NATIONAL CAPITAL REGION
        </h5>
    </center>


</div><!--WELL-->

<script>
    window.onload = function() {
        window.print();
    }
</script>

</body>
</html>