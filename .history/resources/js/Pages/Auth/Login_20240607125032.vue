<script setup>
import { useForm } from "@inertiajs/vue3";
import TextInput from "../Components/TextInput.vue";

const form = useForm({
  email: "",
  password: "",
  remember: "",
});

const submit = () => {
  form.post("/login", {
    onSuccess: () => {
      console.log("Success");
    },
    onError: () => {
      form.reset("password");
    },
  });
};
</script>

<template>
  <Head title="Login" />

  <div class="flex items-center justify-center min-h-screen pt-2 bg-gray-200">
    <div class="w-full max-w-md">
      <!-- Da wir mit Inertia Out-of-the-box CSRF Schutz haben, brauchen wir nicht uns darum zu kuemmern -->
      <form
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
        @submit.prevent="submit"
      >
        <h1 class="title text-center mb-4 font-bold text-lg">Login</h1>

        <div class="mb-4">
          <TextInput
            name="Email"
            type="email"
            v-model="form.email"
            :message="form.errors.email"
          />
        </div>
        <div class="mb-4">
          <TextInput
            name="Password"
            type="password"
            v-model="form.password"
            :message="form.errors.password"
          />
        </div>

        <div class="flex flex-col md:flex-row justify-between items-center mb-4">
          <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="remember">
              <input
                class="mr-2 leading-tight"
                type="checkbox"
                id="remember"
                name="remember"
                v-model="form.remember"
              />
              <span class="text-sm">Remember Me</span>
            </label>
          </div>

          <div>
            <p class="text-slate-600 mt-4 mb-2 md:mt-0">
              Need an account?
              <a :href="route('register')" class="text-link text-blue-500 font-bold"
                >Register</a
              >
            </p>
          </div>
        </div>

        <div class="flex items-center justify-between">
          <button
            class="bg-blue-500 hover:bg-blue-700 text-white w-full font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit"
            :disabled="form.processing"
          >
            Login
          </button>
        </div>
      </form>
    </div>
  </div>
</template>
