<template>
    <div class="modal fade photo-gallery" id="colorChangeableModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Alteração de cor de fundo</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="javascript:void(0)" @click.prevent="chooseColor('#11b6f0')">Template 1: <label style="color: #11b6f0;">#11b6f0;</label></a><br>
                            <a href="javascript:void(0)" @click.prevent="chooseColor('#e02d50')">Template 2: <label style="color: #e02d50;">#e02d50;</label></a><br>
                            <a href="javascript:void(0)" @click.prevent="chooseColor('#3cc811')">Template 3: <label style="color: #3cc811;">#3cc811;</label></a><br>
                            <a href="javascript:void(0)" @click.prevent="chooseColor('#791898')">Template 4: <label style="color: #791898;">#791898;</label></a><br>
                            <a href="javascript:void(0)" @click.prevent="chooseColor('#e411c3')">Template 5: <label style="color: #e411c3;">#e411c3;</label></a><br>
                        </div>
                        <div class="col-sm-4">
                            <a href="javascript:void(0)" @click.prevent="chooseColor('#3438db')">Template 6: <label style="color: #3438db;">#3438db;</label></a><br>
                            <a href="javascript:void(0)" @click.prevent="chooseColor('#ffa311')">Template 7: <label style="color: #ffa311;">#ffa311;</label></a><br>
                            <a href="javascript:void(0)" @click.prevent="chooseColor('#111')">Template 8: <label style="color: #111;">#111;</label></a><br>
                            <a href="javascript:void(0)" @click.prevent="chooseColor('#ff5400')">Template 9: <label style="color: #ff5400;">#ff5400;</label></a><br>
                            <a href="javascript:void(0)" @click.prevent="chooseColor('#a0015f')">Template 10: <label style="color: #a0015f;">#a0015f;</label></a><br>
                        </div>
                        <div class="col-sm-4">
                            <a href="javascript:void(0)" @click.prevent="chooseColor('#ff008a')">Template 11: <label style="color: #ff008a;">#ff008a;</label></a><br>
                            <a href="javascript:void(0)" @click.prevent="chooseColor('#8a25d8')">Template 12: <label style="color: #8a25d8;">#8a25d8;</label></a><br>
                            <a href="javascript:void(0)" @click.prevent="chooseColor('#e3ebf2')">Template 13: <label style="color: #e3ebf2;">#e3ebf2;</label></a><br>
                            <a href="javascript:void(0)" @click.prevent="chooseColor('#fbb315')">Template 14: <label style="color: #fbb315;">#fbb315;</label></a><br>
                            <a href="javascript:void(0)" @click.prevent="chooseColor('#bc104d')">Template 15: <label style="color: #bc104d;">#bc104d;</label></a><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
    .horizontal-centralized {
        display: flex !important;
        justify-content: center;
        margin: 0 0 0 0;
        width: 100%;
    }
</style>
<script type="text/javascript">
    export default {
        mounted() {

        },
        methods: {
            chooseColor: function(color) {
                window.element.css('background-image', '');
                window.element.css('background-color', color);
            }
        }
    }
</script>