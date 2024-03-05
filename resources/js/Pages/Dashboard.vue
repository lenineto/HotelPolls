<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ActivePolls from '@/Pages/Partials/ActivePolls.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    polls: {
        type: Array,
        required: true,
    },
});

</script>

<template>
    <Head title="Polls" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Active Polls</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <ActivePolls :polls="polls" />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
