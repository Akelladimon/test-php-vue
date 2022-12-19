import defaultState from './defaultState'

export default {
  preloader(state, isLoading) {
    state.isLoading = isLoading
  },
  setHistory(state, { data }) {
    state.history = data
  }
}
