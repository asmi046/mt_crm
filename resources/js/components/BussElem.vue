<template>
    <div class="buss_coll buss_toda">
        <div class="head">
            <div class="comment">{{ napr }}</div>
            <div class="voditel">Место водителя</div>
        </div>

        <div class="mesta">
            <div v-for="(item, index) in schema" :key="index" class="riad">
                <div @click.prevent="selectMesto(mesto)"
                    v-for="mesto in item"
                    :key="'mesto_'+mesto"
                    :class="{empty: mesto == -1, selected: modelValue.includes(mesto) }"
                    class="mesto">
                    {{ (mesto >= 0)?mesto:'' }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    // const emit = defineEmits(['update:modelValue'])
    props: {
        schema: Array,
        napr: String,
        modelValue: Array
    },

    emits:[
        'update:modelValue'
    ],

    setup(props, context) {

        const selectMesto = (item) =>  {
            if (item == -1) return

            if (props.modelValue == undefined) return

            if(props.modelValue.includes(item))
                props.modelValue.splice(props.modelValue.indexOf(item),1)
            else
                props.modelValue.push(item)

            console.log(props.modelValue)

            context.emit('update:modelValue', props.modelValue)
        }

        return {
            schema:props.schema,
            napr:props.napr,
            modelValue:props.modelValue,
            selectMesto
        }
    }

}
</script>

<style>

</style>
