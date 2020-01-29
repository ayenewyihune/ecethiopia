import axios from "axios";

export default {
    state: {
        // Admin part category
        stateBlogCategoryAdmin: [],
        stateProfessionalCategoryAdmin: [],
        stateVacancyCategoryAdmin: [],

        // Admin part post
        stateBlogPostAdmin: [],
        stateVacancyPostAdmin: [],

        // Public part blog
        stateBlogPostPublic: [],
        stateSingleBlogPostPublic: [],
        stateBlogCategoryPublic: [],
        stateBlogLatestPostPublic: [],

        // Public part vacancy
        stateVacancyPostPublic: [],
        stateSingleVacancyPostPublic: [],
        stateVacancyCategoryPublic: [],
        stateVacancyLatestPostPublic: [],

        // Public part blog
        stateProfessionalPublic: [],
        stateSingleProfessionalPublic: [],
        stateProfessionalCategoryPublic: [],
        stateProfessionalTopPublic: []
    },
    getters: {
        // Admin part category
        getBlogCategoryAdmin(state) {
            return state.stateBlogCategoryAdmin
        },
        getProfessionalCategoryAdmin(state) {
            return state.stateProfessionalCategoryAdmin
        },
        getVacancyCategoryAdmin(state) {
            return state.stateVacancyCategoryAdmin
        },
        // Admin part post
        getBlogPostAdmin(state) {
            return state.stateBlogPostAdmin
        },
        getVacancyPostAdmin(state) {
            return state.stateVacancyPostAdmin
        },
        // Public part blog
        getBlogPostPublic(state) {
            return state.stateBlogPostPublic
        },
        getSingleBlogPostPublic(state) {
            return state.stateSingleBlogPostPublic
        },
        getBlogCategoryPublic(state) {
            return state.stateBlogCategoryPublic
        },
        getBlogLatestPostPublic(state) {
            return state.stateBlogLatestPostPublic
        },
        // Public part vacancy
        getVacancyPostPublic(state) {
            return state.stateVacancyPostPublic
        },
        getSingleVacancyPostPublic(state) {
            return state.stateSingleVacancyPostPublic
        },
        getVacancyCategoryPublic(state) {
            return state.stateVacancyCategoryPublic
        },
        getVacancyLatestPostPublic(state) {
            return state.stateVacancyLatestPostPublic
        },
        // Public part professional
        getProfessionalPublic(state) {
            return state.stateProfessionalPublic
        },
        getSingleProfessionalPublic(state) {
            return state.stateSingleProfessionalPublic
        },
        getProfessionalCategoryPublic(state) {
            return state.stateProfessionalCategoryPublic
        },
        getProfessionalTopPublic(state) {
            return state.stateProfessionalTopPublic
        },
    },
    actions: {
        // Admin part category
        actionBlogCategoryAdmin(context) {
            axios.get('/blog/category')
                .then((response)=>{
                    context.commit('mutationBlogCategoryAdmin', response.data.blog_categories)
                })
        },
        actionVacancyCategoryAdmin(context) {
            axios.get('/vacancy/category')
                .then((response)=>{
                    context.commit('mutationVacancyCategoryAdmin', response.data.vacancy_categories)
                })
        },
        actionProfessionalCategoryAdmin(context) {
            axios.get('/professional/category')
                .then((response)=>{
                    context.commit('mutationProfessionalCategoryAdmin', response.data.professional_categories)
                })
        },
        // Admin part post
        actionBlogPostAdmin(context) {
            axios.get('/blog/post/admin')
                .then((response)=>{
                    context.commit('mutationBlogPostAdmin', response.data.blog_posts)
                })
        },
        actionVacancyPostAdmin(context) {
            axios.get('/vacancy/post/admin')
                .then((response)=>{
                    context.commit('mutationVacancyPostAdmin', response.data.vacancy_posts)
                })
        },
        // Public part blog
        actionBlogPostPublic(context) {
            axios.get('/blog/post')
                .then((response)=>{
                    context.commit('mutationBlogPostPublic', response.data.blog_posts)
                })
        },
        actionSingleBlogPostPublic(context, payload) {
            axios.get('/blog/single-post/'+payload)
                .then((response)=>{
                    context.commit('mutationSingleBlogPostPublic', response.data.blog_post)
                })
        },
        actionBlogCategoryPublic(context) {
            axios.get('/blog/side-categories')
                .then((response)=>{
                    context.commit('mutationBlogCategoryPublic', response.data.blog_categories)
                })
        },
        actionBlogCategoryPostPublic(context, payload) {
            axios.get('/blog/category-posts/'+payload)
                .then((response)=>{
                    context.commit('mutationBlogCategoryPostPublic', response.data.blog_posts)
                })
        },
        actionSearchBlogPostPublic(context, payload) {
            axios.get('/blog/search-posts?s='+payload)
                .then((response)=>{
                    context.commit('mutationSearchBlogPostPublic', response.data.blog_posts)
                })
        },
        actionBlogLatestPostPublic(context) {
            axios.get('/blog/latest-posts')
                .then((response)=>{
                    context.commit('mutationBlogLatestPostPublic', response.data.blog_posts)
                })
        },
        // Public part vacancy
        actionVacancyPostPublic(context) {
            axios.get('/vacancy/post')
                .then((response)=>{
                    context.commit('mutationVacancyPostPublic', response.data.vacancy_posts)
                })
        },
        actionSingleVacancyPostPublic(context, payload) {
            axios.get('/vacancy/single-post/'+payload)
                .then((response)=>{
                    context.commit('mutationSingleVacancyPostPublic', response.data.vacancy_post)
                })
        },
        actionVacancyCategoryPublic(context) {
            axios.get('/vacancy/side-categories')
                .then((response)=>{
                    context.commit('mutationVacancyCategoryPublic', response.data.vacancy_categories)
                })
        },
        actionVacancyCategoryPostPublic(context, payload) {
            axios.get('/vacancy/category-posts/'+payload)
                .then((response)=>{
                    context.commit('mutationVacancyCategoryPostPublic', response.data.vacancy_posts)
                })
        },
        actionSearchVacancyPostPublic(context, payload) {
            axios.get('/vacancy/search-posts?s='+payload)
                .then((response)=>{
                    context.commit('mutationSearchVacancyPostPublic', response.data.vacancy_posts)
                })
        },
        actionVacancyLatestPostPublic(context) {
            axios.get('/vacancy/latest-posts')
                .then((response)=>{
                    context.commit('mutationVacancyLatestPostPublic', response.data.vacancy_posts)
                })
        },
        // Public part professional
        actionProfessionalPublic(context) {
            axios.get('/professional/post')
                .then((response)=>{
                    context.commit('mutationProfessionalPublic', response.data.professionals)
                })
        },
        actionSingleProfessionalPublic(context, payload) {
            axios.get('/professional/single-post/'+payload)
                .then((response)=>{
                    context.commit('mutationSingleProfessionalPublic', response.data.professional)
                })
        },
        actionProfessionalCategoryPublic(context) {
            axios.get('/professional/side-categories')
                .then((response)=>{
                    context.commit('mutationProfessionalCategoryPublic', response.data.professional_categories)
                })
        },
        actionProfessionalCategoryPostPublic(context, payload) {
            axios.get('/professional/category-posts/'+payload)
                .then((response)=>{
                    context.commit('mutationProfessionalCategoryPostPublic', response.data.professionals)
                })
        },
        actionSearchProfessionalPublic(context, payload) {
            axios.get('/professional/search-posts?s='+payload)
                .then((response)=>{
                    context.commit('mutationSearchProfessionalPublic', response.data.professionals)
                })
        },
        actionProfessionalTopPublic(context) {
            axios.get('/professional/latest-posts')
                .then((response)=>{
                    context.commit('mutationProfessionalTopPublic', response.data.professionals)
                })
        }
    },
    mutations: {
        // Admin part category
        mutationBlogCategoryAdmin(state, data) {
            return state.stateBlogCategoryAdmin = data
        },
        mutationVacancyCategoryAdmin(state, data) {
            return state.stateVacancyCategoryAdmin = data
        },
        mutationProfessionalCategoryAdmin(state, data) {
            return state.stateProfessionalCategoryAdmin = data
        },
        // Admin part post
        mutationBlogPostAdmin(state, data) {
            return state.stateBlogPostAdmin = data
        },
        mutationVacancyPostAdmin(state, data) {
            return state.stateVacancyPostAdmin = data
        },
        // Public part blog
        mutationBlogPostPublic(state, data) {
            return state.stateBlogPostPublic = data
        },
        mutationSingleBlogPostPublic(state, data) {
            return state.stateSingleBlogPostPublic = data
        },
        mutationBlogCategoryPublic(state,data) {
            return state.stateBlogCategoryPublic = data
        },
        mutationBlogCategoryPostPublic(state,data) {
            return state.stateBlogPostPublic = data
        },
        mutationSearchBlogPostPublic(state,data) {
            return state.stateBlogPostPublic = data
        },
        mutationBlogLatestPostPublic(state,data) {
            return state.stateBlogLatestPostPublic = data
        },
        // Public part vacancy
        mutationVacancyPostPublic(state, data) {
            return state.stateVacancyPostPublic = data
        },
        mutationSingleVacancyPostPublic(state, data) {
            return state.stateSingleVacancyPostPublic = data
        },
        mutationVacancyCategoryPublic(state,data) {
            return state.stateVacancyCategoryPublic = data
        },
        mutationVacancyCategoryPostPublic(state,data) {
            return state.stateVacancyPostPublic = data
        },
        mutationSearchVacancyPostPublic(state,data) {
            return state.stateVacancyPostPublic = data
        },
        mutationVacancyLatestPostPublic(state,data) {
            return state.stateVacancyLatestPostPublic = data
        },
        // Public part professional
        mutationProfessionalPublic(state, data) {
            return state.stateProfessionalPublic = data
        },
        mutationSingleProfessionalPublic(state, data) {
            return state.stateSingleProfessionalPublic = data
        },
        mutationProfessionalCategoryPublic(state,data) {
            return state.stateProfessionalCategoryPublic = data
        },
        mutationProfessionalCategoryPostPublic(state,data) {
            return state.stateProfessionalPublic = data
        },
        mutationSearchProfessionalPublic(state,data) {
            return state.stateProfessionalPublic = data
        },
        mutationProfessionalTopPublic(state,data) {
            return state.stateProfessionalTopPublic = data
        }
    }
}