import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router);

import Home from './components/Home/HomePage.vue'
import DesignerIndex from './components/Designer/IndexPage'
import DesignerEdit from './components/Designer/EditPage'
import ShowcaseIndex from './components/Showcase/IndexPage'

const routes = [
    { path: '/', component: Home },
    { path: '/designers', component: DesignerIndex },
    { path: '/designers/:id/edit', component: DesignerEdit },
    { path: '/showcases', component: ShowcaseIndex }
]

const router = new Router({
    routes,
    mode: 'history',
    base: 'admin'
})

export default router;
