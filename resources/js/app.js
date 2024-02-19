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
