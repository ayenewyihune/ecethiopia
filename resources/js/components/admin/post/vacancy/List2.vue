<template>
  <div class="container py-4">
    <section class="content">
      <div class="row justify-content-around">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Vacancy Post List</h3>

              <div class="card-tools">
                <button class="btn btn-primary">
                  <router-link to="/dashboard/vacancy/add-post2" style="color: #fff; text-decoration: none;">Add Post</router-link>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>SL</th>
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
                    <td v-if="post.vacancy_category">{{post.vacancy_category.cat_name}}</td>
                    <td>{{post.title | sortlength(100,"...")}}</td>
                    <td>{{post.description | sortlength(100,"...")}}</td>
                    <td>
                      <img :src="ourImage(post.photo)" alt="Post photo" width="40" height="50" />
                    </td>
                    <td>
                      <router-link :to="`/dashboard/vacancy/edit-post2/${post.id}`">Edit</router-link>
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
  name: "List2",
  mounted() {
    this.$store.dispatch("actionVacancyPostAdmin");
  },
  computed: {
    allPosts() {
      return this.$store.getters.getVacancyPostAdmin;
    }
  },
  methods: {
    ourImage(img) {
      return "/images/post_images/vacancy/" + img;
    },
    deletePost(id) {
      axios
        .get("/vacancy/post/" + id)
        .then(() => {
          this.$store.dispatch("actionVacancyPostAdmin");
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