<template>
    <el-table
        :data="designers"
        :loading="loading"
        class="w-100"
        :row-class-name="tableRowClassName"
    >
        <el-table-column type="expand">
            <template slot-scope="props">
                <row-details 
                    :titles="props.row.titles"
                    :achievements="props.row.achievements"
                    :images="props.row.images"
                />
            </template>
        </el-table-column>
        <el-table-column
            label="姓名"
            prop="name">
        </el-table-column>
        <el-table-column label="图片">
            <template slot-scope="scope">
                <img :src="scope.row.main_image" class="image" style="width: 50px;">
            </template>
        </el-table-column>
        <el-table-column label="最近修改">
            <template slot-scope="scope">
                <i class="el-icon-time"></i>
                <span style="margin-left: 10px">{{ scope.row.updated_at }}</span>
            </template>
        </el-table-column>
        <el-table-column
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
                <designer-toggle
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
    import DesignerCard from './Card'
    import RowDetails from './TableRowDetails'
    import DesignerToggle from './ToggleStatus.vue'

    export default {
        props: {
            designers: {
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
                this.$router.push(`/designers/${id}`)
            },
            sync() {
                this.refresh();
            }
        },

        components: {
            DesignerCard,
            RowDetails,
            DesignerToggle
        }
    }
</script>

<style lang="scss">
    .el-table .offline-row {
        opacity: 0.7;
        background: #eee;

        &:hover {
            opacity: 1;
        }
    }
</style>
