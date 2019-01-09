<template>
    <div class="section">
        <div class="hero is-fullheight">
            <div class="hero-body">
                <div class="container">
                    <div class="columns is-centered is-vcentered">
                        <div>
                            <div class="tile is-vertical">
                                <p class="title is-4 has-text-centered">TurnoverBnB Login</p>

                                <form name="login-form" method="POST" action="/login">
                                    <input type="hidden" name="_token" :value="csrf">

                                    <div class="field">
                                        <label for="email" class="label">E-mail</label>
                                        <input id="email" name="email" type="email" class="input" />
                                    </div>

                                    <div class="field">
                                        <label for="password" class="label">Password</label>
                                        <input id="password" name="password" type="password" class="input" />
                                    </div>

                                    <div class="is-flex">
                                        <button class="button is-primary is-fullwidth">Login</button>
                                        <a href="#" class="button is-text has-text-centered">Doesn't have an account? Sign up here!</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Login",
        props: ['csrf']
    }
</script>

<style lang="scss" scoped>
    @import '../../sass/bulma-custom';

    .is-flex {
        flex-direction: column;
        justify-content: center;
    }

    .is-flex > a {
        margin-top: $size-7;
    }
</style>
