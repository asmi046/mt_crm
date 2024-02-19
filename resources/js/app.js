import './bootstrap';
import {createApp} from 'vue/dist/vue.esm-bundler';

import { store } from "./storage"

import MainForm from "./components/Form.vue"

const global_app = createApp({
    components:{
        MainForm
    },

    setup() {
        const store = useStore()
        // store.dispatch('initialBascet');
    }
})

global_app.mount("#main");
