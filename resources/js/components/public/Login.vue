<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container py-2">
        <h2 class="display-4" style="color:white; font-size: 25px">Login</h2>
        <h2 class="display-4 ml-auto" style="color:white; font-size: 15px">Register</h2>
      </div>
    </nav>

    <div class="container py-4">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Login</div>

            <div class="card-body">
              <form method="POST" @submit.prevent="login">
                <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                  <div class="col-md-6">
                    <input
                      id="email"
                      type="email"
                      class="form-control"
                      name="email"
                      required
                      autocomplete="email"
                      v-model="fields.email"
                    />
                    <span v-if="errors && errors.email" class="text-danger"><strong>{{ errors.email[0] }}</strong></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                  <div class="col-md-6">
                    <input
                      id="password"
                      type="password"
                      class="form-control"
                      name="password"
                      required
                      autocomplete="current-password"
                      v-model="fields.password"
                    />
                    <div v-if="errors && errors.password" class="text-danger">{{ errors.password[0] }}</div>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" />
                      <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                  </div>
                </div>

                <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">Login</button>
                  </div>
                </div>
              </form>
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
  data() {
    return {
      fields: {},
      errors: {},
      success: false,
      loaded: true
    };
  },
  methods: {
    login() {
      if (this.loaded) {
        this.loaded = false;
        this.success = false;
        this.errors = {};
        axios
          .post("/login", this.fields)
          .then(response => {
            this.fields = {}; //Clear input fields.
            this.loaded = true;
            this.success = true;
            if (response.status === 200) {
              location.assign('http://ecethiopia.com/dashboard');
            }
          })
          .catch(error => {
            this.loaded = true;
            if (error.response.status === 422) {
              this.errors = error.response.data.errors || {};
            }
          });
      }
    }
  }
};
</script>

<style>
</style>
