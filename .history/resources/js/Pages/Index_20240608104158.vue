<script setup>
import { defineProps } from "vue";

defineProps({
  posts: Object,
});

//https://www.youtube.com/watch?v=V-FhBu7agiM
</script>

<template>
  <Head title="Posts" />

  <div class="mx-auto p-5 grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-3">
    <div
      class="bg-gray p-5 rounded-lg border border-gray-300 shadow-lg"
      v-for="(post, index) in posts"
      :key="index"
    >
      <h2 class="text-2xl font-bold pb-2">{{ post.title }}</h2>
      <p class="text-gray-500 pb-2">{{ post.content }}</p>
      <strong
        ><span class="text-black-500">{{ post.author }} {{ post.id }}</span></strong
      >
      <br />
      <Link
        class="bg-blue-500 text-white px-4 py-2 mt-2 rounded-lg hover:bg-blue-600"
        :href="`/posts/${post.id}`"
        as="button"
      >
        Read More
      </Link>
      <Link
        class="bg-green-500 text-white px-4 py-2 mt-2 rounded-lg hover:bg-green-600"
        :href="`posts/edit/${post.id}`"
        as="button"
      >
        Edit Post
      </Link>
    </div>
  </div>
</template>
