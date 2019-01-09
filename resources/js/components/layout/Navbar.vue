<template>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="#">
                <img src="/images/app-icon.png">
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbar-menu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbar-menu" class="navbar-menu">
            <div class="navbar-start">
                <a href="/my-houses" class="navbar-item" v-if="role === 'host'">
                    My Houses
                </a>

                <a href="/my-cleaners" class="navbar-item" v-if="role === 'host'">
                    My Cleaners
                </a>
                <a href="/my-customers" class="navbar-item" v-if="role === 'cleaner'">
                    My Customers
                </a>

                <a href="/cleaning-projects" class="navbar-item">
                    My Cleanings
                </a>
            </div>
            <div class="navbar-end">
                <p class="navbar-item">Logged in as {{ user.name }}</p>
                <form id="logout-form" action="logout" method="POST" class="navbar-item">
                    <input type="hidden" name="_token" :value="csrf">
                    <button class="button" type="submit" form="logout-form">Logout</button>
                </form>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "Navbar",
        props: ['user', 'csrf', 'role'],
        mounted () {
            document.querySelectorAll('.navbar-burger').forEach(navbarBurguer => {
                navbarBurguer.addEventListener('click', () => {
                    const target = navbarBurguer.dataset.target;
                    const $target = document.getElementById(target);

                    navbarBurguer.classList.toggle('is-active');
                    $target.classList.toggle('is-active');
                })
            });
        }
    }
</script>

<style scoped>
    .navbar {
        background-color: white;
    }
</style>
