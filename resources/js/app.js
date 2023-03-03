require('./bootstrap')

import { createApp } from 'vue'
import Welcome from './components/Welcome'
import VueAxios from 'vue-axios'
const app = createApp({})

app.component('welcome', Welcome)
app.use(VueAxios, axios)
app.mount('#app')