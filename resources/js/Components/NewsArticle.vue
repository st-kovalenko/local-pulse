<script setup>
import { Link } from '@inertiajs/vue3';
import { parseISO, format } from 'date-fns'
</script>

<template>
    <div class="flex flex-col md:flex-row mb-8 last-of-type:mb-0 border-b last-of-type:border-b-0 pb-8 last-of-type:pb-0">
        <div class="px-4 grow-0">
            <div class="flex flex-row">
                <div :style="{ 'border-color': '#6e2b2b' }" class="relative inline-flex items-center justify-center w-16 h-16 min-w-[4rem] min-h-[4rem] overflow-hidden rounded-full border-4 border-[#9B2323FF] bg-gray-100">
                    <span class="font-medium text-2xl text-gray-600">S</span>
                </div>
                <div class="ml-4">
                    <p class="text-gray-500 text-sm mb-2">
                        {{ format(parseISO(article.created_at), 'yyyy-MM-dd HH:mm') }} | {{ article.shop.title }}
                    </p>
                    <Link :href="route('shops.news.edit', {shop: shop, news:article.id})" class="text-2xl inline-block font-bold mb-2 transition hover:text-red-600">
                        {{ article.title }}
                    </Link>
                </div>
            </div>
            <p class="md:ml-20 flex-none">{{ article.body }}</p>
        </div>
        <div class="w-16 ml-auto shrink-0">
            <div class="hidden group-hover:flex items-center justify-end h-full">
                <Link :href="route('shops.news.edit', {shop: shop, news:article.id})" class="text-red-600 transition hover:text-red-800 mr-3">Edit</Link>
                <form @submit.prevent="submitForm(article.id)" style="display: inline;">
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this news article?')" class="text-red-600 transition hover:text-red-800">
                        Trash
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "NewsArticle",
    props: {
        article: {
            required: true,
            type: Object,
        },
        shop: {
            type: Number,
            required: true,
        }
    },
    methods: {
        async submitForm(id) {
            await this.$inertia.delete(route('shops.news.destroy', {shop: 1, news:id}));
        },
    },
}
</script>
