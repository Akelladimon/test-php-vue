import Axios from "axios";

const host = '//localhost/api'
export default {

    history(store, payload) {
        store.commit('preloader', true)

        return Axios.get(host + '/history/' + payload)
            .then(({data}) => {
                store.commit('preloader', false)
                store.commit('setHistory', data)
                return data;
            })
            .catch((err) => {
                store.commit('preloader', false)
                throw err
            })
    }
}
