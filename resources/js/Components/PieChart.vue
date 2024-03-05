<script setup>
import {Chart, Pie, Responsive, Tooltip} from 'vue3-charts'
import {computed} from 'vue';

const props = defineProps({
    results: {
        type: Array,
        required: true,
    },
});

const axis = {
      primary: {
        hide: true
      },
      secondary: {
        ticks: 4,
        hide: true
      }
    };

const contendersArray = computed(() => Object.values(props.results.contenders));
</script>

<template>
    <div class="flex justify-center items-center my-6">

        <Chart :data="contendersArray"
               :size="{ width: 600, height: 600 }"
               :direction="circular"
               :config="{ controlHover: false }"
               :axis="axis"

        >
            <template #layers>
                <Pie :dataKeys="['name', 'votes']" :pie-style="{ innerRadius: 150, padAngle: 0.05, cornerRadius: 5 } "/>
            </template>
            <template #widgets>
                <Tooltip
                    :config="{
                      name: { },
                      votes: { },
                     }"
                    hideLine
                />
            </template>
        </Chart>
    </div>
</template>
