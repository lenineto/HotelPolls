<script setup>
import {Head} from '@inertiajs/vue3';
import {useAttrs} from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PublicLayout from "@/Layouts/PublicLayout.vue";
import ResultsTable from "@/Components/ResultsTable.vue";
import {computed} from 'vue';
import PieChart from "@/Components/PieChart.vue";

const props = defineProps({
    results: {
        type: Array,
        required: true,
    },
});

const attrs = useAttrs();

const contendersArray = computed(() => Object.values(props.results.contenders));

</script>

<template>
    <Head title="Results"/>


    <AuthenticatedLayout v-if="$attrs.auth.user">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ props.results.poll }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6 text-gray-900">
                        <h3 class="mt-6 text-xl "><span class="font-bold">Thanks for your vote, {{ $attrs.auth.user.name }}! </span><span> These are the partial results for the poll:</span>
                        </h3>
                    </div>

                    <ResultsTable :name="$attrs.auth.user.name" :results="props.results"/>
                    <PieChart :results="props.results"/>

                </div>
            </div>
        </div>


    </AuthenticatedLayout>

    <PublicLayout v-else>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ props.results.poll }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6 text-gray-900">
                        <h3 class="mt-6 text-xl ">These are the partial results for the poll:</h3>
                    </div>

                    <ResultsTable :results="props.results"/>

                </div>
            </div>
        </div>

    </PublicLayout>

</template>


