<template>
  <div class="container mx-auto p-5 +w-full">
    <div class="bg-gray p-5 rounded-lg border border-gray-300 shadow-lg">
      <h2 class="text-2xl font-bold pb-2">{{ post.title }}</h2>
      <p class="text-gray-500 pb-2">{{ post.content }}</p>
      <strong
        ><span class="text-black-500">{{ post.author }}</span></strong
      >
      <br />
      <Link
        class="bg-blue-500 text-white px-4 py-2 mt-2 rounded-lg hover:bg-green-600"
        :href="`post/${post.id}`"
        as="button"
      >
        Edit Post
      </Link>
    </div>
  </div>
</template>

<script setup>
defineProps({
  post: Object,
});
</script>
