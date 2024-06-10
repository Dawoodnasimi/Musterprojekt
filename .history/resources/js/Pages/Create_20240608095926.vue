<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
  title: "",
  author: "",
  content: "",
});
</script>

<template>
  <Head title="Create Post" />

  <div class="container mx-auto p-5 w-full">
    <div class="bg-gray p-5 rounded-lg border border-gray-300 shadow-lg">
      <h2 class="text-2xl font-bold pb-2">Create Post</h2>
      <form action="/posts" method="POST">
        <div class="mb-4">
          <label for="title" class="block text-gray-700 text-sm font-bold mb-2">
            Title
          </label>
          <input
            type="text"
            name="title"
            id="title"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            placeholder="Enter title"
          />
        </div>
        <div class="mb-6">
          <label for="content" class="block text-gray-700 text-sm font-bold mb-2">
            Content
          </label>
          <textarea
            name="content"
            id="content"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            placeholder="Enter content"
          ></textarea>
        </div>
        <div class="flex items-center justify-between">
          <button
            class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600"
            type="submit"
          >
            Create Post
          </button>
        </div>
      </form>
    </div>
  </div>
</template>
