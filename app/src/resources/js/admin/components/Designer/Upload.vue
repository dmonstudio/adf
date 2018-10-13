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
        <div slot="tip" class="el-upload__tip">不超过2M的jpg/png文件。最多同时上传5张。</div>
    </el-upload>
</template>


<script>
  export default {
    props: {
      id: {
        required: true
      },
      images: {
        type: Array,
        required: true
      }
    },
    computed: {
      uploadUrl() {
        return `/api/designers/${this.id}/media`
      },
      fileList() {
        return this.images.map(image => {
          const {disk, id, file_name} = image
          return {
            id,
            url: `/${disk}/${id}/${file_name}`
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
        this.$message({
          type: 'success',
          message: '成功删除图片'
        })
      },
      beforeRemove(file, fileList) {
        return this.$confirm(`确定移除图片？`)
      },
      onError() {
        this.$message({
          type: 'error',
          message: '发生错误。请刷新后重试'
        })
      }
    }
  }
</script>
