<div class="form-group">
    <div class="row-with-margin">
        <div class="col-sm-12 col-md-3" style="margin-bottom: 15px;">
            <label for="userCompany" class="control-label">Empresa</label>
            {!! Form::select('company_id', [1 => 'Mistral', 2 => 'Vinci'], null, ['id' => 'userCompany', 'class' => 'form-control']) !!}
        </div>
        <div class="col-sm-12 col-md-9" style="margin-bottom: 15px;">
            <label for="name">Nome</label>
            {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    <label for="cssUrl">URL arquivo CSS</label>
    {!! Form::text('cssUrl', null, ['id' => 'cssUrl', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label for="description">Descrição</label>
    {!! Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control', 'rows' => 3]) !!}
</div>