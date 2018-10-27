<template>
    <el-upload
        :action="uploadUrl"
        :on-preview="handlePreview"
        :on-remove="handleRemove"
        :before-remove="beforeRemove"
        name="media"
        multiple
        :limit="limit"
        :on-exceed="handleExceed"
        :file-list="fileList"
        list-type="picture-card"
    >
        <el-button size="small" type="primary">点此上传</el-button>
        <div slot="tip" class="el-upload__tip">不超过2M的jpg/png文件。最多同时上传{{ limit }}张。</div>
    </el-upload>
</template>


<script>
    import ResourceMixin from '../../mixins/resource.js'

    export default {
        mixins: [ResourceMixin],
        props: {
            actionTitle: {
                type: String,
                default: () => '上传'
            }
        },
        computed: {
            uploadUrl() {
                return `/api/${this.resourceNamePlural}/${this.resource.id}/media`
            },
            fileList() {
                return this.resource.media.map(image => {
                    const {disk, id, file_name} = image
                    return {
                        id: image.id,
                        url: `/${disk}/${image.id}/${file_name}`
                    }
                })
            },
            limit() {
                return 5;
            }
        },
        methods: {
            handleRemove(file, fileList) {
                axios.delete(`/api/media/${file.id}`)
            },
            handlePreview(file) {
                console.log(file);
            },
            handleExceed(files, fileList) {
                this.$message.warning(`最多同时上传${limit}张图片`);
            },
            onRemove(file, fileList) {
                this.actionSuccess('删除')
            },
            beforeRemove(file, fileList) {
                return this.$confirm(`确定移除图片？`)
            },
            onError() {
                this.showError()
            }
        }
    }
</script>
