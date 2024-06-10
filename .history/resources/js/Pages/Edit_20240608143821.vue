<script setup>
import { useForm } from "@inertiajs/vue3";
import TextInput from "./Components/TextInput.vue";
import { defineProps } from "vue";

let posts = defineProps({
  post: Object,
});

const form = useForm({
  title: posts.post.title,
  author: posts.post.author,
  content: posts.post.content,
});

const submit = () => {
  form.put(`/posts/update/${posts.post.id}`, {
    onSuccess: () => {
      form.reset();
    },
  });
};
</script>

<template>
  <Head title="Create Post" />

  <div class="flex items-center justify-center min-h-screen pt-2 bg-gray-200">
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
          <label class="block text-gray-500 text-sm font-bold mb-2" for="name">
            Content
          </label>
          <textarea
            v-model="form.content"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-blue-500 outline-none border-gray-700"
            rows="5"
            placeholder="Content"
          ></textarea>
        </div>

        <div class="flex items-center justify-between">
          <button
            class="bg-green-500 hover:bg-green-700 text-white w-full font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit"
          >
            Update
          </button>
        </div>
      </form>
    </div>
  </div>
</template>
