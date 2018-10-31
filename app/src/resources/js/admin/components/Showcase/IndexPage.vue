<template>
    <div class="showcases">
        <toolbar>
            <resource-create
                resource-name="showcase"
                button-type="primary"
                :on-action-complete="handleCreated"
            />
        </toolbar>
        <resource-table
            :data="showcases"
            :loading="loading"
            :refresh="fetch"
            resource-name="showcase"
        />
    </div>
</template>

<script>
    import ResourceTable from '../Resource/Table.vue'
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
            ResourceTable,
            ResourceCreate
        }
    }
</script>
