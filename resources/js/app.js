import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

import axios from 'axios'
import VueAxios from 'vue-axios'

import VueApexCharts from "vue3-apexcharts"

import CKEditor from '@ckeditor/ckeditor5-vue';

import FontPicker from 'font-picker-vue';

createInertiaApp({
    progress: {
        delay: 100,
        color: '#3c4858',
        includeCSS: true,
        showSpinner: true,
    },
    resolve: name => require(`./Pages/${name}`),
    title: title => title ? `${title} - QR Card` : 'QR Card',
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .mixin({ methods: { route : route } })
            .mixin(require('./base'))
            .use(plugin)
            .use(VueAxios, axios)
            .use(VueApexCharts)
            .use(FontPicker)
            .use(CKEditor)
            .mount(el)
    },
})
