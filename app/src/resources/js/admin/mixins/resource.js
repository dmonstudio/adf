export default {
    props: {
        resource: {
            type: Object
        },
        resourceName: {
            type: String,
            required: true
        },
        nameProp: {
            type: String,
            default: () => 'name'
        },
        actionTitle: {
            type: String,
            default: () => '操作'
        },
        actionUrl: {
            type: Function
        },
        handleActionComplete: {
            type: Function
        }
    },
    computed: {
        resourceTitle() {
            return t(this.resourceName)
        },
        resourceNamePlural() {
            return t(this.resourceName + '.' + 'plural') || (this.resourceName + 's')
        },
        nameTitle() {
            return t(this.resourceName + '.' + this.nameProp)
        }
    },
    methods: {
        actionSuccess(action) {
            this.$message({
                type: 'success',
                message: (action || this.actionTitle) + '成功'
            })
        }
    }
}
