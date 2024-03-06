<script setup>
const props = defineProps({
    link: {
        type: String,
        required: true,
    },
    disableIf: {
        type: Boolean,
        required: true,
    },
    id: {
        type: [String, Number],
        required: false,
        default: '',
    },
    color: {
        type: String,
        required: false,
        default: 'green',
    },
});

/**
 * TailwindCSS doesn't support dynamically generated classes, so any colors that *must* be exported
 * have to be added to the safelist in the tailwind.config.js file.
 * For now, we only have red, green, amber, purple, blue and teal.
 */

</script>
<template>
    <a :href="link + id">
        <button :disabled="disableIf"
                :class="[{ 'opacity-25': disableIf }, `text-white bg-gradient-to-r from-${color}-500 via-${color}-600 to-${color}-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-${color}-300
                shadow-lg shadow-${color}-500/50 font-bold rounded-lg text-md  px-5 py-0.5 text-center me-2 mb-0 uppercase`]">
            <slot />
        </button>
    </a>
</template>

