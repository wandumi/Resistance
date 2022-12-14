/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component(
    "bbbee-sort",
    require("./components/Bbbee/bbbeeSort.vue").default
);

Vue.component(
    "program-sort",
    require("./components/programdocuments/programSort.vue")
);

const app = new Vue({
    el: "#app",
});
