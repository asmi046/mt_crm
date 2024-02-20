<template>
    <div class="buss_schema">

        <buss-elem :schema="schema" :napr="'Курск - '+punkt" :modelValue="todaSelect"></buss-elem>
        <buss-elem :schema="schema" :napr="punkt + ' - Курск'" :modelValue="obratnoSelect"></buss-elem>
        <div class="selected_list">
            <h2>Выбранные места</h2>
            <p v-show="(todaSelect.length == 0) && (obratnoSelect.length == 0)">Нет выбранных мест.</p>
            <div v-for="(item, index) in todaSelect" :key="index" class="selected_element _tuda">
                <p>Место: <strong>{{ item }}</strong> <span class="napr">→</span></p>
                <p>Направление: <strong>{{ 'Курск - '+ punkt }} </strong></p>
            </div>

            <div v-for="(item, index) in obratnoSelect" :key="index" class="selected_element _obratno">
                <p>Место: <strong>{{ item }}</strong> <span class="napr">←</span></p>
                <p>Направление: <strong>{{ punkt + ' - Курск' }} </strong></p>
            </div>
            <button
                @click.prevent="createOrder"
                class="button"
                v-show="(todaSelect.length > 0) || (obratnoSelect.length > 0)"
                >Оформить заказ</button>
        </div>

    </div>
</template>

<script>
import { ref } from 'vue'
import BussElem from './BussElem.vue'
import { jsx } from 'vue/jsx-runtime'

export default {
  components: { BussElem },
    props: ['schema', 'punkt', 'reis'],

    setup(props) {

        let todaSelect = ref([])
        let obratnoSelect = ref([])

        const createOrder = () => {
            let tiken = document.querySelector('meta[name="_token"]').content;

            axios.post('/order/create', {
                'reis_id': props.reis,
                'comment': "Заказ зарегистрирован",
                'tuda': todaSelect.value,
                'obratno': obratnoSelect.value,
            })
            .then((resp) => {
                window.location.href = "/edit-order/"+resp.data.order.id
            })
            .catch(error => console.log(error));
        }

        return {
            schema:props.schema,
            punkt:props.punkt,
            todaSelect,
            obratnoSelect,
            createOrder
        }
    }
}
</script>

<style>

</style>
