<template>
    <el-table
        :data="data"
        :loading="loading"
        class="w-100"
        :row-class-name="tableRowClassName"
    >
        <el-table-column
            :label="nameTitle"
            :prop="nameProp">
        </el-table-column>
        <el-table-column label="图片" v-if="showImages">
            <template slot-scope="scope">
                <img :src="scope.row.main_image" class="image" style="width: 50px;">
            </template>
        </el-table-column>
        <el-table-column
            label="最近修改"
            align="center"
        >
            <template slot-scope="scope">
                <i class="el-icon-time"></i>
                <span style="margin-left: 10px">{{ scope.row.updated_at }}</span>
            </template>
        </el-table-column>
        <el-table-column
            align="center"
            label="操作">
            <template slot-scope="scope">
                <el-button
                    size="mini"
                    type="primary"
                    plain
                    @click="gotoEdit(scope.row.id)">修改</el-button>
                <el-button
                    size="mini"
                    type="info"
                    plain
                    @click="handlePreview(scope.$index, scope.row)">预览</el-button>
                <resource-toggle
                    :resource="scope.row"
                    :resource-name="resourceName"
                    button-size="mini"
                    button-plain
                    :button-icon-show="false"
                    :on-toggle="sync"
                />
            </template>
        </el-table-column>
    </el-table>
</template>

<script>
    import ResourceMixin from '../../mixins/resource.js'
    import ResourceToggle from './Toggle.vue'

    export default {
        mixins: [ResourceMixin],
        props: {
            data: {
                type: Array,
                required: true,
                default: () => []
            },
            loading: {
                type: Boolean,
                required: true,
                default: () => false
            },
            refresh: {
                type: Function,
                required: true
            },
            showImages: {
                type: Array
            }
        },

        methods: {
            tableRowClassName({row, rowIndex}) {
                if (row.visible === false) {
                    return 'offline-row'
                }

                return ''
            },
            gotoEdit(id) {
                this.$router.push(`/${this.resourceNamePlural}/${id}/edit`)
            },
            sync() {
                this.refresh();
            }
        },

        components: {
            ResourceToggle
        }
    }
</script>
