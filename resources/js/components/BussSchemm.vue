<template>
    <div class="buss_schema">

        <buss-elem :schema="schema" :user="user" :napr="'Курск - '+punkt" :modelValue="todaSelect" :reserved="reservedt"></buss-elem>
        <buss-elem :schema="schema" :user="user" :napr="punkt + ' - Курск'" :modelValue="obratnoSelect" :reserved="reservedo"></buss-elem>
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

            <button v-if="action == 'create'"
                @click.prevent="createOrder"
                class="button"
                v-show="(todaSelect.length > 0) || (obratnoSelect.length > 0)"
                >Оформить заказ</button>

            <button v-else
                @click.prevent="addPlace"
                class="button"
                v-show="(todaSelect.length > 0) || (obratnoSelect.length > 0)"
                >Добавить места</button>

        </div>

    </div>
</template>

<script>
import { ref } from 'vue'
import BussElem from './BussElem.vue'
import { jsx } from 'vue/jsx-runtime'

export default {
  components: { BussElem },
    props: ['schema', 'punkt', 'reis', 'reservedt', 'reservedo', 'user', 'action', 'order'],

    setup(props) {

        let todaSelect = ref([])
        let obratnoSelect = ref([])

        const addPlace = () => {
            let tiken = document.querySelector('meta[name="_token"]').content;
            console.log(props.order)
            axios.post('/order/add_place', {
                'reis_id': props.reis,
                'punkt': props.punkt,
                'order_id': props.order,
                'tuda': todaSelect.value,
                'obratno': obratnoSelect.value,
            })
            .then((resp) => {
                window.location.href = "/orders/order-edit/"+props.order
            })
            .catch(error => console.log(error));
        }

        const createOrder = () => {
            let tiken = document.querySelector('meta[name="_token"]').content;

            axios.post('/order/create', {
                'reis_id': props.reis,
                'punkt': props.punkt,
                'price': 0,
                'avanc': 0,
                'state': "Черновик",
                'comment': "Заказ зарегистрирован",
                'tuda': todaSelect.value,
                'obratno': obratnoSelect.value,
            })
            .then((resp) => {
                console.log(resp.data)
                if (resp.data.order != null)
                    window.location.href = "/orders/order-edit/"+resp.data.order.id
                else {
                    alert(resp.data.message);
                }
            })
            .catch(error => console.log(error));
        }

        return {
            schema:props.schema,
            punkt:props.punkt,
            reservedt:props.reservedt,
            reservedo:props.reservedo,
            todaSelect,
            obratnoSelect,
            user:props.user,
            action:props.action,
            createOrder,
            addPlace
        }
    }
}
</script>

<style>

</style>
