<template>
    <div id="showcase-edit">
        <toolbar>
            <h3 class="d-inline-block my-1">编辑项目</h3>
            <template slot="right">
                <resource-toggle
                    :resource="showcase"
                    resource-name="showcase"
                    size="small"
                    plain
                    :on-toggle="sync"
                    v-if="typeof showcase.visible !== 'undefined'"
                />
                <resource-delete
                    :resource="showcase"
                    resource-name="showcase"
                    size="small"
                    plain
                    :on-action-complete="handleDeleted"
                />
            </template>
        </toolbar>
        <el-row class="mb-4">
            <el-col>
                <el-card class="box-card">
                    <div slot="header" class="clearfix">
                        <span>图片</span>
                    </div>
                    <resource-upload
                        :resource="showcase"
                        resource-name="showcase"
                        v-if="showcase.media"
                        :on-reorder="fetch"
                    />
                </el-card>
            </el-col>
        </el-row>
        <el-row :gutter="40">
            <el-col :lg="12">
                <el-card class="box-card">
                    <div slot="header" class="clearfix">
                        <span>基本信息</span>
                    </div>
                    <showcase-form
                        :resource="showcase"
                        resource-name="showcase"
                        :fetching="fetching"
                        :updating="updating"
                        :onSubmit="update"
                    />
                </el-card>
            </el-col>
            <el-col :lg="12">
                <el-card class="box-card">
                    <div slot="header" class="clearfix">
                        <span>Basic Info</span>
                    </div>
                    <showcase-form-en
                        :resource="showcase"
                        resource-name="showcase"
                        :fetching="fetching"
                        :updating="updating"
                        :onSubmit="update"
                    />
                </el-card>
            </el-col>
        </el-row>
    </div>
</template>

<script>
    import ShowcaseForm from './Form.vue'
    import ShowcaseFormEn from './FormEn.vue'
    import ResourceUpload from '../Resource/Upload.vue'
    import ResourceDelete from '../Resource/Delete.vue'
    import ResourceToggle from '../Resource/Toggle.vue'

    export default {
        data() {
            return {
                showcase: {},
                fetching: false,
                updating: false
            }
        },
        mounted() {
            this.fetch()
        },
        computed: {
            id() {
                return this.$route.params.id
            }
        },
        methods: {
            fetch() {
                this.fetching = true
                axios.get(`/api/showcases/${this.id}`)
                    .then(res => {
                        this.showcase = res.data
                        this.fetching = false
                    })
            },
            update(props) {
                this.updating = true
                axios.patch(`/api/showcases/${this.id}`, props)
                    .then(res => {
                        this.showcase = res.data
                        this.updating = false
                    })
                    .catch(err => {
                        this.updating = false
                    })
                    .then(() => {
                        this.showSuccess('编辑')
                    })
            },
            sync(showcase) {
                this.showcase = showcase
            },
            handleDeleted() {
                this.goto('/showcases')
            }
        },
        components: { 
            ShowcaseForm,
            ShowcaseFormEn,
            ResourceUpload,
            ResourceDelete,
            ResourceToggle
        }
    }
</script>
