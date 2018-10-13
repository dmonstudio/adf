<template>
    <el-button
        type="primary"
        icon="el-icon-plus"
        size="small"
        @click="open"
    >
        添加
    </el-button>
</template>

<script>
    export default {
        methods: {
            open() {
                this.$prompt('设计师姓名', '添加', {
                    confirmButtonText: '添加',
                    cancelButtonText: '取消',
                    inputValidator: name => (name.length > 0) || '输入设计师姓名'
                }).then(({ value }) => {
                    this.create(value)
                }).catch(() => {
                /   /
                });
            },
            create(name) {
                console.log(name)
                axios.post('/api/designers', {name})
                    .then(({data}) => {
                        this.$router.push(`/designers/edit/${data.id}`)
                    })
                    .catch(() => {
                        this.$message({
                            type: 'error',
                            message: '发生错误，请重试'
                        });
                    })
            }
        }
    }
</script>
