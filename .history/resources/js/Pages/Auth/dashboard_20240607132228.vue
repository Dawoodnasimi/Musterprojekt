<script setup>
const ucwords = (str) =>
  str.replace(/(^\w{1})|(\s+\w{1})/g, (letter) => letter.toUpperCase());
</script>

<template>
  <Head :title="$page.component" />

  <div class="flex items-center justify-center">
    <h1 class="text-4xl font-bold text-gray-800 text-center">
      Welcome back {{ ucwords($page.props.auth.user.name) }}
    </h1>
  </div>
</template>
