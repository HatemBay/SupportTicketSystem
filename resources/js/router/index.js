import Vue from "vue";
import store from "../store";
import DepartmentsIndex from "../components/departments/Index";
import DepartmentsEdit from "../components/departments/Edit";
import UsersIndex from "../components/users/Index";
import UsersCreate from "../components/users/Create";
import UsersEdit from "../components/users/Edit";
import PrioritiesIndex from "../components/priorities/Index";
import PrioritiesEdit from "../components/priorities/Edit";
import KnowledgeBasesIndex from "../components/knowledge-bases/Index";
import KnowledgeBasesCreate from "../components/knowledge-bases/Create";
import KnowledgeBasesEdit from "../components/knowledge-bases/Edit";
import SubCategoriesIndex from "../components/sub-categories/Index";
import SubCategoriesCreate from "../components/sub-categories/Create";
import SubCategoriesEdit from "../components/sub-categories/Edit";
import CategoriesIndex from "../components/categories/Index";
import CategoriesCreate from "../components/categories/Create";
import CategoriesEdit from "../components/categories/Edit";
import FAQsIndex from "../components/faqs/Index";
import FAQsCreate from "../components/faqs/Create";
import FAQsEdit from "../components/faqs/Edit";
import FAQCategoriesIndex from "../components/faq-categories/Index";
import FAQCategoriesEdit from "../components/faq-categories/Edit";
import CannedMessagesIndex from "../components/canned-messages/Index";
import CannedMessagesEdit from "../components/canned-messages/Edit";
import TicketsIndex from "../components/tickets/Index";
import TicketsCreate from "../components/tickets/Create";
import TicketsEdit from "../components/tickets/Edit";
import TicketsReply from "../components/tickets/Reply";
import RolesIndex from "../components/roles/Index";
import RolesCreate from "../components/roles/Create";
import RolesEdit from "../components/roles/Edit";
import Register from "../components/Register";
import Login from "../components/Login";
// import Dashboard from "../components/Dashboard";
import Dashboard from "../components/dashboard/Index";
import SideBar from "../components/sideBar/SideBar";
import Main from "../components/Main";

/* Guest Component */
// const Login = () =>
//     import(
//         "../components/Login.vue" /* webpackChunkName: "resources/js/components/login" */
//     );
// const Register = () =>
//     import(
//         "../components/Register.vue" /* webpackChunkName: "resources/js/components/register" */
//     );
/* Guest Component */

/* Layouts */
// const DahboardLayout = () =>
//     import(
//         "../components/layouts/Dashboard.vue" /* webpackChunkName: "resources/js/components/layouts/dashboard" */
//     );
// /* Layouts */

// /* Authenticated Component */
// const Dashboard = () =>
//     import(
//         "../components/Dashboard.vue" /* webpackChunkName: "resources/js/components/dashboard" */
//     );
/* Authenticated Component */

export default {
    mode: "history",
    base: "/tickets-system/public",
    routes: [
        {
            path: "/login",
            name: "Login",
            component: Login,
            meta: { guest: true }
        },
        {
            path: "/",
            name: "Register",
            component: Register,
            meta: { guest: true }
        },
        {
            path: "/",
            name: "Main",
            component: Main,
            meta: { requiresAuth: true },
            children: [
                {
                    path: "",
                    redirect: "/dashboard",
                },
                {
                    path: "/dashboard",
                    name: "Dashboard",
                    component: Dashboard
                },
                {
                    path: "/departments",
                    name: "DepartmentsIndex",
                    component: DepartmentsIndex
                },
                {
                    path: "/departments/:id",
                    name: "DepartmentsEdit",
                    component: DepartmentsEdit
                },
                {
                    path: "/users",
                    name: "UsersIndex",
                    component: UsersIndex
                },
                {
                    path: "/users/create",
                    name: "UsersCreate",
                    component: UsersCreate
                },
                {
                    path: "/users/:id",
                    name: "UsersEdit",
                    component: UsersEdit
                },
                {
                    path: "/priorities",
                    name: "PrioritiesIndex",
                    component: PrioritiesIndex
                },
                {
                    path: "/priorities/:id",
                    name: "PrioritiesEdit",
                    component: PrioritiesEdit
                },
                {
                    path: "/knowledge-bases",
                    name: "KnowledgeBasesIndex",
                    component: KnowledgeBasesIndex
                },
                {
                    path: "/knowledge-bases/create",
                    name: "KnowledgeBasesCreate",
                    component: KnowledgeBasesCreate
                },
                {
                    path: "/knowledge-bases/:id",
                    name: "KnowledgeBasesEdit",
                    component: KnowledgeBasesEdit
                },
                {
                    path: "/sub-categories",
                    name: "SubCategoriesIndex",
                    component: SubCategoriesIndex
                },
                {
                    path: "/sub-categories/create",
                    name: "SubCategoriesCreate",
                    component: SubCategoriesCreate
                },
                {
                    path: "/sub-categories/:id",
                    name: "SubCategoriesEdit",
                    component: SubCategoriesEdit
                },
                {
                    path: "/categories",
                    name: "CategoriesIndex",
                    component: CategoriesIndex
                },
                {
                    path: "/categories/create",
                    name: "CategoriesCreate",
                    component: CategoriesCreate
                },
                {
                    path: "/categories/:id",
                    name: "CategoriesEdit",
                    component: CategoriesEdit
                },
                {
                    path: "/faqs",
                    name: "FAQsIndex",
                    component: FAQsIndex
                },
                {
                    path: "/faqs/create",
                    name: "FAQsCreate",
                    component: FAQsCreate
                },
                {
                    path: "/faqs/:id",
                    name: "FAQsEdit",
                    component: FAQsEdit
                },
                {
                    path: "/faq-categories",
                    name: "FAQCategoriesIndex",
                    component: FAQCategoriesIndex
                },
                {
                    path: "/faq-categories/:id",
                    name: "FAQCategoriesEdit",
                    component: FAQCategoriesEdit
                },
                {
                    path: "/canned-messages",
                    name: "CannedMessagesIndex",
                    component: CannedMessagesIndex
                },
                {
                    path: "/canned-messages/:id",
                    name: "CannedMessagesEdit",
                    component: CannedMessagesEdit
                },
                {
                    path: "/tickets",
                    name: "TicketsIndex",
                    component: TicketsIndex
                },
                {
                    path: "/tickets/create",
                    name: "TicketsCreate",
                    component: TicketsCreate
                },
                {
                    path: "/tickets/:id",
                    name: "TicketsEdit",
                    component: TicketsEdit
                },
                {
                    path:
                        "/tickets/reply/id/:id/department/:dept_id/priority/:prio_id",
                    name: "TicketsReply",
                    component: TicketsReply
                },
                {
                    path: "/roles",
                    name: "RolesIndex",
                    component: RolesIndex
                },
                {
                    path: "/roles/create",
                    name: "RolesCreate",
                    component: RolesCreate
                },
                {
                    path: "/roles/:id",
                    name: "RolesEdit",
                    component: RolesEdit
                },
            ]
        },
        {
            path: "/side-bar",
            name: "SideBar",
            component: SideBar,
            meta: { requiresAuth: true }
        }
    ]
};
