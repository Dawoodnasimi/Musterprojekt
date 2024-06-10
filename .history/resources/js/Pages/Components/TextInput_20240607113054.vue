<script setup>
const model = defineModel({
  type: null,
  required: true,
});

defineProps({
    name: {
        type: String,
        required: true
    },
    type: {
        type: String,
        default: 'text'
    },
    message:String,
});

</script>

<template>

<div>
    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
        Name
    </label>
    <input class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-blue-500 outline-none" id="name" :type="type" placeholder="Name" v-model="model">
    <small class="error" v-if="message">{{ message }}</small>
</div>

</template>