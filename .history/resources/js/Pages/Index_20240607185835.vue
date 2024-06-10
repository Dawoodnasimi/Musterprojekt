<script setup>
import { ref } from "vue";

const title = ref("");
const author = ref("");
const content = ref("");

const submitForm = () => {
  // Handle form submission here
  console.log(title.value, author.value, content.value);
};
</script>

<template>
  <!-- ... -->
  <div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="title"> Title </label>
    <input
      v-model="title"
      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
      id="title"
      type="text"
      placeholder="Title"
    />
  </div>
  <div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="author">
      Author
    </label>
    <input
      v-model="author"
      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
      id="author"
      type="text"
      placeholder="Author"
    />
  </div>
  <div class="mb-6">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
      Content
    </label>
    <textarea
      v-model="content"
      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
      id="content"
      placeholder="Content"
    ></textarea>
  </div>
  <div class="flex items-center justify-between">
    <button
      @click="submitForm"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
      type="button"
    >
      Submit
    </button>
  </div>
  <!-- ... -->
</template>
