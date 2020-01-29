<template>
  <div class="container py-4">
    <section class="content">
      <div class="row justify-content-around">
        <div class="col-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Document Category List</h3>

              <div class="card-tools">
                <button class="btn btn-primary">
                  <router-link
                    to="/dashboard/document/add-category"
                    style="color: #fff; text-decoration: none;"
                  >Add Category</router-link>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>
                      <select name id @change="deleteSelected" v-model="select">
                        <option value>Select</option>
                        <option value>Delete all</option>
                      </select>
                      <br>
                      <input type="checkbox" @click="selectAll" v-model="select_all">
                      <span v-if="this.select_all == false">Check all</span>
                      <span v-else>Uncheck all</span>
                    </th>
                    <th>SL</th>
                    <th>Category Name</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(category, index) in allCategories" v-bind:key="category.id">
                    <td>
                      <input type="checkbox" v-model="categoryItem" :value="category.id">
                    </td>
                    <td>{{index+1}}</td>
                    <td>{{category.study_field}}</td>
                    <td>{{category.created_at | timeformat}}</td>
                    <td>
                      <router-link :to="`/dashboard/document/edit-category/${category.id}`">Edit</router-link>
                      <a href @click.prevent="deleteCategory(category.id)">Delete</a>
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
  data() {
    return {
      categoryItem: [],
      select: "",
      select_all: false
    };
  },
  mounted() {
    this.$store.dispatch("actionDocumentCategoryAdmin");
  },
  computed: {
    allCategories() {
      return this.$store.getters.getDocumentCategoryAdmin;
    }
  },
  methods: {
    deleteCategory(id) {
      axios
        .get("/document/category/" + id)
        .then(() => {
          this.$store.dispatch("actionDocumentCategoryAdmin");
          Toast.fire({
            type: "success",
            title: "Category deleted successfully"
          });
        })
        .catch(() => {});
    },
    deleteSelected() {
      axios.get("/document/delete-categories/" + this.categoryItem).then(() => {
        this.categoryItem = [];
        this.$store.dispatch("actiondocumentCategoryAdmin");
        Toast.fire({
          type: "success",
          title: "Selected categories deleted successfully"
        });
      });
    },
    selectAll() {
      if (this.select_all == false) {
        this.select_all = true;
        for (var category in this.allCategories) {
          this.categoryItem.push(this.allCategories[category].id);
        }
      } else {
        this.select_all = false
        this.categoryItem = []
      }
    }
  }
};
</script>

<style>
</style>
