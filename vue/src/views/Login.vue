<template>
  <div class="w-full flex flex-wrap">
    <!-- Login Section -->
    <div class="w-full md:w-1/2 flex flex-col">
      <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-24">
        <a href="/" class="bg-black text-white font-bold text-xl p-4">Logo</a>
      </div>

      <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
        <p class="text-center text-3xl">Register in to your account.</p>
        <Form class="flex flex-col pt-3 md:pt-8" @submit="onSubmit">
          <div class="flex flex-col pt-4">
            <label for="email" class="text-lg">Name</label>
            <Field
                v-model.trim="formData.name"
                name="name"
                placeholder="Enter your Name"
                label="Name"
                class="shadow appearance-none border rounded
                w-full py-2 px-3 text-gray-700 mt-1 leading-tight
                focus:outline-none focus:shadow-outline"
                validation-mode="passive"
                data-test="username"
            />
          </div>

          <div class="flex flex-col pt-4">
            <label for="password" class="text-lg">Phone</label>
            <Field
                v-model="formData.phone"
                name="phone"
                type="Phone"
                placeholder="Phone"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1
                leading-tight focus:outline-none focus:shadow-outline"
                data-test="phone"
            />
          </div>

          <input type="submit" value="Register" class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8">
        </Form>
      </div>

    </div>

    <!-- Image Section -->
    <div class="w-1/2 shadow-2xl">
      <img class="object-cover w-full h-screen hidden md:block" src="https://source.unsplash.com/IXUM4cJynP0">
    </div>
  </div>
</template>

<script>
import { Form, Field } from 'vee-validate';
import { useStore } from "vuex";
import { useRouter } from "vue-router";
import { useCookies } from "vue3-cookies";

export default {
  name: 'Login',

  components: {
    Form,
    Field,
  },

  props: {
  },

  data: () => ({
    formData: {
      phone: '',
      name: '',
    },
  }),

  setup() {
    const store = useStore();
    const router = useRouter()
    const { cookies } = useCookies();

    async function onSubmit(values) {
      try {
        await store.dispatch('login', values).then(({ data }) => {
          cookies.set('uuid', data.uuid)
          router.push({
            name: 'game',
            params: {
              uuid: data.uuid,
            }
          });
        }).catch((err) => {
          console.log(err);
        })
      } catch (error) {
        console.error('login', error);
      }

    }

    return {
      onSubmit,
    };
  },
}
</script>
