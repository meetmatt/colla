<template>
    <section class="section">
        <div class="container">
            <nav class="navbar" role="navigation" aria-label="main navigation">
                <div class="navbar-menu is-active buttons">
                    <router-link to="/" tag="button" class="button is-link">
                        Home
                    </router-link>
                    <router-link to="/status/ping" tag="button" class="button is-link">
                        Ping
                    </router-link>
                    <router-link to="/status/health" tag="button" class="button is-link">
                        Health
                    </router-link>
                </div>
            </nav>
            <router-view></router-view>
        </div>
    </section>
</template>
