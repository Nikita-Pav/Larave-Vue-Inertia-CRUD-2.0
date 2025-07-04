<script setup lang="ts">
import PostTemplate from '@/components/PostTemplate.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm  } from '@inertiajs/vue3';
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Posts Show',
    href: '/posts/show',
  },
];

const props = defineProps<{ post: any }>();

function deletePost(id: number) {
  if (confirm('Are you sure you want to delete this post?')) {
    router.delete(`/posts/${id}`, {
      preserveScroll: true,
    });
  }
}


</script>
<template>
  <Head :title="post.title" />

  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="mb-6">
      <h1 class="text-3xl font-bold">{{ post.title }}</h1>
    </div>

    <div class="prose prose-indigo mb-6">
      <div v-html="post.content" />
    </div>

    <div class="text-sm text-gray-600 mb-6">
      <p>
        <span>By <strong>{{ post.user.name }}</strong></span>
      </p>
    </div>

    <div v-if="post.tags && post.tags.length" class="mb-6">
      <h2 class="font-semibold mb-2">Tags</h2>
      <div class="flex flex-wrap gap-2">
        <span
          v-for="tag in post.tags"
          :key="tag.id"
          class="px-2 py-1 bg-gray-200 rounded-full text-sm"
        >
          {{ tag.name }}
        </span>
      </div>
    </div>

    <div class="flex flex-wrap gap-2">
      <Link
        :href="`/posts/${post.id}/edit`"
        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
      >
        Edit Post
      </Link>
      <button
        @click="deletePost(post.id)"
        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
      >
        Delete Post
      </button>
    </div>
  </AppLayout>
</template>
