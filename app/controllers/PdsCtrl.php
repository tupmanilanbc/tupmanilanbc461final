<?php

/**
 * Default controller
 * Class HomeController
 */

use App\Models\PDS;
use App\Models\User;
use App\Models\Rating;
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

class PdsCtrl extends ClientAuth
{
    /**
     * @return View
     */
    public function index()
    {
        return View::render('app/pds/index');
    }


    /**
     * @return View
     */
    public function guide()
    {
        return View::render('app/pds/guide');
    }

    /**
     * @return View
     */
    public function create($page)
    {
        switch ($page) {
            case 1:
                return View::render('app/pds/create_pg1');
            case 2:
                return View::render('app/pds/create_pg2');
            case 3:
                return View::render('app/pds/create_pg3');
            case 4:
                return View::render('app/pds/create_pg4');
            case 5:
                return View::render('app/pds/create_pg5');
            default:
                page_error(404);
        }
    }

    /**
     * @return View
     * @throws mixed
     */
    public function store($page)
    {
        // if its page 1
        if ($page == 1) {
            $request = new RequestPageOne;
            if ($request->validate()) {
                if (PDS::where('user_id', Session::get('client')->id)->exists()) {
                    //update the PDS
                    $request->append('updated', time());
                    $pds = PDS::where('user_id', Session::get('client')->id)->first();
                    $pds->update($request->values(), $pds->id);
                    Session::setFlash('flash', "<b class='text-success'><i class='fa fa-check'></i> 
                                                  Personal Data Sheet has been updated.</b>");
                } else {
                    //create the PDS
                    $request->append('created', time());
                    $request->append('updated', time());
                    $request->append('user_id', Session::get('client')->id);
                    PDS::insert($request->values());
                    Session::setFlash('flash', "<b class='text-success'><i class='fa fa-check'></i> 
                                                  Personal Data Sheet has been submitted.</b>");
                }
            }
            return redirect('/app/pds/create/1');
        }
    }


    /**
     * @return View
     * @throws mixed
     */
    public function ajax()
    {
        $data = $_POST;
        $model = $data['__model__'];
        $data['approval_status'] = "review";
        $data['user_id'] = $_SESSION['client']->id;
        //$data['user_id'] = Session::get('client')->id;
        $data['created'] = time();
        $data['updated'] = time();
        unset($data['__model__']);

        switch ($model) {
            case 'AcademicHonors':
                AcademicHonors::insert($data);
                print 1;
                break;
            case 'Accreditations':
                Accreditations::insert($data);
                print 1;
                break;
            case 'Achievements':
                Achievements::insert($data);
                print 1;
                break;
            case 'AdditionalCredits':
                AdditionalCredits::insert($data);
                print 1;
                break;
            case 'CommunityOutreach':
                CommunityOutreach::insert($data);
                print 1;
                break;
            case 'ConferencesSeminars':
                ConferencesSeminars::insert($data);
                print 1;
                break;
            case 'Consultancy':
                Consultancy::insert($data);
                print 1;
                break;
            case 'DevelopedPatents':
                DevelopedPatents::insert($data);
                print 1;
                break;
            case 'EducationalAttainment':
                EducationalAttainment::insert($data);
                print 1;
                break;
            case 'ExpertServices':
                ExpertServices::insert($data);
                print 1;
                break;
            case 'IndustrialResearches':
                IndustrialResearches::insert($data);
                print 1;
                break;
            case 'ProfessionalExaminations':
                ProfessionalExaminations::insert($data);
                print 1;
                break;
            case 'ProfessionalMemberships':
                ProfessionalMemberships::insert($data);
                print 1;
                break;
            case 'ProfessionalTutoring':
                ProfessionalTutoring::insert($data);
                print 1;
                break;
            case 'PublishedLiteratures':
                PublishedLiteratures::insert($data);
                print 1;
                break;
            case 'ResearchContributions':
                ResearchContributions::insert($data);
                print 1;
                break;
            case 'Scholarships':
                Scholarships::insert($data);
                print 1;
                break;
            case 'ServiceRecord':
                ServiceRecord::insert($data);
                print 1;
                break;
            case 'TrainingCourses':
                TrainingCourses::insert($data);
                print 1;
                break;
            case 'TrainingsWorkshops':
                TrainingsWorkshops::insert($data);
                print 1;
                break;
            default:
                break;
        }
    }

    /**
     * @return View
     * @throws mixed
     */
    public function destroy($model, $id)
    {
        switch ($model) {
            case 'AcademicHonors':
                AcademicHonors::find($id)->delete();
                break;
            case 'Accreditations':
                Accreditations::find($id)->delete();
                break;
            case 'Achievements':
                Achievements::find($id)->delete();
                break;
            case 'AdditionalCredits':
                AdditionalCredits::find($id)->delete();
                break;
            case 'CommunityOutreach':
                CommunityOutreach::find($id)->delete();
                break;
            case 'ConferencesSeminars':
                ConferencesSeminars::find($id)->delete();
                break;
            case 'Consultancy':
                Consultancy::find($id)->delete();
                break;
            case 'DevelopedPatents':
                DevelopedPatents::find($id)->delete();
                break;
            case 'EducationalAttainment':
                EducationalAttainment::find($id)->delete();
                break;
            case 'ExpertServices':
                ExpertServices::find($id)->delete();
                break;
            case 'IndustrialResearches':
                IndustrialResearches::find($id)->delete();
                break;
            case 'ProfessionalExaminations':
                ProfessionalExaminations::find($id)->delete();
                break;
            case 'ProfessionalMemberships':
                ProfessionalMemberships::find($id)->delete();
                break;
            case 'ProfessionalTutoring':
                ProfessionalTutoring::find($id)->delete();
                break;
            case 'PublishedLiteratures':
                PublishedLiteratures::find($id)->delete();
                break;
            case 'ResearchContributions':
                ResearchContributions::find($id)->delete();
                break;
            case 'Scholarships':
                Scholarships::find($id)->delete();
                break;
            case 'ServiceRecord':
                ServiceRecord::find($id)->delete();
                break;
            case 'TrainingCourses':
                TrainingCourses::find($id)->delete();
                break;
            case 'TrainingsWorkshops':
                TrainingsWorkshops::find($id)->delete();
                break;
            default:
                break;
        }

        return redirect("/app/pds");
    }


    /**
     * @return View
     * @throws mixed
     */
    public function information()
    {
        return View::render('app/pds/print');
    }


    /**
     * @return View
     * @throws mixed
     */
    public function evaluations()
    {
        return View::render('app/pds/evaluations');
    }


    /**
     * @return mixed
     * @throws mixed
     */
    public function showEval($id)
    {
        $rating = Rating::find($id);

        return render('app/pds/rating/rating', compact('rating'));
    }



    /**
     * @return string
     * @throws mixed
     **/
    public function printEval($id)
    {
        $rating = Rating::find($id);

        return render("/app/pds/rating/print", compact('rating'));
    }

}
