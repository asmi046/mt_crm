import './bootstrap';
import {createApp} from 'vue/dist/vue.esm-bundler';

import { store } from "./storage"
import { useStore } from 'vuex'

import MainForm from "./components/Form.vue"
import BussSchemm from "./components/BussSchemm.vue"

const global_app = createApp({
    components:{
        MainForm,
        BussSchemm
    },

    setup() {
        const store = useStore()
        // store.dispatch('initialBascet');
    }
})

global_app.mount("#main");


import IMask from 'imask';

document.addEventListener("DOMContentLoaded", () => {
    let all_phone = document.querySelectorAll("input[type=tel]")
        for (let i = 0; i < all_phone.length; i++)
            IMask( all_phone[i], {mask: '+{7} (000) 000-00-00'})
})
