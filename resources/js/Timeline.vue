<template>
  <div :class="['relative', horizontal && 'flex overflow-x-auto']">
    <div v-if="!horizontal" class="absolute left-4 top-0 bottom-0 w-0.5 bg-gray-200"></div>

    <div
      v-for="(item, index) in items"
      :key="item.id || index"
      :class="[horizontal ? 'flex-shrink-0 px-4 text-center' : 'relative pl-10 pb-8 last:pb-0']"
    >
      <div
        v-if="!horizontal"
        :class="['absolute left-2 w-4 h-4 rounded-full border-2 border-white shadow', item.color || 'bg-blue-600']"
      ></div>

      <div v-if="horizontal" :class="['w-4 h-4 rounded-full mx-auto mb-2', item.color || 'bg-blue-600']"></div>

      <div class="bg-white">
        <p v-if="item.date" class="text-xs text-gray-500 mb-1">{{ item.date }}</p>
        <h4 class="font-medium text-gray-900">{{ item.title }}</h4>
        <p v-if="item.description" class="text-sm text-gray-600 mt-1">{{ item.description }}</p>
        <slot name="item" :item="item" :index="index"></slot>
      </div>
    </div>

    <div v-if="horizontal" class="absolute top-2 left-0 right-0 h-0.5 bg-gray-200 -z-10"></div>
  </div>
</template>

<script>
export default {
  name: 'LdTimeline',
  props: {
    items: { type: Array, default: () => [] },
    horizontal: { type: Boolean, default: false }
  }
};
</script>
