
<template>
  <li class="flex justify-between gap-x-6 py-5">
    <div class="flex min-w-0 gap-x-4">
      <div class="min-w-0 flex-auto">
        <p class="text-sm font-semibold text-gray-900">{{ post.title }}</p>
        <p class="mt-1 truncate text-xs text-gray-500">{{ post.user.name }}</p>
      </div>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 max-w-xs">
      <span
        v-for="tag in post.tags"
        :key="tag.id"
        class="inline-block px-2 py-1 bg-blue-100 text-gray-800 text-xs font-medium rounded"
      >
        {{ tag.name }}
      </span>
    </div>
  </li>
</template>

<script setup>
const props = defineProps({
  post: Object,
});
</script>