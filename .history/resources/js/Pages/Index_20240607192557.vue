<script setup>
import { ref } from "vue";

let posts = ref([]);

// Fetch posts from the server

console.log($posts);
</script>

<template>
  <div></div>
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
