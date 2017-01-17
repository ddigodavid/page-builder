<template>
    <div class="panel panel-default">
        <div class="panel panel-heading">Templates</div>
        <div class="panel-body">
            <ul id="gallery" class="gallery ui-helper-reset ui-helper-clearfix">

                <li class="ui-widget-content ui-corner-tr">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Layout 1</h3>
                        </div>
                        <div class="panel-body">
                            Imagem do layout 1
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</template>

<script>
    export default {

        props: ['templates'],

        mounted() {

        }
    }
</script>
