<template>
    <section class="content">
      <div class="container-fluid py-4">
        <div class="row justify-content-around">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Document Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" @submit.prevent="updateCategory">
                <div class="card-body">
                  <div class="form-group">
                    <label for="categoryId">Edit Category</label>
                    <input type="text" class="form-control" id="categoryId" placeholder="Edit category" 
                    v-model="form.study_field" name="study_field" :class="{ 'is-invalid': form.errors.has('study_field') }">
                    <has-error :form="form" field="study_field"></has-error>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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
    name: "Edit",
    mounted() {
        axios.get(`/document/editcategory/${this.$route.params.documentCategoryId}`)
            .then((response) => {
                this.form.fill(response.data.document_category)
            })
    },
    data() {
        return {
            // Create a new form instance
            form: new Form({
                study_field: ''
            })
        }
    },
    methods: {
        updateCategory() {
            this.form.post(`/document/update-category/${this.$route.params.documentCategoryId}`)
            .then((response) => {
                this.$router.push('/dashboard/document/category-list')
                Toast.fire({
                  type: 'success',
                  title: 'Category updated successfully'
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
