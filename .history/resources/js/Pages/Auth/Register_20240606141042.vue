<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
form.post("/register");

// console.log(form);

};

</script>

<template>
    <Head title="Register" />

    <div class="flex items-center justify-center min-h-screen pt-10 bg-gray-200">
        <div class="w-full max-w-md">

            <!-- Da wir mit Inertia Out-of-the-box CSRF Schutz haben, brauchen wir nicht uns darum zu kuemmern -->
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="submit">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Name
                    </label>
                    <input class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-blue-500 outline-none" id="name" type="text" placeholder="Name" v-model="form.name">
                    <small class="text-red-500">{{ form.errors.name }}</small>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-blue-500 outline-none" id="email" type="email" placeholder="Email" v-model="form.email">
                    <small class="text-red-500">{{ form.errors.email }}</small>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-blue-500 outline-none" id="password" type="password" placeholder="Password" v-model="form.password">
                    <small class="text-red-500">{{ form.errors.password }}</small>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password-confirm">
                        Confirm Password
                    </label>
                    <input class="shadow border rounded w-full py-4 px-3 text-gray-700 leading-tight focus:border-blue-500 outline-none" id="password-confirm" type="password" placeholder="Confirm Password" v-model="form.password_confirmation">
                <p class="text-slate-600 mb-2">Already a User? <a href="#" class='text-link  text-blue-500 font-bold'>Login</a></p>

                </div>

                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white w-full font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" :disabled="form.processing">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>