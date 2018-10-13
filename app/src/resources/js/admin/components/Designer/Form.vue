<template>
    <el-form
        :model="form"
        :rules="rules"
        ref="designerForm"
        label-width="120px"
        :disabled="loading"
    >
        <el-form-item label="姓名" prop="name">
            <el-input v-model="form.name"/>
        </el-form-item>
        <el-form-item label="头衔" prop="titles">
            <el-input v-model="form.titles[i]" v-for="(title,i) in form.titles" :key="i">
                <el-button slot="append" icon="el-icon-error" @click="removeTitle(i)"/>
            </el-input>
            <el-button type="info" plain icon="el-icon-plus" size="small" @click="addTitle"/>
        </el-form-item>
        <el-form-item label="荣誉" prop="achievements">
            <el-input v-model="form.achievements[i]" v-for="(achievement,i) in form.achievements" :key="i">
                <el-button slot="append" icon="el-icon-error" @click="removeAchievement(i)"/>
            </el-input>
            <el-button type="info" plain icon="el-icon-plus" size="small" @click="addAchievement"/>
        </el-form-item>
        <el-form-item label="介绍" prop="body">
            <el-input
                type="textarea"
                :rows="10"
                v-model="form.body"/>
        </el-form-item>
        <el-form-item>
            <el-button type="primary" :loading="updating" @click="submit">保存</el-button>
            <el-button @click="reset">取消</el-button>
        </el-form-item>
    </el-form>
</template>

<script>
    export default {
        props: {
            designer: {
                type: Object,
                required: true
            },
            fetching: {
                type: Boolean,
                default: () => false
            },
            updating: {
                type: Boolean,
                default: () => false
            },
            onSubmit: {
                type: Function,
                required: true
            }
        },

        data() {
            return {
                form: {
                    name: '',
                    titles: [],
                    achievements: [],
                    body: ''
                }
            }
        },

        watch: {
            designer() {
                this.reset()
            }
        },

        computed: {
            rules() {
                return {
                    name: [
                        { required: true, message: '请输入设计师名字', trigger: 'change' }
                    ]
                }
            },
            loading() {
                return this.fetching || this.updating
            }
        },

        methods: {
            reset() {
                const orig = this.designer
                this.form.name = orig.name
                this.form.titles = orig.titles
                this.form.achievements = orig.achievements
                this.form.body = orig.body
            },
            removeTitle(i) {
                this.form.titles.length === 1 
                    ? this.form.titles = [""]
                    : this.form.titles.splice(i, 1);
            },
            addTitle() {
                this.form.titles.push("");
            },
            removeAchievement(i) {
                this.form.achievements.length === 1 
                    ? this.form.achievements = [""]
                    : this.form.achievements.splice(i, 1);
            },
            addAchievement() {
                this.form.achievements.push("");
            },
            submit() {
                this.onSubmit({...this.form})
            }
        }
    }
</script>
