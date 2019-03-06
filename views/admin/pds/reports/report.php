@extend('layouts/admin', ['title' => 'PDS Record'])
@import(App\Models\User)
@import(App\Models\Rating)

<h3><i class="fa fa-newspaper-o"></i> Generate a report <br>
    <small>Create a report from evaluations within 30-day period.</small>
</h3>

<div class="well">
    {if empty(Rating::get())}

        <h3>
            There's nothing yet to display here, once a a faculty member added their information, and<br>
            you have already evaluated one's personal information, it will be available here.
        </h3>

    {else}

    <center>
        <h5>
            TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES <br>
            SEVENTH EVALUATION (NBC 461) - FINAL DRAFT <br>
            CUT-OFF DATE: {{date('F')}} 30, {{date('Y')}}
        </h5>
    </center>

    <table class="table table-bordered">
        <tr>
            <th>NO.</th>
            <th>NAME OF INCUMBENT</th>
            <th>SUC CODE</th>
            <th>PRESENT RANK</th>
            <th>Educ. Qual</th>
            <th>Acad. Exp</th>
            <th>Prof. Achiev.</th>
            <th>CCE Pts</th>
            <th>QCE Pts</th>
            <th>RANK</th>
        </tr>

        {foreach $pds as $data}

        <?php $user = User::find($data->user_id); ?>
        <?php
        $prev = Rating::where('user_id', $data->user_id)->order('id','asc')->limit(2)->get();
        if(!isset($prev[1])) {
            $qce = $prev[0]->rate_educ_qual + $prev[0]->rate_exp_length + $prev[0]->rate_prof_honors;
        } else {
            $qce = $prev[1]->rate_educ_qual + $prev[1]->rate_exp_length + $prev[1]->rate_prof_honors;
        }

        if ($qce <= 65) {
            $qcepts = 0;
        }
        elseif ($qce >= 66 && $qce <= 76 ) {
            $qcepts = 80;
        }
        elseif ($qce >= 77 && $qce <= 87 ) {
            $qcepts = 82;
        }
        elseif ($qce >= 88 && $qce <= 96 ) {
            $qcepts = 84;
        }
        elseif ($qce >= 97 && $qce <= 105 ) {
            $qcepts = 86;
        }
        elseif ($qce >= 106 && $qce <= 114 ) {
            $qcepts = 88;
        }
        elseif ($qce >= 115 && $qce <= 123 ) {
            $qcepts = 90;
        }
        elseif ($qce >= 124 && $qce <= 130 ) {
            $qcepts = 91;
        }
        elseif ($qce >= 131 && $qce <= 137 ) {
            $qcepts = 92;
        }
        elseif ($qce >= 138 && $qce <= 144 ) {
            $qcepts = 93;
        }
        elseif ($qce >= 145 && $qce <= 151 ) {
            $qcepts = 94;
        }
        elseif ($qce >= 152 && $qce <= 158 ) {
            $qcepts = 95;
        }
        elseif ($qce >= 159 && $qce <= 164 ) {
            $qcepts = 61;
        }
        elseif ($qce >= 165 && $qce <= 170 ) {
            $qcepts = 66;
        }
        elseif ($qce >= 171 && $qce <= 176 ) {
            $qcepts = 71;
        }
        elseif ($qce >= 177 && $qce <= 182 ) {
            $qcepts = 76;
        }
        elseif ($qce >= 183 && $qce <= 188 ) {
            $qcepts = 81;
        }
        elseif ($qce >= 189 && $qce <= 194 ) {
            $qcepts = 86;
        }
        elseif ($qce >= 195 && $qce <= 200 ) {
            $qcepts = 91;
        }

        ?>

        <tr>
            <td>{{$user->id}}</td>
            <td class="uppercase">{{$data->lastname}}, {{$data->firstname}} {{$data->middlename}}</td>
            <td>21</td>
            <td>{{$prev[0]->new_rank}}</td>
            <td>{{isset($prev[1]->rate_educ_qual)?$prev[1]->rate_educ_qual:$prev[0]->rate_educ_qual}}</td>
            <td>{{isset($prev[1]->rate_exp_length)?$prev[1]->rate_exp_length:$prev[0]->rate_exp_length}}</td>
            <td>{{isset($prev[1]->rate_prof_honors)?$prev[1]->rate_prof_honors:$prev[0]->rate_prof_honors}}</td>
            <td>{{$qce}}</td>
            <td>{{$qcepts}}</td>
            <td>{{$data->rank}}</td>
        </tr>

        {endforeach}

    </table>
    {endif}
</div>

@stop()