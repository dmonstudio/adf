<template>
    <el-button
        :type="buttonType"
        :icon="buttonIcon"
        :size="buttonSize"
        :plain="buttonPlain"
        @click="open"
    >
        添加
    </el-button>
</template>

<script>
    import ButtonMixin from '../../mixins/button.js'
    import ResourceMixin from '../../mixins/resource.js'

    export default {
        mixins: [ButtonMixin, ResourceMixin],
        props: {
            buttonIcon: {
                type: String,
                default: () => 'el-icon-plus'
            },
            actionTitle: {
                type: String,
                default: () => '添加'
            }
        },
        computed: {
            promptTitle() {
                return this.resourceTitle + this.nameTitle
            },
            apiUri() {
                return `/api/${this.resourceNamePlural}/`
            }
        },
        methods: {
            open() {
                const action =  this.actionTitle
                this.$prompt(this.promptTitle, action + this.resourceTitle, {
                    confirmButtonText: action,
                    cancelButtonText: '取消',
                    inputValidator: value => (value && value.length > 0) || `输入${this.nameTitle   }`
                }).then(({ value }) => {
                    this.handleCreate(value)
                }).catch(() => {
                    //
                });
            },
            handleCreate(value) {
                const payload = {}
                payload[this.nameProp] = value
                axios.post(this.apiUri, payload)
                    .then(({data}) => {
                        this.actionSuccess()
                        this.handleActionComplete && this.handleActionComplete(data)
                    })
                    .catch(() => {
                        this.showError()
                    })
            }
        }
    }
</script>
