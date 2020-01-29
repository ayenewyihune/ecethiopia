<template>
    <section class="content">
      <link rel="stylesheet" href="//l.allcdn.org/fa/v5.3.1/css/all.min.css">
      <div class="container-fluid py-4">
        <div class="row justify-content-around">
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Vacancy Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" @submit.prevent="updatePost" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="titleId">Title</label>
                    <input type="text" class="form-control" id="titleId" placeholder="Title" 
                    v-model="form.title" name="title" :class="{ 'is-invalid': form.errors.has('title') }">
                    <has-error :form="form" field="title"></has-error>
                  </div>

                  <div class="form-group">
                    <label for="descriptionId">Description</label>
                    <ckeditor :editor="editor" v-model="form.description" :config="editorConfig"></ckeditor>
                    <has-error :form="form" field="description"></has-error>
                  </div>

                  <div class="form-group">
                    <label>Select Category</label>
                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('cat_id') }" v-model="form.cat_id">
                      <option value="" disabled>Select category</option>
                      <option :value="category.id" v-for="category in allCategories" v-bind:key="category.id">{{category.cat_name}}</option>
                    </select>
                    <has-error :form="form" field="cat_id"></has-error>
                  </div>

                  <div class="form-group">
                    <input @change="changePhoto($event)" type="file" name="photo" :class="{ 'is-invalid': form.errors.has('photo') }">
                    <img :src="updateImage()" alt="" width="80" height="80">
                    <has-error :form="form" field="photo"></has-error>
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
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
export default {
    name: "Edit",
    data() {
        return {
          editor: ClassicEditor,
      editorConfig: {},
          // Create a new form instance
          form: new Form({
              title: '',
              description: '',
              cat_id: '',
              photo: ''
          })
        }
    },
    mounted() {
      this.$store.dispatch("actionVacancyCategoryAdmin")
    },
    created() {
      axios.get(`/vacancy/editpost/${this.$route.params.vacancyPostId}`)
        .then((response)=>{
          this.form.fill(response.data.vacancy_post)
        })
    },
    computed: {
      allCategories() {
         return this.$store.getters.getVacancyCategoryAdmin
      }
    },
    methods: {
      changePhoto(event) {
        let file = event.target.files[0];
        
        if (file.size > 1048576) {
          Swal({
            type: 'error',
            title: 'Oops...',
            text: 'Something went wrong!'
          })
        } else {
          let reader = new FileReader();

          reader.onload = event => {
            this.form.photo = event.target.result
            console.log(event.target.result)
          };

          reader.readAsDataURL(file);
        }
        
      },
      updatePost() {
          this.form.post(`/vacancy/update-post/${this.$route.params.vacancyPostId}`)
          .then((response) => {
              this.$router.push('/dashboard/vacancy/post-list')
              Toast.fire({
                type: 'success',
                title: 'Post updated successfully'
              })
          })
          .catch(() => {

          })
      },
      updateImage() {
        if (this.form.photo) {
          let img = this.form.photo;
          if (img.length > 100) {
            return this.form.photo
          } else {
            return `/images/post_images/vacancy/${this.form.photo}`
          }
        }
      }
    }
}
</script>

<style>
.ck-content { height:200px; }
</style>