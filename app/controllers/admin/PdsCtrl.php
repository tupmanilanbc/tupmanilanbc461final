<?php

/**
 * Default controller
 * Class HomeController
 */

use App\Models\Log;
use App\Models\PDS;
use App\Models\User;
use App\Models\Media;
use App\Models\AcademicHonors;
use App\Models\Accreditations;
use App\Models\Achievements;
use App\Models\AdditionalCredits;
use App\Models\CommunityOutreach;
use App\Models\ConferencesSeminars;
use App\Models\Consultancy;
use App\Models\DevelopedPatents;
use App\Models\EducationalAttainment;
use App\Models\ExpertServices;
use App\Models\IndustrialResearches;
use App\Models\ProfessionalExaminations;
use App\Models\ProfessionalMemberships;
use App\Models\ProfessionalTutoring;
use App\Models\PublishedLiteratures;
use App\Models\ResearchContributions;
use App\Models\Scholarships;
use App\Models\ServiceRecord;
use App\Models\TrainingCourses;
use App\Models\TrainingsWorkshops;
use App\Requests\CreatePdsRequest as RequestPageOne;
use App\Requests\RatingRequest;
use App\Models\Rating;

class PdsCtrl extends Auth
{
    /**
     * @return View
     */
    public function index()
    {
        return View::render('admin/pds/index');
    }


    /**
     * @return View
     * @throws mixed
     */
    public function fetch()
    {
        $pds = PDS::order('id', 'desc')->get();

        print("
        <table class='table table-responsive table-striped table-bordered' id='table'>
            <thead>
            <tr>
                <td>Member ID</td>
                <td>Name</td>
                <td>Username</td>
                <td>Email</td>
                <td>Evaluated<br>Ratings</td>
                <td>PASUC CCE</td>
                <td>Docs Uploaded</td>
                <td>Modified</td>
                <td>Data Sheet</td>
            </tr>
            </thead>
            <tbody>
        ");

        foreach ($pds as $data):
            $user = User::find($data->user_id);
            $updated = date('F j, Y', $data->updated) . ' at ' . date('h:i A', $data->updated);
            $docsUploaded = Media::where('user_id', $user->id)->count();

            // for Ratings
            $evaluations = Rating::where('user_id', $user->id)->order('id','desc')->get();
            $evaluation = "<select class='pd05' style='display: block;'><option value=''>------</option>";
            foreach ($evaluations as $eval) {
                $evaluation .= "<option value='$eval->id'>$eval->date_certified</option>";
            }
            $ratings = $evaluation . "</select>
            <button onclick=\"if(this.previousElementSibling.value == '')return false; else location.href='/admin/pds/rating/'+this.previousElementSibling.value;\">View</button>
            <button onclick=\"if(this.previousElementSibling.previousElementSibling.value == '')return false; else location.href='/admin/pds/rating/print/'+this.previousElementSibling.previousElementSibling.value;\">Print</button>";

            $cce = $evaluation . "</select>
            <button onclick=\"if(this.previousElementSibling.value == '')return false; else location.href='/admin/pds/pasuc/cce/'+this.previousElementSibling.value;\">View</button>
            <button onclick=\"if(this.previousElementSibling.previousElementSibling.value == '')return false; else location.href='/admin/pds/pasuc/cce/'+this.previousElementSibling.previousElementSibling.value+'/print';\">Print</button>";

            print("
            <tr>
                <td>$user->id</td>
                <td>$user->firstname $user->middlename $user->lastname</td>
                <td>$user->username</td>
                <td>$user->email</td>
                <td>$ratings</td>
                <td>$cce</td>
                <td>$docsUploaded File(s)</td>
                <td>$updated</td>
                <td><a href='/admin/pds/search/$user->id'>[ OVERVIEW ]</a></td>
            </tr>");
        endforeach;

        print ("</tbody></table>");
    }

    /**
     * @return View
     */
    public function guide()
    {
        return View::render('admin/pds/guide');
    }


    /**
     * @return string
     * @throws mixed
     **/
    public function information($id)
    {
        $client = User::find($id);
        return View::render('admin/pds/print', compact('client'));
    }


    /**
     * @return string
     * @throws mixed
     **/
    public function search($query)
    {
        if (is_numeric($query)) {
            $client = User::whereId($query)->whereRole('client')->first();
        } else {
            $client = User::where('username', $query)
                ->orWhere('email', $query)
                ->first();
        }

        return render('admin/pds/search', compact('client'));
    }

    /**
     * @return string
     * @throws mixed
     **/
    public function evaluate($id)
    {
        $client = User::find($id);

        return render('admin/pds/evaluate', compact('client'));
    }


    /**
     * @return string
     * @throws mixed
     **/
    public function rate()
    {
        $request = new RatingRequest;
        $request->append('created', time());
        $request->append('updated', time());
        $request->append('evaluator_id', Session::user()->id);

        Rating::insert($request->values());
        $pds = PDS::where('user_id', $request->get('user_id'))->first();
        $pds->rank = $request->get('new_rank');
        $pds->save();

        Log::insert([
            'user_id' => Session::user()->id,
            'type' => 'Faculty Rating/Evaluation',
            'description' => Session::user()->role . " access.",
            'content' => " evaluated a member ID $request->get('user_id')",
            'created' => time(),
            'updated' => time(),
        ]);


        Session::setFlash('flash', "<i class='text-success'>You have successfully provided a rating.</i>");
        return redirect('/admin/pds/evaluate/' . $request->get('user_id'));
    }


    /**
     * @return string
     * @throws mixed
     **/
    public
    function toggle($model, $id, $returnId)
    {
        switch ($model) {
            case 'AcademicHonors':
                $data = AcademicHonors::find($id);
                if ($data->approval_status == 'review') {
                    $data->approval_status = 'approved';
                } else {
                    $data->approval_status = 'review';
                }
                $data->updated = time();
                $data->save();
                break;
            case 'Accreditations':
                $data = Accreditations::find($id);
                if ($data->approval_status == 'review') {
                    $data->approval_status = 'approved';
                } else {
                    $data->approval_status = 'review';
                }
                $data->updated = time();
                $data->save();
                break;
            case 'Achievements':
                $data = Achievements::find($id);
                if ($data->approval_status == 'review') {
                    $data->approval_status = 'approved';
                } else {
                    $data->approval_status = 'review';
                }
                $data->updated = time();
                $data->save();
                break;
            case 'AdditionalCredits':
                $data = AdditionalCredits::find($id);
                if ($data->approval_status == 'review') {
                    $data->approval_status = 'approved';
                } else {
                    $data->approval_status = 'review';
                }
                $data->updated = time();
                $data->save();
                break;
            case 'CommunityOutreach':
                $data = CommunityOutreach::find($id);
                if ($data->approval_status == 'review') {
                    $data->approval_status = 'approved';
                } else {
                    $data->approval_status = 'review';
                }
                $data->updated = time();
                $data->save();
                break;
            case 'ConferencesSeminars':
                $data = ConferencesSeminars::find($id);
                if ($data->approval_status == 'review') {
                    $data->approval_status = 'approved';
                } else {
                    $data->approval_status = 'review';
                }
                $data->updated = time();
                $data->save();
                break;
            case 'Consultancy':
                $data = Consultancy::find($id);
                if ($data->approval_status == 'review') {
                    $data->approval_status = 'approved';
                } else {
                    $data->approval_status = 'review';
                }
                $data->updated = time();
                $data->save();
                break;
            case 'DevelopedPatents':
                $data = DevelopedPatents::find($id);
                if ($data->approval_status == 'review') {
                    $data->approval_status = 'approved';
                } else {
                    $data->approval_status = 'review';
                }
                $data->updated = time();
                $data->save();
                break;
            case 'EducationalAttainment':
                $data = EducationalAttainment::find($id);
                if ($data->approval_status == 'review') {
                    $data->approval_status = 'approved';
                } else {
                    $data->approval_status = 'review';
                }
                $data->updated = time();
                $data->save();
                break;
            case 'ExpertServices':
                $data = ExpertServices::find($id);
                if ($data->approval_status == 'review') {
                    $data->approval_status = 'approved';
                } else {
                    $data->approval_status = 'review';
                }
                $data->updated = time();
                $data->save();
                break;
            case 'IndustrialResearches':
                $data = IndustrialResearches::find($id);
                if ($data->approval_status == 'review') {
                    $data->approval_status = 'approved';
                } else {
                    $data->approval_status = 'review';
                }
                $data->updated = time();
                $data->save();
                break;
            case 'ProfessionalExaminations':
                $data = ProfessionalExaminations::find($id);
                if ($data->approval_status == 'review') {
                    $data->approval_status = 'approved';
                } else {
                    $data->approval_status = 'review';
                }
                $data->updated = time();
                $data->save();
                break;
            case 'ProfessionalMemberships':
                $data = ProfessionalMemberships::find($id);
                if ($data->approval_status == 'review') {
                    $data->approval_status = 'approved';
                } else {
                    $data->approval_status = 'review';
                }
                $data->updated = time();
                $data->save();
                break;
            case 'ProfessionalTutoring':
                $data = ProfessionalTutoring::find($id);
                if ($data->approval_status == 'review') {
                    $data->approval_status = 'approved';
                } else {
                    $data->approval_status = 'review';
                }
                $data->updated = time();
                $data->save();
                break;
            case 'PublishedLiteratures':
                $data = PublishedLiteratures::find($id);
                if ($data->approval_status == 'review') {
                    $data->approval_status = 'approved';
                } else {
                    $data->approval_status = 'review';
                }
                $data->updated = time();
                $data->save();
                break;
            case 'ResearchContributions':
                $data = ResearchContributions::find($id);
                if ($data->approval_status == 'review') {
                    $data->approval_status = 'approved';
                } else {
                    $data->approval_status = 'review';
                }
                $data->updated = time();
                $data->save();
                break;
            case 'Scholarships':
                $data = Scholarships::find($id);
                if ($data->approval_status == 'review') {
                    $data->approval_status = 'approved';
                } else {
                    $data->approval_status = 'review';
                }
                $data->updated = time();
                $data->save();
                break;
            case 'ServiceRecord':
                $data = ServiceRecord::find($id);
                if ($data->approval_status == 'review') {
                    $data->approval_status = 'approved';
                } else {
                    $data->approval_status = 'review';
                }
                $data->updated = time();
                $data->save();
                break;
            case 'TrainingCourses':
                $data = TrainingCourses::find($id);
                if ($data->approval_status == 'review') {
                    $data->approval_status = 'approved';
                } else {
                    $data->approval_status = 'review';
                }
                $data->updated = time();
                $data->save();
                break;
            case 'TrainingsWorkshops':
                $data = TrainingsWorkshops::find($id);
                if ($data->approval_status == 'review') {
                    $data->approval_status = 'approved';
                } else {
                    $data->approval_status = 'review';
                }
                $data->updated = time();
                $data->save();
                break;
            default:
                break;
        }

        Log::insert([
            'user_id' => Session::user()->id,
            'type' => 'PDS data approval',
            'description' => Session::user()->role . " access.",
            'content' => " approved a PDS data for member ID $returnId",
            'created' => time(),
            'updated' => time(),
        ]);
        return redirect("/admin/pds/search/$returnId");
    }


    /**
     * @return string
     * @throws mixed
     **/
    public function showRating($ratingId)
    {
        $rating = Rating::find($ratingId);

        return render("/admin/pds/rating/rating", compact('rating'));
    }


    /**
     * @return string
     * @throws mixed
     **/
    public function printRating($ratingId)
    {
        $rating = Rating::find($ratingId);

        return render("/admin/pds/rating/print", compact('rating'));
    }

    /**
     * @return string
     * @throws mixed
     **/
    public function showCCE($ratingId)
    {
        $rating = Rating::find($ratingId);

        return render("/admin/pds/pasuc/cce", compact('rating'));
    }


    /**
     * @return string
     * @throws mixed
     **/
    public function printCCE($ratingId)
    {
        $rating = Rating::find($ratingId);

        return render("/admin/pds/pasuc/print", compact('rating'));
    }



    /**
     * @return string
     * @throws mixed
     **/
    public function report()
    {
        $pds = PDS::order('lastname', 'asc')->get();
        return render("/admin/pds/reports/report", compact('pds'));
    }


    /**
     * @return string
     * @throws mixed
     **/
    public function printReport()
    {
        return render("/admin/pds/pasuc/print", compact('rating'));
    }
}
