<template>
    <el-row :gutter="20">
        <el-col :sm="24" :md="12" :lg="6">
            <el-card class="box-card">
                <div slot="header" class="clearfix">
                    <span>设计师</span>
                    <el-button class="float-right" type="text">管理</el-button>
                </div>
                <div class="text item">
                    已发布 {{ designers.visible }}
                </div>
                <div class="text item">
                    未发布 {{ designers.invisible }}
                </div>
            </el-card>
        </el-col>
        <el-col :sm="24" :md="12" :lg="6"></el-col>
        <el-col :sm="24" :md="12" :lg="6"></el-col>
        <el-col :sm="24" :md="12" :lg="6"></el-col>
    </el-row>
</template>

<script>
    export default {
        data() {
            return {
                designers: {}
            }
        },
        mounted() {
            axios.get('/api/stats/resources')
                .then(res => {
                    this.designers = res.data.designers
                })
        }
    }
</script>
