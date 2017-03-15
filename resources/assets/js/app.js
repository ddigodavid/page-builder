/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('textChange', require('./components/TextChange.vue'));
Vue.component('pageBuilder', require('./components/PageBuilder.vue'));
Vue.component('pageContent', require('./components/PageContent.vue'));
Vue.component('templateRow', require('./components/TemplateRow.vue'));
Vue.component('imageChange', require('./components/ImageChange.vue'));
Vue.component('mediaChange', require('./components/MediaChange.vue'));
Vue.component('videoChange', require('./components/VideoChange.vue'));
Vue.component('templateList', require('./components/TemplateList.vue'));
Vue.component('templateCollectionChooser', require('./components/TemplateCollectionChooser.vue'));

import Sortable from './directives/Sortable';
import Draggable from './directives/Draggable';
import Droppable from './directives/Droppable';
import TextChangeable from './directives/TextChangeable';
import ContentEditable from './directives/ContentEditable';
import MediaChangeable from './directives/MediaChangeable';
import BackgroundChangeable from './directives/BackgroundChangeable';
import ImageSourceChangeable from './directives/ImageSourceChangeable';

Vue.directive('sortable', Sortable);
Vue.directive('draggable', Draggable);
Vue.directive('droppable', Droppable);
Vue.directive('text-changeable', TextChangeable);
Vue.directive('content-editable', ContentEditable);
Vue.directive('media-changeable', MediaChangeable);
Vue.directive('image-changeable', ImageSourceChangeable);
Vue.directive('background-changeable', BackgroundChangeable);

import { codemirror, CodeMirror } from 'vue-codemirror'

const app = new Vue({
    el: '#app',
    components: {
      codemirror
    },
    data: {
        htmlText: '',
        editorOption: {
            // 下面所有配置同Codemirror配置，均为可选
            tabSize: 4,
            mode: 'text/html',
            //theme: 'base16-dark',
            lineNumbers: true,
            line: true,
            keyMap: "sublime",
            // 按键映射，比如Ctrl键映射autocomplete，autocomplete是hint代码提示事件
            extraKeys: { "Ctrl": "autocomplete" },
            // 代码折叠
            foldGutter: true,
            gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
            // 选中文本自动高亮，及高亮方式
            styleSelectedText: true,
            highlightSelectionMatches: { showToken: /\w/, annotateScrollbar: true },
            // more codemirror config...
            // 如果有hint方面的配置，也应该出现在这里
        }
    },
    mounted() {

        this.htmlText = $('#currentHtml').val();

        // let $codeTextArea = $('#html');
        //
        // CodeMirror.fromTextArea($codeTextArea[0], {
        //     lineNumbers: true,
        //     mode: 'htmlmixed',
        //     //theme: 'monokai'
        // });

    }
});