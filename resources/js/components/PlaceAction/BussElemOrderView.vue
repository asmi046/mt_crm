<template>
    <div class="buss_coll buss_toda">
        <div class="head">
            <div class="comment">{{ props.napr }}</div>
            <div class="voditel">Место водителя</div>
        </div>

        <div class="mesta">
            <div v-for="(item, index) in main_schema" :key="index" class="riad">
                <div v-for="mesto in item"
                    :key="'mesto_'+mesto"
                    :class="{
                            empty: mesto == -1,
                            blocked: main_reserved[mesto] && mesto != props.placenumber,
                            to_replace: mesta[mesto] != undefined && mesta[mesto].direction == props.symbol,

                        }"
                    class="mesto"
                    :title="get_pasenger_name(main_reserved[mesto])"
                    >
                    {{ (mesto >= 0)?mesto:'' }}
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { ref, watch } from 'vue';

    const props = defineProps({
        schema: Array,
        napr: String,
        symbol: String,
        mesta: Object,
        reserved: Object
    })


        let main_schema = ref([])
        let main_reserved = ref([])
        let mesta = ref([])


        for (let i =0; i<props.mesta.length; i++)
            if (props.mesta[i].direction == props.symbol)
                mesta.value[props.mesta[i].number] = props.mesta[i]

        console.log(mesta.value)

        watch(() => props.reserved, (newValue, oldValue) => {
            main_schema.value = props.schema;
            main_reserved.value = props.reserved;

        });

        const get_pasenger_name = (mesto) => {
            if (!mesto) return ""
            return  ((mesto.f)?mesto.f:"")+' '+((mesto.i)?mesto.i:"")+' '+((mesto.o)?mesto.o:"")
        }
</script>

<style>

</style>
