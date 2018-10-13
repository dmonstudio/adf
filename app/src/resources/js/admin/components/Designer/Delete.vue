<template>
    <el-button
        type="danger"
        @click="confirm"
        icon="el-icon-delete"
        :size="size"
        :plain="plain"
    >
        删除
    </el-button>
</template>

<script>
    export default {
        props: {
            designer: {
                required: true
            },
            size: {
                type: String,
                default: () => 'default'
            },
            plain: {
                type: Boolean,
                default: () => false
            }
        },
        methods: {
            confirm() {
                const name = this.designer.name
                this.$confirm(`删除后将无法恢复。确认删除？`, '删除设计师', {
                    confirmButtonText: '删除',
                    cancelButtonText: '取消',
                    type: 'error',
                    confirmButtonClass: 'el-button--danger'
                }).then(() => {
                    this.handleDelete();
                }).catch(() => {
                    //
                });
            },
            handleDelete() {
                axios.delete(`/api/designers/${this.designer.id}`)
                    .then(() => {
                        this.$message({
                            type: 'success',
                            message: '删除成功'
                        });
                        this.$router.push('/designers');
                    })
                    .catch(err => {
                        this.$message({
                            type: 'error',
                            message: '出现问题，请重试'
                        });
                    })
            }
        }
    }
</script>
