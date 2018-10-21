<template>
    <el-button
        :type="toggleButtonType"
        :icon="toggleIcon"
        :size="buttonSize"
        :plain="buttonPlain"
        @click="toggle"
    >
        {{ toggleActionTitle }}
    </el-button>
</template>

<script>
    import ResourceMixin from '../../mixins/resource.js'
    import ButtonMixin from '../../mixins/button.js'

    export default {
        mixins: [ResourceMixin, ButtonMixin],
        props: {
            onToggle: {
                type: Function
            },
        },
        computed: {
            toggleActionTitle() {
                return this.visible ? '撤回' : '发布'
            },
            toggleButtonType() {
                return this.visible ? 'warning' : 'success';
            },
            toggleIcon() {
                return this.visible ? 'el-icon-arrow-down' : 'el-icon-arrow-up';
            },
            apiUrl() {
                return this.actionUrl ? this.actionUrl(this.resource) : `/api/${this.resourceNamePlural}/${this.resource.id}`
            },
            visible() {
                return this.resource.visible
            }
        },
        methods: {
            toggle() {
                axios.patch(this.apiUrl, {visible: !this.visible})
                    .then(({data}) => {
                        const visible = data.visible
                        this.actionSuccess(this.toggleActionTitle)
                        this.onToggle && this.onToggle(data)
                    })
                    .catch(err => {
                        this.showError()
                    })
            }
        }
    }
</script>
