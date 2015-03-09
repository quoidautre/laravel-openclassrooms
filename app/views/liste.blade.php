@extends('template')

@section('contenu')
    <div class="col-md-offset-1 col-md-10">
        <h1>Mon joli blog
            @if(Auth::check())
                <div class="btn-group pull-right">
                    {{ link_to('post/add', 'Créer un article', array('class' => 'btn btn-info')) }}
                    {{ link_to('auth/logout', 'Deconnexion', array('class' => 'btn btn-warning')) }}
                </div>
            @else
                {{ link_to('auth/login', 'Se connecter', array('class' => 'btn btn-info pull-right')) }}
            @endif
        </h1>
        @foreach($posts as $post)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{{ $post->titre }}}</h3>
                </div>
                <div class="panel-body">
                    <p>{{{ $post->contenu }}}</p>
                    @if(Auth::check() and Auth::user()->admin)
                        {{ link_to('post/del/' . $post->id, 'Supprimer cet article', array('class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm(\'Vraiment supprimer cet article ?\')')) }}
                    @endif
                    <em class="pull-right">
                        Ecrit par {{{ $post->user->name }}} le {{ $post->created_at->format('d-m-Y') }}
                    </em>
                </div>
            </div>
        @endforeach
        {{ $posts->links() }}
    </div>
@stop