<template>
    <el-container id="wrapper">
        <el-aside width="280px">
            <Sidenav/>
        </el-aside>
        <el-container>
            <el-header>Header</el-header>
            <el-main>
                <router-view/>
            </el-main>
            <app-footer/>
        </el-container>
    </el-container>
</template>

<script>
    import Sidenav from './Sidenav.vue'
    import AppFooter from './Footer.vue'

    export default {
        components: {
            Sidenav,
            AppFooter
        }
    }
</script>
