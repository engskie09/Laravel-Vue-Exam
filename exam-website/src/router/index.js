import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Login from '@/components/Login.vue'
import Account from '@/components/Account.vue'
import Daily from '@/components/Daily.vue'
import Task from '@/components/Task.vue'

const routes =
[
    { path: '', name : 'Login', component: Login },
    { path: '/Account', name : 'Account', component: Account },
    { path: '/Daily', name : 'Daily', component: Daily },
    { path: '/Task', name : 'Task', component: Task }
]

export default new VueRouter({routes, mode: 'history'})