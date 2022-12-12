<template>
  <Navbar/>
  <section class="bg-white py-20 lg:py-[120px]">
    <div class="container mx-auto">
      <div class="-mx-4 flex flex-wrap">
        <div class="w-full px-4">
          <div class="max-w-full overflow-x-auto">
            <table class="w-full table-auto">
              <thead class="bg-slate-500">
              <tr class="bg-primary text-center">
                <th
                    class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4"
                >
                  Data
                </th>
                <th
                    class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4"
                >
                  Win
                </th>
              </tr>
              </thead>
              <tbody>
              <tr v-for="item in history" :key="item.id">
                <td
                    class="border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium text-dark"
                >
                  {{ item.created }}
                </td>
                <td
                    class="border-b border-[#E8E8E8] bg-white py-5 px-2 text-center text-base font-medium text-dark"
                >
                  {{ item.amount }}
                </td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Navbar from "@/components/Navbar.vue";
import {useStore} from "vuex";
import { useCookies } from "vue3-cookies";

export default {
  name: "History",
  components: { Navbar },

  setup() {
    const store = useStore();
    const { cookies } = useCookies();
    let uuid = store.state.uuid.length ? store.state.uuid : cookies.get('uuid')

    async function getHistoru(){
      await store.dispatch('history', uuid).then(() => {
      }).catch((err) => {
        console.log(err);
      })
    }
    getHistoru()
  },

  computed: {
    history() {
      return this.$store.state.history
    }
  },
}
</script>

<style scoped>

</style>