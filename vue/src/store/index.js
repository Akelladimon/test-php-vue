import {createStore} from 'vuex'
import user from "@/store/user";
import history from "@/store/history";
import admin from "@/store/admin";

export default createStore({
    modules: {
        user,
        history,
        admin,
    }
})