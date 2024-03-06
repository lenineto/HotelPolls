<script setup xmlns="http://www.w3.org/1999/html">

import ConditionalButton from "@/Components/ConditionalButton.vue";

const props = defineProps({
        polls: {
            type: Array,
            required: true,
        },
    });
</script>

<template>
    <div>
        <div class="py-12">
            <div class="w-full  sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <ul class=" space-y-1 text-gray-900 list-inside">
                            <li v-for="poll in polls" :key="poll.id" class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                    <div class="flex-shrink-0">
                                        <img src="/img/voting.svg" alt="poll image" class="w-14 mr-5">
                                    </div>
                                    <h3 class="w-80 text-xl font-bold leading-none tracking-normal text-gray-800 pr-8">{{ poll.name }}</h3>

                                    <ConditionalButton :link="'/poll/'" :disableIf="poll.user_voted" :id="poll.id" color="teal">Vote</ConditionalButton>

                                    <ConditionalButton :link="'/results/'" :disableIf="!poll.has_votes" :id="poll.id" color="amber">View Results</ConditionalButton>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
