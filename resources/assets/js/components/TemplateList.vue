<template>
    <div class="panel panel-default">
        <div class="panel panel-heading">Templates</div>
        <div class="panel-body">
            <ul id="template-list" class="ui-helper-reset ui-helper-clearfix">

                <li v-for="tpl in templates" v-draggable :data-template="JSON.stringify(tpl)">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ tpl.name }}</h3>
                        </div>
                        <div class="panel-body">
                            <img class="img-responsive" :src="tpl.thumb">
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</template>

<script type="text/javascript">
    export default {

        //props: ['templates'],

        data() {
            return {
                templates: [
                    {
                        name: 'Template 1',
                        thumb: '/images/temp1.jpg',
                        html: `
                        <section class="page_template1" v-background-changeable style="background:url(/especiais/page-module/images/img-template1.jpg) no-repeat; height: 480px; width:100%; background-position: center;">

                          <div class="center-height" style="height: 480px;">
                          <div class="grid-module">
                            <h1 v-content-editable>Título sobre o tema</h1>
                            <p v-content-editable>Muito importante citar na introdução que, atualmente, uma espécie de intercambio vem acontecendo entre os dois mundos, já que movimentos como o que aconteceu em Portugal, por exemplo, acabaram “aprendendo” a fazer vinhos com algumas técnicas e estilo do Novo Mundo.
                            </p>
                          </div>
                        </div>
                      </section>
                        `
                    },
                    {
                        name: 'Template 2',
                        thumb: '/images/temp2.jpg',
                        html: `
                        <section class="page_template2">
                        <div class="grid-module">
                          <img src="/especiais/page-module/images/img-template2.jpg" alt="">
                          <h1 v-content-editable>Título sobre o tema</h1>
                          <p v-content-editable>Muito importante citar na introdução que, atualmente, uma espécie de intercambio vem acontecendo entre os dois mundos, já que movimentos como o que aconteceu em Portugal, por exemplo, acabaram “aprendendo” a fazer vinhos com algumas técnicas e estilo do Novo Mundo. E que também o Novo mundo vem cada vez mais se aperfeiçoando e chegando próximo de vinhos de grande porte internacional, graças a influência de técnicas tradicionais do Velho Mundo. Ou seja, os estilos e as denominações são característica, mas aqui também, como no Especial da Uvas, é importante ressaltar que “tudo é possível” pois a diversidade é grande. Um caso interessante para ilustrar a possibilidade de diferentes resultados e até mesmo críticas é o do Chateau Pavie, que causou polêmica ao rebecer elogios de Parker e críticas negativas de Jancis Robinsosn:
                          </p>
                        </div>
                      </section>
                        `
                    },
                    {
                        name: 'Template 3',
                        thumb: '/images/temp3.jpg',
                        html: `
                        <section class="page_template3">
                            <div class="grid-module930">
                            <ul class="cols-template3">
                              <li>
                                <img src="/especiais/page-module/images/img-thumb.jpg" alt="">
                                <h3 v-content-editable>Título sobre o tema</h3>
                                <p v-content-editable>Muito importante citar na introdução que, atualmente, uma espécie de intercambio vem acontecendo entre os dois mundos, já que movimentos como o que aconteceu em Portugal, por exemplo, acabaram “aprendendo” a fazer vinhos com algumas técnicas e estilo do Novo Mundo.</p>
                              </li>
                              <li>
                                <img src="/especiais/page-module/images/img-thumb.jpg" alt="">
                                <h3 v-content-editable>Título sobre o tema</h3>
                                <p v-content-editable>Muito importante citar na introdução que, atualmente, uma espécie de intercambio vem acontecendo entre os dois mundos, já que movimentos como o que aconteceu em Portugal, por exemplo, acabaram “aprendendo” a fazer vinhos com algumas técnicas e estilo do Novo Mundo. </p>
                              </li>
                              <li>
                                <img src="/especiais/page-module/images/img-thumb.jpg" alt="">
                                <h3 v-content-editable>Título sobre o tema</h3>
                                <p v-content-editable>Muito importante citar na introdução que, atualmente, uma espécie de intercambio vem acontecendo entre os dois mundos, já que movimentos como o que aconteceu em Portugal, por exemplo, acabaram “aprendendo” a fazer vinhos com algumas técnicas e estilo do Novo Mundo.
                                </p>
                              </li>
                            </ul>
                            </div>
                          </section>
                        `
                    },
                    {
                        name: 'Template 4',
                        thumb: '/images/temp4.jpg',
                        html: `
                        <section class="page_template4" style="background:#e6ebe9;">
                        <div class="grid-module930">
                          <img src="/especiais/page-module/images/img-template2.jpg" alt="">
                          <h1>Título sobre o tema</h1>
                          <p>Muito importante citar na introdução que, atualmente, uma espécie de intercambio vem acontecendo entre os dois mundos, já que movimentos como o que aconteceu em Portugal, por exemplo, acabaram “aprendendo” a fazer vinhos com algumas técnicas e estilo do Novo Mundo. E que também o Novo mundo vem cada vez mais se aperfeiçoando e chegando próximo de vinhos de grande porte internacional, graças a influência de técnicas tradicionais do Velho Mundo. Ou seja, os estilos e as denominações são característica, mas aqui também, como no Especial da Uvas, é importante ressaltar que “tudo é possível” pois a diversidade é grande. Um caso interessante para ilustrar a possibilidade de diferentes resultados e até mesmo críticas é o do Chateau Pavie, que causou polêmica ao rebecer elogios de Parker e críticas negativas de Jancis Robinsosn:
                          </p>
                        </div>
                      </section>
                        `
                    },
                    {
                        name: 'Template 5',
                        thumb: '/images/temp5.jpg',
                        html: `
                        <section class="page_template5">
                            <div class="grid-module">
                              <div class="container-img">
                                <img src="/especiais/page-module/images/img1-temp5.jpg" alt="">
                              </div>
                              <div class="container-img">
                                <img src="/especiais/page-module/images/img2-temp5.jpg" alt="">
                              </div>
                              <h1>Título sobre o tema</h1>
                              <p>Muito importante citar na introdução que, atualmente, uma espécie de intercambio vem acontecendo entre os dois mundos, já que movimentos como o que aconteceu em Portugal, por exemplo, acabaram “aprendendo” a fazer vinhos com algumas técnicas e estilo do Novo Mundo. E que também o Novo mundo vem cada vez mais se aperfeiçoando e chegando próximo de vinhos de grande porte internacional, graças a influência de técnicas tradicionais do Velho Mundo. Ou seja, os estilos e as denominações são característica, mas aqui também, como no Especial da Uvas, é importante ressaltar que “tudo é possível” pois a diversidade é grande. Um caso interessante para ilustrar a possibilidade de diferentes resultados e até mesmo críticas é o do Chateau Pavie, que causou polêmica ao rebecer elogios de Parker e críticas negativas de Jancis Robinsosn:
                              </p>
                            </div>
                          </section>
                        `
                    },
                    {
                        name: 'Template 6',
                        thumb: '/images/temp6.jpg',
                        html: `
                        <section class="page_template6">
                        <div class="grid-module">
                          <div class="container-img6">
                            <img src="/especiais/page-module/images/img-temp6.jpg" alt="">
                          </div>
                          <div class="container-temp6">
                            <h1>Título sobre o tema</h1>
                            <p>Muito importante citar na introdução que, atualmente, uma espécie de intercambio vem acontecendo entre os dois mundos, já que movimentos como o que aconteceu em Portugal, por exemplo, acabaram “aprendendo” a fazer vinhos com algumas técnicas e estilo do Novo Mundo. E que também o Novo mundo vem cada vez mais se aperfeiçoando e chegando próximo de vinhos de grande porte internacional, graças a influência de técnicas tradicionais do Velho Mundo. Ou seja, os estilos e as denominações são característica, mas aqui também, como no Especial da Uvas, é importante ressaltar que “tudo é possível” pois a diversidade é grande. Um caso interessante para ilustrar a possibilidade de diferentes resultados e até mesmo críticas é o do Chateau Pavie, que causou polêmica ao rebecer elogios de Parker e críticas negativas de Jancis Robinsosn:
                            </p>
                          </div>
                        </div>
                      </section>
                        `
                    },
                ],
                teste: {
                    name: 'testando'
                }
            }
        }
    }
</script>
