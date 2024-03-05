<script setup>
const props = defineProps({
        polls: {
            type: Array,
            required: true,
        },
    });
</script>

<template>
    <div>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Active Polls</h2>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <ul class="max-w-md space-y-1 text-gray-900 list-inside">
                            <li v-for="poll in polls" :key="poll.id" class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                    <div class="flex-shrink-0">
                                        <img src="/img/voting.svg" alt="poll image" class="w-14 mr-5">
                                    </div>
                                    <h3 class="text-xl font-bold leading-none tracking-normal text-gray-800">{{ poll.name }}</h3> <a :href="'/poll/' + poll.id"><button class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 shadow-lg shadow-purple-500/50 font-bold rounded-lg text-md px-5 py-0.5 text-center me-2 mb-0 uppercase">Vote</button></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
