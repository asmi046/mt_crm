import './bootstrap';
import {createApp} from 'vue/dist/vue.esm-bundler';
import MainForm from "./components/Form.vue"

const global_app = createApp({
    components:{
        MainForm
    }
})

global_app.mount("#main");
