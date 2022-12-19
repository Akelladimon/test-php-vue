<template>
  <Navbar/>
  <PreloaderItem :isLoading="isLoading" />
  <div class="bg-gray-100">
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <div class="mx-auto ">
        <div class="overflow-hdden bg-white shadow sm:rounded-lg">
          <ul role="list" class="divide-y divide-gray-200">
            <li class="block hover:bg-gray-50" v-for="user in users" :key="user.id">
              <div class="lg:flex lg:items-center lg:justify-between px-4 py-4 sm:px-6">
                <div class="min-w-0 flex-1">
                  <span class="text-1xl font-bold leading-7 text-gray-900 sm:truncate sm:text-1xl sm:tracking-tight">
                    User Phone: {{ user.phone }}
                  </span>
                  <br>
                  <span class="text-1xl font-bold leading-7 text-gray-900 sm:truncate sm:text-1xl sm:tracking-tight">
                    User Name: {{ user.name }}
                  </span>
                </div>
                <div class="flex items-center justify-between">
                  <div class="ml-2 flex flex-shrink-0" v-if="user?.uuid || false">
                      <span
                          class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">
                        Token: {{ user?.uuid || '-' }}
                      </span>
                  </div>
                </div>
                <div class="mt-5 flex lg:mt-0 lg:ml-4">
                  <span class="hidden sm:block">
                    <button
                        @click="deactivate(user?.uuid)"
                        type="button"
                        class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2
                        text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2
                        focus:ring-indigo-500 focus:ring-offset-2">
                      <!-- Heroicon name: mini/pencil -->
                      <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                           viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path
                            d="M2.695 14.763l-1.262 3.154a.5.5 0 00.65.65l3.155-1.262a4 4 0 001.343-.885L17.5 5.5a2.121 2.121 0 00-3-3L3.58 13.42a4 4 0 00-.885 1.343z"/>
                      </svg>
                      Deactivate
                    </button>
                  </span>

                  <span class="ml-3 hidden sm:block">
                    <button
                        @click="generateNewLink(user.id, user?.uuid)"
                        type="button"
                        class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                      <!-- Heroicon name: mini/link -->
                      <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                           viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path
                            d="M12.232 4.232a2.5 2.5 0 013.536 3.536l-1.225 1.224a.75.75 0 001.061 1.06l1.224-1.224a4 4 0 00-5.656-5.656l-3 3a4 4 0 00.225 5.865.75.75 0 00.977-1.138 2.5 2.5 0 01-.142-3.667l3-3z"/>
                        <path
                            d="M11.603 7.963a.75.75 0 00-.977 1.138 2.5 2.5 0 01.142 3.667l-3 3a2.5 2.5 0 01-3.536-3.536l1.225-1.224a.75.75 0 00-1.061-1.06l-1.224 1.224a4 4 0 105.656 5.656l3-3a4 4 0 00-.225-5.865z"/>
                      </svg>
                      Generate New Link
                    </button>
                  </span>

                  <span class="sm:ml-3">
                    <button
                        @click="toGame(user?.uuid)"
                        type="button"
                        class="inline-flex items-center rounded-md border border-transparent bg-indigo-600
                         px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none
                         focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                      <!-- Heroicon name: mini/check -->
                      <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                           fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                              clip-rule="evenodd"/>
                      </svg>
                       Go To Game
                    </button>
                  </span>
                </div>
              </div>
            </li>
          </ul>
          <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
            <div class="flex flex-1 justify-between sm:hidden">
              <a href="#"
                 class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
              <a href="#"
                 class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
            </div>
            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
              <div>
                  <span> Page: {{ adminPage }} </span>
              </div>
              <div>
                <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                  <a href="#"
                     @click="getUsers(this.adminPage - 1)"
                     class="relative inline-flex items-center rounded-l-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">
                    <span class="sr-only">Previous</span>
                    <svg class="h-5 w-5" x-description="Heroicon name: mini/chevron-left"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd"
                            d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                            clip-rule="evenodd"></path>
                    </svg>
                  </a>
                 <a href="#"
                     @click="getUsers(this.adminPage + 1)"
                     class="relative inline-flex items-center rounded-r-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">
                    <span class="sr-only">Next</span>
                    <svg class="h-5 w-5" x-description="Heroicon name: mini/chevron-right"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd"
                            d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                            clip-rule="evenodd"></path>
                    </svg>
                  </a>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from "@/components/Navbar.vue";
import {useStore} from "vuex";
import PreloaderItem from "@/components/PreloaderItem.vue";

export default {
  name: 'Private',

  components: { Navbar, PreloaderItem },

  setup() {
    const store = useStore();

    async function getUsers(page) {
      if (page < 1) {
        page = 1
      }

      try {
        await store.dispatch('getUsers', page).then(() => {
        }).catch((err) => {
          console.log(err);
        })
      } catch (error) {
        console.error('login', error);
      }

    }

    getUsers(1)
    return {
      getUsers,
    };
  },
  computed: {
    users() {
      return this.$store.state.admin.users
    },
    adminPage() {
      return this.$store.state.admin.adminPage
    },
    isLoading() {
      return this.$store.state.admin.isLoading
    }
  },
  methods: {
    async generateNewLink(id, uuid) {
      await this.$store.dispatch('updateAccessToGame', { id, uuid }).then(() => {
      }).catch((err) => {
        console.log(err);
      })
    },

    async deactivate(uuid) {
      await this.$store.dispatch('editUser', { uuid, is_active: false}).then(() => {
      }).catch((err) => {
        console.log(err);
      })
    },

    toGame(uuid) {
      this.$cookies.set('uuid', uuid)
      this.$router.push({
        name: 'game',
        params: {
          uuid
        }
      });
    }
  },
}
</script>

<style scoped>

</style>