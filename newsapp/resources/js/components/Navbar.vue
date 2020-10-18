<template>
<div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <div class="nav-item">
                <a id="navbar-brand" href="#"><i class="fab fa-hacker-news"></i>oNews</a>
                </div>
                <div>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div
                    class="navbar-collapse justify-content-center collapse"
                    id="navbarSupportedContent"
                >
                    <ul
                    class="navbar-nav d-lg-flex justify-content-between align-items-center"
                    >
                    <li>
                        <button class="navbar-close">
                        <i class="mdi mdi-close"></i>
                        </button>
                    </li>
                    <li class="nav-item active">
                        <router-link to="/sports" class="nav-link">Sport</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/business" class="nav-link">Business</router-link>
                    </li>
                    </ul>
                   
                </div>
                </div>
                <ul class="social-media">
                <li>
                    <button @click="$emit('chCountry','eg')">
                    <img src='/imgs/egypt-icon.png' />
                    </button>
                </li>
                <li>
                    <button @click="$emit('chCountry','ae')">
                    <img src='/imgs/united-arab-emirates-icon.png' />

                    </button>
                </li>
                <li>
                    <a href="#">
                    <i class="mdi mdi-twitter"></i>
                    </a>
                </li>
                </ul>
                 <ul class="navbar-top-right-menu">
                    <li class="nav-item">
                      <a href="#" class="nav-link"><i class="mdi mdi-magnify"></i></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Sign in</a>
                    </li>
                  </ul>
            </div>
            
            </div>
        </nav>
    </div>
</template>