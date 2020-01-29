<template>
  <span id="professionalSidebar">
    <!-- Desktop version -->
    <div class="d-none d-lg-block">
      <aside class="right-sidebar">
      <div class="py-4">
        <h5 class="widgetheading">Search professional</h5>
          <hr />
          <form>
            <input
              size="27"
              placeholder="Search professionals here"
              @keyup="realSearch"
              v-model="keyword"
              type="text"
            />
          </form>
          <br />
          <br />
        <h5 class="widgetheading">Professionals by category</h5>
        <hr />
        <ul class="cat">
          <li v-for="category in sidecategories" v-bind:key="category.id">
            <router-link :to="`/professional/categories/${category.id}`">{{category.study_field}}</router-link>
            <span>({{category.users.length}})</span>
          </li>
        </ul>
        <br />
        <h5 class="widgetheading">Top professionals</h5>
        <hr />
        <ul class="recent">
          <li v-for="professional in topprofessionals" v-bind:key="professional.id">
            <div class="card-title mb-4">
              <div class="d-flex justify-content-start">
                <div class="userData ml-3">
                  <h6 class="d-block">
                    <router-link to="#">{{professional.name}}</router-link>
                  </h6>
                  <p><span>{{professional.professional_category.study_field}} (CGPA: {{professional.cgpa}})</span></p>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </aside>
    </div>
    
    <!-- Mobile version -->
    <div class="d-none d-lg-block">
      <aside class="right-sidebar">
      <div class="py-4">
        <h5 class="widgetheading">Professionals by category</h5>
        <hr />
        <ul class="cat">
          <li v-for="category in sidecategories" v-bind:key="category.id">
            <router-link :to="`/professional/categories/${category.id}`">{{category.study_field}}</router-link>
            <span>({{category.users.length}})</span>
          </li>
        </ul>
        <br />
        <h5 class="widgetheading">Top professionals</h5>
        <hr />
        <ul class="recent">
          <li v-for="professional in topprofessionals" v-bind:key="professional.id">
            <div class="card-title mb-4">
              <div class="d-flex justify-content-start">
                <div class="userData ml-3">
                  <h6 class="d-block">
                    <router-link to="#">{{professional.name}}</router-link>
                  </h6>
                  <p><span>{{professional.professional_category.study_field}} (CGPA: {{professional.cgpa}})</span></p>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </aside>
    </div>
  </span>
</template>

<script>
import _ from "lodash";
export default {
  name: "ProfessionalSidebar",
  data() {
    return {
      keyword: ""
    };
  },
  computed: {
    sidecategories() {
      return this.$store.getters.getProfessionalCategoryPublic;
    },
    topprofessionals() {
      return this.$store.getters.getProfessionalTopPublic;
    }
  },
  mounted() {
    this.$store.dispatch("actionProfessionalTopPublic");
    this.$store.dispatch("actionProfessionalCategoryPublic");
  },
  methods: {
    realSearch: _.debounce(function() {
      this.$store.dispatch("actionSearchProfessionalPublic", this.keyword);
    }, 500)
  }
};
</script>

<style>
</style>