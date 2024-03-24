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
                    :class="{
                            empty: mesto == -1,
                            selected: modelValue.includes(mesto),
                            reserved: reserved[mesto]
                            // reserved: reserved.find(rmesto => rmesto.number === mesto)
                            // reserved: reserved.includes(mesto)
                        }"
                    class="mesto"
                    :title="get_pasenger_name(reserved[mesto])"
                    >
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
        modelValue: Array,
        user: String,
        reserved: Object
    },

    emits:[
        'update:modelValue'
    ],

    setup(props, context) {

        const selectMesto = (item) =>  {
            if (item == -1) return

            // if (props.reserved.includes(item)) return
            // if (props.reserved.find(rmesto => rmesto.number === item)) return
            if (props.reserved[item])
            {
                if (props.reserved[item].order_id == 0)  return

                if (confirm('Хотите перейти к редактированию данной брони № '+props.reserved[item].order_id))
                    document.location.href = '/orders/order-edit/'+props.reserved[item].order_id

                return
            }

            if (props.modelValue == undefined) return

            if(props.modelValue.includes(item))
                props.modelValue.splice(props.modelValue.indexOf(item),1)
            else
                props.modelValue.push(item)

            console.log(props.modelValue)

            context.emit('update:modelValue', props.modelValue)
        }

        const get_pasenger_name = (mesto) => {
            // if (props.user == "agent")  return ""

            if (!mesto) return ""
            return  ((mesto.f)?mesto.f:"")+' '+((mesto.i)?mesto.i:"")+' '+((mesto.o)?mesto.o:"")
        }

        return {
            schema:props.schema,
            napr:props.napr,
            reserved:props.reserved,
            modelValue:props.modelValue,
            selectMesto,
            get_pasenger_name
        }
    }

}
</script>

<style>

</style>
