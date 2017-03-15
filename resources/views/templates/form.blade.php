<div class="form-group">
    <label for="name">Nome</label>
    {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label for="thumb">Thumb</label>
    {!! Form::text('thumb', null, ['id' => 'thumb', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label for="html">HTML</label>
    <input type="hidden" name="html" :value="htmlText">
    <input type="hidden" id="currentHtml" value="{{ isset($model) ? $model->html : '' }}">
    {{--{!! Form::textarea('html', null, ['id' => 'html', 'class' => 'form-control']) !!}--}}
    <codemirror v-model="htmlText" :options="editorOption"></codemirror>
</div>