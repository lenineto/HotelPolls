<script setup>
import { ref } from 'vue';

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);
//
// onMounted(() => {
//     if (input.value.hasAttribute('autofocus')) {
//         input.value.focus();
//     }
// });

// defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        type="hidden"
        v-model="model"
        ref="input"
    />
</template>
