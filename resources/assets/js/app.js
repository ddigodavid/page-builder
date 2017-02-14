
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

Vue.component('navbar', require('./components/Navbar.vue'));
Vue.component('pageBuilder', require('./components/PageBuilder.vue'));
Vue.component('pageContent', require('./components/PageContent.vue'));
Vue.component('templateRow', require('./components/TemplateRow.vue'));
Vue.component('templateList', require('./components/TemplateList.vue'));

import Draggable from './directives/Draggable';
import Droppable from './directives/Droppable';
import ContentEditable from './directives/ContentEditable';
import BackgroundChangeable from './directives/BackgroundChangeable';

Vue.directive('draggable', Draggable);
Vue.directive('droppable', Droppable);
Vue.directive('content-editable', ContentEditable);
Vue.directive('background-changeable', BackgroundChangeable);

const app = new Vue({
    el: '#app'
});
