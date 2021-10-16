<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex row">
            <h2 class="col-lg-6 col-7 h3 mb-0 text-gray-800 pl-5">
                Dashboard/FAQs
            </h2>
            <div class="col-lg-6 col-5 pr-5">
                <router-link
                    :to="{
                        name: 'FAQsCreate'
                    }"
                    type="button"
                    class="btn btn-light text-primary font-weight-bold float-right shadow-sm mb-5"
                >
                    <svg
                        style="display:inline;"
                        xmlns="http://www.w3.org/2000/svg"
                        width="12"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="3"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-plus"
                    >
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    New FAQ</router-link
                >
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="mx-auto">
                        <template>
                            <div v-if="showMessage">
                                <div class="alert alert-success">
                                    {{ message }}
                                </div>
                            </div>
                            <vue-good-table
                                class="shadow"
                                theme="polar-bear"
                                styleClass="vgt-table striped"
                                :columns="columns"
                                :rows="FAQs"
                                :line-numbers="true"
                                :pagination-options="{
                                    enabled: true,
                                    mode: 'pages',
                                    position: 'top',
                                    perPage: 10,
                                    perPageDropdownEnabled: true
                                }"
                                :sort-options="{
                                    enabled: true,
                                    initialSortBy: {
                                        field: 'created_at',
                                        type: 'asc'
                                    }
                                }"
                                :search-options="{
                                    enabled: true,
                                    placeholder: 'John Doe'
                                }"
                                compactMode
                            >
                                <template slot="table-row" slot-scope="props">
                                    <span
                                        v-if="props.column.field == 'manage'"
                                        class="float-right"
                                    >
                                        <router-link
                                            :to="{
                                                name: 'FAQsEdit',
                                                params: {
                                                    id: props.row.id
                                                }
                                            }"
                                            class="btn btn-success"
                                            >Edit</router-link
                                        >
                                        <router-link
                                            :to="{
                                                name: 'FAQsIndex'
                                            }"
                                            class="btn btn-danger"
                                            @click.native="
                                                deleteFAQ(props.row.id)
                                            "
                                            >Delete</router-link
                                        >
                                    </span>
                                </template>
                            </vue-good-table>
                        </template>
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
            columns: [
                {
                    label: "Id",
                    field: "id",
                    hidden: true
                },
                {
                    label: "Question",
                    field: "question",
                    tdClass:
                        "pt-3 text-capitalize font-weight-bold text-secondary"
                },
                {
                    label: "Answer",
                    field: row => this.displayAnswer(row),
                    tdClass: "pt-3 text-capitalize",
                    html: true
                },
                {
                    label: "Category",
                    field: row => this.displayFAQCategory(row),
                    tdClass: "pt-3 text-capitalize"
                },
                {
                    label: "Created On",
                    field: "created_at",
                    type: "date",
                    dateInputFormat: "yyyy-MM-dd HH:mm:ss",
                    dateOutputFormat: "MMM do yyyy",
                    tdClass: "pt-3 text-left",
                    thClass: "text-left"
                },
                {
                    label: "Manage",
                    field: "manage",
                    thClass: "text-right"
                }
            ],
            FAQs: [],
            FAQCategories: [],
            showMessage: false,
            message: ""
        };
    },
    mounted() {
        this.getFAQs();
        this.getFAQCategories();
    },
    methods: {
        getFAQs() {
            axios
                .get("/tickets-system/public/api/faqs")
                .then(res => {
                    this.FAQs = res.data.data;
                })
                .catch(error => {
                    console.log(console.error());
                });
        },
        deleteFAQ(id) {
            axios.delete("/tickets-system/public/api/faqs/" + id).then(res => {
                this.showMessage = true;
                this.message = res.data;
                this.getFAQs();
                window.scrollTo(0, 0);
            });
        },
        getFAQCategories() {
            axios
                .get("/tickets-system/public/api/faq-categories")
                .then(res => {
                    this.FAQCategories = res.data.data;
                })
                .catch(error => {
                    console.log(console.error());
                });
        },
        displayFAQCategory(row) {
            var res = "";
            this.FAQCategories.forEach(item => {
                if (item.id === row.f_a_q_category_id) {
                    res = item.name;
                }
            });
            return res;
        },
        displayAnswer(row) {
            var res = "";
            this.FAQs.forEach(item => {
                if (item.answer === row.answer) {
                    var element = document.createElement("div");
                    element.setAttribute("class", "text-truncate");
                    element.style.maxWidth = "200px";
                    element.innerHTML = item.answer;
                    res = element.outerHTML;
                }
            });
            return res;
        }
    }
};
</script>
<style>
.cut-text {
    text-overflow: ellipsis;
    overflow: hidden;
    width: 160px;
    height: 1.2em;
    white-space: nowrap;
}
</style>
