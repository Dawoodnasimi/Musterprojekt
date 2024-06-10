<script setup>
import { defineProps } from "vue";

defineProps({
  posts: Object,
});
</script>

<template>
  <div class="container">
    <table>
      <thead>
        <tr>
          <th>Title</th>
          <th>Author</th>
          <th>Content</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(post, index) in posts" :key="index">
          <td>{{ post.title }}</td>
          <td>{{ post.author }}</td>
          <td>{{ post.content }}</td>
          <td>
            <button class="edit-btn">Edit</button>
            <button class="delete-btn">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<style scoped>
.container {
  max-width: 1200px;
  margin: auto;
  overflow-x: auto;
}

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

.edit-btn {
  background-color: blue;
  color: white;
  margin-right: 10px;
  padding: 5px 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.delete-btn {
  background-color: red;
  color: white;
  padding: 5px 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.edit-btn,
.delete-btn {
  display: inline-block;
  margin-right: 10px;
}

.delete-btn {
  margin-right: 0;
}

@media screen and (max-width: 600px) {
  table,
  th,
  td {
    width: 100%;
    display: block;
  }
}
</style>
