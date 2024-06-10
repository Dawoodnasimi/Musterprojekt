<script setup>
const model = defineModel({
  type: null,
  required: true,
});

defineProps({
  name: {
    type: String,
    required: true,
  },
  type: {
    type: String,
    default: "text",
  },
  placeholder: {
    type: String,
    default: "",
  },
  message: String,
});
</script>

<template>
  <div>
    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
      {{ name }}
    </label>
    <input
      class="shadow-xl border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-blue-500 outline-none"
      :class="{ '!border-red-500': message }"
      id="name"
      :type="type"
      :placeholder="name"
      v-model="model"
    />
    <small class="error text-red-500" v-if="message">{{ message }}</small>
  </div>
</template>
