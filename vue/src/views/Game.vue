<template>
  <Navbar/>
  <PreloaderItem :isLoading="isLoading" />
  <section class="bg-white pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]">
    <div class="container mx-auto">
      <div
          class="flex flex-wrap items-center justify-between rounded-lg border border-[#e7e7e7] bg-[#f4f7ff] py-8 px-6 xs:px-10 md:px-8 lg:px-10"
      >
        <div class="w-full md:w-7/12 lg:w-2/3">
          <div class="mb-6 md:mb-0">
            <h4
                class="mb-1 text-xl font-bold text-black xs:text-2xl md:text-xl lg:text-2xl"
            >
              Win
            </h4>
            <p class="text-base font-medium text-body-color">
             {{ win }}
            </p>
          </div>
        </div>

        <div class="w-full md:w-5/12 lg:w-1/3">
          <div class="flex items-center space-x-3 md:justify-end">
            <button
                @click="getGame()"
                class="inline-flex items-center bg-black text-white font-bold
                       rounded-md text-lg hover:bg-gray-700 p-2 py-[10px] px-8 text-center text-base">
              Im feeling lucky
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Navbar from "@/components/Navbar.vue";
import {useStore} from "vuex";
import {useRouter} from "vue-router";
import { useCookies } from "vue3-cookies";
import PreloaderItem from "@/components/PreloaderItem.vue";

export default {
  name: "Game",
  components: { Navbar, PreloaderItem },

  data: () => ({
      uuid: '',
  }),

  mounted() {
    this.uuid = this.$cookies.get('uuid').length ? this.$cookies.get('uuid') : this.$store.state.user.uuid;
  },

  setup() {
    const store = useStore();
    const router = useRouter();
    const { cookies } = useCookies();

    let uuid = cookies.get('uuid').length ? cookies.get('uuid') : store.state.user?.uuid;

    if (!uuid.length) {
       uuid = window.location.href.substr(window.location.href.lastIndexOf('/') +1)
       store.commit('setUuid',uuid)
    }

    async function accessGame(){
      await store.dispatch('accessToGame', uuid).then(({ data }) => {
        if (!data.isActive) {
          router.push({
            name: 'login',
          });
        }
      }).catch((err) => {
        console.log(err);
      })
    }
    accessGame()
  },

  computed: {
    win() {
      return this.$store.state.user.win
    },
    isLoading() {
      return this.$store.state.user.isLoading
    }
  },

  methods: {
    async getGame() {
      await this.$store.dispatch('game', this.uuid).then(() => {}).catch((err) => {
        console.log(err);
      })
    }
  },
}


</script>

<style scoped>

</style>