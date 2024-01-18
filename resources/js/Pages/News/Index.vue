<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <AppLayout title="News">
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-white leading-tight mr-2">
                    News
                </h2>
                <div class="flex items-center space-x-4">
                    <Link v-if="count < 3" :href="route('shops.news.create', shop)" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-2 focus:outline-none focus:ring-red-200">
                        <span class="inline-flex items-center justify-center w-4 h-4 mr-2 text-xs font-semibold text-red-600 bg-red-100 rounded">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                        Create
                    </Link>
                </div>
            </div>
        </template>

        <div v-if="news.length === 0" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mx-auto my-12 px-4 py-12 text-center" role="alert">
                <p class="text-xl mb-4">No News Found</p>
                <Link v-if="count < 3" :href="route('shops.news.create', {shop: shop})" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-200">
                    <span class="inline-flex items-center justify-center w-4 h-4 mr-2 text-xs font-semibold text-red-600 bg-red-100 rounded">
                        <i class="fa-solid fa-plus"></i>
                    </span> Create
                </Link>
            </div>
        </div>
        <div v-else class="py-12">
            <div v-if="news.length > 0" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div v-for="article in news" class="group p-6 lg:p-8 bg-white border-b border-gray-200">
                        <NewsArticle :article="article" :shop="shop"></NewsArticle>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import NewsArticle from '@/Components/NewsArticle.vue';

export default {
    components: {
        NewsArticle,
    },
    props: {
        news: {
            type: Object,
            required: true,
        },
        count: {
            type: Number,
            required: true,
        },
        shop: {
            type: Number,
            required: true,
        }
    },
};
</script>
