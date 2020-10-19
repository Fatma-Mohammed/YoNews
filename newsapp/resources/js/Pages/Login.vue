<template>
    <div class="container">
        <div class="row mt-4">
            <div class="col-6 offset-3">
                <form
                    action="#"
                    @submit="checkForm"
                    @submit.prevent="handleLogin"
                    
                >
                  <p v-if="errors.length">
                        <b>Please correct the following error(s):</b>
                        <ul>
                        <li v-for="error in errors">{{ error }}</li>
                        </ul>
                    </p>
                    <div class="form-row">
                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            v-model="formData.email"
                            placeholder="Email Address"
                        />
                    </div>
                    <div class="form-row">
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            v-model="formData.password"
                            placeholder="Password"
                        />
                    </div>
                    <div class="form-row">
                        <button type="submit" class="btn btn-primary mt-4">
                            Sign In
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            errors: [],
            favorites: [],
            formData: {
                email: "",
                password: ""
            },
            user: ""
        };
    },
    methods: {
        handleLogin() {
            axios.get("/sanctum/csrf-cookie").then(response => {
                axios.post("api/v1/login", this.formData).then(response => {
                    // console.log(response);
                    if(response.code  == 201){
                        this.user =response.data.user;
                        this.getFavorites();
                    }else if(response.code ==401){
                        this.errors.push("Invalid credentials");
                    }
                    
                });
            }).catch((error)=>{
                console.log(error.response.data.errors);
            })
        },
        getFavorites() {
            axios.get("api/v1/fav-articles").then(response => {
                console.log(response);
            });
        },
        checkForm: function(e) {
            if (this.email && this.password) {
                return true;
            }

            this.errors = [];

            if (!this.email) {
                this.errors.push("Email is required.");
            }
            if (!this.password) {
                this.errors.push("Password is required.");
            }

            e.preventDefault();
        }
    }
};
</script>
