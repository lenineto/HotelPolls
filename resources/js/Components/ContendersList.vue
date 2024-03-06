<!-- ContenderList.vue -->
<script setup>
import {ref, watch} from 'vue';

const props = defineProps({
    contenders: {
        type: Array,
        required: true,
    },
    form: {
        type: Object,
        required: true,
    },
});

const emit = defineEmits(['vote-selected-changed']);
let voteSelected = ref(false);
watch(voteSelected, (newVal) => {
    emit('vote-selected-changed', newVal);
});

</script>

<template>
    <ul class="grid w-7/12 gap-3 md:grid-cols-1 mt-4">
        <li v-for="contender in contenders" :key="contender.id">
            <div class="flex items-center">
                <input :id="contender.id" v-model="form.contender_id" :value="contender.id" class="hidden peer" name="contender" type="radio"
                       @click="voteSelected = true "/>
                <label :for="contender.id"
                       class="w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-green-700 text-xl font-black peer-checked:text-green-700 peer-checked:bg-green-50 hover:text-gray-600 hover:bg-gray-100">
                    {{ contender.name }}
                </label>
                <svg aria-hidden="true" class="text-transparent peer-checked:text-green-700 w-8 h-8 -ml-10" fill="none"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"/>
                </svg>
            </div>
        </li>
    </ul>
</template>

