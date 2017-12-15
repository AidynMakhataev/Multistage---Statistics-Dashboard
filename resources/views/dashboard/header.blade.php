<div class="ms-header">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 d-flex justify-content-between">
                <div class="ms-header__nameWrp">
                    <div class="ms-header__logoWrp">
                        <img src="{{asset('build/images/ms-header-logo.png')}}" onclick="window.document.location.href='/'" alt="" class="ms-header__logo">
                    </div>
                    <a href="@can('view-digital-report') {{ route('digital') }} @else # @endcan" class="ms-header__name ms-header__name--digital @can('view-digital-report') ms-header__name--active @endcan">Digital Campaign<br> Report</a>
                    <a href="@can('view-smm-report') {{ route('smm') }} @else # @endcan" class="ms-header__name ms-header__name--smm align-top @can('view-smm-report') ms-header__name--active @endcan">SMM Report</a>
                    <span class="ms-header__name ms-header__name--active align-top">{{$project->name}}</span>
                </div>
                <div class="ms-header__dateWrp">
                    <div class="ms-header__labelWrp ms-header__name ms-header__name--active">Current period between:</div>
                        <select name="period" id="" class="ms-header__date" onChange="window.document.location.href=this.options[this.selectedIndex].value;">
                            <option value="default">{{$report->start->toFormattedDateString()}} - {{$report->end->toFormattedDateString()}}</option>
                            @if(count($reportPeriods) > 0)
                                @foreach($reportPeriods as $period)
                                    <option value="{{ env('APP_URL').'digital/period/'.$period->id  }}">{{$period->start->toFormattedDateString()}} - {{$period->end->toFormattedDateString()}}</option>
                                @endforeach
                            @endif
                        </select>
                </div>
                <div class="ms-header__avatarWrp">
                    <img src="{{asset('build/images/ms-header-avatar.png')}}" alt="" class="ms-header__avatar">
                    <div class="ms-header__logoutWrp">
                        <span class="ms-header__logout">
                            <a  href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    Logout
                            </a>
                        </span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
