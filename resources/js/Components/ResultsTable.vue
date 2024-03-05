<script setup>
defineProps({
    results: {
        type: Array,
        required: true,
    },
    name: {
        type: String,
        required: false,
    },
});
</script>
<template>
    <div class="relative overflow-auto py-8 px-20">
        <table class="w-full text-left rtl:text-right text-gray-500 justify-center rounded-2xl shadow-lg border-separate">
            <thead class="text-gray-700 uppercase">
            <tr class="">
                <th class="py-4 px-6 font-semibold text-center rounded-tl-2xl bg-gray-100">Contender</th>
                <th class="py-4 px-6 font-semibold text-center  bg-gray-100">Votes</th>
                <th class="py-4 px-6 font-semibold text-center rounded-tr-2xl bg-gray-100">Percentual</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="result in results.contenders" :key="result.id" class="odd:bg-white even:bg-gray-100 border-b hover:bg-gray-200  text-center">
                <td class="py-4 px-6">{{ result.name }}</td>
                <td class="py-4 px-6">{{ result.votes }}</td>
                <td class="py-4 px-6">{{ (result.votes / results.totalVotes * 100).toFixed(1) }}%</td>
            </tr>
            </tbody>
            <tfoot class="text-gray-700 uppercase">
            <tr class="text-center">
                <th class="py-4 px-6 font-semibold rounded-bl-2xl bg-gray-500 text-white">Total</th>
                <th class="py-4 px-6 font-semibold  bg-gray-500 text-white">{{ results.totalVotes }}</th>
                <th class="py-4 px-6 font-semibold rounded-br-2xl  bg-gray-500 text-white">100%</th>
            </tr>
            </tfoot>
        </table>
    </div>
</template>

