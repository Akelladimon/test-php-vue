import Axios from "axios";

const host = '//localhost/api/admin'
export default {
    editUser(store, payload) {
        store.commit('preloader', true)

        return Axios.patch(host + '/user', payload)
            .then(({data}) => {
                store.commit('setUserToUsers', data)
                store.commit('preloader', false)
                return data;
            })
            .catch((err) => {
                store.commit('preloader', false)
                throw err
            })
    },
    updateAccessToGame(store, payload) {
        store.commit('preloader', true)

        return Axios.post(host + '/access-link', {...payload})
            .then(({data}) => {
                store.commit('setUserToUsers', data)
                store.commit('preloader', false)
                return data;
            })
            .catch((err) => {
                store.commit('preloader', false)
                throw err
            })
    },
    getUsers(store, page) {
        store.commit('preloader', true)

        return Axios.get(host + '/users?page=' + page)
            .then(({data}) => {
                store.commit('setUsers', data)
                store.commit('setPage', data.meta?.current_page || 1 )
                store.commit('preloader', false)
                return data;
            })
            .catch((err) => {
                store.commit('preloader', false)
                throw err
            })
    },
}
