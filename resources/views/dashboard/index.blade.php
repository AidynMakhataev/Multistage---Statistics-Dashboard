@extends('dashboard.master')


@section('content')
    <div class="ms-header">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="ms-header__nameWrp">
                        <span class="ms-header__name">Digital Campaign<br> Report</span>
                        <span class="ms-header__name align-top">Galazolin GEL</span>
                    </div>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </div>
    <div class="ms-main">
        <div class="row">
            <div class="col-xl-12">
                <div class="ms-main__totalWrp ms-main__totalWrp--left">
                    <span class="ms-main__totalName">Total Plan</span>
                    <img src="build/images/ms-heart.png" alt="" class="ms-main__totalImg">
                    <span class="ms-main__totalNum">860000</span>
                </div>
                <div class="ms-main__totalWrp">
                    <span class="ms-main__totalName">Total Fact</span>
                    <img src="build/images/ms-heart.png" alt="" class="ms-main__totalImg">
                    <span class="ms-main__totalNum">127429</span>
                </div>
                <div class="ms-main__totalWrp align-top">
                    <span class="ms-main__totalName">Total Spend</span>
                    <span class="ms-main__totalNum ms-main__totalNum--last">666 238,17&#8376;</span>
                </div>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="ms-heading__headingWrp d-flex justify-content-center">
                <div class="col-xl-10 col-10">
                    <span id="action" class="ms-heading__heading ms-heading__heading--action ms-heading__heading--active">ACTION OVERVIEW</span>
                    <span id="people" class="ms-heading__heading ms-heading__heading--people">PEOPLE REACHED PLAN VS FACT</span>
                    <span  class="ms-heading__heading">VIEWS PLAN VS FACT</span>
                </div>
            </div>
        </div>
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
                                    <th class="ms-action__head">People reached</th>
                                    <th class="ms-action__head">People reached</th>
                                    <th class="ms-action__head">Views(Plan)</th>
                                    <th class="ms-action__head">Views(Fact)</th>
                                    <th class="ms-action__head">Engagements</th>
                                    <th class="ms-action__head">View through rate (VTR)</th>
                                    <th class="ms-action__head">View through rate (CTR)</th>
                                    <th class="ms-action__head">Cost per view (CPV)</th>
                                    <th class="ms-action__head">Total Spend</th>
                                </tr>
                                <tr>
                                    <td class="ms-action__heading">Display</td>
                                    <td>500000</td>
                                    <td>24294</td>
                                    <td>500000</td>
                                    <td>9960</td>
                                    <td>797</td>
                                    <td>41%</td>
                                    <td>3%</td>
                                    <td>0.36&#8376;</td>
                                    <td>3585,60&#8376;</td>
                                </tr>
                                <tr>
                                    <td class="ms-action__heading">Pre-Roll</td>
                                    <td>80000</td>
                                    <td>10083</td>
                                    <td>80000</td>
                                    <td>7560</td>
                                    <td>605</td>
                                    <td>75%</td>
                                    <td>6%</td>
                                    <td>3.10&#8376;</td>
                                    <td>23 436,00&#8376;</td>
                                </tr>
                                <tr>
                                    <td class="ms-action__heading">Facebook</td>
                                    <td>40 000</td>
                                    <td>98 000</td>
                                    <td>40 000</td>
                                    <td>31 000</td>
                                    <td>2480</td>
                                    <td>32%</td>
                                    <td>3%</td>
                                    <td>7.57&#8376;</td>
                                    <td>234 670,00&#8376;</td>
                                </tr>
                                <tr>
                                    <td class="ms-action__heading">Instagram</td>
                                    <td>90000</td>
                                    <td>123000</td>
                                    <td>90000</td>
                                    <td>62350</td>
                                    <td>4988</td>
                                    <td>51%</td>
                                    <td>4%</td>
                                    <td>5,50&#8376;</td>
                                    <td>342 925,00&#8376;</td>
                                </tr>
                                <tr>
                                    <td class="ms-action__heading">YouTube</td>
                                    <td>60000</td>
                                    <td>24000</td>
                                    <td>60000</td>
                                    <td>9989</td>
                                    <td>799</td>
                                    <td>42%</td>
                                    <td>3%</td>
                                    <td>4.13&#8376;</td>
                                    <td>41 254,57&#8376;</td>
                                </tr>
                                <tr>
                                    <td class="ms-action__heading">Vk</td>
                                    <td>90000</td>
                                    <td>18011</td>
                                    <td>90000</td>
                                    <td>6570</td>
                                    <td>526</td>
                                    <td>36%</td>
                                    <td>3%</td>
                                    <td>3,10&#8376;</td>
                                    <td>20 367,00&#8376;</td>
                                </tr>
                                <tr class="ms-action__total" style="border-top: 1px solid rgba(119, 119, 119, 0.1);">
                                    <td class="ms-action__heading--total">Total</td>
                                    <td class="ms-action__totalNum">860000</td>
                                    <td class="ms-action__totalNum">297388</td>
                                    <td class="ms-action__totalNum">860000</td>
                                    <td class="ms-action__totalNum">127429</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="ms-action__heading--total ms-action__heading--sub">sub</td>
                                    <td class="ms-action__totalNum ms-action__totalNum--last">666 238,17&#8376;</td>
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
                            <span class="ms-action__title">Actions Overview</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 text-center">
                    <!-- <div class="ms-action__imgWrp">
                        <img src="build/images/ms-action__img2.png" alt="" class="ms-action__img">
                    </div> -->
                </div>
            </div>
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
                                        <tr>
                                            <td>55+</td>
                                            <td>0%</td>
                                        </tr>
                                        <tr>
                                            <td>45-54</td>
                                            <td>0%</td>
                                        </tr>
                                        <tr>
                                            <td>35-44</td>
                                            <td>0%</td>
                                        </tr>
                                        <tr>
                                            <td>25-34</td>
                                            <td>48%</td>
                                        </tr>
                                        <tr>
                                            <td>18-24</td>
                                            <td>52%</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-xl-6 col-12 text-center">
                                    <!-- <div class="ms-people__imgWrp">
                                        <img src="build/images/ms-people__img1.png" alt="" class="ms-people__img">
                                    </div> -->
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
                                            <td>42%</td>
                                        </tr>
                                        <tr>
                                            <td>Female</td>
                                            <td>58%</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-xl-7 col-md-7 col-sm-7 col-12 text-center">
                                    <div class="ms-people__imgWrp ms-people__imgWrp--circle">
                                        <img src="build/images/ms-people__img2.png" alt="" class="ms-people__img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                    <tr>
                                        <td>Kazakhstan</td>
                                        <td>127429</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>Almaty</td>
                                        <td>30583</td>
                                        <td>24%</td>
                                    </tr>
                                    <tr>
                                        <td>Astana</td>
                                        <td>28034</td>
                                        <td>22%</td>
                                    </tr>
                                    <tr>
                                        <td>Shymkent</td>
                                        <td>17840</td>
                                        <td>14%</td>
                                    </tr>
                                    <tr>
                                        <td>Karaganda</td>
                                        <td>15291</td>
                                        <td>12%</td>
                                    </tr>
                                    <tr>
                                        <td>Aktau</td>
                                        <td>10194</td>
                                        <td>8%</td>
                                    </tr>
                                    <tr>
                                        <td>Atyrau</td>
                                        <td>8920</td>
                                        <td>7%</td>
                                    </tr>
                                    <tr>
                                        <td>Others</td>
                                        <td>16566</td>
                                        <td>13%</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-xl-7">
                                <div class="ms-people__titleWrp ms-people__titleWrp--country">
                                    <span class="ms-people__title">Country Report</span>
                                </div>
                                <!-- <div class="ms-people__imgWrp ms-people__imgWrp--country">
                                    <img src="build/images/ms-people__img3.png" alt="" class="ms-people__img">
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

