<div class="form-group">
    <label for="name">Nome</label>
    {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label for="cssUrl">URL arquivo CSS</label>
    {!! Form::text('cssUrl', null, ['id' => 'cssUrl', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label for="description">Descrição</label>
    {!! Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control']) !!}
</div>