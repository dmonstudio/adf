<template>
    <el-table
        :data="showcases"
        :loading="loading"
        class="w-100"
        :row-class-name="tableRowClassName"
    >
        <el-table-column
            label="项目名称"
            prop="name">
        </el-table-column>
        <el-table-column label="图片">
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
                    @click="handleDelete(scope.$index, scope.row)">预览</el-button>
                <showcase-toggle
                    :id="scope.row.id"
                    :visible="scope.row.visible"
                    :show-icon="false"
                    size="mini"
                    plain
                    :on-toggle="sync"
                />
            </template>
        </el-table-column>
    </el-table>
</template>

<script>
    import ShowcaseToggle from '../Designer/ToggleStatus.vue'

    export default {
        props: {
            showcases: {
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
                this.$router.push(`/showcases/${id}/edit`)
            },
            sync() {
                this.refresh();
            }
        },

        components: {
            ShowcaseToggle
        }
    }
</script>
