<script setup>

defineProps({
    page: String
});
</script>

<template>
    <Head title="About" />
    <h1>About {{ page }}</h1>
</template>
