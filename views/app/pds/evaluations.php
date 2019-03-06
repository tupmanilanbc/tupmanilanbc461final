@extend('layouts/frontend', ['title' => 'PDS Overview'])
@import(App\Models\PDS)
@import(App\Models\User)
@import(App\Models\Rating)


<h3><i class="fa fa-newspaper-o"></i> My Evaluations <br>
    <small>Information listed here are evaluations based from your qualifying scores you've given.</small>
</h3>
<hr>

<?php
$ratings = Rating::where('user_id', Session::get('client')->id)
    ->order('id','desc')
    ->get();
?>

<div class="well">
    <table class="table table-striped">
        <tr>
            <th>Date of Evaluation</th>
            <th>Evaluated by</th>
            <th>Total Points</th>
            <th>New Rank</th>
            <th>Manage</th>
        </tr>

        {foreach $ratings as $rating}
        <?php $evaluator = User::find($rating->evaluator_id) ?>
        <tr>
            <td>{{$rating->date_certified}}</td>
            <td>{{$evaluator->firstname}} {{$evaluator->middlename}} {{$evaluator->lastname}}</td>
            <td>{{$rating->rate_educ_qual + $rating->rate_exp_length + $rating->rate_prof_honors}}</td>
            <td>{{$rating->new_rank}}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="/app/pds/evaluations/{{$rating->id}}">View <i class="fa fa-eye"></i></a>
                <a class="btn btn-sm btn-info" href="/app/pds/evaluations/print/{{$rating->id}}">Print <i class="fa fa-print"></i></a>
            </td>
        </tr>
        {endforeach}
    </table>
</div>

@stop()