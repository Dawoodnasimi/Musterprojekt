<script setup>
import { defineProps, ref, watchEffect } from "vue";

const props = defineProps({
  posts: Object,
  flash: Object,
});

let showConfirmation = ref(false);
let postToDelete = ref(null);

const confirmDelete = (post) => {
  console.log(post);
  postToDelete.value = post;
  showConfirmation.value = true;
};

const handleDeleteClick = (post) => {
  //showConfirmation.value = false;
  console.log("delete worked" + post);
};

function toggleFullText(post) {
  post.showFullText = !post.showFullText;
}

const goToPage = (url) => {
  if (url) {
    window.location.href = url;
  }
};

const message = ref(props.flash.success || props.flash.error);
const type = ref(props.flash.success ? "success" : "error");

watchEffect(() => {
  if (message.value) {
    setTimeout(() => {
      message.value = "";
    }, 5000);
  }
});
</script>

<template>
  <Head title="Posts" />

  <transition name="fade">
    <div
      v-if="message"
      :class="`fixed bottom-5 right-7 flex items-center border bg-whitesmoke shadow-xl rounded-lg px-5 py-3 ${
        type === 'success' ? 'border-green-700' : 'border-red-700'
      }`"
    >
      <div
        :class="`text-2xl mr-2 ${type === 'success' ? 'text-green-500' : 'text-red-500'}`"
      ></div>
      <div class="text-md">
        {{ message }}
      </div>
    </div>
  </transition>

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
        <button
          class="bg-blue-500 text-white mt-2 mx-1 px-3 py-2 rounded-md text-sm font-medium hover:bg-blue-600"
          @click="toggleFullText(post)"
        >
          Read More
        </button>
        <Link
          class="bg-green-500 text-white mt-2 mx-1 px-3 py-2 rounded-md text-sm font-medium hover:bg-green-600"
          :href="`posts/edit/${post.id}`"
          as="button"
        >
          Edit Post
        </Link>
        <button
          class="bg-red-500 text-white mt-2 mx-1 px-3 py-2 rounded-md text-sm font-medium hover:bg-red-600"
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
                      <p class="text-sm text-black">
                        Are you sure you want to delete this post?
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Method implizit erwähnen weil Link hat GET by Default -->
              <div
                class="bg-white flex items-end flex-row-reverse"
                v-for="post in posts.data"
                :key="post.id"
              >
                <Link
                  v-if="postToDelete === post.id"
                  class="bg-red-500 text-white mt-2 mx-1 px-3 py-2 rounded-md text-sm font-small hover:bg-red-600 ml-2"
                  :href="`posts/delete/${post.id}`"
                  method="DELETE"
                  as="button"
                  @click="handleDeleteClick($post.id)"
                >
                  Delete Post
                </Link>
                <button
                  v-if="postToDelete === post.id"
                  type="button"
                  class="bg-white-200 text-black mt-2 mx-1 px-3 rounded-md text-sm font-medium hover:bg-gray-300 border border-gray-400 hover:border-gray-500"
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
        :disabled="post.url === null"
        @click="goToPage(post.url)"
        class="mx-1 px-3 py-2 rounded-md text-sm font-medium"
        :class="{
          'text-white bg-blue-700': post.active,
          'text-gray-700 bg-gray-200': !post.active && post.url !== null,
          'text-gray-500 bg-gray-300 cursor-not-allowed': post.url === null,
        }"
        v-html="post.label"
      ></button>
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

.cursor-not-allowed {
  cursor: not-allowed;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
}
</style>
