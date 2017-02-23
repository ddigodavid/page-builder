<template>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Page Builder</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class=""><a href="#">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administração <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/pages/list">Páginas</a></li>
                            <li><a href="/pages/new">Nova Página</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/templates/list">Templates</a></li>
                            <li><a href="/templates/new">Novo template</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/collections/list">Coleção de templates</a></li>
                            <li><a href="/collections/new">Nova coleçao de templates</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
<script>
    export default {}
</script>
