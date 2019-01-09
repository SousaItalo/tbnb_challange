<template>
    <div>
        <a href="/my-cleaners" class="has-text-right">
            Back to My Cleaners
        </a>

        <h1 class="title is-size-4 has-text-centered has-text-white has-text-weight-light">
            {{ cleaner.user.name }}
        </h1>

        <div class="tile is-vertical">
            <p class="title has-text-weight-bold is-size-5">Cleaner No. #{{ cleaner.id }}</p>

            <p class="has-text-grey has-text-weight-bold is-size-6">Contact Number</p>
            <p class="title is-size-4 has-text-weight-light">{{ cleaner.user.contact_number }}</p>

            <p class="has-text-grey has-text-weight-bold is-size-6">Assigned To</p>

            <ul>
                <li v-for="house in cleaner.houses"
                    class="is-size-4 has-text-weight-light">- {{ house.name }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: "HostCleanerDetails",
        props: ['cleaner']
    }
</script>

<style scoped>

</style>
