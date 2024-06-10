<script setup>
import { useForm } from "@inertiajs/vue3";
import TextInput from "./Components/TextInput.vue";
import { ref } from "vue";

const form = useForm({
  title: "",
  author: "",
  content: "",
});

const submit = () => {
  form.post("/posts", {
    onSuccess: () => {
      form.reset();
    },
  });
};

const submitted = ref(false);
</script>

<template>
  <Head title="Create Post" />

  <div class="flex items-center justify-center min-h-screen pt-4 bg-gray-200">
    <div class="w-full max-w-md">
      <!-- Da wir mit Inertia Out-of-the-box CSRF Schutz haben, brauchen wir nicht uns darum zu kuemmern -->
      <form
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
        @submit.prevent="submit"
      >
        <h1 class="title text-center mb-4 font-bold text-xl">Create Post</h1>

        <div class="mb-4">
          <TextInput name="Title" v-model="form.title" :message="form.errors.title" />
        </div>
        <div class="mb-4">
          <TextInput name="Author" v-model="form.author" :message="form.errors.author" />
        </div>

        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
            Content
          </label>
          <textarea
            v-model="form.content"
            :class="{
              'border-red-500': !form.content && submitted,
            }"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-blue-500 outline-none"
            rows="5"
            placeholder="Content"
          ></textarea>
          <small class="error text-red-500" v-if="!form.content && submitted"
            >Content is required</small
          >
        </div>

        <div class="flex items-center justify-between">
          <button
            @click="submitted = true"
            class="bg-green-500 hover:bg-green-700 text-white w-full font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit"
          >
            Create
          </button>
        </div>
      </form>
    </div>
  </div>
</template>
