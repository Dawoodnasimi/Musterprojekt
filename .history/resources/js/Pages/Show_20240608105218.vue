<script setup>
import { defineProps } from "vue";

defineProps({
    post: Object,
});
</script>

<template>
    <Head title="Post" />
    <div class="container mx-auto p-5 +w-full">
        <div class="bg-gray p-5 rounded-lg border border-gray-300 shadow-lg">
            <h2 class="text-2xl font-bold pb-2">{{ post.title }}</h2>
            <p class="text-gray-500 pb-2">{{ post.content }}</p>
            <strong
                ><span class="text-black-500"
                    >{{ post.author }} {{ post.id }}</span
                ></strong
            >
            <br />
        </div>
    </div>
</template>
