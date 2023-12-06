
@extends('parts.layout')

@section('css')
<!-- custom CSS -->
@endsection

@section('content')
<main>
    <div class="central-cont">
        <div class="row">
            <ul class="tabs">
                <li class="tab col s6"><a href="#parati">Mis Tweets</a></li>
                <li class="tab col s6"><a href="#siguiendo">Siguiendo</a></li>
                <!-- <li class="tab col s6"><a href="#seguidores">Seguidores</a></li> -->
            </ul>
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
            <div id="parati" class="col s6">
                @if(count($tweets) === 0)
                    <h4 style="opacity: 0.5">Sin tweets aún</h4>
                @endif
                <ul id="my-tweets" class="collection">
                    @foreach($tweets as $tweet)
                        <li class="collection-item">
                            <p>{{ $tweet->content }}</p>
                            <small>Publicado: {{$tweet->created_at}} por @if($username === $tweet->author) mí @else {{$tweet->author}} @endif</small>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div id="siguiendo" class="col s4">listado siguiendo</div>
            <!-- <div id="seguidores" class="col s6">listado seguidores</div> -->
        </div>
    </div>
</main>
@endsection

@section('js')

@endsection
