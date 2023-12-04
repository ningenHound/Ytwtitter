
@extends('parts.layout')

@section('css')
<!-- custom CSS -->
@endsection

@section('content')
<main>
    <div class="central-cont">
        <div class="row">
            <ul class="tabs">
                <li class="tab col s4"><a href="#test1">Mis Tuits</a></li>
                <li class="tab col s4"><a href="#test2">Seguidores</a></li>
                <li class="tab col s4"><a href="#test3">Siguiendo</a></li>
            </ul>
            <div id="test1" class="col s4">
                Mis tuits
                <ul class="collection">
                    @foreach ($tweets as $tweet)
                        <li class="collection-item">
                            <p>{{ $tweet->content }}</p>
                            <small>Publicado: {{ $tweet->created_at }}</small>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div id="test2" class="col s4">listado seguidores</div>
            <div id="test3" class="col s4">listado siguiendo</div>
        </div>
    </div>
</main>
@endsection

@section('js')

@endsection
