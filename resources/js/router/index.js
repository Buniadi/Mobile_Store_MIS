import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";
import About from "../views/About.vue";
import UsersList from "../Mbcomponents/Users/UsersList.vue";
import Signup from "../components/SignUp/Signup.vue";
import AddUser from "../Mbcomponents/Users/AddUser.vue";
import Login from "../components/auth/Login.vue";
import CompaniesList from "../Mbcomponents/Companies/CompaniesList.vue";
import AddCompanies from "../Mbcomponents/Companies/AddCompanies.vue";
import EditCompanies from "../Mbcomponents/Companies/EditCompanies.vue";
import PropertyList from "../Mbcomponents/Properties/PropertyList.vue";
import AddProperty from "../Mbcomponents/Properties/AddProperty.vue";
import EditPhone from "../Mbcomponents/Properties/EditPhone.vue";


const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: "/",
            component: Home,
            name: "home",
        },
        {
            path: "/about",
            component: About,
            name: "about",
        },
        {
            path: "/users-list",
            component: UsersList,
            name: "users-list",
            meta: {
                requiresAuth: true,
            },
        },
        {
            path: "/Signup",
            component: Signup,
            name: "signup",
        },
        {
            path: "/add-user",
            component: AddUser,
            name: "add-user",
            // meta: {
            //     requiresAuth: true,
            // },
        },
        {
            path: "/login",
            component: Login,
            name: "login",
        },
        {
            path: "/companiesList",
            component: CompaniesList,
            name: "companiesList",
            meta: {
                requiresAuth: true,
            },
        },
        {
            path: "/add-companies",
            component: AddCompanies,
            name: "add-companies",
            meta: {
                requiresAuth: true,
            },
        },
        {
            path: "/companies/:id/edit",
            name: "edit-company",
            component: EditCompanies,
            meta:{
                requiresAuth: true,
            },
        },
        {
            path:"/PropertyList",
            name: "propertyList",
            component:PropertyList,
            meta:{
                requiresAuth:true,
            }
        },
        {
            path:'/add-proprty',
            name:"addProprty",
            component:AddProperty,
            meta:{
                requiresAuth:true,
            }
        },
        {
            path:'/phone/:id/edit',
            name:"edit-phone",
            component:EditPhone,
            meta:{
                requiresAuth:true,
            }
        }
    ],
});

// router.beforeEach((to, from) => {
//     // instead of having to check every route record with
//     // to.matched.some(record => record.meta.requiresAuth)
//     if (to.meta.requiresAuth && !auth.isLoggedIn()) {
//       // this route requires auth, check if logged in
//       // if not, redirect to login page.
//       return {
//         path: '/login',
//         // save the location we were at to come back later
//         query: { redirect: to.fullPath },
//       }
//     }
//   })

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !window.user) {
        // Redirect to login if authentication is required but user is not logged in
        next({ name: "login" });
    } else if (!to.meta.requiresAuth && window.user) {
        // Redirect to users-list if authentication is required and user is logged in
        next({ name: "users-list" });
    } else {
        // Continue navigation
        next();
    }
});

export default router;
