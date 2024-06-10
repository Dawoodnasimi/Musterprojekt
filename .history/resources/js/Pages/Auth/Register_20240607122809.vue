<script setup>
import { useForm } from "@inertiajs/vue3";
import TextInput from "../Components/TextInput.vue";

const form = useForm({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
});

const submit = () => {
  form.post("/register", {
    onSuccess: () => {
      console.log("Success");
    },
    onError: () => {
      form.reset("password", "password_confirmation");
    },
  });

  // console.log(form);
};
</script>

<template>
  <Head title="Register" />

  <div class="flex items-center justify-center bg-gray-200">
    <div class="w-full max-w-md">
      <!-- Da wir mit Inertia Out-of-the-box CSRF Schutz haben, brauchen wir nicht uns darum zu kuemmern -->
      <form
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
        @submit.prevent="submit"
      >
        <h1 class="title text-center mb-4 font-bold text-lg">Register</h1>

        <div class="mb-4">
          <TextInput
            name="Name"
            type="text"
            v-model="form.name"
            :message="form.errors.name"
          />
        </div>
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
        <div class="mb-6">
          <TextInput
            name="Password Confirmation"
            type="password"
            v-model="form.password_confirmation"
          />
          <p class="text-slate-600 mt-4 mb-2">
            Already a User?
            <a :href="route('login')" class="text-link text-blue-500 font-bold">Login</a>
          </p>
        </div>

        <div class="flex items-center justify-between">
          <button
            class="bg-blue-500 hover:bg-blue-700 text-white w-full font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit"
            :disabled="form.processing"
          >
            Register
          </button>
        </div>
      </form>
    </div>
  </div>
</template>
