<script setup>
import Layout from "../Layouts/Layout.vue";

defineOptions({ layout: Layout });
const ucwords = (str) =>
  str.replace(/(^\w{1})|(\s+\w{1})/g, (letter) => letter.toUpperCase());
</script>

<template>
  <Head :title="$page.component" />

  <div class="text-center">
    <h1 class="text-4xl font-bold text-gray-800 pt-2">
      Welcome back {{ ucwords($page.props.auth.user.name) }}
    </h1>
  </div>
</template>
