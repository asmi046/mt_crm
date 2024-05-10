<template>
    <div class="buss_coll buss_toda">
        <div class="head">
            <div class="comment">{{ props.napr }}</div>
            <div class="voditel">Место водителя</div>
        </div>

        <div class="mesta">
            <div v-for="(item, index) in main_schema" :key="index" class="riad">
                <div @click.prevent="selectMesto(mesto)"
                    v-for="mesto in item"
                    :key="'mesto_'+mesto"
                    :class="{
                            empty: mesto == -1,
                            blocked: main_reserved[mesto] && mesto != props.placenumber,
                            to_replace: mesto == props.placenumber,
                            selected: mesto == model,
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
        placenumber: Number,
        reserved: Object
    })

    // const emit = defineEmits(['update:modelValue'])
    const model = defineModel({ type: Number })


        let main_schema = ref([])
        let main_reserved = ref([])
        let selected = ref(0)


        watch(() => props.reserved, (newValue, oldValue) => {
            main_schema.value = props.schema;
            main_reserved.value = props.reserved;
        });

        const selectMesto = (item) =>  {
            if ((item == -1) || (item == props.placenumber) || (main_reserved[item])) return
            model.value = item
        }

        const get_pasenger_name = (mesto) => {
            if (!mesto) return ""
            return  ((mesto.f)?mesto.f:"")+' '+((mesto.i)?mesto.i:"")+' '+((mesto.o)?mesto.o:"")
        }
</script>

<style>

</style>
