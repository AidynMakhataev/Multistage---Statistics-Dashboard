@extends('dashboard.master')

@section('content')
    @include('dashboard.header')
    <div class="ms-main">
        <div class="row">
            <div class="col-xl-12">
                <div class="ms-main__totalWrp ms-main__totalWrp--left">
                    <span class="ms-main__totalName">Total Plan</span>
                    <img src="{{asset('build/images/ms-heart.png')}}" alt="" class="ms-main__totalImg">
                    <span class="ms-main__totalNum">{{$smmOverview->sum('tf_plan')}}</span>
                </div>
                <div class="ms-main__totalWrp">
                    <span class="ms-main__totalName">Total Fact</span>
                    <img src="{{asset('build/images/ms-heart.png')}}" alt="" class="ms-main__totalImg">
                    <span class="ms-main__totalNum">{{$smmOverview->sum('tf_fact')}}</span>
                </div>
                <div class="ms-main__totalWrp align-top">
                    <span class="ms-main__totalName">Total Spend</span>
                    <span class="ms-main__totalNum ms-main__totalNum--last">{{$smmOverview->sum(function ($item) {return $item['pp_fact'] * $item['cpv'];})}}&#8376;</span>
                </div>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="ms-heading__headingWrp d-flex justify-content-center">
                <div class="col-xl-10 col-10">
                    <span id="action" class="ms-heading__heading ms-heading__heading--action ms-heading__heading--active">SMM OVERVIEW</span>
                    <span id="people" class="ms-heading__heading ms-heading__heading--people">PEOPLE REACHED PLAN VS FACT</span>
                    <span id="view" class="ms-heading__heading ms-heading__heading--view">VIEWS PLAN VS FACT</span>
                </div>
            </div>
        </div>
        <section class="ms-smm">
            <div class="container">
                <div id="firstTabSMM" class="ms-action ms-action--first">
                    <div class="row">
                        <div class="ms-action__titleWrp d-flex justify-content-center">
                            <div class="col-xl-11">
                                <span class="ms-action__title">SMM Overview</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="ms-action__tableWrp d-flex justify-content-center">
                            <div class="col-xl-11 table-responsive">
                                <table class="ms-action__table">
                                    <tr>
                                        <th class="ms-action__head">Resources</th>
                                        <th class="ms-action__head">Total Fans (Plan)</th>
                                        <th class="ms-action__head">Total Fans (Fact)</th>
                                        <th class="ms-action__head">Page Posts (Plan)</th>
                                        <th class="ms-action__head">Page Posts (Fact)</th>
                                        <th class="ms-action__head">Total Interactions</th>
                                        <th class="ms-action__head">Reactions</th>
                                        <th class="ms-action__head">Comments</th>
                                        <th class="ms-action__head">Shares</th>
                                        <th class="ms-action__head">Relative Change in Fans</th>
                                        <th class="ms-action__head">Total Spend</th>
                                    </tr>
                                    @foreach($smmOverview as $item)
                                    <tr>
                                        <td class="ms-action__heading">{{$item['name']}}</td>
                                        <td>{{$item['tf_plan']}}</td>
                                        <td>{{$item['tf_fact']}}</td>
                                        <td>{{$item['pp_plan']}}</td>
                                        <td>{{$item['pp_fact']}}</td>
                                        <td>{{$item['reactions'] + $item['comments'] +  $item['shares']}}</td>
                                        <td>{{$item['reactions']}}</td>
                                        <td>{{$item['comments']}}</td>
                                        <td>{{$item['shares']}}</td>
                                        <td>{{($item['tf_fact'] / $item['tf_plan']) * 100}}%</td>
                                        <td>{{$item['pp_fact'] * $item['cpv']}}$</td>
                                    </tr>
                                    @endforeach

                                    <tr class="ms-action__total" style="border-top: 1px solid rgba(119, 119, 119, 0.1);">
                                        <td class="ms-action__heading--total">Total</td>
                                        <td class="ms-action__totalNum">{{$smmOverview->sum('tf_plan')}}</td>
                                        <td class="ms-action__totalNum">{{$smmOverview->sum('tf_fact')}}</td>
                                        <td class="ms-action__totalNum">{{$smmOverview->sum('pp_plan')}}</td>
                                        <td class="ms-action__totalNum">{{$smmOverview->sum('pp_fact')}}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="ms-action__totalNum ms-action__totalNum--last">{{$smmOverview->sum(function ($item) {return $item['pp_fact'] * $item['cpv'];})}}$</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="secondTabSMM" class="ms-action ms-action--secondTab ms-action--second">
                    <div class="row">
                        <div class="ms-action__titleWrp d-flex justify-content-center">
                            <div class="col-xl-11">
                                <span class="ms-action__title">Actions Overview</span>
                            </div>
                        </div>
                        @php
                            $dataSets = [];
                            $totalPlan = [
                                'label' => 'Plan',
                                'data' => $smmOverview->pluck('tf_plan'),
                                'backgroundColor' => ['rgba(54, 162, 235, 0.2)',
                                                       'rgba(54, 162, 235, 0.2)',
                                                       'rgba(54, 162, 235, 0.2)',
                                                       'rgba(54, 162, 235, 0.2)',
                                                       'rgba(54, 162, 235, 0.2)',
                                                       'rgba(54, 162, 235, 0.2)'
                                                      ],
                                'borderColor' => [
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(54, 162, 235, 1)'
                                                 ],
                            ];
                            $totalFact = [
                                'label' => 'Fact',
                                'data' => $smmOverview->pluck('tf_fact'),
                                'backgroundColor' =>  [
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(255, 99, 132, 0.2)'
                                                    ],
                                'borderColor' => [
                                                        'rgba(255,99,132,1)',
                                                        'rgba(255,99,132,1)',
                                                        'rgba(255,99,132,1)',
                                                        'rgba(255,99,132,1)',
                                                        'rgba(255,99,132,1)',
                                                        'rgba(255,99,132,1)'
                                                  ]
                            ];
                            array_push($dataSets, $totalPlan, $totalFact);
                        @endphp
                    </div>
                    <div class="col-xl-12 text-center">
                        <div class="ms-action__imgWrp">
                            <chartjs-bar :labels="{{ json_encode($smmOverview->pluck('name'))  }}"
                                         :datasets="{{ json_encode($dataSets) }}"
                                         :option="{{ json_encode(['responsive' => true, 'maintainAspectRatio' => true])  }}"
                            ></chartjs-bar>
                        </div>
                    </div>
                </div>
                <div id="thirdTabSMM" class="ms-action ms-action--thirdTab ms-action--second">
                    <div class="row">
                        <div class="ms-action__titleWrp d-flex justify-content-center">
                            <div class="col-xl-11">
                                <span class="ms-action__title">Actions Overview</span>
                            </div>
                        </div>
                        @php
                            $viewSets = [];
                            $viewsPlan = [
                                'label' => 'Plan',
                                'data' => $smmOverview->pluck('pp_plan'),
                                'backgroundColor' => ['rgba(54, 162, 235, 0.2)',
                                                       'rgba(54, 162, 235, 0.2)',
                                                       'rgba(54, 162, 235, 0.2)',
                                                       'rgba(54, 162, 235, 0.2)',
                                                       'rgba(54, 162, 235, 0.2)',
                                                       'rgba(54, 162, 235, 0.2)'
                                                      ],
                                'borderColor' => [
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(54, 162, 235, 1)'
                                                 ],
                            ];
                            $viewsFact = [
                                'label' => 'Fact',
                                'data' => $smmOverview->pluck('pp_fact'),
                                'backgroundColor' =>  [
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(255, 99, 132, 0.2)'
                                                    ],
                                'borderColor' => [
                                                        'rgba(255,99,132,1)',
                                                        'rgba(255,99,132,1)',
                                                        'rgba(255,99,132,1)',
                                                        'rgba(255,99,132,1)',
                                                        'rgba(255,99,132,1)',
                                                        'rgba(255,99,132,1)'
                                                  ]
                            ];
                            array_push($viewSets, $viewsPlan, $viewsFact);
                        @endphp
                    </div>
                    <div class="col-xl-12 text-center">
                        <div class="ms-action__imgWrp">
                            <chartjs-bar :labels="{{ json_encode($smmOverview->pluck('name'))  }}"
                                         :datasets="{{ json_encode($viewSets) }}"
                                         :option="{{ json_encode(['responsive' => true, 'maintainAspectRatio' => true])  }}"

                            ></chartjs-bar>
                        </div>
                    </div>
                </div>
                @include('dashboard.people')
                @include('dashboard.country')
            </div>
        </section>
        @isset($report->video_link)
            @include('dashboard.video')
        @endisset
    </div>

@endsection
