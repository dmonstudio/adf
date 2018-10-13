<template>
    <el-card class=designer-card>
        <div slot="header" class="clearfix">
            <span>{{ designer.name }}</span>
            <div class="float-right">
                <el-button size="mini" type="default" plain>详情</el-button>
                <el-button size="mini" type="default" plain>预览</el-button>
            </div>
        </div>
        <el-row :gutter="10">
            <el-col :span="12">
                <img :src="designer.main_image" class="image w-100">
            </el-col>
            <el-col :span="12">
                <div class="text item">
                    头衔 x {{ designer.titles.length }}
                </div>
                <div class="text item">
                    荣誉 x {{ designer.achievements.length }}
                </div>
            </el-col>
        </el-row>
    </el-card>
</template>

<script>
    export default {
        props: ['designer']
    }
</script>
