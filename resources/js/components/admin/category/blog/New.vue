<template>
    <section class="content">
      <div class="container-fluid py-4">
        <div class="row justify-content-around">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Blog Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" @submit.prevent="addCategory">
                <div class="card-body">
                  <div class="form-group">
                    <label for="categoryId">Add New Blog Category</label>
                    <input type="text" class="form-control" id="categoryId" placeholder="Add new category" 
                    v-model="form.cat_name" name="cat_name" :class="{ 'is-invalid': form.errors.has('cat_name') }">
                    <has-error :form="form" field="cat_name"></has-error>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</template>

<script>
export default {
    name: "New",
    data() {
        return {
            // Create a new form instance
            form: new Form({
                cat_name: ''
            })
        }
    },
    methods: {
        addCategory() {
            this.form.post('/blog/add-category')
            .then((response) => {
                this.$router.push('/dashboard/blog/category-list')
                Toast.fire({
                  type: 'success',
                  title: 'Category added successfully'
                })
            })
            .catch(() => {

            })
        }
    }
}
</script>

<style>

</style>
