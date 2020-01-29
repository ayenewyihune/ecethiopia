<template>
  <span id="singleblog">
    <!-- Desktop version -->
    <div class="d-none d-lg-block">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container py-2">
          <h2 class="display-4" style="color:white; font-size: 25px">Blog</h2>
        </div>
      </nav>
      <section id="content">
        <div class="container py-4">
          <div class="row">
            <div class="col-lg-8">
              <h3 class="display-4 py-2" style="font-size:40px">{{singlepost.title}}</h3>
              <img
                :src="`/images/post_images/blog/${singlepost.photo}`"
                alt
                style="width:100%;max-height:400px;"
              />
              <div class="editor" v-html="singlepost.description"></div>
              <div class="bottom-article">
                <ul class="meta-post">
                  <li v-if="singlepost.user">
                    <i class="icon-user"></i>
                    {{singlepost.user.name}}
                  </li>
                  <li v-if="singlepost.blog_category">
                    <i class="icon-folder-open"></i>
                    {{singlepost.blog_category.cat_name | sortlength(20,"")}}
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4">
              <BlogSidebar />
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- Mobile version -->
    <div class="d-lg-none">
      <section id="content">
        <div class="container py-4">
          <div class="row">
            <div class="col-lg-8">
              <h3>{{singlepost.title}}</h3>
              <img
                :src="`/images/post_images/blog/${singlepost.photo}`"
                alt
                style="width:100%;"
              />
              <div class="editor" v-html="singlepost.description"></div>
              <div class="bottom-article">
                <ul class="meta-post">
                  <li v-if="singlepost.user">
                    <i class="icon-user"></i>
                    {{singlepost.user.name}}
                  </li>
                  <li v-if="singlepost.blog_category">
                    <i class="icon-folder-open"></i>
                    {{singlepost.blog_category.cat_name | sortlength(20,"")}}
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4">
              <BlogSidebar />
            </div>
          </div>
        </div>
      </section>
    </div>
  </span>
</template>

<script>
import BlogSidebar from "./BlogSidebar";
export default {
  name: "SingleBlog",
  components: {
    BlogSidebar
  },
  computed: {
    singlepost() {
      return this.$store.getters.getSingleBlogPostPublic;
    }
  },
  methods: {
    singlePost() {
      return this.$store.dispatch(
        "actionSingleBlogPostPublic",
        this.$route.params.id
      );
    }
  },
  mounted() {
    this.singlePost();
  },
  watch: {
    $route(to, from) {
      this.singlePost();
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
