import AdminHome from './components/admin/AdminHome.vue'

// Category
// Blog
import BlogCategoryList from './components/admin/category/blog/List.vue'
import BlogCategoryList2 from './components/admin/category/blog/List2.vue'
import BlogAddCategory from './components/admin/category/blog/New.vue'
import BlogEditCategory from './components/admin/category/blog/Edit.vue'
// Vacancy
import VacancyCategoryList from './components/admin/category/vacancy/List.vue'
import VacancyCategoryList2 from './components/admin/category/vacancy/List2.vue'
import VacancyAddCategory from './components/admin/category/vacancy/New.vue'
import VacancyEditCategory from './components/admin/category/vacancy/Edit.vue'
// Professional
// import ProfessionalCategoryList from './components/admin/category/professional/List.vue'
// import ProfessionalAddCategory from './components/admin/category/professional/New.vue'
// import ProfessionalEditCategory from './components/admin/category/professional/Edit.vue'

// Post
// Blog
import BlogPostList from './components/admin/post/blog/List.vue'
import BlogPostList2 from './components/admin/post/blog/List2.vue'
import BlogAddPost from './components/admin/post/blog/New.vue'
import BlogAddPost2 from './components/admin/post/blog/New2.vue'
import BlogEditPost from './components/admin/post/blog/Edit.vue'
import BlogEditPost2 from './components/admin/post/blog/Edit2.vue'
// Vacancy
import VacancyPostList from './components/admin/post/vacancy/List.vue'
import VacancyPostList2 from './components/admin/post/vacancy/List2.vue'
import VacancyAddPost from './components/admin/post/vacancy/New.vue'
import VacancyAddPost2 from './components/admin/post/vacancy/New2.vue'
import VacancyEditPost from './components/admin/post/vacancy/Edit.vue'
import VacancyEditPost2 from './components/admin/post/vacancy/Edit2.vue'

// Frontend
// Basic
import PublicHome from './components/public/PublicHome.vue'
import Login from './components/public/Login.vue'
import Register from './components/public/Register.vue'
// Blog
import BlogPost from './components/public/blog/BlogPost.vue'
import BlogSinglePost from './components/public/blog/SingleBlog.vue'
// Vacancy
import VacancyPost from './components/public/vacancy/VacancyPost.vue'
import VacancySinglePost from './components/public/vacancy/SingleVacancy.vue'
// Professionals
// import ProfessionalList from './components/public/professional/ProfessionalList.vue'
// import ProfessionalProfile from './components/public/professional/ProfessionalProfile.vue'

export const routes = [
    { path: '/dashboard', component: AdminHome },
    // Category
    // Blog
    { path: '/dashboard/blog/category-list', component: BlogCategoryList },
    { path: '/dashboard/blog/category-list2', component: BlogCategoryList2 },
    { path: '/dashboard/blog/add-category', component: BlogAddCategory },
    { path: '/dashboard/blog/edit-category/:blogCategoryId', component: BlogEditCategory },
    // Vacancy
    { path: '/dashboard/vacancy/category-list', component: VacancyCategoryList },
    { path: '/dashboard/vacancy/category-list2', component: VacancyCategoryList2 },
    { path: '/dashboard/vacancy/add-category', component: VacancyAddCategory },
    { path: '/dashboard/vacancy/edit-category/:vacancyCategoryId', component: VacancyEditCategory },
    // Professional
    // { path: '/dashboard/professional/category-list', component: ProfessionalCategoryList },
    // { path: '/dashboard/professional/add-category', component: ProfessionalAddCategory },
    // { path: '/dashboard/professional/edit-category/:professionalCategoryId', component: ProfessionalEditCategory },
    // Post
    // Blog
    { path: '/dashboard/blog/post-list', component: BlogPostList },
    { path: '/dashboard/blog/post-list2', component: BlogPostList2 },
    { path: '/dashboard/blog/add-post', component: BlogAddPost },
    { path: '/dashboard/blog/add-post2', component: BlogAddPost2 },
    { path: '/dashboard/blog/edit-post/:blogPostId', component: BlogEditPost },
    { path: '/dashboard/blog/edit-post2/:blogPostId', component: BlogEditPost2 },
    // Vacancy
    { path: '/dashboard/vacancy/post-list', component: VacancyPostList },
    { path: '/dashboard/vacancy/post-list2', component: VacancyPostList2 },
    { path: '/dashboard/vacancy/add-post', component: VacancyAddPost },
    { path: '/dashboard/vacancy/add-post2', component: VacancyAddPost2 },
    { path: '/dashboard/vacancy/edit-post/:vacancyPostId', component: VacancyEditPost },
    { path: '/dashboard/vacancy/edit-post2/:vacancyPostId', component: VacancyEditPost2 },

    // Frontend route
    // Basic
    { path: '/', component: BlogPost },
    { path: '/login', component: Login },
    { path: '/register', component: Register },
    // Blog
    { path: '/blog', component: BlogPost },
    { path: '/blog/:id', component: BlogSinglePost },
    { path: '/blog/categories/:id', component: BlogPost },
    // Vacancy
    { path: '/vacancy', component: VacancyPost },
    { path: '/vacancy/:id', component: VacancySinglePost },
    { path: '/vacancy/categories/:id', component: VacancyPost },
    // Professionals
    // { path: '/professionals', component: ProfessionalList },
    // { path: '/professional/:id', component: ProfessionalProfile },
    // { path: '/professional/categories/:id', component: ProfessionalList },
  ]