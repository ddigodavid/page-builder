<div class="panel panel-default">
    <div class="panel-heading">
        Publicação
    </div>
    <div class="panel-body">
        @if(isset($model))
            <b>Status:</b> {{ $model->present()->status_html }}<br>
            <b>Criado em:</b> {{ $model->present()->created_at }}<br>
            <b>Ultima atualização:</b> {{ $model->present()->updated_at }}<br>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-success btn-block" name="status" value="1"><i class="glyphicon glyphicon-ok"></i> Salvar</button>
                <button type="submit" class="btn btn-primary btn-block" name="status" value="0"><i class="glyphicon glyphicon-edit"></i> Salvar como rascunho</button>
                @if(isset($model))
                    <a href="javascript:void(0);" class="btn btn-danger btn-block"
                       data-form-link
                       data-confirm-title="Confirmação de exclusão"
                       data-confirm-text="Deseja realmente excluir esse registro?"
                       data-method="DELETE"
                       data-action="{{ route(sprintf('%s.delete', $resourcePrefix), [$model->id]) }}"><i class="glyphicon glyphicon-trash"></i> Excluir</a>
                @endif
                <a href="{{ route(sprintf('%s.list', $resourcePrefix)) }}" class="btn btn-default btn-block"><i class="glyphicon glyphicon-arrow-left"></i> Voltar</a>
            </div>
        </div>
    </div>
</div>