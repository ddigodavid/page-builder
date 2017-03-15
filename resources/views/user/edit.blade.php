@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Cadastro</div>
                    <div class="panel-body">
                        {!! Form::model($model, ['class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST', 'route' => sprintf('%s.save', $resourcePrefix)]) !!}
                            {{ csrf_field() }}
                            {!! Form::hidden('id') !!}
                            
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nome</label>
                                
                                <div class="col-md-6">
                                    {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'required' => 'true', 'autofocus' => 'true']) !!}
                                    
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail</label>
                                
                                <div class="col-md-6">
                                    {!! Form::text('email', null, ['id' => 'email', 'class' => 'form-control', 'required' => 'true']) !!}
                                    
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Senha</label>
                                
                                <div class="col-md-6">
                                    {!! Form::password('password', ['id' => 'password', 'class' => 'form-control']) !!}
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirmar Senha</label>
                                <div class="col-md-6">
                                    {!! Form::password('password_confirmation', ['id' => 'password-confirm', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            
                            @if(Auth::user()->isSuperAdmin())
                                <div class="form-group">
                                    <label for="userType" class="col-md-4 control-label">Tipo de usuário</label>
                                    <div class="col-sm-12 col-md-6">
                                        {!! Form::select('super_admin', [1 => 'Admin', 0 => 'Colaborador'], null, ['id' => 'userType', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                            @endif
                            
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="glyphicon glyphicon-check"></i> Salvar
                                    </button>
                                    <a href="{{ route('user.list') }}" class="btn btn-default">
                                        <i class="glyphicon glyphicon-arrow-left"></i> Voltar
                                    </a>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection