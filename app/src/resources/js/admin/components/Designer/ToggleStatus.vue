<template>
    <el-button
        :type="buttonType"
        :icon="iconClass"
        :size="size"
        :plain="plain"
        @click="toggle"
    >
        {{ visible ? '下线' : '上线' }}
    </el-button>
</template>

<script>
    export default {
        props: {
            id: {
                type: [String, Number],
                required: true
            },
            visible: {
                type: Boolean,
                required: true
            },
            onToggle: {
                type: Function,
                required: true
            },
            size: {
                type: String,
                default: () => 'default'
            },
            showIcon: {
                type: Boolean,
                default: () => true
            },
            plain: {
                type: Boolean,
                default: () => false
            }
        },
        computed: {
            buttonType() {
                return this.visible ? 'warning' : 'success';
            },
            iconClass() {
                if (!this.showIcon) {
                    return '';
                }

                return this.visible ? 'el-icon-arrow-down' : 'el-icon-arrow-up';
            }
        },
        methods: {
            toggle() {
                axios.patch(`/api/designers/${this.id}`, {visible: !this.visible})
                    .then(res => {
                        const visible = res.data.visible;
                        this.$message({
                            type: 'success',
                            message: visible ? '已发布' : '已撤回'
                        })
                        this.onToggle && this.onToggle(res.data)
                    })
                    .catch(err => {
                        console.error(err)
                        this.$message({
                            type: 'error',
                            message: '发生错误...请重试'
                        })
                    })
            }
        }
    }
</script>
