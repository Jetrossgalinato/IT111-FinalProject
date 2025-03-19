// resources/js/router/index.js
import { createRouter, createWebHistory } from "vue-router";
import Index from "../views/frontend/index.vue";

const routes = [
    {
        path: "/",
        name: "Index",
        component: Index,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
