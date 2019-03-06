<?php
use App\Models\User;
use App\Models\Log;
class ActivityCtrl extends Auth
{
    /**
     * Media Index
     *
     * @return view
     */
    public function index()
    {
        return render('admin/logs/index');
    }



    /**
     * Media Index
     *
     * @return view
     */
    public function fetch()
    {
        $logs = Log::order('id', 'desc')->get();

        print("
        <table class='table table-responsive table-striped table-bordered' id='table'>
            <thead>
            <tr>
                <td>ID</td>
                <td>Description</td>
                <td>Content</td>
                <td>Date / Time</td>
            </tr>
            </thead>
            <tbody>
        ");

        foreach ($logs as $log):
            $user = User::find($log->user_id)->pull('username');
            $date = date('F j, Y', $log->created) . ' at ' . date('h:i A', $log->created);

            print("
            <tr>
                <td>$log->id</td>
                <td>$log->description</td>
                <td>[$user] $log->content</td>
                <td>$date</td>
            </tr>");
        endforeach;

        print ("</tbody></table>");
    }

}