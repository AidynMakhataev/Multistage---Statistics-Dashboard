<div class="ms-people">
    <div class="row">
        <div class="col-xl-7 col-md-12 col-sm-12 col-12 ms-people__padding">
            <div class="ms-people__inner ms-people__inner--margin">
                <div class="ms-people__titleWrp">
                    <span class="ms-people__title">People Overview</span>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-12">
                        <table class="ms-people__table">
                            <tr style="">
                                <th class="ms-people__heading">Age</th>
                                <th class="ms-people__heading"></th>
                            </tr>
                            @foreach($peopleOverview['ages'] as $item)
                                <tr>
                                    <td>{{$item['age']}}</td>
                                    <td>{{$item['percentage']}}%</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="col-xl-6 col-12 text-center">
                        <div class="ms-people__imgWrp">
                            <chartjs-horizontal-bar
                                    :backgroundcolor="[
                                                            'rgba(54, 162, 235, 0.2)',
                                                            'rgba(255, 99, 132, 0.2)',
                                                            'rgba(54, 162, 235, 0.2)',
                                                            'rgba(54, 162, 235, 0.2)',
                                                            'rgba(255, 99, 132, 0.2)'
                                                        ]
                                                     "
                                    :bordercolor="[
                                                            'rgba(54, 162, 235, 1)',
                                                            'rgba(255,99,132,1)'
                                                        ]
                                                    "
                                    :option="{{ json_encode(['responsive' => true, 'maintainAspectRatio' => true])  }}"
                                    :datalabel="'Age overview'"
                                    :labels="{{ json_encode(array_column($peopleOverview['ages'], 'age'))  }}"
                                    :data="{{ json_encode(array_column($peopleOverview['ages'], 'percentage'))  }}"
                                    :width="331" :height="331"
                            ></chartjs-horizontal-bar>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-5 col-md-12 col-sm-12 col-12 ms-people__padding--right">
            <div class="ms-people__inner">
                <div class="ms-people__titleWrp">
                    <span class="ms-people__title">People Overview</span>
                </div>
                <div class="row">
                    <div class="col-xl-5 col-md-5 col-sm-5 col-12">
                        <table class="ms-people__table">
                            <tr style="">
                                <th class="ms-people__heading ms-people__heading--gender">Gender</th>
                                <th class="ms-people__heading"></th>
                            </tr>
                            <tr>
                                <td>Male</td>
                                <td>{{$peopleOverview['gender']['male']}}%</td>
                            </tr>
                            <tr>
                                <td>Female</td>
                                <td>{{$peopleOverview['gender']['female']}}%</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xl-7 col-md-7 col-sm-7 col-12 text-center">
                        <div class="ms-people__imgWrp ms-people__imgWrp--circle">
                            <chartjs-pie :option="{{ json_encode(['responsive' => true, 'maintainAspectRatio' => true, 'showAllTooltips' => true])  }}"
                                         :labels="['Male', 'Female']"
                                         :data="{{ json_encode([$peopleOverview['gender']['male'], $peopleOverview['gender']['female']])  }}"
                                         :width="271" :height="271"
                            >

                            </chartjs-pie>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
