<template>
  <div class="container py-4">
    <section class="content">
      <div class="row justify-content-around">
        <div class="col-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Vacancy Category List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Category Name</th>
                    <th>Date Created</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(category, index) in allCategories" v-bind:key="category.id">
                    <td>{{index+1}}</td>
                    <td>{{category.cat_name}}</td>
                    <td>{{category.created_at | timeformat}}</td>
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
    this.$store.dispatch("actionVacancyCategoryAdmin");
  },
  computed: {
    allCategories() {
      return this.$store.getters.getVacancyCategoryAdmin;
    }
  },
  methods: {
    deleteCategory(id) {
      axios
        .get("/vacancy/category/" + id)
        .then(() => {
          this.$store.dispatch("actionVacancyCategoryAdmin");
          Toast.fire({
            type: "success",
            title: "Category deleted successfully"
          });
        })
        .catch(() => {});
    },
    deleteSelected() {
      axios.get("/vacancy/delete-categories/" + this.categoryItem).then(() => {
        this.categoryItem = [];
        this.$store.dispatch("actionVacancyCategoryAdmin");
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