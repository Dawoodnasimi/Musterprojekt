<script setup>
import { useForm } from "@inertiajs/vue3";
import TextInput from "../Components/TextInput.vue";

const form = useForm({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
  avatar: null,
  previous: null,
});

const change = (e) => {
  form.avatar = e.target.files[0];
  form.preview = URL.createObjectURL(e.target.files[0]);
};

const submit = () => {
  form.post("/register", {
    onError: () => {
      form.reset("password", "password_confirmation");
    },
  });
};
</script>

<template>
  <Head title="Register" />

  <div class="flex items-center justify-center min-h-screen pt-4 bg-gray-200">
    <div class="w-full max-w-md">
      <!-- Da wir mit Inertia Out-of-the-box CSRF Schutz haben, brauchen wir nicht uns darum zu kuemmern -->
      <form
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-3"
        @submit.prevent="submit"
      >
        <h1 class="title text-center mb-3 font-bold text-xl">Register</h1>
        <div class="grid place-items-center">
          <div
            class="relative w-28 h-28 rounded-full overflow-hidden border border-slate-300"
          >
            <label for="avatar" class="absolute inset-0 grid content-end cursor-pointer">
              <span class="bg-white/70 pb-2 text-center">Avatar</span>
            </label>
            <input type="file" name="avatar" id="avatar" @input="change" hidden />

            <img
              class="object-cover w-28 h-28"
              :src="form.preview ?? 'storage/avatars/default.jpg'"
            />
          </div>
          <p class="text-red-500 text-xs italic">
            {{ form.errors.avatar }}
          </p>
        </div>

        <div class="mb-3">
          <TextInput
            name="Name"
            type="text"
            v-model="form.name"
            :message="form.errors.name"
            :placeholder="Name"
          />
        </div>
        <div class="mb-3">
          <TextInput
            name="Email"
            type="email"
            v-model="form.email"
            :message="form.errors.email"
            :placeholder="Email"
          />
        </div>
        <div class="mb-3">
          <TextInput
            name="Password"
            type="password"
            v-model="form.password"
            :message="form.errors.password"
            :placeholder="Password"
          />
        </div>
        <div class="mb-6">
          <TextInput
            name="Password Confirmation"
            type="password"
            v-model="form.password_confirmation"
            :placeholder="Password Confirmation"
          />
          <p class="text-slate-600 mt-4 mb-2">
            Already a User?
            <Link :href="route('login')" class="text-link text-blue-500 font-bold"
              >Login</Link
            >
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
