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
        <div slot="tip" class="el-upload__tip">不超过2M的jpg/png文件。最多上传{{ limit }}张。</div>
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
            },
            mediaCollection: {
                type: String,
                default: () => 'default'
            },
            limit: {
                type: Number,
                default: () => 10
            }
        },
        computed: {
            uploadUrl() {
                let uri = `/api/${this.resourceNamePlural}/${this.resource.id}/media`

                if (this.mediaCollection !== 'default') {
                    uri += `?collection=${this.mediaCollection}`
                }

                return uri
            },
            fileList() {
                return this.resource.media
                    .filter(image => {
                        return image.collection_name === this.mediaCollection
                    })
                    .map(image => {
                        const {disk, id, file_name} = image
                        return {
                            id: image.id,
                            url: `/${disk}/${image.id}/${file_name}`
                        }
                    })
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
                this.$message.warning(`最多上传${this.limit}张图片`);
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
