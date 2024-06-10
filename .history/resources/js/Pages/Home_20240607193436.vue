<script setup>
import Layout from "../Layouts/Layout.vue";

defineOptions({ layout: Layout });
const ucwords = (str) =>
    str.replace(/(^\w{1})|(\s+\w{1})/g, (letter) => letter.toUpperCase());
</script>

<template>
    <Head :title="$page.component" />
</template>
