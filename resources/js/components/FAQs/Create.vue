<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div v-if="showMessage">
                    <div class="alert alert-danger">{{ message }}</div>
                </div>
                <div class="card">
                    <div class="card-header">
                        New FAQ
                        <router-link
                            :to="{ name: 'FAQsIndex' }"
                            class="float-right"
                            >Back</router-link
                        >
                    </div>

                    <div class="card-body">
                        <form @submit.prevent="storeFAQ">
                            <div class="form-group row">
                                <label
                                    for="question"
                                    class="col-form-label text-md-right"
                                    >Question</label
                                >
                                <input
                                    id="question"
                                    v-model="form.question"
                                    type="text"
                                    class="form-control"
                                    name="question"
                                    required
                                />
                            </div>
                            <div class="form-group row">
                                <label
                                    for="answer"
                                    class="col-form-label text-md-right"
                                    >Answer</label
                                >
                                <textarea
                                    id="answer"
                                    v-model="form.answer"
                                    class="form-control"
                                    rows="4"
                                    cols="50"
                                    name="answer"
                                    required
                                />
                            </div>
                            <div class="form-group row">
                                <label
                                    for="category"
                                    class="col-form-label text-md-right"
                                    >Category</label
                                >
                                <select
                                    class="form-control"
                                    v-model="form.faq_category_id"
                                    id="category"
                                    aria-label="Category"
                                >
                                    <option selected value="">-No Category-</option>
                                    <option
                                        v-for="faqCategory in faqCategories"
                                        :key="faqCategory.id"
                                        :value="faqCategory.id"
                                        >{{ faqCategory.name }}</option
                                    >
                                </select>
                            </div>
                            <div class="form-group row mb-0 mt-4">
                                <div class="col-md-6 offset-md-4">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                question: "",
                answer: "",
                faq_category_id: ""
            },
            faqCategories: []
        };
    },
    created() {
        this.getFAQCategories();
    },
    methods: {
        storeFAQ() {
            axios
                .post("/tickets-system/public/api/faqs", {
                    question: this.form.question,
                    answer: this.form.answer,
                    f_a_q_category_id: this.form.faq_category_id,
                })
                .then(res => {
                    this.$router.push({ name: "FAQsIndex" });
                });
        },
        getFAQCategories() {
            axios
                .get("/tickets-system/public/api/faq-categories")
                .then(res => {
                    this.faqCategories = res.data.data;
                })
                .catch(error => {
                    console.log(console.error());
                });
        },
    }
};
</script>

<style></style>
