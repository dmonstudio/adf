<template>
    <div id="designer_edit">
        <toolbar>
            <h3 class="d-inline-block my-1">编辑设计师</h3>
            <template slot="right">
                <designer-toggle
                    :id="id"
                    :visible="designer.visible"
                    :on-toggle="sync"
                    plain
                    size="small"
                    v-if="designer.created_at"
                />
                <designer-delete :designer="designer" size="small" plain/>
            </template>
        </toolbar>
        <el-row class="mb-4">
            <el-col>
                <el-card class="box-card">
                    <div slot="header" class="clearfix">
                        <span>图片</span>
                    </div>
                    <upload
                        :id="id"
                        :images="designer.media"
                        v-if="designer.media"
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
                    <designer-form
                        :designer="designer"
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
                    <designer-form-en
                        :designer="designer"
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
    import DesignerForm from './Form.vue'
    import DesignerFormEn from './FormEn.vue'
    import Upload from './Upload.vue'
    import DesignerDelete from './Delete.vue'
    import DesignerToggle from './ToggleStatus.vue'

    export default {
        data() {
            return {
                designer: {},
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
                axios.get(`/api/designers/${this.id}`)
                    .then(res => {
                        this.designer = res.data
                        this.fetching = false
                    })
            },
            update(props) {
                this.updating = true
                axios.patch(`/api/designers/${this.id}`, props)
                    .then(res => {
                        this.designer = res.data
                        this.updating = false
                    })
                    .catch(err => {
                        this.updating = false
                    })
                    .then(() => {
                        this.$message({
                            type: 'success',
                            message: '编辑成功'
                        });
                    })
            },
            sync(designer) {
                this.designer = designer
            }
        },
        components: { 
            DesignerForm,
            DesignerFormEn,
            Upload,
            DesignerDelete,
            DesignerToggle
        }
    }
</script>