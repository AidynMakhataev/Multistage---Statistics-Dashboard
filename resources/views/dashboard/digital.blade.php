@extends('dashboard.master')


@section('content')
    @include('dashboard.header')
    <div class="ms-main">
        <div class="row">
            <div class="col-xl-12">
                <div class="ms-main__totalWrp ms-main__totalWrp--left">
                    <span class="ms-main__totalName">Total Plan</span>
                    <img src="{{asset('build/images/ms-heart.png')}}" alt="" class="ms-main__totalImg">
                    <span class="ms-main__totalNum">{{$actionsOverview->sum('pr_plan')}}</span>
                </div>
                <div class="ms-main__totalWrp">
                    <span class="ms-main__totalName">Total Fact</span>
                    <img src="{{asset('build/images/ms-heart.png')}}" alt="" class="ms-main__totalImg">
                    <span class="ms-main__totalNum">{{$actionsOverview->sum('pr_fact')}}</span>
                </div>
                <div class="ms-main__totalWrp align-top">
                    <span class="ms-main__totalName">Total Spend</span>
                    <span class="ms-main__totalNum ms-main__totalNum--last">{{$actionsOverview->sum(function ($item) {return $item['views_fact'] * $item['cpv'];})}}&#8376;</span>
                </div>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="ms-heading__headingWrp d-flex justify-content-center">
                <div class="col-xl-10 col-10">
                    <span id="action" class="ms-heading__heading ms-heading__heading--action ms-heading__heading--active">ACTION OVERVIEW</span>
                    <span id="people" class="ms-heading__heading ms-heading__heading--people">PEOPLE REACHED PLAN VS FACT</span>
                    <span id="view" class="ms-heading__heading ms-heading__heading--view">VIEWS PLAN VS FACT</span>
                </div>
            </div>
        </div>
        <section class="ms-digital">
            <div class="container">
                <div id="firstTab" class="ms-action ms-action--first">
                    <div class="row">
                        <div class="ms-action__titleWrp d-flex justify-content-center">
                            <div class="col-xl-11">
                                <span class="ms-action__title">Actions Overview</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="ms-action__tableWrp d-flex justify-content-center">
                            <div class="col-xl-11 table-responsive">
                                <table class="ms-action__table">
                                    <tr>
                                        <th class="ms-action__head">Resources</th>
                                        <th class="ms-action__head">People reached(plan)</th>
                                        <th class="ms-action__head">People reached(fact)</th>
                                        <th class="ms-action__head">Views(Plan)</th>
                                        <th class="ms-action__head">Views(Fact)</th>
                                        <th class="ms-action__head">Engagements</th>
                                        <th class="ms-action__head">View through rate (VTR)</th>
                                        <th class="ms-action__head">View through rate (CTR)</th>
                                        <th class="ms-action__head">Cost per view (CPV)</th>
                                        <th class="ms-action__head">Total Spend</th>
                                    </tr>
                                    @foreach($actionsOverview as $item)
                                    <tr>
                                        <td class="ms-action__heading">{{$item['name']}}</td>
                                        <td>{{$item['pr_plan']}}</td>
                                        <td>{{$item['pr_fact']}}</td>
                                        <td>{{$item['views_plan']}}</td>
                                        <td>{{$item['views_fact']}}</td>
                                        <td>{{round($item['views_fact'] * 0.08)}}</td>
                                        <td>{{round(($item['views_fact'] / $item['pr_fact'])*100)}}%</td>
                                        <td>{{round(round($item['views_fact'] * 0.08) / $item['pr_fact']*100)}}%</td>
                                        <td>{{$item['cpv']}}&#8376;</td>
                                        <td>{{$item['views_fact'] * $item['cpv']}}&#8376;</td>
                                    </tr>
                                    @endforeach
                                    <tr class="ms-action__total" style="border-top: 1px solid rgba(119, 119, 119, 0.1);">
                                        <td class="ms-action__heading--total">Total</td>
                                        <td class="ms-action__totalNum">{{$actionsOverview->sum('pr_plan')}}</td>
                                        <td class="ms-action__totalNum">{{$actionsOverview->sum('pr_fact')}}</td>
                                        <td class="ms-action__totalNum">{{$actionsOverview->sum('views_plan')}}</td>
                                        <td class="ms-action__totalNum">{{$actionsOverview->sum('views_fact')}}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="ms-action__heading--total ms-action__heading--sub">sub</td>
                                        <td class="ms-action__totalNum ms-action__totalNum--last">{{$actionsOverview->sum(function ($item) {return $item['views_fact'] * $item['cpv'];})}}&#8376;</td>


                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="secondTab" class="ms-action ms-action--secondTab ms-action--second">
                    <div class="row">
                        <div class="ms-action__titleWrp d-flex justify-content-center">
                            <div class="col-xl-11">
                                <span class="ms-action__title">People Reached Plan vs Fact</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 text-center">
                        @php
                            $dataSets = [];
                            $totalPlan = [
                                'label' => 'Plan',
                                'data' => $actionsOverview->pluck('pr_plan'),
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
                                'data' => $actionsOverview->pluck('pr_fact'),
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
                        <div class="ms-action__imgWrp">
                            <chartjs-bar :labels="{{ json_encode($actionsOverview->pluck('name'))  }}"
                                         :datasets="{{ json_encode($dataSets) }}"
                                         :option="{{ json_encode(['responsive' => true, 'maintainAspectRatio' => true])  }}"

                            ></chartjs-bar>
                        </div>
                    </div>
                </div>
                <div id="thirdTab" class="ms-action ms-action--thirdTab ms-action--second">
                    <div class="row">
                        <div class="ms-action__titleWrp d-flex justify-content-center">
                            <div class="col-xl-11">
                                <span class="ms-action__title"></span>
                            </div>
                        </div>
                    </div>
                    @php
                        $viewSets = [];
                        $viewsPlan = [
                            'label' => 'Plan',
                            'data' => $actionsOverview->pluck('views_plan'),
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
                            'data' => $actionsOverview->pluck('views_fact'),
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
                    <div class="col-xl-12 text-center">
                        <div class="ms-action__imgWrp">
                            <chartjs-bar :labels="{{ json_encode($actionsOverview->pluck('name'))  }}"
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
        @include('dashboard.social')


    </div>
@endsection

