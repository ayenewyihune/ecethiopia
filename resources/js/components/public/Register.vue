<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container py-2">
        <h2 class="display-4" style="color:white; font-size: 25px">Register</h2>
      </div>
    </nav>

    <div class="container py-4">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Register</div>

            <div class="card-body">
              <form method="POST" @submit.prevent="register">
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Full Name</label>
                  <div class="col-md-6">
                    <input
                      id="name"
                      type="name"
                      class="form-control"
                      name="name"
                      required
                      autocomplete="name"
                      v-model="fields.name"
                    />
                    <span v-if="errors && errors.name" class="text-danger">
                      <strong>{{ errors.name[0] }}</strong>
                    </span>
                  </div>
                </div>

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
                    <span v-if="errors && errors.email" class="text-danger">
                      <strong>{{ errors.email[0] }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group row">
                  <label
                    for="study_field"
                    class="col-md-4 col-form-label text-md-right"
                  >BSc Study Field</label>

                  <div class="col-md-6">
                    <select
                      id="study_field"
                      type="study_field"
                      class="form-control"
                      name="study_field"
                      required
                      v-model="fields.study_field"
                    >
                      <option></option>
                      <option
                        :value="category.id"
                        v-for="category in allCategories"
                        v-bind:key="category.id"
                      >{{category.study_field}}</option>
                    </select>
                    <span v-if="errors && errors.study_field" class="text-danger">
                      <strong>{{ errors.study_field[0] }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="cgpa" class="col-md-4 col-form-label text-md-right">BSc CGPA</label>
                  <div class="col-md-6">
                    <input
                      id="cgpa"
                      type="cgpa"
                      class="form-control"
                      name="cgpa"
                      required
                      autocomplete="cgpa"
                      v-model="fields.cgpa"
                    />
                    <span v-if="errors && errors.cgpa" class="text-danger">
                      <strong>{{ errors.cgpa[0] }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group row">
                  <label
                    for="graduation_year"
                    class="col-md-4 col-form-label text-md-right"
                  >Graduation Year</label>
                  <div class="col-md-6">
                    <input
                      id="graduation_year"
                      type="graduation_year"
                      class="form-control"
                      name="graduation_year"
                      required
                      autocomplete="graduation_year"
                      v-model="fields.graduation_year"
                    />
                    <span v-if="errors && errors.graduation_year" class="text-danger">
                      <strong>{{ errors.graduation_year[0] }}</strong>
                    </span>
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
                    <div
                      v-if="errors && errors.password"
                      class="text-danger"
                    >{{ errors.password[0] }}</div>
                  </div>
                </div>

                <div class="form-group row">
                  <label
                    for="password-confirm"
                    class="col-md-4 col-form-label text-md-right"
                  >Confirm Password</label>
                  <div class="col-md-6">
                    <input
                      id="password-confirm"
                      type="password"
                      class="form-control"
                      name="password_confirmation"
                      required
                      autocomplete="new-password"
                      v-model="fields.password_confirmation"
                    />
                  </div>
                </div>

                <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">Register</button>
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
  name: "Register",
  data() {
    return {
      fields: {},
      errors: {},
      success: false,
      loaded: true
    };
  },
  mounted() {
    this.$store.dispatch("actionProfessionalCategoryPublic");
  },
  computed: {
    allCategories() {
      return this.$store.getters.getProfessionalCategoryPublic;
    }
  },
  methods: {
    register() {
      if (this.loaded) {
        this.loaded = false;
        this.success = false;
        this.errors = {};
        axios
          .post("/register", this.fields)
          .then(response => {
            this.fields = {}; //Clear input fields.
            this.loaded = true;
            this.success = true;
            Swal.fire({
              type: "success",
              title: "Congratulations",
              text: "You have joined our community successfully!"
            }).then(function(result) {
              window.location.assign("http://ecethiopia.com/blog");
            });
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
