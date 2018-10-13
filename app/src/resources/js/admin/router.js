import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router);

import Home from './components/Home.vue'
import DesignerIndex from './components/Designer/IndexPage'
import DesignerEdit from './components/Designer/EditPage'
import Projects from './components/Project/Index'

const routes = [
    { path: '/', component: Home },
    { path: '/designers', component: DesignerIndex },
    { path: '/designers/:id', component: DesignerEdit },
    { path: '/projects', component: Projects }
]

const router = new Router({
    routes,
    mode: 'history',
    base: 'admin'
})

export default router;
