
@extends('parts.layout')

@section('css')
<!-- custom CSS -->
@endsection

@section('content')
<main>
    <div class="central-cont">
        @if($userexist)
        <div class="row">
            <div class="col l4 m4 s12">
                <strong>@if($ismyprofile) {{$loggeduserfullname}} @else {{$userfullname}} @endif</strong>&nbsp;<span style="opacity:0.5">@if($ismyprofile) {{$loggedusername}} @else {{$username}} @endif</span>&nbsp;@if($isuserprofile)<a href="/follow/{{$username}}">Seguir</a>@endif
            </div>
            <div class="col l8 m8 s12">&nbsp;</div>
        </div>
        
        <div class="row">
            <ul class="tabs">
                @if($ismyprofile)
                    <li class="tab col s6"><a href="#mistweets">Mis Tweets</a></li>
                    <li class="tab col s6"><a href="#siguiendo">Personas que sigo</a></li>
                @elseif($isuserprofile)
                    <li class="tab col s6"><a href="#tweetsuser">Tweets de {{$username}}</a></li>
                    <li class="tab col s6"><a href="#sigueuser">Personas que sigue {{$username}}</a></li>
                @else
                    <li class="tab col s6"><a href="#parati">Para Ti</a></li>
                    <li class="tab col s6"><a href="#siguiendo">Siguiendo</a></li>
                @endif
            </ul>
            @if($ismyprofile)
            <div>
                <textarea id="tweet-input" onkeyup="countCharacters()" maxlength="280" name="mytweet" placeholder="¿¡Que está pasando?!"></textarea>
                <div class="row right-align" style="padding-right:1%">
                    <div class="col s6 left-align">
                        <span id="char-counter">0/280</span>
                    </div>
                    <div class="col s6">
                        <button id="post-btn" class="btn btn-app" onclick="addTweet()">postear</button>
                    </div>    
                </div>
            </div>
            @endif
            @if($ismyprofile)
                <div id="mistweets" class="col l6 m6 s12">
                    @if(count($tweets) === 0)
                        <h4 style="opacity: 0.5">Sin tweets aún</h4>
                    @endif
                    <ul id="my-tweets" class="collection">
                        @foreach($tweets as $tweet)
                            <li class="collection-item">
                                <p>{{ $tweet->content }}</p>
                                <small>Publicado: {{$tweet->created_at}} por @if($loggedusername === $tweet->author) mí @else <a href="/{{$tweet->author}}">{{$tweet->author}}</a>@endif</small>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div id="siguiendo" class="col l12 m6 s12">
                    <div style="padding-right:1%" class="row right-align">
                        <ul>
                            @foreach($following as $folwing)
                                <li><a href="/{{$folwing->following_name}}">{{$folwing->following_name}}</a> <a href="/stopFollow/{{$folwing->following_name}}">Dejar de seguir</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @elseif($isuserprofile)
                <div id="tweetsuser" class="col l6 m6 s12">
                    @if(count($tweets) === 0)
                        <h4 style="opacity: 0.5">Sin tweets aún</h4>
                    @endif
                    <ul id="my-tweets" class="collection">
                        @foreach($tweets as $tweet)
                            <li class="collection-item">
                                <p>{{ $tweet->content }}</p>
                                <small>Publicado: {{$tweet->created_at}} por @if($loggedusername === $tweet->author) mí @else <a href="/{{$tweet->author}}">{{$tweet->author}}</a> @endif</small>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div id="sigueuser" class="col l12 m6 s12">
                    <div style="padding-right:1%" class="row right-align">
                        <ul>
                            @foreach($following as $folwing)
                                <li><a href="/{{$folwing->following_name}}">{{$folwing->following_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <div id="parati" class="col l6 m6 s12">
                    @if(count($tweets) === 0)
                        <h4 style="opacity: 0.5">Sin tweets aún</h4>
                    @endif
                    <ul id="my-tweets" class="collection">
                        @foreach($tweets as $tweet)
                            <li class="collection-item">
                                <p>{{ $tweet->content }}</p>
                                <small>Publicado: {{$tweet->created_at}} por @if($loggedusername === $tweet->author) mí @else <a href="/{{$tweet->author}}">{{$tweet->author}}</a> @endif</small>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div id="siguiendo" class="col l12 m6 s12">
                    <div style="padding-right:1%" class="row right-align">
                        <ul>
                            @foreach($following as $folwing)
                                <li><a href="/{{$folwing->following_name}}">{{$folwing->following_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
        @else
            <h4 style="opacity: 0.5">Esta cuenta no existe</h4>
        @endif
    </div>
</main>
@endsection

@section('js')

@endsection
