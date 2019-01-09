<template>
    <div>
        <a href="/my-customers" class="has-text-right">
            Back to My Customers
        </a>

        <h1 class="title is-size-4 has-text-centered has-text-white has-text-weight-light">
            {{ host.user.name }}
        </h1>

        <div class="tile is-vertical">
            <p class="title has-text-weight-bold is-size-5">Host No. #{{ host.id }}</p>

            <p class="has-text-grey has-text-weight-bold is-size-6">Contact Number</p>
            <p class="title is-size-4 has-text-weight-light">{{ host.user.contact_number }}</p>

            <p class="has-text-grey has-text-weight-bold is-size-6">You are assigned to</p>

            <ul v-if="host.houses.length > 0">
                <li v-for="house in host.houses"
                    class="is-size-4 has-text-weight-light">- {{ house.name }}</li>
            </ul>
            <p class="title is-size-4 has-text-weight-light" v-else>You are not assigned to any of this host's houses yet.</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CleanerHostDetails",
        props: ['host']
    }
</script>

<style scoped>

</style>
