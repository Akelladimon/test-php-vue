import Axios from "axios";

const host = '//localhost/api'
export default {
    login(store, payload) {
        store.commit('preloader', true)
        return Axios.post(host + '/login', {...payload})
            .then(({data}) => {
                store.commit('preloader', false)
                store.commit('setUser', data)
                return data
            })
            .catch((err) => {
                store.commit('preloader', false)
                throw err
            })
    },
    game(store, payload) {
        store.commit('preloader', true)

        return Axios.post(host + '/game', { uuid: payload })
            .then(({data}) => {
                store.commit('preloader', false)
                store.commit('setWin', data)
            })
            .catch((err) => {
                store.commit('preloader', false)
                throw err
            })
    },
    accessToGame(store, payload) {
        store.commit('preloader', true)

        return Axios.get(host + '/access-link/' + payload)
            .then(({data}) => {
                store.commit('preloader', false)
                return data;
            })
            .catch((err) => {
                store.commit('preloader', false)
                throw err
            })
    },
}
