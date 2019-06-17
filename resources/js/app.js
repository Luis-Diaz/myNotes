require('./bootstrap');

window.Vue = require('vue');

Vue.component('my-notes-component', require('./components/MyNotesComponent.vue').default);
Vue.component('form-component', require('./components/FormComponent.vue').default);
Vue.component('note-component', require('./components/NoteComponent.vue').default);

const app = new Vue({
    el: '#app',
});
