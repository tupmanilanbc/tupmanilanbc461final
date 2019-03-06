@import(App\Models\PDS)
@import(App\Models\AcademicHonors)
@import(App\Models\Accreditations)
@import(App\Models\Achievements)
@import(App\Models\AdditionalCredits)
@import(App\Models\CommunityOutreach)
@import(App\Models\ConferencesSeminars)
@import(App\Models\Consultancy)
@import(App\Models\DevelopedPatents)
@import(App\Models\EducationalAttainment)
@import(App\Models\ExpertServices)
@import(App\Models\IndustrialResearches)
@import(App\Models\ProfessionalExaminations)
@import(App\Models\ProfessionalMemberships)
@import(App\Models\ProfessionalTutoring)
@import(App\Models\PublishedLiteratures)
@import(App\Models\ResearchContributions)
@import(App\Models\Scholarships)
@import(App\Models\ServiceRecord)
@import(App\Models\TrainingCourses)
@import(App\Models\TrainingsWorkshops)

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

<h3>Personal Data Sheet</h3>
<hr>

<table class="table table-condensed">
    <tr>
        <th>Name</th>
        <th>Civil Status</th>
        <th>DOB</th>
        <th>Addresses</th>
        <th>Contact Numbers</th>
        <th>College</th>
        <th>Present Rank/Sub-rank</th>
        <th>Department</th>
        <th>Appointment Status</th>
        <th>Appointment Date</th>
        <th>Date Submitted</th>
    </tr>
    <?php $PDS = PDS::where('user_id', $client->id)->order('id', 'desc')->get(); ?>
    {foreach $PDS as $data}
    <tr>
        <td>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
        <td>{{$data->civil_status}}</td>
        <td>{{$data->dob}}</td>
        <td>
            Home: {{$data->home_address}}
            <hr style="margin:5px 0">
            Mailing: {{$data->mailing_address}}
        </td>
        <td>
            Mobile: {{$data->mobile_number}}
            <hr style="margin:5px 0">
            Tel: {{$data->telephone_number}}
        </td>
        <td>{{$data->college}}</td>
        <td>{{$data->rank}}</td>
        <td>{{$data->department}}</td>
        <td>{{$data->appointment_status}}</td>
        <td>{{$data->last_appointment_date}}</td>
        <td>{{$data->date_submitted}}</td>
    </tr>
    {endforeach}
</table>

<hr>

<h4><i><u>1.0 Educational Qualifications</u></i></h4>
<div class="well nsh" style="border: 1px solid #efefef">
    <center>
        <b>1.1 Highest relevant academic degree or educational attainment and additional equivalent degree earned related to the present position</b>
    </center>
    <br>
    <table class="table table-condensed">
        <tr>
            <th>Degree Earned</th>
            <th>Specialization</th>
            <th>Institution</th>
            <th>Year Obtained</th>
            <th>Approval</th>
            <th>Created</th>
        </tr>
        <?php $educationalAttainment = EducationalAttainment::where('user_id', $client->id)->order('id', 'desc')->get(); ?>
        {foreach $educationalAttainment as $data}
        <tr>
            <td>{{$data->degree_earned}}</td>
            <td>{{$data->specialization}}</td>
            <td>{{$data->institution}}</td>
            <td>{{$data->year_obtained}}</td>
            <td>{{$data->approval_status}}</td>
            <td>{{date('Y-m-d',$data->created)}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <center>
        <b>1.2 Additional credits earned towards an appropriate higher degree</b>
    </center>
    <br>
    <table class="table table-condensed">
        <tr>
            <th>Baccalaureate</th>
            <th>Masters</th>
            <th>Doctoral</th>
            <th>Approval</th>
            <th>Created</th>
        </tr>
        <?php $additionalCredits = AdditionalCredits::where('user_id', $client->id)->order('id', 'desc')->get(); ?>
        {foreach $additionalCredits as $data}
        <tr>
            <td>{{$data->baccalaureate}}</td>
            <td>{{$data->masters}}</td>
            <td>{{$data->doctoral}}</td>
            <td>{{$data->approval_status}}</td>
            <td>{{date('Y-m-d',$data->created)}}</td>
        </tr>
        {endforeach}
    </table>
</div>



<h4><i><u>2.0 Experience And Length Of Service</u></i></h4>
<div class="well nsh" style="border: 1px solid #efefef">
    <center>
        <b>2.1 Service Record (includes full-time teaching, research, extension service, administrative experience, and industrial experience)</b>
    </center>
    <br>
    <table class="table table-condensed">
        <tr>
            <th>Inclusive Dates</th>
            <th>Position Held</th>
            <th>Institution</th>
            <th>Address</th>
            <th>Approval</th>
            <th>Created</th>
        </tr>
        <?php $ServiceRecord = ServiceRecord::where('user_id', $client->id)->order('id', 'desc')->get(); ?>
        {foreach $ServiceRecord as $data}
        <tr>
            <td>{{$data->inclusive_dates}}</td>
            <td>{{$data->position_held}}</td>
            <td>{{$data->institution}}</td>
            <td>{{$data->address}}</td>
            <td>{{$data->approval_status}}</td>
            <td>{{date('Y-m-d',$data->created)}}</td>
        </tr>
        {endforeach}
    </table>
</div>



<h4><i><u>3.0 Professional Development, Achievements, and Honors</u></i></h4>
<div class="well nsh" style="border: 1px solid #efefef">
    <center>
        <b>3.1 Innovations, patented inventions, inventions with pending patent, publications, and other creative works</b>
    </center>
    <br>
    <table class="table table-condensed">
        <tr>
            <th>Nature of Innovations/ Inventions</th>
            <th>Patent Number</th>
            <th>Year Patented</th>
            <th>Approval</th>
            <th>Created</th>
        </tr>
        <?php $DevelopedPatents = DevelopedPatents::where('user_id', $client->id)->order('id', 'desc')->get(); ?>
        {foreach $DevelopedPatents as $data}
        <tr>
            <td>{{$data->nature_of_inventions}}</td>
            <td>{{$data->patent_number}}</td>
            <td>{{$data->year_patented}}</td>
            <td>{{$data->approval_status}}</td>
            <td>{{date('Y-m-d',$data->created)}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <center>
        <b>3.1.2-3.1.5 Published books, researches, monographs, articles, instructional manuals, workbooks, films, compositions</b>
    </center>
    <br>
    <table class="table table-condensed">
        <tr>
            <th>Nature (books, articles, films, instructional materials)</th>
            <th>Complete Title</th>
            <th>Role</th>
            <th>Publisher</th>
            <th>Date of Publication</th>
            <th>Approval</th>
            <th>Created</th>
        </tr>
        <?php $PublishedLiteratures = PublishedLiteratures::where('user_id', $client->id)->order('id', 'desc')->get(); ?>
        {foreach $PublishedLiteratures as $data}
        <tr>
            <td>{{$data->material}}</td>
            <td>{{$data->title}}</td>
            <td>{{$data->role}}</td>
            <td>{{$data->publisher}}</td>
            <td>{{$data->date_published}}</td>
            <td>{{$data->approval_status}}</td>
            <td>{{date('Y-m-d',$data->created)}}</td>
        </tr>
        {endforeach}
    </table>


    <hr>

    <center>
        <h4>
        <b>3.2 Expert services, training and active participation in professional/ technical activities</b>
        </h4>
    </center>
    <center>
        <b>3.2.1 Training courses and seminars (including academic, technical, industrial, agro-industrial, and fishers training)</b>
    </center>

    <h5>A. Training</h5>
    <table class="table table-condensed">
        <tr>
            <th>Title of the training</th>
            <th>Sponsoring Agency</th>
            <th>Level (Int'l/ Nat'l/ Reg'l/ Local/ Inst'l)</th>
            <th>Inclusive Dates</th>
            <th>Approval</th>
            <th>Created</th>
        </tr>
        <?php $TrainingCourses = TrainingCourses::where('user_id', $client->id)->order('id', 'desc')->get(); ?>
        {foreach $TrainingCourses as $data}
        <tr>
            <td>{{$data->training_title}}</td>
            <td>{{$data->sponsor_agency}}</td>
            <td>{{$data->training_level}}</td>
            <td>{{$data->inclusive_dates}}</td>
            <td>{{$data->approval_status}}</td>
            <td>{{date('Y-m-d',$data->created)}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <h5>B. Conferences, seminars, etc.</h5>
    <table class="table table-condensed">
        <tr>
            <th>Title of the Conference/ Seminar</th>
            <th>Sponsoring Agency</th>
            <th>Inclusive Dates</th>
            <th>Approval</th>
            <th>Created</th>
        </tr>
        <?php $ConferencesSeminars = ConferencesSeminars::where('user_id', $client->id)->order('id', 'desc')->get(); ?>
        {foreach $ConferencesSeminars as $data}
        <tr>
            <td>{{$data->conference_title}}</td>
            <td>{{$data->sponsor_agency}}</td>
            <td>{{$data->inclusive_dates}}</td>
            <td>{{$data->approval_status}}</td>
            <td>{{date('Y-m-d',$data->created)}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <center>
        <b>3.2.2 Expert services</b>
    </center>

    <h5>A. Consultancy</h5>
    <table class="table table-condensed">
        <tr>
            <th>Nature/Area of the Consultancy</th>
            <th>Country</th>
            <th>Sponsoring Agency</th>
            <th>Inclusive Dates</th>
            <th>Approval</th>
            <th>Created</th>
        </tr>
        <?php $Consultancy = Consultancy::where('user_id', $client->id)->order('id', 'desc')->get(); ?>
        {foreach $Consultancy as $data}
        <tr>
            <td>{{$data->consultancy_nature}}</td>
            <td>{{$data->country}}</td>
            <td>{{$data->sponsor_agency}}</td>
            <td>{{$data->inclusive_dates}}</td>
            <td>{{$data->approval_status}}</td>
            <td>{{date('Y-m-d',$data->created)}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>


    <h5>B. Active participation in trainings, workshops, and conferences as coordinator, lecturer, resource person, or guest speaker</h5>
    <table class="table table-condensed">
        <tr>
            <th>Title of the Conference/Seminar/Workshop</th>
            <th>Nature of Participation</th>
            <th>Sponsoring Agency</th>
            <th>Inclusive Dates</th>
            <th>Approval</th>
            <th>Created</th>
        </tr>
        <?php $TrainingsWorkshops = TrainingsWorkshops::where('user_id', $client->id)->order('id', 'desc')->get(); ?>
        {foreach $TrainingsWorkshops as $data}
        <tr>
            <td>{{$data->training_title}}</td>
            <td>{{$data->participation}}</td>
            <td>{{$data->sponsor_agency}}</td>
            <td>{{$data->inclusive_dates}}</td>
            <td>{{$data->approval_status}}</td>
            <td>{{date('Y-m-d',$data->created)}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <h5>C. For expert services as adviser in doctoral dissertation, master's and undergraduate thesis</h5>
    <table class="table table-condensed">
        <tr>
            <th>Title of the Paper</th>
            <th>Nature</th>
            <th>Inclusive Dates</th>
            <th>Approval</th>
            <th>Created</th>
        </tr>
        <?php $ExpertServices = ExpertServices::where('user_id', $client->id)->order('id', 'desc')->get(); ?>
        {foreach $ExpertServices as $data}
        <tr>
            <td>{{$data->paper_title}}</td>
            <td>{{$data->nature}}</td>
            <td>{{$data->inclusive_dates}}</td>
            <td>{{$data->approval_status}}</td>
            <td>{{date('Y-m-d',$data->created)}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <h5>D. For certified services (includes reviewer/ examiner in PRC or CSC, accreditation work, trade skill certification, services as coach/trainer, adviser of student organization)</h5>
    <table class="table table-condensed">
        <tr>
            <th>Nature/Area</th>
            <th>Company/ Agency</th>
            <th>Inclusive Dates</th>
            <th>Approval</th>
            <th>Created</th>
        </tr>
        <?php $Accreditations = Accreditations::where('user_id', $client->id)->order('id', 'desc')->get(); ?>
        {foreach $Accreditations as $data}
        <tr>
            <td>{{$data->nature}}</td>
            <td>{{$data->agency}}</td>
            <td>{{$data->inclusive_dates}}</td>
            <td>{{$data->approval_status}}</td>
            <td>{{date('Y-m-d',$data->created)}}</td>
        </tr>
        {endforeach}
    </table>


    <hr>

    <center>
        <h4>
            <b>3.3 Membership in professional organizations/ honor societies and honors received</b>
        </h4>
    </center>
    <center>
        <b>3.3.1 Membership in professional organizations/ honor societies</b>
    </center>
    <br>
    <table class="table table-condensed">
        <tr>
            <th>Name of the Organization/ Honor Society</th>
            <th>Inclusive Dates</th>
            <th>Approval</th>
            <th>Created</th>
        </tr>
        <?php $ProfessionalMemberships = ProfessionalMemberships::where('user_id', $client->id)->order('id', 'desc')->get(); ?>
        {foreach $ProfessionalMemberships as $data}
        <tr>
            <td>{{$data->organization_name}}</td>
            <td>{{$data->inclusive_dates}}</td>
            <td>{{$data->approval_status}}</td>
            <td>{{date('Y-m-d',$data->created)}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <center>
        <b>3.3.2 Academic honors received</b>
    </center>
    <br>
    <table class="table table-condensed">
        <tr>
            <th>Honors Received</th>
            <th>Degree Obtained</th>
            <th>Institution/Address</th>
            <th>Approval</th>
            <th>Created</th>
        </tr>
        <?php $AcademicHonors = AcademicHonors::where('user_id', $client->id)->order('id', 'desc')->get(); ?>
        {foreach $AcademicHonors as $data}
        <tr>
            <td>{{$data->honors_received}}</td>
            <td>{{$data->degree_obtained}}</td>
            <td>{{$data->institution_address}}</td>
            <td>{{$data->approval_status}}</td>
            <td>{{date('Y-m-d',$data->created)}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <center>
        <b>3.3.3 Scholarship/Fellowship</b>
    </center>
    <br>
    <table class="table table-condensed">
        <tr>
            <th>Title of the Scholarship</th>
            <th>Nature (Competetive/Non-Competetive)</th>
            <th>Sponsoring Agency</th>
            <th>Inclusive Dates</th>
            <th>Approval</th>
            <th>Created</th>
        </tr>
        <?php $Scholarships = Scholarships::where('user_id', $client->id)->order('id', 'desc')->get(); ?>
        {foreach $Scholarships as $data}
        <tr>
            <td>{{$data->scholarship_title}}</td>
            <td>{{$data->nature}}</td>
            <td>{{$data->sponsor_agency}}</td>
            <td>{{$data->inclusive_dates}}</td>
            <td>{{$data->approval_status}}</td>
            <td>{{date('Y-m-d',$data->created)}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <center>
        <b>3.4 Awards of Distinction received in recognition of achievement relevant areas of specialization, profession or assignment</b>
    </center>
    <br>
    <table class="table table-condensed">
        <tr>
            <th>Title of the Award</th>
            <th>Field of Services</th>
            <th>Grantor/ Organization</th>
            <th>Award Level</th>
            <th>Approval</th>
            <th>Created</th>
        </tr>
        <?php $Achievements = Achievements::where('user_id', $client->id)->order('id', 'desc')->get(); ?>
        {foreach $Achievements as $data}
        <tr>
            <td>{{$data->award_title}}</td>
            <td>{{$data->field_of_service}}</td>
            <td>{{$data->organization}}</td>
            <td>{{$data->level}}</td>
            <td>{{$data->approval_status}}</td>
            <td>{{date('Y-m-d',$data->created)}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <center>
        <b>3.5 Community Outreach: Servuce - Oriented projects participated in the community</b>
    </center>
    <br>
    <table class="table table-condensed">
        <tr>
            <th>Title of the Project</th>
            <th>Participation/Service</th>
            <th>Sponsoring Agency</th>
            <th>Inclusive Dates</th>
            <th>Approval</th>
            <th>Created</th>
        </tr>
        <?php $CommunityOutreach = CommunityOutreach::where('user_id', $client->id)->order('id', 'desc')->get(); ?>
        {foreach $CommunityOutreach as $data}
        <tr>
            <td>{{$data->project_title}}</td>
            <td>{{$data->participation}}</td>
            <td>{{$data->sponsor_agency}}</td>
            <td>{{$data->inclusive_dates}}</td>
            <td>{{$data->approval_status}}</td>
            <td>{{date('Y-m-d',$data->created)}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <center>
        <b>3.6 Professional Examinations</b>
    </center>
    <br>
    <table class="table table-condensed">
        <tr>
            <th>Title of the Examination</th>
            <th>Rating</th>
            <th>Date</th>
            <th>Approval</th>
            <th>Created</th>
        </tr>
        <?php $ProfessionalExaminations = ProfessionalExaminations::where('user_id', $client->id)->order('id', 'desc')->get(); ?>
        {foreach $ProfessionalExaminations as $data}
        <tr>
            <td>{{$data->exam_title}}</td>
            <td>{{$data->rating}}</td>
            <td>{{$data->date}}</td>
            <td>{{$data->approval_status}}</td>
            <td>{{date('Y-m-d',$data->created)}}</td>
        </tr>
        {endforeach}
    </table>
</div>



<h4><i><u>4.0 Research</u></i></h4>
<div class="well nsh" style="border: 1px solid #efefef">
    <center>
        <b>4.1 Research recommendations transformed to public policy benefiting the country and other creative works</b>
    </center>
    <br>
    <table class="table table-condensed">
        <tr>
            <th>Complete Title of the Research</th>
            <th>Level</th>
            <th>Sponsoring Agency</th>
            <th>Inclusive Dates</th>
            <th>Approval</th>
            <th>Created</th>
        </tr>
        <?php $ResearchContributions = ResearchContributions::where('user_id', $client->id)->order('id', 'desc')->get(); ?>
        {foreach $ResearchContributions as $data}
        <tr>
            <td>{{$data->title}}</td>
            <td>{{$data->level}}</td>
            <td>{{$data->sponsor_agency}}</td>
            <td>{{$data->inclusive_dates}}</td>
            <td>{{$data->approval_status}}</td>
            <td>{{date('Y-m-d',$data->created)}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <center>
        <b>4.2 Supervision, tutoring, or coaching of graduate scientists and technology experts</b>
    </center>
    <br>
    <table class="table table-condensed">
        <tr>
            <th>Nature/Area of Supervision/Tutoring</th>
            <th>Country</th>
            <th>Sponsoring Agency</th>
            <th>Level</th>
            <th>Inclusive Dates</th>
            <th>Approval</th>
            <th>Created</th>
        </tr>
        <?php $ProfessionalTutoring = ProfessionalTutoring::where('user_id', $client->id)->order('id', 'desc')->get(); ?>
        {foreach $ProfessionalTutoring as $data}
        <tr>
            <td>{{$data->nature}}</td>
            <td>{{$data->country}}</td>
            <td>{{$data->sponsor_agency}}</td>
            <td>{{$data->level}}</td>
            <td>{{$data->inclusive_dates}}</td>
            <td>{{$data->approval_status}}</td>
            <td>{{date('Y-m-d',$data->created)}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <center>
        <b>4.3 Research results applied or utilized in industrial and/or commercial projects or undertaking</b>
    </center>
    <br>
    <table class="table table-condensed">
        <tr>
            <th>Complete title of the Research</th>
            <th>Level</th>
            <th>Sponsoring Agency</th>
            <th>Inclusive Dates</th>
            <th>Approval</th>
            <th>Created</th>
        </tr>
        <?php $IndustrialResearches = IndustrialResearches::where('user_id', $client->id)->order('id', 'desc')->get(); ?>
        {foreach $IndustrialResearches as $data}
        <tr>
            <td>{{$data->title}}</td>
            <td>{{$data->level}}</td>
            <td>{{$data->sponsor_agency}}</td>
            <td>{{$data->inclusive_dates}}</td>
            <td>{{$data->approval_status}}</td>
            <td>{{date('Y-m-d',$data->created)}}</td>
        </tr>
        {endforeach}
    </table>
</div>

<script>

    window.onload = function () {
        window.print();
    }

</script>

</body>
</html>