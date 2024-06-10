<script setup>
defineProps({
    name: {
        type: String,
        required: true
    },
    type: {
        type: String,
        default: 'text'
    },
    message:String
})
</script>

<template>

<div>
    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
        Name
    </label>
    <input class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-blue-500 outline-none" id="name" type="text" placeholder="Name" v-model="form.name">
    <small class="text-red-500">{{ message }}</small>
</div>

</template>