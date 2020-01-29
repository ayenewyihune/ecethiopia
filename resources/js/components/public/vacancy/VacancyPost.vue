<template>
  <span id="vacancypost">
    <!-- Desktop version -->
    <div class="d-none d-lg-block">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container py-2">
          <h2 class="display-4" style="color:white; font-size: 25px">Vacancy</h2>
        </div>
      </nav>
      <div class="container py-4">
        <div class="row">
          <div class="col-lg-8">
            <div v-for="post in vacancypost" v-bind:key="post.id">
              <h3 class="display-4" style="font-size:40px;">
                <router-link :to="`/vacancy/${post.id}`" style="text-decoration:none">{{post.title}}</router-link>
              </h3>
              <img
                :src="`/images/post_images/vacancy/${post.photo}`"
                alt
                style="width:100%; max-height:400px"
              />
              <div class="editor" v-html="shortenDesc(post.description)"></div>
              <div class="bottom-article">
                <ul class="meta-post">
                  <li>
                    <i class="icon-calendar"></i>
                    {{post.created_at | timeformat}}
                  </li>
                  <li v-if="post.user" class="d-none d-md-block">
                    <i class="icon-user"></i>
                    {{post.user.name | sortlength(20,"")}}
                  </li>
                  <li v-if="post.vacancy_category" class="d-none d-xl-block">
                    <i class="icon-folder-open"></i>
                    {{post.vacancy_category.cat_name | sortlength(20,"")}}
                  </li>
                  <li class="d-none d-lg-block">
                    <i class="icon-comments"></i>
                    0 Comments
                  </li>
                </ul>
                <router-link :to="`/vacancy/${post.id}`" class="pull-right">
                  Continue reading
                  <i class="icon-angle-right"></i>
                </router-link>
              </div>
              <br />
              <br />
              <br />
            </div>
          </div>
          <div class="col-lg-4">
            <VacancySidebar />
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile version -->
    <div class="d-lg-none">
      <form class="p-2">
        <input style="width:100%" class="p-1 text-center" placeholder="Search vacancies here" @keyup="realSearch" v-model="keyword" type="text" />
      </form>
      <div class="container py-4">
        <div class="row">
          <div class="col-lg-8">
            <div v-for="post in vacancypost" v-bind:key="post.id">
              <h3>
                <router-link :to="`/vacancy/${post.id}`" style="text-decoration:none">{{post.title}}</router-link>
              </h3>
              <img :src="`/images/post_images/vacancy/${post.photo}`" alt style="width:100%;" />
              <div class="editor" v-html="shortenDesc(post.description)"></div>
              <div class="bottom-article">
                <ul class="meta-post">
                  <li>
                    <i class="icon-calendar"></i>
                    {{post.created_at | timeformat}}
                  </li>
                  <li v-if="post.user" class="d-none d-md-block">
                    <i class="icon-user"></i>
                    {{post.user.name | sortlength(20,"")}}
                  </li>
                  <li v-if="post.vacancy_category" class="d-none d-xl-block">
                    <i class="icon-folder-open"></i>
                    {{post.vacancy_category.cat_name | sortlength(20,"")}}
                  </li>
                  <li class="d-none d-lg-block">
                    <i class="icon-comments"></i>
                    0 Comments
                  </li>
                </ul>
                <router-link :to="`/vacancy/${post.id}`" class="pull-right">
                  Continue reading
                  <i class="icon-angle-right"></i>
                </router-link>
              </div>
              <br />
              <br />
              <br />
            </div>
          </div>
          <div class="col-lg-4">
            <VacancySidebar />
          </div>
        </div>
      </div>
    </div>
  </span>
</template>

<script>
import VacancySidebar from "./VacancySidebar";
export default {
  name: "VacancyPost",
  data() {
    return {
      keyword: ""
    };
  },
  components: {
    VacancySidebar
  },
  mounted() {
    return this.$store.dispatch("actionVacancyPostPublic");
  },
  computed: {
    vacancypost() {
      return this.$store.getters.getVacancyPostPublic;
    }
  },
  methods: {
    getCategoryPosts() {
      if (this.$route.params.id != null) {
        this.$store.dispatch(
          "actionVacancyCategoryPostPublic",
          this.$route.params.id
        );
      } else {
        return this.$store.dispatch("actionVacancyPostPublic");
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
      this.$store.dispatch("actionSearchVacancyPostPublic", this.keyword);
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