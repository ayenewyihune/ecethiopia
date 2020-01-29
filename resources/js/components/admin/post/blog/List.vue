<template>
  <div class="container py-4">
    <section class="content">
      <div class="row justify-content-around">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Blog Post List</h3>

              <div class="card-tools">
                <button class="btn btn-primary">
                  <router-link to="/dashboard/blog/add-post" style="color: #fff; text-decoration: none;">Add Post</router-link>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>User</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(post, index) in allPosts" v-bind:key="post.id">
                    <td>{{index+1}}</td>
                    <td v-if="post.user">{{post.user.name}}</td>
                    <td v-if="post.blog_category">{{post.blog_category.cat_name}}</td>
                    <td>{{post.title | sortlength(100,"...")}}</td>
                    <td>{{post.description | sortlength(100,"...")}}</td>
                    <td>
                      <img :src="ourImage(post.photo)" alt="Post photo" width="40" height="50" />
                    </td>
                    <td>
                      <router-link :to="`/dashboard/blog/edit-post/${post.id}`">Edit</router-link>
                      <a href @click.prevent="deletePost(post.id)">Delete</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  </div>
</template>

<script>
export default {
  name: "List",
  mounted() {
    this.$store.dispatch("actionBlogPostAdmin");
  },
  computed: {
    allPosts() {
      return this.$store.getters.getBlogPostAdmin;
    }
  },
  methods: {
    ourImage(img) {
      return "/images/post_images/blog/" + img;
    },
    deletePost(id) {
      axios
        .get("/blog/post/" + id)
        .then(() => {
          this.$store.dispatch("actionBlogPostAdmin");
          Toast.fire({
            type: "success",
            title: "Post deleted successfully"
          });
        })
        .catch(() => {});
    }
  }
};
</script>

<style>
</style>
