<script setup></script>

<template>
  <div>
    <header>
      <nav class="bg-gray-800 p-2 mt-0 w-full">
        <div class="container mx-auto flex flex-wrap items-center">
          <div
            class="flex w-full md:w-1/2 justify-center md:justify-start text-white font-extrabold"
          >
            <a
              href="/"
              class="text-white no-underline hover:text-white hover:no-underline"
            >
              <span class="text-2xl pl-2"><i class="em em-grinning">Musterapp</i></span>
            </a>
          </div>
          <div
            class="flex w-full pt-2 content-center justify-between md:w-1/2 md:justify-end"
          >
            <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
              <!-- <li class="mr-3">
                                <Link
                                    class="inline-block py-2 px-4 text-white no-underline"
                                    :href="route('home')"
                                    >Home</Link
                                >
                            </li> -->
              <li class="mr-3">
                <!-- <Link
                                    class="inline-block py-2 px-4 text-white no-underline"
                                    :href="route('about')"
                                    >About</Link
                                > -->
                <div v-if="$page.props.auth.user">
                  <Link
                    class="inline-block py-2 px-4 text-white no-underline"
                    :href="route('logout')"
                    method="post"
                    type="button"
                    >Logout</Link
                  >
                </div>

                <div v-else>
                  <Link
                    class="inline-block py-2 px-4 text-white no-underline"
                    :href="route('register')"
                    type="button"
                    >Register</Link
                  >
                  <Link
                    class="inline-block py-2 px-4 text-white no-underline"
                    :href="route('login')"
                    type="button"
                    >Login</Link
                  >
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main>
      <slot />
    </main>
  </div>
</template>
