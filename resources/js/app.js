
import './bootstrap';
import {createApp} from 'vue/dist/vue.esm-bundler';

import { store } from "./storage"
import { useStore } from 'vuex'

import MainForm from "./components/Form.vue"
import BussSchemm from "./components/BussSchemm.vue"
import PliceReplace from "./components/PlaceAction/PliceReplace.vue"
import BronPlaceView from "./components/PlaceAction/BronPlaceView.vue"

import * as Sentry from "@sentry/vue";

const global_app = createApp({
    components:{
        MainForm,
        BussSchemm,
        BronPlaceView,
        PliceReplace
    },

    setup() {
        const store = useStore()
        // store.dispatch('initialBascet');
    }
})

Sentry.init({
    app:global_app,
    dsn: 'http://sentry@127.0.0.1:9912/1',
    // integrations: [Sentry.browserTracingIntegration({router}), Sentry.replayIntegration()],

    // Set tracesSampleRate to 1.0 to capture 100%
    // of transactions for performance monitoring.
    // We recommend adjusting this value in production
    tracesSampleRate: 1.0,

    // Set `tracePropagationTargets` to control for which URLs distributed tracing should be enabled
    tracePropagationTargets: ['localhost', /^https:\/\/yourserver\.io\/api/],

    // Capture Replay for 10% of all sessions,
    // plus for 100% of sessions with an error
    replaysSessionSampleRate: 0.1,
    replaysOnErrorSampleRate: 1.0,
  });

global_app.mount("#main");


import IMask from 'imask';

document.addEventListener("DOMContentLoaded", () => {
    let all_phone = document.querySelectorAll("input[type=tel]")
        for (let i = 0; i < all_phone.length; i++)
            IMask( all_phone[i], {mask: '+0 (000) 000-00-00'})

    let all_date_field = document.querySelectorAll("input.input_date")
        for (let i = 0; i < all_date_field.length; i++)
            IMask( all_date_field[i], {mask: '00.00.0000'})
})
