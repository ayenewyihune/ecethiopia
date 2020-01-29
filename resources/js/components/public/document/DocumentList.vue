<template>
  <span id="professionalpost">
    <!-- Desktop version -->
    <div class="d-none d-lg-block">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container py-2">
          <h2 class="display-4" style="color:white; font-size: 25px">Professional</h2>
        </div>
      </nav>
      <div class="container py-4">
        <div class="row">
          <div class="col-lg-9">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">List of Professionals</h5>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-hover table-responsive">
                  <thead>
                    <tr style="font-size:14px">
                      <th>SL</th>
                      <th>Name</th>
                      <th>Email Address</th>
                      <th>BSc Study Field</th>
                      <th>BSc CGPA</th>
                      <th>Graduation Year</th>
                      <th>See Detail</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="(professional, index) in allProfessionals"
                      v-bind:key="professional.id"
                    >
                      <td>{{index+1}}</td>
                      <td>{{professional.name}}</td>
                      <td>{{professional.email}}</td>
                      <td>{{professional.professional_category.study_field}}</td>
                      <td>{{professional.cgpa}}</td>
                      <td>{{professional.graduation_year}}</td>
                      <td>
                        <router-link to="#">Detail</router-link>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <ProfessionalSidebar />
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile version -->
    <div class="d-lg-none">
      <form class="p-2">
        <input
          style="width:100%"
          class="p-1 text-center"
          placeholder="Search professionals here"
          @keyup="realSearch"
          v-model="keyword"
          type="text"
        />
      </form>
      <div class="container py-4">
        <div class="row">
          <div class="col-lg-9">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">List of Professionals</h5>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-hover table-responsive">
                  <thead>
                    <tr style="font-size:14px">
                      <th>SL</th>
                      <th>Name</th>
                      <th>Email Address</th>
                      <th>BSc Study Field</th>
                      <th>BSc CGPA</th>
                      <th>Graduation Year</th>
                      <th>See Detail</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="(professional, index) in allProfessionals"
                      v-bind:key="professional.id"
                    >
                      <td>{{index+1}}</td>
                      <td>{{professional.name}}</td>
                      <td>{{professional.email}}</td>
                      <td>{{professional.professional_category.study_field}}</td>
                      <td>{{professional.cgpa}}</td>
                      <td>{{professional.graduation_year}}</td>
                      <td>
                        <router-link to="#">Detail</router-link>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <ProfessionalSidebar />
          </div>
        </div>
      </div>
    </div>
  </span>
</template>

<script>
import ProfessionalSidebar from "./ProfessionalSidebar";
export default {
  name: "ProfessionalPost",
  data() {
    return {
      keyword: ""
    };
  },
  components: {
    ProfessionalSidebar
  },
  mounted() {
    return this.$store.dispatch("actionProfessionalPublic");
  },
  computed: {
    allProfessionals() {
      return this.$store.getters.getProfessionalPublic;
    }
  },
  methods: {
    getCategoryPosts() {
      if (this.$route.params.id != null) {
        this.$store.dispatch(
          "actionProfessionalCategoryPublic",
          this.$route.params.id
        );
      } else {
        return this.$store.dispatch("actionProfessionalPublic");
      }
    },
    shortenDesc(postDesc) {
      if (postDesc.length > 200) {
        return postDesc.substring(0, 200) + "...";
      } else {
        return postDesc;
      }
    },
    realSearch: _.debounce(function() {
      this.$store.dispatch("actionSearchProfessionalPublic", this.keyword);
    }, 500)
  },
  watch: {
    $route(to, from) {
      this.getCategoryPosts();
    }
  }
};
</script>

<style>
div.editor p {
  font-size: 16px;
  color: black;
}
</style>
