<template>
    <div id="home-page-edit">
        <toolbar>
            <h3>编辑首页</h3>
        </toolbar>
        <el-card class="box-card">
            <div slot="header" class="clearfix">
                幻灯片
            </div>
            <resource-upload
                :resource="page"
                resource-name="page"
                v-if="page"
                :on-reorder="fetch"
                media-collection="slides"
            />
        </el-card>
        <br>
        <el-card class="box-card">
            <div slot="header" class="clearfix">
                <span>基本信息</span>
            </div>
            <el-form
                :model="settings"
                label-position="top"
                :disabled="loading"
            >
                <el-row :gutter="40">
                    <el-col :lg="12">
                        <el-form-item label="中文台词" prop="dialog">
                            <el-input
                                type="textarea"
                                :rows="5"
                                v-model="settings.dialog.zh"/>
                        </el-form-item>
                    </el-col>
                    <el-col :lg="12">
                        <el-form-item label="英文台词" prop="dialog">
                            <el-input
                                type="textarea"
                                :rows="5"
                                v-model="settings.dialog.en"/>
                        </el-form-item>
                    </el-col>
                </el-row>
                
                <div class="text-center">
                    <el-form-item>
                        <el-button type="primary" :loading="loading" @click="submit">保存</el-button>
                        <el-button @click="reset">取消</el-button>
                    </el-form-item>
                </div>
            </el-form>
        </el-card>
    </div>
</template>

<script>
    import ResourceUpload from '../Resource/Upload.vue'

    export default {
        data() {
            return {
                loading: false,
                page: null,
                settings: {
                    dialog: {
                        zh: '',
                        en: ''
                    }
                }
            }
        },
        mounted() {
            this.fetch()
        },
        methods: {
            fetch() {
                this.loading = true
                axios.get('/api/pages/home')
                    .then(({data}) => {
                        this.loading = false
                        this.page = data
                        this.settings = data.settings
                    })
                    .catch(() => {
                        this.loading = false
                        this.showError()
                    })
            },
            reset() {
                this.settings = data.settings
            },
            submit() {
                this.loading = true
                axios.put('/api/pages/home', {settings: this.settings})
                    .then(() => {
                        this.loading = false
                        this.showSuccess()
                    })
                    .catch(({data}) => {
                        this.loading = false
                        this.page = data
                        this.reset()
                        this.showError()
                    })
            }
        },
        components: {
            ResourceUpload
        }
    }
</script>
