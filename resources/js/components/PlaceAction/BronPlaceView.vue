<template>
    <div class="buss_schema">
        <buss-elem-order-view
            :schema="props.schema"
            :napr="'Курск - '+props.punkt"
            :reserved="reserved_t"
            :mesta="props.mesta"
            symbol="t"
        ></buss-elem-order-view>

        <buss-elem-order-view
            :schema="props.schema"
            :napr="props.punkt + ' - Курск'"
            :reserved="reserved_o"
            :mesta="props.mesta"
            symbol="o"
        ></buss-elem-order-view>
    </div>
</template>

<script setup>

import { ref } from "vue";

import BussElemOrderView from "./BussElemOrderView.vue"

    const props = defineProps({
        punkt: String,
        reis: Number,
        schema: Array,
        mesta: Array
    })

    let reserved_t = ref([])
    let reserved_o = ref([])

    axios.get('/order/get_reserved/'+props.reis )
            .then((resp) => {
                reserved_t.value = resp.data.t
                reserved_o.value = resp.data.o
            })
            .catch(error => console.log(error));

</script>

