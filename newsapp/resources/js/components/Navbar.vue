<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="nav-item">
                        <router-link to="/" id="navbar-brand"
                            >YoNews<i class="fas fa-rss"></i
                        ></router-link>
                    </div>

                    <ul class="navbar-top-right-menu">
                        <ul class="social-media">
                            <li>
                                <img
                                    src="/imgs/egypt-icon.png"
                                    @click="$emit('chCountry', 'eg')"
                                />
                            </li>
                            <li>
                                <img
                                    src="/imgs/united-arab-emirates-icon.png"
                                    @click="$emit('chCountry', 'ae')"
                                />
                            </li>
                            <li>
                                <a href="#">
                                    <i class="mdi mdi-twitter"></i>
                                </a>
                            </li>
                        </ul>
                        <li class="nav-item" v-if="this.user != undefined">
                            <router-link to="/login" class="nav-link">
                                {{this.user.name}}
                            </router-link>
                        </li>

                        <li class="nav-item" v-if="this.user != undefined">
                            <router-link to="/Favorites" class="nav-link" :user="this.user">
                                Favorites
                            </router-link>
                        </li>
 
                        <li class="nav-item" v-if="this.user == undefined">
                            <router-link to="/login" class="nav-link">
                                Login
                            </router-link>
                        </li>
                        <li class="nav-item" v-if="this.user == undefined">
                            <router-link to="/register" class="nav-link">
                                Sign Up
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    props: [
        "user"
    ]
}
</script>
