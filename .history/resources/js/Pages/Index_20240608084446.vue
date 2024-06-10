<script setup>
import { defineProps } from "vue";

defineProps({
    posts: Object,
});

//https://www.youtube.com/watch?v=V-FhBu7agiM
</script>

<template>
    <div
        class="container mx-auto p-5"
        v-for="(post, index) in posts"
        :key="index"
    >
        <div class="bg-gray p-5 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold">{{ post.title }}</h2>
            <p class="text-gray-500">{{ post.author }}</p>
            <Link :to="{ name: 'post', params: { id: post.id } }">
                <button
                    class="bg-blue-500 text-white px-4 py-2 mt-2 rounded-lg"
                >
                    Read More
                </button>
            </Link>
        </div>
    </div>
</template>
