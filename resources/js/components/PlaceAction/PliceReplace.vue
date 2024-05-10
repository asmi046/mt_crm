<template>
    <div @click.prevent="show_window = false" v-show="show_window" class="popup_win_wrapper">
        <div @click.stop class="popup_win">
            <head>
                <span>{{ props.title }}</span>
                <i @click.prevent="show_window = false" title="Закрыть" class="close_win fa-solid fa-close "></i>
            </head>
            <body>
                <div class="buss_schema">
                    <buss-elem-one-select v-if="props.item.direction == 't'"
                        :schema="props.schema"
                        :placenumber="props.item.number"
                        :napr="'Курск - '+props.punkt"
                        :reserved="reserved_t"
                        v-model="place_to_replace"
                    ></buss-elem-one-select>
                    <buss-elem-one-select v-else
                        :schema="props.schema"
                        :placenumber="props.item.number"
                        :napr="props.punkt + ' - Курск'"
                        :reserved="reserved_o"
                        v-model="place_to_replace"
                        ></buss-elem-one-select>

                    <div class="replace_information">
                        <h2>Пересаживаем место №{{ props.item.number  }}</h2>
                        <div class="pasenger">
                             <p>{{ props.item.f }} {{ props.item.i }} {{ props.item.o }}</p>
                             <p>{{ props.item.doc_type }} {{ props.item.doc_n }} </p>
                             <p>{{ props.item.phone }}</p>
                        </div>
                        <h2>На место:</h2>
                        <p v-show="place_to_replace==0">Выберите место</p>
                        <div v-show="place_to_replace>0" class="select_place">
                            Место № {{ place_to_replace }}
                        </div>
                        <br>
                        <button @click.prevent="place_replace" v-show="place_to_replace>0">Пересадить</button>
                    </div>
                </div>


            </body>
        </div>
    </div>

    <div v-show="show_window" class="popup_shadow"></div>

    <a @click.prevent="show_window = !show_window" href="#">
        <i class="fa-solid fa-rotate "></i>
        <span class="ml_5">Пересадить</span>
    </a>

</template>

<script setup>
    import BussElemOneSelect from "./BussElemOneSelect.vue"

    import { ref, watch } from "vue";

    const props = defineProps({
        title: String,
        item: Object,
        punkt: String,
        reis: Number,
        schema:Array
    })

    let reserved_t = ref([])
    let reserved_o = ref([])
    let place_to_replace = ref(0)

    axios.get('/order/get_reserved/'+props.reis )
            .then((resp) => {
                reserved_t.value = resp.data.t
                reserved_o.value = resp.data.o
            })
            .catch(error => console.log(error));

    let show_window = ref(false)


    const place_replace = () => {
        axios.post('/place/replace',
            {
                'place_id':props.item.id,
                'palce_new_number':place_to_replace.value,
            }
        )
            .then((resp) => {
                location.reload()
            })
            .catch(error => console.log(error));
    }

</script>

<style>

</style>
