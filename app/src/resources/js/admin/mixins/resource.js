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
        onActionComplete: {
            type: Function
        },
        onReorder: {
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
            this.showSuccess(action)
        }
    }
}
