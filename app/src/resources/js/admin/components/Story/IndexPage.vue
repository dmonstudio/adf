<template>
    <div class="stories">
        <toolbar>
            <resource-create
                resource-name="story"
                button-type="primary"
                :handle-action-complete="handleCreated"
            />
        </toolbar>
        <resource-table
            :data="stories"
            :loading="loading"
            :refresh="fetch"
            resource-name="story"
        />
    </div>
</template>

<script>
    import ResourceTable from '../Resource/Table.vue'
    import ResourceCreate from '../Resource/Create.vue'

    export default {
        data() {
            return {
                stories: [],
                loading: false
            }
        },
        mounted() {
            this.fetch()
        },
        methods: {
            fetch() {
                this.loading = true
                axios.get('/api/stories')
                    .then(res => {
                        this.stories = res.data
                        this.loading = false
                    })
                    .catch(err => {
                        this.loading = false
                    })
            },
            handleCreated(story) {
                return this.goto(`/stories/${story.id}/edit`)
            }
        },

        components: {
            ResourceTable,
            ResourceCreate
        }
    }
</script>
