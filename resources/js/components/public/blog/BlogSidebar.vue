<template>
  <span id="blogSidebar">
    <!-- Desktop version -->
    <div class="d-none d-lg-block">
      <aside class="right-sidebar">
        <div class="py-4">
          <h5 class="widgetheading">Search blog</h5>
          <hr />
          <form>
            <input
              size="27"
              placeholder="Search blogs here"
              @keyup="realSearch"
              v-model="keyword"
              type="text"
            />
          </form>
          <br />
          <br />
          <h5 class="widgetheading">Blogs by category</h5>
          <hr />
          <ul class="cat">
            <li v-for="category in sidecategories" v-bind:key="category.id">
              <router-link :to="`/blog/categories/${category.id}`">{{category.cat_name}}</router-link>
              <span>({{category.blog_posts.length}})</span>
            </li>
          </ul>
          <br />
          <h5 class="widgetheading">Latest blogs</h5>
          <hr />
          <ul class="recent">
            <li v-for="post in blogpost" v-bind:key="post.id">
              <div class="card-title mb-4">
                <div class="d-flex justify-content-start">
                  <div class="image-container">
                    <img
                      :src="`/images/post_images/blog/${post.photo}`"
                      alt
                      class="img-thumbnail"
                      style="min-width: 80px; max-width: 80px; height: 80px"
                    />
                  </div>
                  <div class="userData ml-3">
                    <h6 class="d-block">
                      <router-link :to="`/blog/${post.id}`">{{post.title}}</router-link>
                    </h6>
                    <p v-html="shortenDesc(post.description)"></p>
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
          <h5 class="widgetheading">Blogs by category</h5>
          <hr />
          <ul class="cat">
            <li v-for="category in sidecategories" v-bind:key="category.id">
              <router-link :to="`/blog/categories/${category.id}`">{{category.cat_name}}</router-link>
              <span>({{category.blog_posts.length}})</span>
            </li>
          </ul>
          <br />
          <h5 class="widgetheading">Latest blogs</h5>
          <hr />
          <ul class="recent">
            <li v-for="post in blogpost" v-bind:key="post.id">
              <div class="card-title mb-4">
                <div class="d-flex justify-content-start">
                  <div class="image-container">
                    <img
                      :src="`/images/post_images/blog/${post.photo}`"
                      alt
                      class="img-thumbnail"
                      style="min-width: 80px; max-width: 80px; height: 80px"
                    />
                  </div>
                  <div class="userData ml-3">
                    <h6 class="d-block">
                      <router-link :to="`/blog/${post.id}`">{{post.title}}</router-link>
                    </h6>
                    <p v-html="shortenDesc(post.description)"></p>
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
  name: "BlogSidebar",
  data() {
    return {
      keyword: ""
    };
  },
  computed: {
    sidecategories() {
      return this.$store.getters.getBlogCategoryPublic;
    },
    blogpost() {
      return this.$store.getters.getBlogLatestPostPublic;
    }
  },
  mounted() {
    this.$store.dispatch("actionBlogLatestPostPublic");
    this.$store.dispatch("actionBlogCategoryPublic");
  },
  methods: {
    realSearch: _.debounce(function() {
      this.$store.dispatch("actionSearchBlogPostPublic", this.keyword);
    }, 500),
    shortenDesc(postDesc) {
      if (postDesc.length > 50) {
        return postDesc.substring(0, 50) + "...";
      } else {
        return postDesc;
      }
    }
  }
};
</script>

<style>
</style>
