@extend('layouts/admin', ['title' => 'PDS Record'])

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
@import(App\Models\Rating)


<h3><i class="fa fa-newspaper-o"></i> Evaluate Points <br>
    <small>All the approved information are detailed in here.</small>
</h3>
<hr>

{if Rating::where('user_id', $client->id)->exists()}
{!Form::bind(Rating::where('user_id', $client->id)->first(),'/admin/pds/rate')!}
{else}
{!Form::open('/admin/pds/rate')!}
{endif}

<div class="well">
    <?php
    $pds = \App\Models\PDS::where('user_id', $client->id)->first();
    ?>

    <div class="well nsh" style="border: 1px solid #E1E1E1">
        <h4 class="pull-left nothing text-uppercase bold">{{$pds->lastname}}, {{$pds->firstname}} {{$pds->middlename}}</h4>
        <h5 class="nothing bold pull-right text-uppercase">TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES</h5>
        <div class="clearfix"></div>
    </div>

    <table class="table table-condensed">
        <tr>
            <th>Section/Description</th>
            <th>Points Earned</th>
            <th>Max. Points</th>
            <th>*Points to earn</th>
        </tr>
        <tr>
            <td>1. EDUCATIONAL QUALIFICATION</td>
            <td><input type="number" class="rate_inputs" name="rate_educ_qual" max="85" onkeyup="document.querySelector('#equiv_1').innerHTML = (85 - this.value)"></td>
            <td><b>85</b></td>
            <td id="equiv_1">0</td>
        </tr>

        <tr>
            <td>2. EXPERIENCE & LENGTH OF SERVICE</td>
            <td><input type="number" class="rate_inputs" name="rate_exp_length" max="25" onkeyup="document.querySelector('#equiv_2').innerHTML = (25 - this.value)"></td>
            <td><b>25</b></td>
            <td id="equiv_2">0</td>
        </tr>
        <tr>
            <td>3. PROFESSIONAL ACHIEVEMENT & HONORS</td>
            <td><input type="number" class="rate_inputs" name="rate_prof_honors" max="90" onkeyup="document.querySelector('#equiv_3').innerHTML = (90 - this.value)"></td>
            <td><b>90</b></td>
            <td id="equiv_3">0</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3-1. Discoveries, Patented inventions, innovations, published books, etc</td>
            <td><input type="number" class="rate_inputs" name="rate_discoveries" onkeyup="document.querySelector('#equiv_3_1').innerHTML = (30 - this.value)" max="30"></td>
            <td><b>30</b></td>
            <td id="equiv_3_1">0</td>
        </tr>

        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3-2. Expert services, training and active participation in professional/technical activities</td>
            <td><input type="number" class="rate_inputs" name="rate_expert_svcs" max="30" onkeyup="document.querySelector('#equiv_3_2').innerHTML = (30 - this.value)"></td>
            <td><b>30</b></td>
            <td id="equiv_3_2">0</td>
        </tr>

        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3-2-1 Trainings and Seminars</td>
            <td><input type="number" class="rate_inputs" name="rate_membership" max="10" onkeyup="document.querySelector('#equiv_3_2_1').innerHTML = (10 - this.value)"></td>
            <td><b>10</b></td>
            <td id="equiv_3_2_1">0</td>
        </tr>

        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3-2-2 Expert services rendered</td>
            <td><input type="number" class="rate_inputs" name="rate_awards" max="20" onkeyup="document.querySelector('#equiv_3_2_2').innerHTML = (20 - this.value)"></td>
            <td><b>20</b></td>
            <td id="equiv_3_2_2">0</td>
        </tr>

        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3-3. Membership in Professional organization/honor societies and honors received</td>
            <td><input type="number" class="rate_inputs" name="rate_prof_exam" max="10" onkeyup="document.querySelector('#equiv_3_3').innerHTML = (10 - this.value)"></td>
            <td><b>10</b></td>
            <td id="equiv_3_3">0</td>
        </tr>

        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3-4. Awards of distinction received</td>
            <td><input type="number" class="rate_inputs" name="rate_awards" onkeyup="document.querySelector('#equiv_3_4').innerHTML = (this.value)"></td>
            <td></td>
            <td id="equiv_3_4">0</td>
        </tr>

        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3-5. Community Outreach</td>
            <td><input type="number" class="rate_inputs" name="rate_comm_outreach" max="5" onkeyup="document.querySelector('#equiv_3_5').innerHTML = (5 - this.value)"></td>
            <td><b>5</b></td>
            <td id="equiv_3_5">0</td>
        </tr>

        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3-6. Professional Examination</td>
            <td><input type="number" class="rate_inputs" name="rate_prof_exam" max="10" onkeyup="document.querySelector('#equiv_3_6').innerHTML = (10 - this.value)"></td>
            <td><b>10</b></td>
            <td id="equiv_3_6">0</td>
        </tr>

        <tr>
            <td><h4>TOTAL POINTS: </h4></td>
            <td></td>
            <td><h4 id="total"></h4></td>
            <td></td>
        </tr>
    </table>


    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Current Rank:</label>
                        <input type="text" class="form-control" disabled value="{{PDS::where('user_id', $client->id)->first()->pull('rank')}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Select a new Rank:</label>
                        <select name="new_rank" class="form-control">
                            <option value="">------</option>
                            <option disabled>Instructor</option>
                            <option value="Instructor 1" >* Rank 1</option>
                            <option value="Instructor 2" >* Rank 2</option>
                            <option value="Instructor 3">* Rank 3</option>
                            <option disabled></option>
                            <option disabled>Asst. Professor</option>
                            <option value="Asst. Professor 1" >* Rank 1</option>
                            <option value="Asst. Professor 2" >* Rank 2</option>
                            <option value="Asst. Professor 3">* Rank 3</option>
                            <option value="Asst. Professor 4">* Rank 4</option>
                            <option disabled>Asso. Professor</option>
                            <option value="Asso. Professor 1" >* Rank 1</option>
                            <option value="Asso. Professor 2" >* Rank 2</option>
                            <option value="Asso. Professor 3">* Rank 3</option>
                            <option value="Asso. Professor 4">* Rank 4</option>
                            <option value="Asso. Professor 5">* Rank 5</option>
                            <option disabled></option>
                            <option disabled>Professor</option>
                            <option value="Professor 1" >* Rank 1</option>
                            <option value="Professor 2" >* Rank 2</option>
                            <option value="Professor 3">* Rank 3</option>
                            <option value="Professor 4">* Rank 4</option>
                            <option value="Professor 5">* Rank 5</option>
                            <option value="Professor 6">* Rank 6</option>
                            <option disabled></option>
                            <option value="College/University Professor">College/University Professor</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Evaluation Date</label>
                <input type="date" name="date_certified" value="{{date('Y-m-d')}}" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Teacher ID</label>
                <input type="text" disabled value="{{$client->id}}" class="form-control">
                <input type="hidden" name="user_id" value="{{$client->id}}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Editor's/Approver's Name</label>
                <input type="text" disabled value="{{Session::user()->firstname}} {{Session::user()->lastname}}"
                       class="form-control">
            </div>
        </div>
    </div>

    <hr>

    {!Session::getFlash('flash')!}
    <center>
        <a href="javascript:;" onclick="evaluateRating()" class="btn btn-primary"><i class="fa fa-calculator"></i> Evaluate</a>
        <button class="btn btn-info" disabled id="submitRating"><i class="fa fa-save"></i> Submit</button>
    </center>
</div>

{!Form::close()!}

<script>
    var total = document.querySelector('#total');
    var inputs = document.querySelectorAll(".rate_inputs");
    var submit = document.querySelector('#submitRating');
    function evaluateRating () {
        var computedTotal = 0;

        for (var x = 0; x < inputs.length; x++) {
            if (inputs[x].value !== "") {
                computedTotal = parseInt(computedTotal) + parseInt(inputs[x].value);
            } else {
                return alert('Please make sure not to miss something.')
                break;
            }
        }
        submit.removeAttribute('disabled');
        total.innerHTML = (computedTotal);
    }
</script>


<hr>
<center>
    <h3><i class="fa fa-circle-o"></i></h3>
</center>


<h4><i><u>1.0 Educational Qualifications</u></i></h4>
<div class="well nsh" style="border: 1px solid #efefef">
    <center>
        <b>1.1 Highest relevant academic degree or educational attainment and additional equivalent degree earned
            related to the present position</b>
    </center>
    <br>
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Degree Earned</th>
            <th>Specialization</th>
            <th>Institution</th>
            <th>Year Obtained</th>
        </tr>
        <?php $educationalAttainment = EducationalAttainment::where('user_id', $client->id)->where('approval_status', 'approved')->order('id', 'desc')->get(); ?>
        {foreach $educationalAttainment as $data}
        <tr>
            <td>{{$data->degree_earned}}</td>
            <td>{{$data->specialization}}</td>
            <td>{{$data->institution}}</td>
            <td>{{$data->year_obtained}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <center>
        <b>1.2 Additional credits earned towards an appropriate higher degree</b>
    </center>
    <br>
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Baccalaureate</th>
            <th>Masters</th>
            <th>Doctoral</th>
        </tr>
        <?php $additionalCredits = AdditionalCredits::where('user_id', $client->id)->where('approval_status', 'approved')->order('id', 'desc')->get(); ?>
        {foreach $additionalCredits as $data}
        <tr>
            <td>{{$data->baccalaureate}}</td>
            <td>{{$data->masters}}</td>
            <td>{{$data->doctoral}}</td>
        </tr>
        {endforeach}
    </table>
</div>

<h4><i><u>2.0 Experience And Length Of Service</u></i></h4>
<div class="well nsh" style="border: 1px solid #efefef">
    <center>
        <b>2.1 Service Record (includes full-time teaching, research, extension service, administrative experience, and
            industrial experience)</b>
    </center>
    <br>
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Inclusive Dates</th>
            <th>Position Held</th>
            <th>Institution</th>
            <th>Address</th>
        </tr>
        <?php $ServiceRecord = ServiceRecord::where('user_id', $client->id)->where('approval_status', 'approved')->order('id', 'desc')->get(); ?>
        {foreach $ServiceRecord as $data}
        <tr>
            <td>{{$data->inclusive_dates}}</td>
            <td>{{$data->position_held}}</td>
            <td>{{$data->institution}}</td>
            <td>{{$data->address}}</td>
        </tr>
        {endforeach}
    </table>
</div>

<h4><i><u>3.0 Professional Development, Achievements, and Honors</u></i></h4>
<div class="well nsh" style="border: 1px solid #efefef">
    <center>
        <b>3.1 Innovations, patented inventions, inventions with pending patent, publications, and other creative
            works</b>
    </center>
    <br>
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Nature of Innovations/ Inventions</th>
            <th>Patent Number</th>
            <th>Year Patented</th>
        </tr>
        <?php $DevelopedPatents = DevelopedPatents::where('user_id', $client->id)->where('approval_status', 'approved')->order('id', 'desc')->get(); ?>
        {foreach $DevelopedPatents as $data}
        <tr>
            <td>{{$data->nature_of_inventions}}</td>
            <td>{{$data->patent_number}}</td>
            <td>{{$data->year_patented}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <center>
        <b>3.1.2-3.1.5 Published books, researches, monographs, articles, instructional manuals, workbooks, films,
            compositions</b>
    </center>
    <br>
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Nature (books, articles, films, instructional materials)</th>
            <th>Complete Title</th>
            <th>Role</th>
            <th>Publisher</th>
            <th>Date of Publication</th>
        </tr>
        <?php $PublishedLiteratures = PublishedLiteratures::where('user_id', $client->id)->where('approval_status', 'approved')->order('id', 'desc')->get(); ?>
        {foreach $PublishedLiteratures as $data}
        <tr>
            <td>{{$data->material}}</td>
            <td>{{$data->title}}</td>
            <td>{{$data->role}}</td>
            <td>{{$data->publisher}}</td>
            <td>{{$data->date_published}}</td>
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
        <b>3.2.1 Training courses and seminars (including academic, technical, industrial, agro-industrial, and fishers
            training)</b>
    </center>

    <h5>A. Training</h5>
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Title of the training</th>
            <th>Sponsoring Agency</th>
            <th>Level (Int'l/ Nat'l/ Reg'l/ Local/ Inst'l)</th>
            <th>Inclusive Dates</th>
        </tr>
        <?php $TrainingCourses = TrainingCourses::where('user_id', $client->id)->where('approval_status', 'approved')->order('id', 'desc')->get(); ?>
        {foreach $TrainingCourses as $data}
        <tr>
            <td>{{$data->training_title}}</td>
            <td>{{$data->sponsor_agency}}</td>
            <td>{{$data->training_level}}</td>
            <td>{{$data->inclusive_dates}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <h5>B. Conferences, seminars, etc.</h5>
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Title of the Conference/ Seminar</th>
            <th>Sponsoring Agency</th>
            <th>Inclusive Dates</th>
        </tr>
        <?php $ConferencesSeminars = ConferencesSeminars::where('user_id', $client->id)->where('approval_status', 'approved')->order('id', 'desc')->get(); ?>
        {foreach $ConferencesSeminars as $data}
        <tr>
            <td>{{$data->conference_title}}</td>
            <td>{{$data->sponsor_agency}}</td>
            <td>{{$data->inclusive_dates}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <center>
        <b>3.2.2 Expert services</b>
    </center>

    <h5>A. Consultancy</h5>
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Nature/Area of the Consultancy</th>
            <th>Country</th>
            <th>Sponsoring Agency</th>
            <th>Inclusive Dates</th>
        </tr>
        <?php $Consultancy = Consultancy::where('user_id', $client->id)->where('approval_status', 'approved')->order('id', 'desc')->get(); ?>
        {foreach $Consultancy as $data}
        <tr>
            <td>{{$data->consultancy_nature}}</td>
            <td>{{$data->country}}</td>
            <td>{{$data->sponsor_agency}}</td>
            <td>{{$data->inclusive_dates}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>


    <h5>B. Active participation in trainings, workshops, and conferences as coordinator, lecturer, resource person, or
        guest speaker</h5>
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Title of the Conference/Seminar/Workshop</th>
            <th>Nature of Participation</th>
            <th>Sponsoring Agency</th>
            <th>Inclusive Dates</th>
        </tr>
        <?php $TrainingsWorkshops = TrainingsWorkshops::where('user_id', $client->id)->where('approval_status', 'approved')->order('id', 'desc')->get(); ?>
        {foreach $TrainingsWorkshops as $data}
        <tr>
            <td>{{$data->training_title}}</td>
            <td>{{$data->participation}}</td>
            <td>{{$data->sponsor_agency}}</td>
            <td>{{$data->inclusive_dates}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <h5>C. For expert services as adviser in doctoral dissertation, master's and undergraduate thesis</h5>
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Title of the Paper</th>
            <th>Nature</th>
            <th>Inclusive Dates</th>
        </tr>
        <?php $ExpertServices = ExpertServices::where('user_id', $client->id)->where('approval_status', 'approved')->order('id', 'desc')->get(); ?>
        {foreach $ExpertServices as $data}
        <tr>
            <td>{{$data->paper_title}}</td>
            <td>{{$data->nature}}</td>
            <td>{{$data->inclusive_dates}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <h5>D. For certified services (includes reviewer/ examiner in PRC or CSC, accreditation work, trade skill
        certification, services as coach/trainer, adviser of student organization)</h5>
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Nature/Area</th>
            <th>Company/ Agency</th>
            <th>Inclusive Dates</th>
        </tr>
        <?php $Accreditations = Accreditations::where('user_id', $client->id)->where('approval_status', 'approved')->order('id', 'desc')->get(); ?>
        {foreach $Accreditations as $data}
        <tr>
            <td>{{$data->nature}}</td>
            <td>{{$data->agency}}</td>
            <td>{{$data->inclusive_dates}}</td>
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
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Name of the Organization/ Honor Society</th>
            <th>Inclusive Dates</th>
        </tr>
        <?php $ProfessionalMemberships = ProfessionalMemberships::where('user_id', $client->id)->where('approval_status', 'approved')->order('id', 'desc')->get(); ?>
        {foreach $ProfessionalMemberships as $data}
        <tr>
            <td>{{$data->organization_name}}</td>
            <td>{{$data->inclusive_dates}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <center>
        <b>3.3.2 Academic honors received</b>
    </center>
    <br>
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Honors Received</th>
            <th>Degree Obtained</th>
            <th>Institution/Address</th>
        </tr>
        <?php $AcademicHonors = AcademicHonors::where('user_id', $client->id)->where('approval_status', 'approved')->order('id', 'desc')->get(); ?>
        {foreach $AcademicHonors as $data}
        <tr>
            <td>{{$data->honors_received}}</td>
            <td>{{$data->degree_obtained}}</td>
            <td>{{$data->institution_address}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <center>
        <b>3.3.3 Scholarship/Fellowship</b>
    </center>
    <br>
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Title of the Scholarship</th>
            <th>Nature (Competetive/Non-Competetive)</th>
            <th>Sponsoring Agency</th>
            <th>Inclusive Dates</th>
        </tr>
        <?php $Scholarships = Scholarships::where('user_id', $client->id)->where('approval_status', 'approved')->order('id', 'desc')->get(); ?>
        {foreach $Scholarships as $data}
        <tr>
            <td>{{$data->scholarship_title}}</td>
            <td>{{$data->nature}}</td>
            <td>{{$data->sponsor_agency}}</td>
            <td>{{$data->inclusive_dates}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <center>
        <b>3.4 Awards of Distinction received in recognition of achievement relevant areas of specialization, profession
            or assignment</b>
    </center>
    <br>
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Title of the Award</th>
            <th>Field of Services</th>
            <th>Grantor/ Organization</th>
            <th>Award Level</th>
        </tr>
        <?php $Achievements = Achievements::where('user_id', $client->id)->where('approval_status', 'approved')->order('id', 'desc')->get(); ?>
        {foreach $Achievements as $data}
        <tr>
            <td>{{$data->award_title}}</td>
            <td>{{$data->field_of_service}}</td>
            <td>{{$data->organization}}</td>
            <td>{{$data->level}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <center>
        <b>3.5 Community Outreach: Servuce - Oriented projects participated in the community</b>
    </center>
    <br>
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Title of the Project</th>
            <th>Participation/Service</th>
            <th>Sponsoring Agency</th>
            <th>Inclusive Dates</th>
        </tr>
        <?php $CommunityOutreach = CommunityOutreach::where('user_id', $client->id)->where('approval_status', 'approved')->order('id', 'desc')->get(); ?>
        {foreach $CommunityOutreach as $data}
        <tr>
            <td>{{$data->project_title}}</td>
            <td>{{$data->participation}}</td>
            <td>{{$data->sponsor_agency}}</td>
            <td>{{$data->inclusive_dates}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <center>
        <b>3.6 Professional Examinations</b>
    </center>
    <br>
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Title of the Examination</th>
            <th>Rating</th>
            <th>Date</th>
        </tr>
        <?php $ProfessionalExaminations = ProfessionalExaminations::where('user_id', $client->id)->where('approval_status', 'approved')->order('id', 'desc')->get(); ?>
        {foreach $ProfessionalExaminations as $data}
        <tr>
            <td>{{$data->exam_title}}</td>
            <td>{{$data->rating}}</td>
            <td>{{$data->date}}</td>
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
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Complete Title of the Research</th>
            <th>Level</th>
            <th>Sponsoring Agency</th>
            <th>Inclusive Dates</th>
        </tr>
        <?php $ResearchContributions = ResearchContributions::where('user_id', $client->id)->where('approval_status', 'approved')->order('id', 'desc')->get(); ?>
        {foreach $ResearchContributions as $data}
        <tr>
            <td>{{$data->title}}</td>
            <td>{{$data->level}}</td>
            <td>{{$data->sponsor_agency}}</td>
            <td>{{$data->inclusive_dates}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <center>
        <b>4.2 Supervision, tutoring, or coaching of graduate scientists and technology experts</b>
    </center>
    <br>
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Nature/Area of Supervision/Tutoring</th>
            <th>Country</th>
            <th>Sponsoring Agency</th>
            <th>Level</th>
            <th>Inclusive Dates</th>
        </tr>
        <?php $ProfessionalTutoring = ProfessionalTutoring::where('user_id', $client->id)->where('approval_status', 'approved')->order('id', 'desc')->get(); ?>
        {foreach $ProfessionalTutoring as $data}
        <tr>
            <td>{{$data->nature}}</td>
            <td>{{$data->country}}</td>
            <td>{{$data->sponsor_agency}}</td>
            <td>{{$data->level}}</td>
            <td>{{$data->inclusive_dates}}</td>
        </tr>
        {endforeach}
    </table>

    <hr>

    <center>
        <b>4.3 Research results applied or utilized in industrial and/or commercial projects or undertaking</b>
    </center>
    <br>
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Complete title of the Research</th>
            <th>Level</th>
            <th>Sponsoring Agency</th>
            <th>Inclusive Dates</th>
        </tr>
        <?php $IndustrialResearches = IndustrialResearches::where('user_id', $client->id)->where('approval_status', 'approved')->order('id', 'desc')->get(); ?>
        {foreach $IndustrialResearches as $data}
        <tr>
            <td>{{$data->title}}</td>
            <td>{{$data->level}}</td>
            <td>{{$data->sponsor_agency}}</td>
            <td>{{$data->inclusive_dates}}</td>
        </tr>
        {endforeach}
    </table>
</div>

@stop()