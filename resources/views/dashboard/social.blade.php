<section class="ms-social">
    <div class="container">
        <div class="row">
           <div class="col-md-3">
                <div class="ms-social__inner">
                    <div class="ms-social__titleWrp">
                        <a href="@isset($project->facebook->link) {{ $project->facebook->link }} @endisset" class="ms-social__title">Facebook</a>
                    </div> 
                    <div class="ms-social__commentWrp">
                        @isset($project->facebook->likes)
                        <div class="ms-social__likesWrp">
                            <div class="ms-social__likesInner">
                                <div class="ms-social__likes"></div>
                                <div class="ms-social__likes ms-social__likes--smile"></div>
                                <div class="ms-social__likes ms-social__likes--heart"></div>
                                <span class="ms-social__likesNum">{{ $project->facebook->likes }}</span>
                            </div>
                        </div>
                        @endisset
                        @isset($project->facebook->reposts)
                        <div class="ms-social__sharedWrp">
                            <span class="ms-social__shared">Этим поделились: {{ $project->facebook->reposts }}</span>
                        </div>
                        @endisset
                        <ul class="ms-social__list">
                        @isset($project->facebook->comments)
                          @foreach($project->facebook->comments as $comment)
                            <li class="ms-social__item"><b>{{$comment['author']}}</b> {{ $comment['comment'] }}</li>
                          @endforeach
                        @else
                            <li class="ms-social__item" style="opacity: 0.5;">НЕТ КОММЕНТАРИЕВ</li>    
                        @endisset  
                        </ul>
                    </div>
                    @isset($project->facebook->views)
                    <div class="ms-social__watchWrp">
                        <span class="ms-social__watch">Просмотры: {{ $project->facebook->views }}</span>
                    </div>
                    @endisset
                </div>        
           </div> 
    
            <div class="col-md-3">
                <div class="ms-social__inner">
                    <div class="ms-social__titleWrp">
                        <a href="@isset($project->instagram->link) {{ $project->instagram->link }} @endisset" class="ms-social__title">Instagram</a>
                    </div>
                    <div class="ms-social__commentWrp">
                        <ul class="ms-social__list">
                        @isset($project->instagram->comments)
                          @foreach($project->instagram->comments as $comment)
                            <li class="ms-social__item"><b>{{$comment['author']}}</b> {{ $comment['comment'] }}</li>
                          @endforeach
                        @else
                            <li class="ms-social__item" style="opacity: 0.5;">НЕТ КОММЕНТАРИЕВ</li>    
                        @endisset  
                        </ul>
                    </div>
                    @isset($project->instagram->views)
                    <div class="ms-social__watchWrp">
                        <span class="ms-social__watch">Просмотры: {{ $project->instagram->views }}</span>
                    </div>
                    @endisset
                </div>
            </div>

            <div class="col-md-3">
                <div class="ms-social__inner">
                    <div class="ms-social__titleWrp">
                        <a href="@isset($project->youtube->link) {{ $project->youtube->link }} @endisset" class="ms-social__title">YouTube</a>
                    </div>
                    <div class="ms-social__commentWrp">
                        <ul class="ms-social__list">
                        @isset($project->youtube->comments)
                          @foreach($project->youtube->comments as $comment)
                            <li class="ms-social__item"><b>{{$comment['author']}}</b> {{ $comment['comment'] }}</li>
                          @endforeach
                        @else
                            <li class="ms-social__item" style="opacity: 0.5;">НЕТ КОММЕНТАРИЕВ</li>    
                        @endisset  
                        </ul>
                    </div>
                    @isset($project->youtube->views)
                    <div class="ms-social__watchWrp">
                        <span class="ms-social__watch">Просмотры: {{ $project->youtube->views }}</span>
                    </div>
                    @endisset
                </div>
            </div>
            <div class="col-md-3">
                <div class="ms-social__inner">
                    <div class="ms-social__titleWrp">
                    <a href="@isset($project->vk->link) {{ $project->vk->link }} @endisset" class="ms-social__title">Vk</a>
                    </div>
                    <div class="ms-social__commentWrp" style="text-align: center;">
                        <ul class="ms-social__list">
                        @isset($project->vk->comments)
                          @foreach($project->vk->comments as $comment)
                            <li class="ms-social__item"><b>{{$comment['author']}}</b> {{ $comment['comment'] }}</li>
                          @endforeach
                        @else
                            <li class="ms-social__item" style="opacity: 0.5;">НЕТ КОММЕНТАРИЕВ</li>    
                        @endisset  
                        </ul>
                    </div>
                    @isset($project->vk->views)
                    <div class="ms-social__watchWrp">
                        <span class="ms-social__watch">Просмотры: {{ $project->vk->views }}</span>
                    </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</section>