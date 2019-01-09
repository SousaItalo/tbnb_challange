<template>
    <div>
        <h1 class="title has-text-white has-text-weight-light has-text-centered">My Cleaners</h1>

        <div class="columns is-mobile">
            <div class="column">
                <ul class="cleaner-list">
                    <li :key="cleaner.id" v-for="cleaner in cleaners">
                        <div class="card">
                            <div class="card-content">
                                <div class="content">
                                    <p class="title is-size-5">{{ cleaner.user.name }}</p>
                                    <p class="subtitle is-size-5 has-text-weight-light has-grey-text">
                                        Assigned to {{ cleaner.houses.length }} house(s).
                                    </p>
                                </div>
                            </div>
                            <footer class="card-footer">
                                <a :href="`/my-cleaners/${cleaner.id}`" class="card-footer-item">Details</a>
                                <a href="#" class="card-footer-item" @click="deleteCleaner">Delete</a>
                            </footer>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CleanerList",
        data () {
            return {
                cleaners: []
            };
        },
        methods: {
            deleteCleaner () {

            }
        },
        created () {
            axios.get('/get-my-cleaners').then(response => {
                this.cleaners = response.data;
            });
        }
    }
</script>

<style scoped>
    .cleaner-list {
        padding: 8px;
    }
    .cleaner-list li {
        margin-bottom: 8px;
    }
</style>
