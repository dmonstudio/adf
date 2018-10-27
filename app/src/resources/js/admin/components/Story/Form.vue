<template>
    <el-form
        :model="form"
        :rules="rules"
        label-width="120px"
        :disabled="loading"
    >
        <el-form-item :label="nameTitle" prop="name">
            <el-input v-model="form.name"/>
        </el-form-item>
        <el-form-item label="内容" prop="body">
            <el-input
                type="textarea"
                :rows="10"
                v-model="form.body"/>
        </el-form-item>
        <el-form-item>
            <el-button type="primary" :loading="updating" @click="submit">保存</el-button>
            <el-button @click="reset">取消</el-button>
        </el-form-item>
    </el-form>
</template>

<script>
    import ResourceMixin from '../../mixins/resource.js'

    export default {
        mixins: [ResourceMixin],
        props: {
            fetching: {
                type: Boolean,
                default: () => false
            },
            updating: {
                type: Boolean,
                default: () => false
            },
            onSubmit: {
                type: Function,
                required: true
            }
        },

        data() {
            return {
                form: {
                    name: '',
                    body: ''
                }
            }
        },

        watch: {
            resource() {
                this.reset()
            }
        },

        computed: {
            rules() {
                return {
                    name: [
                        { required: true, message: `请输入${this.resourceTitle + this.nameTitle}`, trigger: 'change' }
                    ]
                }
            },
            loading() {
                return this.fetching || this.updating
            }
        },

        methods: {
            reset() {
                const orig = this.resource
                this.form.name = orig.name
                this.form.body = orig.body
            },
            submit() {
                this.onSubmit({...this.form})
            }
        }
    }
</script>
