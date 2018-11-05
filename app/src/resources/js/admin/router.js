import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router);

import Home from './components/Home/HomePage.vue'
import DesignerIndex from './components/Designer/IndexPage'
import DesignerEdit from './components/Designer/EditPage'
import ShowcaseIndex from './components/Showcase/IndexPage'
import ShowcaseEdit from './components/Showcase/EditPage'
import StoryIndex from './components/Story/IndexPage'
import StoryEdit from './components/Story/EditPage'
import HomePageEdit from './components/Pages/HomePageEdit'
import AboutPageEdit from './components/Pages/AboutPageEdit'

const routes = [
    { path: '/', component: Home },
    { path: '/designers', component: DesignerIndex },
    { path: '/designers/:id/edit', component: DesignerEdit },
    { path: '/showcases', component: ShowcaseIndex },
    { path: '/showcases/:id/edit', component: ShowcaseEdit },
    { path: '/stories', component: StoryIndex },
    { path: '/stories/:id/edit', component: StoryEdit },
    { path: '/pages/home/edit', component: HomePageEdit },
    { path: '/pages/about/edit', component: AboutPageEdit },
]

const router = new Router({
    routes,
    mode: 'history',
    base: 'admin'
})

export default router;
