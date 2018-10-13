<template>
    <div>
        <el-row :gutter="10">
            <el-col :xs="8" :md="6" :lg="4" v-for="(image,i) in images" :key="i">
                <el-card :body-style="{ padding: '0px' }" shadow="never">
                    <img :src="image" class="w-100"/>
                    <div class="px-2">
                        <el-button type="text" class="button">x</el-button>
                    </div>
                </el-card>
            </el-col>
        </el-row>
        <el-row>
            <el-col>
                <upload/>
            </el-col>
        </el-row>
    </div>
</template>

<script>
    import Upload from './Upload.vue'

    export default {
        props: {
            id: {
                required: true,
                default: () => ''
            },
            images: {
                type: Array,
                required: true,
                default: () => []
            }
        },

        components: {
            Upload
        }
    }
</script>
