require('./bootstrap')
window.Vue = require('vue')
window.$ = require('jquery')
window.JQuery = require('jquery')

Vue.component('task-component', require('./components/Task/TaskComponent.vue').default);
Vue.component('task-create-component', require('./components/Task/CreateTaskComponent.vue').default);
Vue.component('task-edit-component', require('./components/Task/EditTaskComponent.vue').default);

const app = new Vue({
    el: '#app',
})
