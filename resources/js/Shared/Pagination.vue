<template>

    <div>
        <Component
         :is="link.url ? 'Link' : 'span'"
         v-for="link in links"
        :href="link.url"
        v-html="link.label"
        class="px-2"
        :class="link.url ? '' : 'text-gray-500'"
        />

    </div>
</template>
<script>
import { Link } from '@inertiajs/vue3';
export default {

    props: {
        links:Array
    },
};
</script>

