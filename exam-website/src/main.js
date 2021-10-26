import Vue from 'vue'
import 'bootstrap'

import router from './router/index'

import App from '@/App.vue'


Vue.config.productionTip = false

new Vue({
  render: h => h(App),
  router
}).$mount('#app')
