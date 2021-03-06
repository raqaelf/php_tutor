@extends('layout.mastercourse')
@section('content')
    <div class="row clearfix progress-box">
        <div class="col-lg-6 col-md-6 col-sm-12 mb-30">
            <div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
                <div class="project-info clearfix">
                    <div class="project-info-left">
                        <div class="icon box-shadow bg-blue text-white">
                            <i class="fa fa-line-chart" aria-hidden="true"></i>
                        </div>
                    </div>
                    @php
                        $countR = [];
                        if (!empty($reportsC1)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC2)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC3)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC4)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC5)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC6)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC7)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC8)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC9)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC10)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC11)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC12)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC13)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC14)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC15)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC16)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC17)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC18)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC19)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC20)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC21)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC22)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC23)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC24)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC25)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC26)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC27)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC28)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC29)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC30)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC31)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC32)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC33)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC34)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC35)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC36)){
                            array_push($countR,1);
                        }
                    @endphp
                    <div class="project-info-right">
                        <span class="no text-blue weight-500 font-24">{{count($countR)}}/{{$total_course_perunit}}</span>
                        <p class="weight-400 font-18">My Progress</p>
                    </div>
                </div>
                <div class="project-info-progress">
                    <div class="row clearfix">
                        <div class="col-sm-6 text-muted weight-500">Target</div>
                        <div class="col-sm-6 text-right weight-500 font-14 text-muted">{{$total_course_perunit}}</div>
                    </div>
                    <div class="progress" style="height: 10px;">
                        @php
                            $width = (count($countR)/$total_course_perunit)*100;
                        @endphp
                        <div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{$width}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 mb-30">
            <div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
                <div class="project-info clearfix">
                    <div class="project-info-left">
                        <div class="icon box-shadow bg-light-orange text-white">
                            <i class="fa fa-list-alt"></i>
                        </div>
                    </div>
                    <div class="project-info-right">
                        <span class="no text-light-orange weight-500 font-24">
                            @if(!empty($lastreport))
                                {{$lastreport->description}}
                            @else
                                Haven't taken any exercise
                            @endif
                        </span>
                        <p class="weight-400 font-18">Last Completed Exercise</p>
                    </div>
                </div>
                <div class="project-info-progress">
                    <div class="row clearfix">
                        <div class="col-sm-6 text-muted weight-500">Last Score</div>
                        <div class="col-sm-6 text-right weight-500 font-14 text-muted">
                            @if(!empty($lastreport))
                                @if($lastreport->score < 60)
                                    Bad
                                @elseif($lastreport->score >= 60 && $lastreport->score <= 80)
                                    Good
                                @elseif($lastreport->score >= 80 && $lastreport->score < 100)
                                    Excellent!
                                @else
                                    Perfect!
                                @endif
                            @else
                                -
                            @endif

                        </div>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-light-orange progress-bar-striped progress-bar-animated" role="progressbar" style="width:@if(!empty($lastreport)){{$lastreport->score}}@endif%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
