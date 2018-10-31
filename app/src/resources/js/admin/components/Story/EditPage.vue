<template>
    <div id="story-edit">
        <toolbar>
            <h3 class="d-inline-block my-1">编辑动态</h3>
            <template slot="right">
                <resource-toggle
                    :resource="story"
                    resource-name="story"
                    size="small"
                    plain
                    :on-toggle="sync"
                    v-if="typeof story.visible !== 'undefined'"
                />
                <resource-delete
                    :resource="story"
                    resource-name="story"
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
                        :resource="story"
                        resource-name="story"
                        v-if="story.media"
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
                    <story-form
                        :resource="story"
                        resource-name="story"
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
                    <story-form-en
                        :resource="story"
                        resource-name="story"
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
    import StoryForm from './Form.vue'
    import StoryFormEn from './FormEn.vue'
    import ResourceUpload from '../Resource/Upload.vue'
    import ResourceDelete from '../Resource/Delete.vue'
    import ResourceToggle from '../Resource/Toggle.vue'

    export default {
        data() {
            return {
                story: {},
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
                axios.get(`/api/stories/${this.id}`)
                    .then(res => {
                        this.story = res.data
                        this.fetching = false
                    })
            },
            update(props) {
                this.updating = true
                axios.patch(`/api/stories/${this.id}`, props)
                    .then(res => {
                        this.story = res.data
                        this.updating = false
                    })
                    .catch(err => {
                        this.updating = false
                    })
                    .then(() => {
                        this.showSuccess('编辑')
                    })
            },
            sync(story) {
                this.story = story
            },
            handleDeleted() {
                this.goto('/storys')
            }
        },
        components: { 
            StoryForm,
            StoryFormEn,
            ResourceUpload,
            ResourceDelete,
            ResourceToggle
        }
    }
</script>
