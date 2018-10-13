<template>
    <el-header>
        <el-row class="py-2">
            <el-col :span="12">
                <el-badge :value="12" class="item">
                    <el-button type="info" plain>最新消息</el-button>
                </el-badge>
            </el-col>
            <el-col :span="12" class="text-right">
                <form action="/logout" class="inline" method="POST">
                    <input type="hidden" :value="$root.csrfToken" name="_token">
                    <el-button
                        native-type="submit"
                        type="default"
                    >
                        退出登录
                    </el-button>
                </form>
            </el-col>
        </el-row>
    </el-header>
</template>
