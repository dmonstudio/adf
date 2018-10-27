<template>
    <el-button
        :type="buttonType"
        :icon="buttonIconShow ? buttonIcon : null"
        :size="buttonSize"
        :plain="buttonPlain"
        @click="confirm"
    >
        {{ actionTitle }}
    </el-button>
</template>

<script>
    import ButtonMixin from '../../mixins/button.js'
    import ResourceMixin from '../../mixins/resource.js'

    export default {
        mixins: [ButtonMixin, ResourceMixin],
        props: {
            resource: {
                type: Object,
                required: true
            },
            buttonType: {
                type: String,
                default: () => 'danger'
            },
            buttonIcon: {
                type: String,
                default: () => 'el-icon-delete'
            },
            actionTitle: {
                type: String,
                default: () => '删除'
            }
        },
        computed: {
            apiUrl() {
                return this.actionUrl ? this.actionUrl() : `/api/${this.resourceNamePlural}/${this.resource.id}`
            },
            promptMessage() {
                return `${this.actionTitle}后将无法恢复。确认${this.actionTitle}？`
            },
            promptTitle() {
                return this.actionTitle + this.resourceTitle
            }
        },
        methods: {
            confirm() {
                this.$confirm(this.promptMessage, this.promptTitle, {
                    confirmButtonText: this.actionTitle,
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
                axios.delete(this.apiUrl)
                    .then(({data}) => {
                        this.actionSuccess()
                        this.handleActionComplete && this.handleActionComplete(data)
                    })
                    .catch(err => {
                        this.showError()
                    })
            }
        }
    }
</script>
