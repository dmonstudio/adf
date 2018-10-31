<template>
    <div class="designers">
        <toolbar>
            <resource-create
                resource-name="designer"
                button-type="primary"
                :on-action-complete="handleCreated"
            />
        </toolbar>
        <resource-table
            :data="designers"
            :loading="loading"
            :refresh="fetch"
            resource-name="designer"
        />
    </div>
</template>

<script>
    import ResourceTable from '../Resource/Table.vue'
    import ResourceCreate from '../Resource/Create.vue'

    export default {
        data() {
            return {
                designers: [],
                loading: false
            }
        },
        mounted() {
            this.fetch()
        },
        methods: {
            fetch() {
                this.loading = true
                axios.get('/api/designers')
                    .then(res => {
                        this.designers = res.data
                        this.loading = false
                    })
                    .catch(err => {
                        this.loading = false
                    })
            },
            handleCreated(designer) {
                return this.goto(`/designers/${designer.id}/edit`)
            }
        },

        components: {
            ResourceTable,
            ResourceCreate
        }
    }
</script>
