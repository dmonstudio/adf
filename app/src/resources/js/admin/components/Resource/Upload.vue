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
        <el-button slot="trigger" size="small" type="primary">点此上传</el-button>
        <div slot="tip" class="el-upload__tip">
            不超过2M的jpg/png文件。最多上传{{ limit }}张。
            <el-button size="small" type="info" @click="reorder = true">
                <i class="el-icon-sort"></i>
                调整顺序
            </el-button>
        </div>
        <el-dialog
            title="调整顺序"
            :visible.sync="reorder"
            width="960px"
            center
        >
            <div :class="savingOrder && 'grayscale-20'">
                <draggable v-model="orderList">
                    <transition-group>
                        <div v-for="image in orderList" :key="image.id" class="d-inline-block m-1">
                            <img :src="image.url" width="180px"/>
                        </div>
                    </transition-group>
                </draggable>
            </div>
            <span slot="footer" class="dialog-footer">
                <el-button @click="cancelReorder" :disabled="savingOrder">取消</el-button>
                <el-button type="primary" @click="handleReorder" :disabled="savingOrder">确定</el-button>
            </span>
        </el-dialog>
    </el-upload>
</template>


<script>
    import ResourceMixin from '../../mixins/resource.js'
    import Draggable from 'vuedraggable'

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
        data() {
            return {
                reorder: false,
                orderList: this.resource.media,
                savingOrder: false
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
            },
            cancelReorder() {
                this.reorder = false
                this.orderList = this.resource.media
            },
            handleReorder() {
                this.savingOrder = true
                axios.post('/api/media/reorder', {
                        order: this.orderList.map(image => image.id)}
                    )
                    .then(() => {
                        this.reorder = false
                        this.savingOrder = false
                        this.showSuccess()
                        this.onReorder && this.onReorder()
                    })
                    .catch(() => {
                        this.savingOrder = false
                        this.showError()
                    })
            }
        },
        components: {
            Draggable
        }
    }
</script>
