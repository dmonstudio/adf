<template>
    <el-container id="wrapper">
        <el-aside width="280px">
            <Sidenav/>
        </el-aside>
        <el-container direction="vertical">
            <app-header/>
            <el-main>
                <router-view/>
            </el-main>
            <app-footer/>
        </el-container>
    </el-container>
</template>

<script>
    import Sidenav from './Layout/Sidenav.vue'
    import AppFooter from './Layout/Footer.vue'
    import AppHeader from './Layout/Header.vue'

    export default {
        components: {
            Sidenav,
            AppHeader,
            AppFooter
        }
    }
</script>
