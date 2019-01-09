<template>
    <div>
        <a href="/my-houses" class="has-text-right">
            Back to My Houses
        </a>

        <h1 class="title is-size-4 has-text-centered has-text-white has-text-weight-light">
            {{ house.name }}
        </h1>

        <div class="tile is-vertical">
            <p class="title has-text-weight-bold is-size-5">House No. #{{ house.id }}</p>

            <p class="has-text-grey has-text-weight-bold is-size-6">Address</p>
            <p class="title is-size-4 has-text-weight-light">{{ house.address }}</p>

            <p class="has-text-grey has-text-weight-bold is-size-6">Cleaners</p>

            <ul>
                <li v-for="cleaner in house.cleaners"
                    class="is-size-4 has-text-weight-light">- {{ cleaner.user.name }}</li>
            </ul>

            <p class="has-text-grey has-text-weight-bold is-size-6">Next Cleaning</p>

            <p class="title is-size-4 has-text-weight-light" v-if="!house.next_cleaning">There are no cleanings scheduled for this house.</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "HostHouseDetails",
        props: ['house'],
        data () {
            return {

            };
        }
    }
</script>

<style scoped lang="scss">
    @import "./../../../sass/bulma-custom";

    .tile {
        background-color: white;
    }

    p.label {
        color: $primary;
    }

    li {
        margin-bottom: 4px;
    }

    li:last-child {
        margin-bottom: 1.5rem;
    }
</style>
