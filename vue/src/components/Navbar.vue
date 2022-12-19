<template>
  <div class="container mx-auto">
    <div class="relative -mx-4 flex items-center justify-between">
      <div class="flex justify-center md:justify-start">
        <a href="/" class="bg-black text-white font-bold text-xl p-4">Logo</a>
      </div>
      <div class="flex w-full items-center justify-between px-4">
        <div>
          <button
              id="navbarToggler"
              class="absolute right-4 top-1/2 block -translate-y-1/2 rounded-lg px-3 py-[6px] ring-primary focus:ring-2 lg:hidden"
          >
                <span
                    class="relative my-[6px] block h-[2px] w-[30px] bg-body-color"
                ></span>
            <span
                class="relative my-[6px] block h-[2px] w-[30px] bg-body-color"
            ></span>
            <span
                class="relative my-[6px] block h-[2px] w-[30px] bg-body-color"
            ></span>
          </button>
          <nav
              id="navbarCollapse"
              class="absolute right-4 top-full w-full max-w-[250px] rounded-lg bg-white py-3 px-2 shadow lg:static lg:block lg:w-full lg:max-w-full lg:shadow-none"
          >
            <ul class="blcok lg:flex">
              <li>
                <router-link
                    class="flex py-3 px-7 text-base font-medium text-dark hover:bg-gray-700
                    lg:ml-12 lg:inline-flex rounded-md text-lg"
                    :to="{ name: 'history', params: { uuid } }"
                >
                  History
                </router-link>
              </li>
              <li>
                <router-link
                    class="flex py-3 px-7 text-base font-medium text-dark hover:bg-gray-700
                    lg:ml-12 lg:inline-flex rounded-md text-lg"
                    :to="{ name: 'game', params: { uuid } }"
                >
                  Game
                </router-link>
              </li>
            </ul>
          </nav>
        </div>
        <div class="hidden justify-end pr-16 sm:flex lg:pr-0">
          <router-link
              class="flex py-3 px-7 text-base font-medium text-dark hover:bg-gray-700
                    lg:ml-12 lg:inline-flex rounded-md text-lg"
              :to="{ name: 'login'}"
          >
            Login
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: "Navbar",

  computed: {
    uuid() {
      let uuid = this.$cookies.get('uuid')?.length ? this.$cookies.get('uuid') : this.$store.state.user?.uuid || ''
      uuid = uuid.length ? uuid : window.location.href.substr(window.location.href.lastIndexOf('/') +1)
      return uuid;
    }
  },
}
</script>

<style scoped>

</style>