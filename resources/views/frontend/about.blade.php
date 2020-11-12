@extends('layouts.main')
@section('content')
            <section id="history" class="history sections">
                <div class="container">
                    <div class="row">
                        <div class="main_history">
                            <div class="col-sm-6">
                                <div class="single_history_img">
                                    <img src="assets/images/stab1.png" alt="">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="single_history_content">
                                    <div class="head_title">
                                        <h2>Over ons</h2>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div><!--End of row -->
                </div><!--End of container -->
            </section>
            <section id="teams" class="teams roomy-80">
                <div class="container">
                    <div class="row">
                        <div class="main_teams">
                            <div class="col-md-12">
                                <div class="head_title text-left sm-text-center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                                    <h2>Het team achter IT-Jobvinder</h2>
                                    <h5><em>Oprichter Gijs Machielsen, een startende programmeur die zeer gemotiveerd is om zowel kandidaten en bedrijven te helpen om tot een arbeidsrelatie te komen is de bouwer achter deze website. Gijs wilt met deze website een platform bieden voor ondernemende kandidaten en ondernemende ondernemers die huidige werkwijze van recruitmentbureaus zat zijn, waarbij eigenlijk maar één belang telt en dat is heel veel geld. Gijs wilt met deze website antwoord bieden op die kandidaten en ondernemers door gratis kandidaten en bedrijven te helpen om bij elkaar te komen. </em></h5>
                                    <div class="separator_left"></div>
                                </div>
                            </div>
                            <div class="row">
                            @foreach($staffmembers as $staffmember)
                                <div class="col-md-4 col-sm-6">
                                    <div class="team_item m-top-30">
                                        <div class="team_img">
                                            <img src="{{ asset('uploads/staffmemberImages') }}/{{ $staffmember->image }}" width="200px" style="width: 200px" alt="">
                                            <div class="team_caption">
                                                <h4 class="">{{ $staffmember->name }}</h4>
                                                <h5><em>{{ $staffmember->function }}</em></h5>
                                                <p>{!! $staffmember->description !!}</p>
                                                <br>
                                                <div class="contact">
                                                    <div class="btn btn-info">
                                                        <p>{{ $staffmember->email }}</p>
                                                    </div>
                                                </div>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End off col-md-3 -->
                            @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </section>
@endsection