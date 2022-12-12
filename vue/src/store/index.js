import {createStore} from 'vuex'
import Axios from "axios";

const host = '//localhost/api'
export default createStore({
    state: {
        name: '',
        uuid: '',
        id: '',
        win: '',
        users: [],
        history: [],
        adminPage: 1,
    },
    mutations: {
        setUser(state, { data }) {
            state.name = data.name
            state.id = data.id
            state.uuid = data.uuid
        },
        setUuid(state, uuid ) {
            state.uuid = uuid
        },
        setUsers(state, { data }) {
            state.users = data
        },
        setUserToUsers(state, { data }) {
            let users = state.users
            users.map(user => {
                if (user.id === data.userId) {
                    user.uuid = data.uuid
                    user.url = data.url
                    return user
                }
                return user
            } )
            state.users = users
        },
        setWin(state, { data }) {
            state.win = data.win
        },
        setPage(state, page) {
            state.adminPage = page
        },
        setHistory(state, { data }) {
            state.history = data
        }
    },
    actions: {
        login(store, payload) {
            return Axios.post(host + '/login', {...payload})
                .then(({data}) => {
                    store.commit('setUser', data)
                    return data
                })
                .catch((err) => {
                    throw err
                })
        },
        game(store, payload) {
            return Axios.post(host + '/game', { uuid: payload })
                .then(({data}) => {
                    store.commit('setWin', data)
                })
                .catch((err) => {
                    throw err
                })
        },
        accessToGame(ctx, payload) {
            return Axios.get(host + '/access-link/' + payload)
                .then(({data}) => {
                    return data;
                })
                .catch((err) => {
                    throw err
                })
        },
        updateAccessToGame(store, payload) {
            return Axios.post(host + '/admin/access-link', {...payload})
                .then(({data}) => {
                    store.commit('setUserToUsers', data)
                    return data;
                })
                .catch((err) => {
                    throw err
                })
        },
        getUsers(store, page) {
            return Axios.get(host + '/admin/users?page=' + page)
                .then(({data}) => {
                    store.commit('setUsers', data)
                    store.commit('setPage', data.meta?.current_page || 1 )
                    return data;
                })
                .catch((err) => {
                    throw err
                })
        },
        editUser(store, payload) {
            return Axios.patch(host + '/admin/user', payload)
                .then(({data}) => {
                    return data;
                })
                .catch((err) => {
                    throw err
                })
        },
        history(store, payload) {
            return Axios.get(host + '/history/' + payload)
                .then(({data}) => {
                    store.commit('setHistory', data)
                    return data;
                })
                .catch((err) => {
                    throw err
                })
        }

    },
})