import defaultState from './defaultState'

export default {
  preloader(state, isLoading) {
    state.isLoading = isLoading
  },
  setPage(state, page) {
    state.adminPage = page
  },
  setUsers(state, { data }) {
    state.users = data
  },
  setUserToUsers(state, { data }) {
    let users = state.users

    state.users = users.map(user => {
      if (user.id === data.userId) {
        user.uuid = data.uuid
        user.url = data.url
        return user
      }
      return user
    } )
  },
}
