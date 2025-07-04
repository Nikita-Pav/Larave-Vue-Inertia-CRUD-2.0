<script setup lang="ts">
import PostTemplate from '@/components/PostTemplate.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm  } from '@inertiajs/vue3';
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'
import { Link } from 'lucide-vue-next';
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Posts Edit',
    href: '/posts/edit',
  },
];

const props = defineProps<{ post: any }>();

const form = useForm({
  title: props.post.title,
  content: props.post.content,
  tags: props.post.tags.map((tag: any) => tag.name),
});

function submit() {
  form.post(route('Posts/update', { id: props.post.id }), {
    onSuccess: () => {
      form.reset();
      router.visit('/posts');
    },
    preserveScroll: true,
  });
}
</script>
<template>
  <Head title="Create Post" />

  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
      <h2 class="text-2xl font-bold">Edit your Post</h2>

      <form @submit.prevent="submit">
        <div class="grid gap-2">
          <Label for="title">Title</Label>
          <Input
            id="title"
            type="text"
            class="mt-1 block w-full"
            v-model="form.title"
            required
            placeholder="Post title"
          />
          <InputError class="mt-2" :message="form.errors.title" />
        </div>

        <div class="grid gap-2 mt-4">
          <Label for="content">Content</Label>
          <textarea
            id="content"
            class="mt-1 block w-full"
            v-model="form.content"
            required
            placeholder="Post content"
          ></textarea>
          <InputError class="mt-2" :message="form.errors.content" />
        </div>

        <div class="grid gap-2 mt-4">
          <Label for="tags">Tags (comma-separated)</Label>
          <Input
            id="tags"
            type="text"
            class="mt-1 block w-full"
            :value="form.tags.join(', ')"
            @input="form.tags = $event.target.value.split(',').map((tag: string) => tag.trim())"
            required
            placeholder="e.g. Laravel, Vue, Inertia"
          />
          <InputError class="mt-2" :message="form.errors.tags" />
        </div>

        <div class="flex items-center gap-4 mt-6">
          <Button type="submit">Save</Button>
        </div>
      </form>
    </div>
  </AppLayout>
</template>
