<script setup>
import { defineProps, ref, defineEmit } from "vue";

// Define the posts prop
/* const props = defineProps({
  posts: Object,
}); */

// Define the emit function
const emit = defineEmit(["navigate"]);

// Define the goToPage method
const goToPage = (url) => {
  if (url) {
    const page = new URL(url).searchParams.get("page");
    emit("navigate", page);
  }
};

defineProps({
  posts: Object,
});

let showConfirmation = ref(false);
let postToDelete = ref(null);

const confirmDelete = (post) => {
  console.log(post);
  postToDelete.value = post;
  showConfirmation.value = true;
};

function toggleFullText(post) {
  post.showFullText = !post.showFullText;
}

function goToPage(url) {
  window.location.href = url;
}
</script>

<template>
  <Head title="Posts" />
  <div class="container mx-auto p-5 w-full flex justify-end items-center relative">
    <h1 class="text-3xl font-bold absolute left-1/2 transform -translate-x-1/2">Posts</h1>
    <Link
      class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600"
      href="/posts/create"
      as="button"
    >
      Create Post
    </Link>
  </div>

  <div class="mx-auto p-5 grid grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-4">
    <div
      class="bg-gray p-5 rounded-lg border border-gray-300 shadow-xl"
      v-for="(post, index) in posts.data"
      :key="index"
    >
      <h2 class="text-2xl font-bold pb-2"><strong>Title: </strong>{{ post.title }}</h2>
      <p class="text-black pb-2"><strong>Author: </strong>{{ post.author }}</p>
      <p class="text-gray-800 pb-2">
        {{ post.content }}
      </p>
      <transition name="fade">
        <p
          class="text-gray-500 pb-2"
          :class="{ truncate_multi_line: !post.showFullText }"
        >
          {{ post.content }}
        </p>
      </transition>

      <div class="space-x-2">
        <!-- <Link
          class="bg-blue-500 text-white px-4 py-2 mt-2 rounded-lg hover:bg-blue-600"
          :href="`/posts/${post.id}`"
          as="button"
        >
          Read More
        </Link> -->
        <button
          class="bg-blue-500 text-white px-4 py-2 mt-2 rounded-lg hover:bg-blue-600"
          @click="toggleFullText(post)"
        >
          Read More
        </button>
        <Link
          class="bg-green-500 text-white px-4 py-2 mt-2 rounded-lg hover:bg-green-600"
          :href="`posts/edit/${post.id}`"
          as="button"
        >
          Edit Post
        </Link>
        <button
          class="bg-red-500 text-white px-4 py-2 mt-2 rounded-lg hover:bg-red-600"
          @click="confirmDelete(post.id)"
        >
          Delete Post
        </button>

        <div
          v-if="showConfirmation"
          class="fixed z-10 inset-0 overflow-y-auto"
          aria-labelledby="modal-title"
          role="dialog"
          aria-modal="true"
        >
          <div
            class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
          >
            <div
              class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
              aria-hidden="true"
            ></div>

            <span
              class="hidden sm:inline-block sm:align-middle sm:h-screen"
              aria-hidden="true"
              >&#8203;</span
            >

            <div
              class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            >
              <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                  <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3
                      class="text-lg leading-6 font-medium text-gray-900"
                      id="modal-title"
                    >
                      Delete Post
                    </h3>
                    <div class="mt-2">
                      <p class="text-sm text-gray-500">
                        Are you sure you want to delete this post?
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <Link
                  class="bg-red-500 text-white px-4 py-2 mt-2 rounded-lg hover:bg-red-600 ml-2"
                  :href="`posts/delete/${post.id}`"
                  method="DELETE"
                  as="button"
                  @click="showConfirmation = false"
                >
                  Delete Post
                </Link>
                <!-- Method implizit erwähnen weil Link hat GET by Default -->
                <button
                  type="button"
                  class="bg-white-200 text-black px-4 py-2 mt-2 rounded-lg hover:bg-gray-300 border border-gray-300"
                  @click="showConfirmation = false"
                >
                  Cancel
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="flex items-center justify-center pb-4">
    <div v-for="post in posts.links" :key="post.url" class="flex">
      <button
        v-if="post.label === 'Previous' || post.label === 'Next'"
        :disabled="!post.url"
        @click="goToPage(post.url)"
        class="mx-1 px-3 py-2 rounded-md text-sm font-medium"
        :class="
          post.url
            ? 'text-blue-700 bg-blue-100 hover:bg-blue-200'
            : 'text-gray-500 bg-gray-200 cursor-not-allowed'
        "
        v-html="post.label"
      ></button>
      <Link
        v-else
        :href="post.url"
        as="button"
        class="mx-1 px-3 py-2 rounded-md text-sm font-medium"
        :class="post.active ? 'text-white bg-blue-700' : 'text-gray-700 bg-gray-200'"
        v-html="post.label"
      ></Link>
    </div>
  </div>
</template>

<style scoped>
.truncate_multi_line {
  display: -webkit-box;
  -webkit-line-clamp: 1;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
}
</style>
