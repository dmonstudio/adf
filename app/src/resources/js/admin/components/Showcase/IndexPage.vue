<template>
    <div class="showcases">
        <toolbar>
            <resource-create
                resource-name="showcase"
                resource-name-plural="showcases"
                button-type="primary"
                :handle-action-complete="handleCreated"
            />
        </toolbar>
        <showcase-table
            :showcases="showcases"
            :loading="loading"
            :refresh="fetch"
        />
    </div>
</template>

<script>
    import ShowcaseTable from './Table'
    import ResourceCreate from '../Resource/Create.vue'

    export default {
        data() {
            return {
                showcases: [],
                loading: false
            }
        },
        mounted() {
            this.fetch()
        },
        methods: {
            fetch() {
                this.loading = true
                axios.get('/api/showcases')
                    .then(res => {
                        this.showcases = res.data
                        this.loading = false
                    })
                    .catch(err => {
                        this.loading = false
                    })
            },
            handleCreated(showcase) {
                return this.goto(`/showcases/${showcase.id}/edit`)
            }
        },

        components: {
            ShowcaseTable,
            ResourceCreate
        }
    }
</script>
