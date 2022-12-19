import defaultState from './defaultState'

export default {
  preloader(state, isLoading) {
    state.isLoading = isLoading
  },
  setUser(state, { data }) {
    state.name = data.name
    state.id = data.id
    state.uuid = data.uuid
  },
  setUuid(state, uuid ) {
    state.uuid = uuid
  },
  setWin(state, { data }) {
    state.win = data.win
  },

}
