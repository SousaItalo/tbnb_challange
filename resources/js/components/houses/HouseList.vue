<template>
    <div>
        <h1 class="title has-text-white has-text-weight-light has-text-centered">My Houses</h1>

        <div class="columns is-mobile">
            <div class="column">
                <ul class="house-list">
                    <li :key="house.id" v-for="house in houses">
                        <div class="card">
                            <div class="card-content">
                                <div class="content">
                                    <p class="title is-size-5">{{ house.name }}</p>
                                    <p class="subtitle is-size-6 has-text-grey">{{ house.address }}</p>
                                </div>
                            </div>
                            <footer class="card-footer">
                                <a :href="`/my-houses/${house.id}`" class="card-footer-item">Details</a>
                                <a :href="`/my-houses/${house.id}`" class="card-footer-item">Edit</a>
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
        name: "HouseList",
        data () {
            return {
                houses: []
            }
        },
        created () {
            axios.get('/get-my-houses').then(response => {
                this.houses = response.data;
            });
        }
    }
</script>

<style scoped>
    .house-list {
        padding: 8px;
    }
    .house-list li {
        margin-bottom: 8px;
    }
</style>
