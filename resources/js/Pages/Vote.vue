<script setup>
import {ref, useAttrs} from 'vue';
import {Head, useForm} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import HiddenInput from "@/Components/HiddenInput.vue";
import VoteButton from "@/Components/VoteButton.vue";
import ContendersList from "@/Pages/ContendersList.vue";
import InputError from "@/Components/InputError.vue";

const props = defineProps({
    poll: {
        type: Object,
        required: true,
    },
    errors: {
        type: Array,
        default: false,
        reactive: true,
    },
});

const attrs = useAttrs();

const form = useForm({
    poll_id: props.poll.id,
    voter_id: attrs.auth.user.id,
    contender_id: '',
    errors: {},
});

let voteSelected = ref(false);

const submit = () => {
    form.post(route('vote.store'), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Polls"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ poll.name }}</h2>
        </template>

        <div v-if="errors.length === 0" class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p class="mt-2 text-xl">Hi {{ attrs.auth.user.name }}!</p>
                        <h3 class="mt-2 text-2xl">{{ poll.question }}</h3>
                        <form @submit.prevent="submit">
                            <HiddenInput v-model="form.poll_id" name="poll_id"/>
                            <HiddenInput v-model="form.voter_id" name="voter_id"/>

                            <ContendersList :contenders="poll.contenders" :form="form" @vote-selected-changed="voteSelected = $event" />

                            <div class="grid w-64 gap-3 md:grid-cols-1 mt-4">
                                <VoteButton :class="{ 'opacity-25': !voteSelected || errors.length > 0 }" :disabled="!voteSelected || errors.length > 0">
                                    Cast Your Vote!
                                </VoteButton>
                            </div>
                            <InputError class="mt-4 " :message="form.errors.vote" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div v-else class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p class="mt-2 text-xl">Hi {{ attrs.auth.user.name }}!</p>
                        <InputError class="mt-2" :message="errors.vote" />
                        <InputError class="mt-2" :message="errors.poll" />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


