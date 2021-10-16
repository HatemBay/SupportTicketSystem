/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require("./bootstrap");

window.Vue = require("vue").default;

import store from "./store/index.js";
import Vue from "vue";
import VueRouter from "vue-router";
import routes from "./router";
import VueGoodTablePlugin from "vue-good-table";
import VuejsDialog from "vuejs-dialog";
import { ColorPicker, ColorPanel } from "one-colorpicker";
import Notifications from "vue-notification";
import VueSideBarEx from "./components/sideBar/VueSideBarEx";
import VueSidebarMenu from "vue-sidebar-menu";
import BootstrapSidebar from "vue-bootstrap-sidebar";
import Slider from "@jeremyhamm/vue-slider";
import TopBar from "./components/sideBar/TopBar";
import SideBar from "./components/sideBar/SideBar";

import "vue-sidebar-menu/dist/vue-sidebar-menu.css";

// import the styles
import "vue-good-table/dist/vue-good-table.css";

// include the default style
import "vuejs-dialog/dist/vuejs-dialog.min.css";

import "@fortawesome/fontawesome-free/js/all";

Vue.use(ColorPanel);

Vue.use(ColorPicker);

Vue.use(VuejsDialog);

Vue.use(VueRouter);

Vue.use(Notifications);

Vue.use(VueSidebarMenu);

Vue.component("TopBar", TopBar);

Vue.component("SideBar", SideBar);

Vue.component("VueSideBarEx", VueSideBarEx);

Vue.component("pagination", require("laravel-vue-pagination"));

Vue.use(VueGoodTablePlugin);


//testing permissions v-can directive
Vue.directive("can", function(el, binding) {
    return Laravel.permissions.indexOf(binding) !== -1;
});

Vue.config.productionTip = false;
const router = new VueRouter(routes);

function loggedIn() {
    // localStorage.clear();
    return localStorage.getItem("token");
}

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (!loggedIn()) {
            next({
                path: "/login",
                query: { redirect: to.fullPath }
            });
        } else {
            next();
        }
    } else if (to.matched.some(record => record.meta.guest)) {
        if (loggedIn()) {
            next({
                path: "/dashboard",
                query: { redirect: to.fullPath }
            });
        } else {
            next();
        }
    } else {
        next(); // make sure to always call next()!
    }
});

// Vue.prototype.$userId = document
//     .querySelector("meta[name='user-id']")
//     .getAttribute("content");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('departments-index', require('./components/departments/Index.vue').default);
//Vue.component('depts-index', DepartmentsIndex);

// Vue.component('departments-index', require('./components/departments/Index.vue').default);

const app = new Vue({
    el: "#app",
    router: router,
    store
});
