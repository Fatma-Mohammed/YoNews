<template>
    <div class="container">
        <div class="row mt-4">
            <div class="col-6 offset-3">
                <!-- <input type="text" :email="this.email" @click> -->
                <form

                    action="#"
                    @submit="checkForm"
                    @submit.prevent="handleRegister"
                    
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
                            type="text"
                            name="name"
                            class="form-control"
                            v-model="formData.name"
                            placeholder="Name"
                        />
                    </div>

                    <div class="form-row">
                        <input
                            type="date"
                            name="birth"
                            class="form-control"
                            v-model="formData.birth"
                            placeholder="Name"
                        />
                    </div>



                    <div class="form-row">
                        <button type="submit" class="btn btn-primary mt-4">
                            Register
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
                name: "",
                birth: "",
            },
            
        };
    },
    methods: {
        handleRegister() {
            axios.post("/api/v1/register",this.formData).then(response => {
                console.log(response);
            })
        },
        checkForm: function(e) {
            if (this.email && this.name && this.birth) {
                return true;
            }
            this.errors = [];

            if (!this.email) {
                this.errors.push("Email is required.");
            }
            if (!this.name) {
                this.errors.push("Name is required.");
            }
            e.preventDefault();
        }
    }
};
</script>
