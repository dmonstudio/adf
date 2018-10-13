<template>
    <el-footer id="footer" height="auto" class="py-3 text-right">
        {{ year }}
    </el-footer>
</template>

<script>
    export default {
        computed: {
            year() {
                return (new Date()).getFullYear();
            }
        }
    }
</script>
