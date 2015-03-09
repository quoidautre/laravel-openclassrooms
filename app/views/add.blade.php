@extends('template')

@section('contenu')
    <br>
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading">Ajout d'un article</div>
            <div class="panel-body">
                {{ Form::open(array('url' => 'post/add')) }}
                <small class="text-danger">{{ $errors->first('titre') }}</small>
                <div class="form-group {{ $errors->has('titre') ? 'has-error' : '' }}">
                    {{ Form::text('titre', null, array('class' => 'form-control', 'placeholder' => 'Titre')) }}
                </div>
                <small class="text-danger">{{ $errors->first('contenu') }}</small>
                <div class="form-group {{ $errors->has('contenu') ? 'has-error' : '' }}">
                    {{ Form::textarea ('contenu', null, array('class' => 'form-control', 'placeholder' => 'Contenu')) }}
                </div>
                {{ Form::submit('Envoyer !', array('class' => 'btn btn-info pull-right')) }}
                {{ Form::close() }}
            </div>
        </div>
        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>
@stop