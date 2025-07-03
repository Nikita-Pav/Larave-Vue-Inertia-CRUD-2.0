<script setup lang="ts">
import PostTemplate from '@/components/PostTemplate.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Posts',
    href: '/posts',
  },
];


// Only keep this:
const props = defineProps<{
  posts: Array<any> // Replace 'any' with your custom Post type if available
}>();
</script>
<template>
    <Head title="Posts" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <h2 class="text-2xl font-bold">Posts</h2>
            <div class="mb-4">
                  <Link href="/posts/create" class="ml-2 text-white inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
      >Create New Post
      </Link>
            </div>
            <div>
                <PostTemplate v-for="post in posts" :key="post.id" :post="post" />
            </div>
        </div>
    </AppLayout>
</template>
