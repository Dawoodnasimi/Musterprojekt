<script setup>
import Layout from "../Layouts/Layout.vue";

defineOptions({ layout: Layout });
</script>

<template>
  <Head :title="$page.component" />

  <div class="text-center">
    <h1 class="text-4xl font-bold text-gray-800">Welcome back {{$page.props.auth.user.name}}</h1>

</template>
