<script setup>
import { ref } from "vue";

let posts = ref([]);

// Fetch posts from the server
// ...

const title = ref("");
const author = ref("");
const content = ref("");

const submitForm = () => {
  // Handle form submission here
  console.log(title.value, author.value, content.value);
};
</script>

<template>
  <div>
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
          >
            Title
          </th>
          <th
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
          >
            Author
          </th>
          <th
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
          >
            Content
          </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <tr v-for="post in posts" :key="post.title">
          <td class="px-6 py-4 whitespace-nowrap">
            {{ post.title }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            {{ post.author }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            {{ post.content }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<style scoped>
table {
  width: 100%;
  border-collapse: collapse;
}

th,
td {
  padding: 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {
  background-color: #f5f5f5;
}
</style>
