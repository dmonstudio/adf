<template>
    <div class="designers">
        <toolbar>
            <designer-create/>
        </toolbar>
        <designer-table
            :designers="designers"
            :loading="loading"
            :refresh="fetch"
            @designer-updated="log"
        />
    </div>
</template>

<script>
    import DesignerTable from './Table'
    import DesignerCreate from './Create'

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
            log() {
                console.log('got it')
            }
        },

        components: { DesignerTable, DesignerCreate }
    }
</script>
