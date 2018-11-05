<template>
    <div id="about-page-edit">
        <toolbar>
            <h3>编辑关于页</h3>
        </toolbar>
        <br>
        <el-card class="box-card">
            <div slot="header" class="clearfix">
                <span>页面信息</span>
            </div>
            <el-form
                :model="settings"
                label-position="top"
                :disabled="loading"
            >
                <el-row :gutter="40">
                    <el-col :span="12">
                        <el-form-item label="公司介绍" prop="company-description">
                            <el-input
                                type="textarea"
                                :rows="10"
                                v-model="settings.company.zh"/>
                        </el-form-item>
                    </el-col>
                    <el-col :span="12">
                        <el-form-item label="Company description" prop="company-description">
                            <el-input
                                type="textarea"
                                :rows="10"
                                v-model="settings.company.en"/>
                        </el-form-item>
                    </el-col>
                </el-row>
                <el-row :gutter="40">
                    <el-col :lg="12">
                        <el-form-item label="国际奖项" prop="international-awards">
                            <el-input
                                v-model="settings.awards.international[i].title"
                                v-for="(award,i) in settings.awards.international"
                                :key="i"
                                class="input-with-select"
                            >
                                <el-select
                                    v-model="settings.awards.international[i].year"
                                    placeholder="获奖年份"
                                    class="w-100"
                                    slot="prepend"
                                >
                                    <el-option
                                        v-for="year in years"
                                        :key="year"
                                        :label="year"
                                        :value="year"
                                    />
                                </el-select>
                                <el-button slot="append" icon="el-icon-error" @click="removeInternationalAward(i)"/>
                            </el-input>
                            <el-button type="info" plain icon="el-icon-plus" size="small" @click="addInternationalAward"/>
                        </el-form-item>
                    </el-col>
                    <el-col :lg="12">
                        <el-form-item label="国内奖项" prop="national-awards">
                            <el-input
                                v-model="settings.awards.national[i].title"
                                v-for="(award,i) in settings.awards.national"
                                :key="i"
                                class="input-with-select"
                            >
                                <el-select
                                    v-model="settings.awards.national[i].year"
                                    placeholder="获奖年份"
                                    class="w-100"
                                    slot="prepend"
                                >
                                    <el-option
                                        v-for="year in years"
                                        :key="year"
                                        :label="year"
                                        :value="year"
                                    />
                                </el-select>
                                <el-button slot="append" icon="el-icon-error" @click="removeNationalAward(i)"/>
                            </el-input>
                            <el-button type="info" plain icon="el-icon-plus" size="small" @click="addNationalAward"/>
                        </el-form-item>
                    </el-col>
                </el-row>
                
                <div class="text-center">
                    <el-form-item>
                        <el-button type="primary" :loading="loading" @click="submit">保存</el-button>
                        <el-button @click="reset">取消</el-button>
                    </el-form-item>
                </div>
            </el-form>
        </el-card>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                loading: false,
                page: null,
                settings: {
                    company: {
                        zh: '',
                        en: ''
                    },
                    awards: {
                        international: [],
                        national: []
                    }
                }
            }
        },
        mounted() {
            this.fetch()
        },
        computed: {
            years() {
                const current = (new Date()).getFullYear();
                let years = [];
                for (let i = 0; i < 50; i++) {
                    years.push(current - i);
                }

                return years
            }
        },
        methods: {
            fetch() {
                this.loading = true
                axios.get('/api/pages/about')
                    .then(({data}) => {
                        this.loading = false
                        this.page = data
                        this.settings = data.settings
                    })
                    .catch(() => {
                        this.loading = false
                        this.showError()
                    })
            },
            reset() {
                this.settings = data.settings
            },
            removeInternationalAward(i) {
                this.settings.awards.international.length === 1 
                    ? this.settings.awards.international = {year: undefined, title: ''}
                    : this.settings.awards.international.splice(i, 1);
            },
            addInternationalAward() {
                this.settings.awards.international.push({
                    year: undefined,
                    title: ''
                });
            },
            removeNationalAward(i) {
                this.settings.awards.national.length === 1 
                    ? this.settings.awards.national = {year: undefined, title: ''}
                    : this.settings.awards.national.splice(i, 1);
            },
            addNationalAward() {
                this.settings.awards.national.push({
                    year: undefined,
                    title: ''
                });
            },
            submit() {
                this.loading = true
                axios.put('/api/pages/about', {settings: this.settings})
                    .then(() => {
                        this.loading = false
                        this.showSuccess()
                    })
                    .catch(({data}) => {
                        this.loading = false
                        this.page = data
                        this.reset()
                        this.showError()
                    })
            }
        }
    }
</script>

<style>
    .el-select .el-input {
        width: 110px;
    }

    .el-select-dropdown.el-popper {
        width: 110px;
    }
</style>
