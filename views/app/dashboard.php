@extend('layouts/frontend', ['title' => 'Dashboard'])

<div class="row">
    <div class="col-md-6">
        <center><img id="image" style="margin-top: 2em" src="/img/tuplogo.png"/></center>
        <br>
        <hr>
        <br>
        <div class="jumbotron">
            Web Based NBC 461
            <h3>TUP Manila</h3>
        </div>
        <script>
            var img = document.querySelector('#image');
            var ctr = false;
            var time = setInterval(function () {
                if (ctr == false) {
                    ctr = true;
                    img.style.transform = 'scale(1.05)';
                } else {
                    ctr = false;
                    img.style.transform = 'scale(1)';
                }
            }, 700);
        </script>

    </div>
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title"><i class="fa fa-file"></i> List of Maximum points</h4>
            </div>
            <div class="card-body table-responsive well">
                <table class="table table-hover">
                    <thead class="text-warning">
                    <th>Section/ Description</th>
                    <th>Max points</th>

                    </thead>
                    <tbody>
                    <tr>
                        <td>1. Educational Qualification</td>

                        <td>85</td>

                    </tr>
                    <tr>
                        <td>2. Experience & Length of Service</td>
                        <td>25</td>

                    </tr>
                    <tr>
                        <td>Professional Achievement and Honors</td>

                        <td>90</td>

                    </tr>
                    <tr>
                        <td>3-1. Discoveries, patented inventions, innovations, published books, etc.</td>

                        <td>30</td>

                    </tr>
                    <tr>
                        <td>3-2. Expert services, training and active participation in professional/technical
                            activities
                        </td>

                        <td>30</td>

                    </tr>
                    <tr>
                        <td>3-2-1. Training and Seminars</td>

                        <td>10</td>

                    </tr>
                    <tr>
                        <td>3-2-2. Expert services rendered</td>

                        <td>20</td>

                    </tr>
                    <tr>
                        <td>3-3. Membership in Professional organizations/ honor societies and honors received</td>

                        <td>10</td>

                    </tr>
                    <tr>
                        <td>3-4. Awards of distinction received</td>

                        <td>67.53</td>

                    </tr>
                    <tr>
                        <td>3-5. Community outreach</td>

                        <td>5</td>

                    </tr>
                    <tr>
                        <td>3-6. Professional Examination</td>

                        <td>10</td>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop()