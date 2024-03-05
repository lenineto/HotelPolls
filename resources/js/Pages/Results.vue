<script setup>
import {Head} from '@inertiajs/vue3';
import {useAttrs} from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PublicLayout from "@/Layouts/PublicLayout.vue";
import ResultsTable from "@/Components/ResultsTable.vue";

const props = defineProps({
    results: {
        type: Array,
        required: true,
    },
});

const attrs = useAttrs();

</script>

<template>
    <Head title="Results"/>
    <AuthenticatedLayout v-if="$attrs.auth.user">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ props.results.poll }}</h2>
        </template>

    <ResultsTable :results="props.results" :name="$attrs.auth.user.name"/>

    </AuthenticatedLayout>

    <PublicLayout v-else>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ props.results.poll }}</h2>
        </template>

        <ResultsTable :results="props.results"/>

    </PublicLayout>

</template>


