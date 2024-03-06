<script setup>
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <div v-show="message">
<!--        <p class="text-sm text-red-600 dark:text-red-400">-->
        <p class="text-md text-green-600 font-bold bg py-2 mt-6">
           <span class="bg-green-50 py-3 px-5 rounded-lg">{{ message }}</span>
        </p>
    </div>
</template>
