<div class="ms-people__inner ms-people__inner--country">
    <div class="row no-gutters">
        <div class="col-xl-12">
            <div class="row no-gutters">
                <div class="col-xl-5">
                    <div class="ms-people__titleWrp">
                        <span class="ms-people__title">Country Report</span>
                    </div>
                    <table class="ms-people__table">
                        <tr>
                            <th class="ms-people__heading">Country</th>
                            <th class="ms-people__heading">Local Views</th>
                            <th class="ms-people__heading">% of Fans Base</th>
                        </tr>
                        @foreach($countryReport as $item)
                            <tr>
                                <td>{{$item['country']}}</td>
                                <td>{{$item['local_views']}}</td>
                                <td>{{$item['fans_base']}}%</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="col-xl-7">
                    <div class="ms-people__titleWrp ms-people__titleWrp--country">
                        <span class="ms-people__title">Country Report</span>
                    </div>
                    <div class="ms-people__imgWrp ms-people__imgWrp--country">
                        <chartjs-pie :option="{{ json_encode(
                                                                    ['responsive' => true,
                                                                    'maintainAspectRatio' => true,
                                                                    'showAllTooltips' => false,
                                                                    'legend' => ['display' => true, 'position' => 'right']
                                                                    ])  }}"
                                     :labels="{{ json_encode(array_column($countryReport, 'country'))  }}"
                                     :data="{{ json_encode(array_column($countryReport, 'fans_base'))  }}"
                                     :width="490" :height="490"
                                     :backgroundcolor="[
                                                                    '#36a2eb',
                                                                    '#F17F42',
                                                                    '#58C9B9',
                                                                    '#30A9DE',
                                                                    '#EFFFE9',
                                                                    '#C16200',
                                                                    '#D81159',
                                                                ]
                                                    "
                        >

                        </chartjs-pie>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
