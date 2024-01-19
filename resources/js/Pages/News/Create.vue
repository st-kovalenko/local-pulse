<script setup>
// ...
</script>

<template>
    <AppLayout title="News">
        <template #header>
            <h2 class="font-semibold text-xl leading-tight mr-2">
                Create News Article
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form @submit.prevent="submitForm">
                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="md:grid grid-cols-2 gap-6">
                                <div class="mb-6 md:mb-0">
                                    <div class="mb-6">
                                        <label for="title" class="block font-medium text-sm text-gray-700">
                                            <span>Title</span>
                                        </label>
                                        <input v-model="form.title" @change="form.validate('title')" id="title" type="text" autocomplete="title" class="border-gray-300 focus:border-gold-300 focus:ring-gold-300 rounded-md shadow-sm mt-1 block w-full">
                                        <div v-if="form.invalid('title')" class="mt-2">
                                            <p class="text-sm text-red-600">{{ form.errors.title }}</p>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <label for="body" class="block font-medium text-sm text-gray-700">
                                            <span>Body</span>
                                        </label>
                                        <textarea v-model="form.body" @change="form.validate('body')" id="body" rows="4" class="border-gray-300 focus:border-gold-300 focus:ring-gold-300 rounded-md shadow-sm mt-1 block w-full"></textarea>
                                        <div v-if="form.invalid('body')" class="mt-2">
                                            <p class="text-sm text-red-600">{{ form.errors.body }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                            <div class="mr-3">
                                <div class="text-sm text-gray-600" style="display: none;">pages.news.global.saved.</div>
                            </div>
                            <Link :href="route('shops.news.index', {shop: shop})" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-red-500 bg-red-100 rounded-lg hover:bg-red-200 focus:ring-4 focus:outline-none focus:ring-red-500 mr-3">Cancel</Link>
                            <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-200">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import { useForm } from 'laravel-precognition-vue-inertia';

export default {
    components: {
        AppLayout,
        Link,
    },
    props: {
        shop: {
            type: Number,
            required: true,
        }
    },
    data() {
        return {
            form: useForm('post', route('shops.news.store', this.shop), {
                title: '',
                body: '',
            }),
        };
    },
    methods: {
        async submitForm() {
            await this.form.submit();
        },
    },
};
</script>
