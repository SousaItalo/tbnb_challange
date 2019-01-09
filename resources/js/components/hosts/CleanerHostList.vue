<template>
    <div>
        <h1 class="title is-size-4 has-text-centered has-text-white has-text-weight-light">
            My Customers
        </h1>

        <div class="columns is-mobile">
            <div class="column">
                <ul class="host-list">
                    <li :key="host.id" v-for="host in hosts">
                        <div class="card">
                            <div class="card-content">
                                <div class="content">
                                    <p class="title is-size-5">{{ host.user.name }}</p>
                                    <p class="subtitle is-size-5 has-grey-text has-text-weight-light" v-if="host.houses.length > 0">
                                        Assigned to {{ host.houses.length }} of their house(s).
                                    </p>
                                    <p class="subtitle is-size-5 has-grey-text has-text-weight-light" v-else>
                                        You are not assigned to any of this host's houses yet.
                                    </p>
                                </div>
                            </div>
                            <footer class="card-footer">
                                <a :href="`/my-customers/${host.id}`" class="card-footer-item">Details</a>
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
        name: "CleanerHostList",
        props: ['hosts']
    }
</script>

<style scoped>
    .host-list {
        padding: 8px;
    }
    .host-list li {
        margin-bottom: 8px;
    }
</style>
