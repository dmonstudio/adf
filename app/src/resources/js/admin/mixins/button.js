export default {
    props: {
        buttonType: {
            type: String,
            default: () => 'default'
        },
        buttonSize: {
            type: String,
            default: () => 'default'
        },
        buttonPlain: {
            type: Boolean,
            default: () => false
        },
        buttonIcon: {
            type: String,
            default: () => ''
        },
        buttonIconShow: {
            type: Boolean,
            default: () => true
        }
    }
}
