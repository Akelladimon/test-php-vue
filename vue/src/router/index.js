import { createWebHistory, createRouter } from "vue-router";

import Private from "@/views/Private.vue";
import History from "@/views/History.vue";
import Login from "@/views/Login.vue";
import Game from "@/views/Game.vue";

const routes = [
    {
        path: "/",
        name: "login",
        component: Login,
    },
    {
        path: "/admin/private",
        name: "private",
        component: Private,
    },
    {
        path: "/game/:uuid",
        name: "game",
        component: Game,
    },
    {
        path: "/history/:uuid",
        name: "history",
        component: History,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;