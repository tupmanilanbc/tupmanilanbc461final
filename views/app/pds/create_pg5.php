@extend('layouts/frontend', ['title' => 'PDS Data Entry'])
@import(\App\Models\PDS)

<nav aria-label="...">
    <ul class="pagination">
        <li><a href="/app/pds/create/1">1 <span class="sr-only">(current)</span></a></li>
        <li><a href="/app/pds/create/2">2 <span class="sr-only">(current)</span></a></li>
        <li><a href="/app/pds/create/3">3 <span class="sr-only">(current)</span></a></li>
        <li><a href="/app/pds/create/4">4 <span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="/app/pds/create/5">5 <span class="sr-only">(current)</span></a></li>
    </ul>
</nav>

<ul class="nav nav-tabs">
    <li><a href="/app/pds/create/1">PERSONAL</a></li>
    <li><a href="/app/pds/create/2">EDUCATIONAL QUALIFICATIONS</a></li>
    <li><a href="/app/pds/create/3">EXPERIENCE AND LENGTH OF SERVICE</a></li>
    <li><a href="/app/pds/create/4">PROFESSIONAL DEVELOPMENT, ACHIEVEMENTS, AND HONORS</a></li>
    <li class="active"><a data-toggle="tab" href="/app/pds/create/5">RESEARCH</a></li>
</ul>

<center>
    <h3>4.0 RESEARCH</h3>
    <hr>
</center>
<center>
    <h4>4.1 Research recommendations transformed to public policy benefiting the country and other creative works
    </h4>
</center>
<div class="well">
    <form class="multi-fields" data-post-route="/app/pds/ajax" data-db-model="ResearchContributions"
          onsubmit="return false;">
        <div class="row">
            <div class="col-md-12"><br>
                <label>Complete Title of the Research</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="col-md-12"><br>
                <label>Level (Int'l/ Nat'l/ Reg'l/ Local/ Inst'l)</label>
                <select name="level" class="form-control">
                    <option value="">------------</option>
                    <option value="International">International</option>
                    <option value="National">National</option>
                    <option value="Regional">Regional</option>
                    <option value="Institutional">Institutional</option>
                </select>
            </div>
            <div class="col-md-12"><br>
                <label>Sponsoring Agency</label>
                <input type="text" name="sponsor_agency" class="form-control" required>
            </div>
            <div class="col-md-12"><br>
                <label>Inclusive Dates</label>
                <input type="date" name="inclusive_dates" class="form-control" required>
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
<br>

<center>
    <h4>4.2 Supervision, tutoring, or coaching of graduate scientists and technology experts</h4>
</center>

<div class="well">
    <form class="multi-fields" data-post-route="/app/pds/ajax" data-db-model="ProfessionalTutoring"
          onsubmit="return false;">
        <div class="row">
            <div class="col-md-12"><br>
                <label>Nature/ Area of Supervision/ Tutoring</label>
                <input type="text" name="nature" class="form-control" required>
            </div>
            <div class="col-md-12"><br>
                <label>Country</label>
                <select name="country" required class="form-control">
                    <option value="">-------</option>
                    <option value="Afghanistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Australia">Australia</option>
                    <option value="Austria">Austria</option>
                    <option value="Azerbaijan">Azerbaijan</option>
                    <option value="Bahamas">Bahamas</option>
                    <option value="Bahrain">Bahrain</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Barbados">Barbados</option>
                    <option value="Belarus">Belarus</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Belize">Belize</option>
                    <option value="Benin">Benin</option>
                    <option value="Bermuda">Bermuda</option>
                    <option value="Bhutan">Bhutan</option>
                    <option value="Bolivia">Bolivia</option>
                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Brazil">Brazil</option>
                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Canada">Canada</option>
                    <option value="Cape Verde">Cape Verde</option>
                    <option value="Cayman Islands">Cayman Islands</option>
                    <option value="Central African Republic">Central African Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="China - Hong Kong / Macau">China - Hong Kong / Macau</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Comoros">Comoros</option>
                    <option value="Congo">Congo</option>
                    <option value="Congo, Democratic Republic of (DRC)">Congo, Democratic Republic of (DRC)</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Croatia">Croatia</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Cyprus">Cyprus</option>
                    <option value="Czech Republic">Czech Republic</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Dominica">Dominica</option>
                    <option value="Dominican Republic">Dominican Republic</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Egypt">Egypt</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                    <option value="Eritrea">Eritrea</option>
                    <option value="Estonia">Estonia</option>
                    <option value="Ethiopia">Ethiopia</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="French Guiana">French Guiana</option>
                    <option value="Gabon">Gabon</option>
                    <option value="Gambia">Gambia</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Great Britain">Great Britain</option>
                    <option value="Greece">Greece</option>
                    <option value="Grenada">Grenada</option>
                    <option value="Guadeloupe">Guadeloupe</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guinea">Guinea</option>
                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="India">India</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Iran">Iran</option>
                    <option value="Iraq">Iraq</option>
                    <option value="Israel and the Occupied Territories">Israel and the Occupied Territories</option>
                    <option value="Italy">Italy</option>
                    <option value="Ivory Coast (Cote d'Ivoire)">Ivory Coast (Cote d'Ivoire)</option>
                    <option value="Jamaica">Jamaica</option>
                    <option value="Japan">Japan</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Korea, Democratic Republic of (North Korea)">Korea, Democratic Republic of (North
                        Korea)
                    </option>
                    <option value="Korea, Republic of (South Korea)">Korea, Republic of (South Korea)</option>
                    <option value="Kosovo">Kosovo</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Kyrgyz Republic (Kyrgyzstan)">Kyrgyz Republic (Kyrgyzstan)</option>
                    <option value="Laos">Laos</option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Liberia">Liberia</option>
                    <option value="Libya">Libya</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Macedonia, Republic of">Macedonia, Republic of</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Malawi">Malawi</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Mali">Mali</option>
                    <option value="Malta">Malta</option>
                    <option value="Martinique">Martinique</option>
                    <option value="Mauritania">Mauritania</option>
                    <option value="Mauritius">Mauritius</option>
                    <option value="Mayotte">Mayotte</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montenegro">Montenegro</option>
                    <option value="Montserrat">Montserrat</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar/Burma">Myanmar/Burma</option>
                    <option value="Namibia">Namibia</option>
                    <option value="Nepal">Nepal</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pacific Islands">Pacific Islands</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Panama">Panama</option>
                    <option value="Papua New Guinea">Papua New Guinea</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Philippines">Philippines</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Puerto Rico">Puerto Rico</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Reunion">Reunion</option>
                    <option value="Romania">Romania</option>
                    <option value="Russian Federation">Russian Federation</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                    <option value="Saint Lucia">Saint Lucia</option>
                    <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                    <option value="Samoa">Samoa</option>
                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Serbia">Serbia</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra Leone">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Slovak Republic (Slovakia)">Slovak Republic (Slovakia)</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="South Sudan">South Sudan</option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Sudan">Sudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Swaziland">Swaziland</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syria">Syria</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania">Tanzania</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Netherlands">Netherlands</option>
                    <option value="Timor Leste">Timor Leste</option>
                    <option value="Togo">Togo</option>
                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                    <option value="Tunisia">Tunisia</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Turks & Caicos Islands">Turks & Caicos Islands</option>
                    <option value="Uganda">Uganda</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Emirates">United Arab Emirates</option>
                    <option value="United States of America (USA)">United States of America (USA)</option>
                    <option value="Uruguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Vietnam">Vietnam</option>
                    <option value="Virgin Islands (UK)">Virgin Islands (UK)</option>
                    <option value="Virgin Islands (US)">Virgin Islands (US)</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                </select>
            </div>
            <div class="col-md-12"><br>
                <label>Sponsoring Agency</label>
                <input type="text" name="sponsor_agency" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label>Level (Int'l/ Nat'l/ Reg'l/ Local/ Inst'l)</label>
                <select name="level" class="form-control">
                    <option value="">------------</option>
                    <option value="International">International</option>
                    <option value="National">National</option>
                    <option value="Regional">Regional</option>
                    <option value="Institutional">Institutional</option>
                </select>
            </div>
            <div class="col-md-12"><br>
                <label>Inclusive Dates</label>
                <input type="date" name="inclusive_dates" class="form-control" required>
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
<br>

<center>
    <h4>4.3 Research results applied or utilized in industrial and/or commercial projects or undertaking</h4>
</center>

<div class="well">
    <form class="multi-fields" data-post-route="/app/pds/ajax" data-db-model="IndustrialResearches"
          onsubmit="return false;">
        <div class="row">
            <div class="col-md-12"><br>
                <label>Complete title of the Research</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label>Level (Int'l/ Nat'l/ Reg'l/ Local/ Inst'l)</label>
                <select name="level" class="form-control">
                    <option value="">------------</option>
                    <option value="International">International</option>
                    <option value="National">National</option>
                    <option value="Regional">Regional</option>
                    <option value="Institutional">Institutional</option>
                </select>
            </div>
            <div class="col-md-12"><br>
                <label>Sponsoring Agency</label>
                <input type="text" name="sponsor_agency" class="form-control" required>
            </div>
            <div class="col-md-12"><br>
                <label>Inclusive Dates</label>
                <input type="date" name="inclusive_dates" class="form-control" required>
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