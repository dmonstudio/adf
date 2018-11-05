<template>
    <el-form
        :model="form"
        :rules="rules"
        label-width="120px"
        :disabled="loading"
    >
        <el-form-item label="链接" prop="slug">
            <el-input v-model="form.slug">
                <template slot="prepend">{{ baseUrl }}/showcases/</template>
            </el-input>
        </el-form-item>
        <el-form-item label="分类" prop="category">
            <el-select v-model="form.category" placeholder="选择分类" class="w-100">
                <el-option
                    v-for="item in categories"
                    :key="item.value"
                    :label="item.label"
                    :value="item.value"
                />
            </el-select>
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
                    slug: '',
                    category: ''
                },
                categories: []
            }
        },

        mounted() {
            axios.get('/api/showcase-categories')
                .then(({data}) => {
                    let categories = []
                    for (let key in data) {
                        categories.push({
                            value: key,
                            label: data[key]
                        })
                    };

                    this.categories = categories
                })
                .catch(err => {
                    this.showError()
                })
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
                        { required: true, message: `请输入链接`, trigger: 'change' }
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
                this.form.slug = orig.slug
                this.form.category = orig.category
            },
            submit() {
                this.onSubmit({...this.form})
            }
        }
    }
</script>
