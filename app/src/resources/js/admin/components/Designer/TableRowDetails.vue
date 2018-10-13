<template>
    <el-row :gutter="10">
        <el-col :xs="24" :md="8">
            <h4>头衔</h4>
            <div
                v-for="(title,i) in titles"
                :key="i"
                class="mb-1"
            >
                <el-tag>{{ title }}</el-tag>
            </div>
        </el-col>
        <el-col :xs="24" :md="8">
            <h4>成就</h4>
            <div
                v-for="(achievement,i) in achievements"
                :key="i"
                class="mb-1"
            >
                <el-tag>{{ achievement }}</el-tag>
            </div>
        </el-col>
        <el-col :xs="24" :md="8">
            <h4>图片</h4>
            <div>
                <img 
                    :src="image" 
                    style="width: 100px;"
                    v-for="(image,i) in images"
                    :key="i"
                    class="p-1"
                />
            </div>
        </el-col>
    </el-row>
</template>

<script>
    export default {
        props: {
            titles: {
                type: Array,
                required: true,
                default: () => []
            },
            achievements: {
                type: Array,
                required: true,
                default: () => []
            },
            images: {
                type: Array,
                required: true,
                default: () => []
            }
        }
    }
</script>
