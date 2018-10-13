<template>
    <el-card shadow="always" class="toolbar" align="middle">
        <el-row>
            <el-col :span="12" class="text-left">
                <slot/>
            </el-col>
            <el-col :span="12" class="text-right">
                <slot name="right"/>
            </el-col>
        </el-row>
    </el-card>
</template>
