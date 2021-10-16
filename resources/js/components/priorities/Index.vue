<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex row mb-5">
            <h2 class="col-lg-6 col-7 h3 mb-0 text-gray-800 pl-5">Dashboard/Priorities</h2>
        </div>
        <div class="container-fluid" style="position:relative;">
            <div class="row">
                <div class="col mb-4">
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
                            :rows="priorities"
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
                                            name: 'PrioritiesEdit',
                                            params: {
                                                id: props.row.id
                                            }
                                        }"
                                        class="btn btn-success"
                                        >Edit</router-link
                                    >
                                    <router-link
                                        :to="{
                                            name: 'PrioritiesIndex'
                                        }"
                                        class="btn btn-danger"
                                        @click.native="
                                            deletePriority(props.row.id)
                                        "
                                        >Delete</router-link
                                    >
                                </span>
                            </template>
                        </vue-good-table>
                    </template>
                </div>
                <!-- Creation Part -->
                <div class="col-lg-4 col-md-12 col-sm-12 pl-lg-4">
                    <div class="card shadow">
                        <div class="card-header">
                            New Priority
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="storePriority">
                                <div class="form-group row">
                                    <label
                                        for="name"
                                        class="col-form-label text-md-right"
                                        >Name</label
                                    >
                                    <input
                                        id="name"
                                        placeholder="Name"
                                        v-model="form.name"
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        required
                                    />
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="example-color-input2"
                                        class="form-control-label"
                                        >Text Color</label
                                    >
                                    <div
                                        class="container pl-0 pr-0"
                                        v-click-outside="removePanel2"
                                    >
                                        <input
                                            v-model="form.text_color"
                                            class="form-control"
                                            name="text_color"
                                            type="text"
                                            value="#217ff3"
                                            id="example-color-input2"
                                            role="button"
                                            aria-label="toggle color picker dialog"
                                            v-on:click="show2 = !show2"
                                        />
                                        <transition name="fade">
                                            <color-panel
                                                class="position-absolute"
                                                style="z-index: 100"
                                                id="panel2"
                                                media="screen"
                                                v-if="show2"
                                                v-model="form.text_color"
                                            ></color-panel>
                                        </transition>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="example-color-input"
                                        class="form-control-label"
                                        >Background Color</label
                                    >
                                    <div
                                        class="container pl-0 pr-0"
                                        v-click-outside="removePanel"
                                    >
                                        <input
                                            v-model="form.bg_color"
                                            class="form-control"
                                            width="500px"
                                            name="color"
                                            type="text"
                                            id="example-color-input"
                                            role="button"
                                            aria-label="toggle color picker dialog"
                                            v-on:click="show = !show"
                                        />
                                        <transition name="fade">
                                            <color-panel
                                                class="position-absolute"
                                                style="z-index: 100"
                                                id="panel"
                                                media="screen"
                                                v-if="show"
                                                v-model="form.bg_color"
                                            ></color-panel>
                                        </transition>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label
                                        for="badge-preview"
                                        class="form-control-label"
                                        >Preview
                                    </label>
                                    <div>
                                        <span
                                            class="badge badge-pill"
                                            id="badge-preview"
                                            :style="{
                                                backgroundColor: form.bg_color,
                                                color: form.text_color
                                            }"
                                            ><span
                                                style="text-transform: uppercase;"
                                                >{{
                                                    form.name || form.test
                                                }}</span
                                            ></span
                                        >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        for="def-usr"
                                        class="form-control-label text-md-right"
                                        >Default Assigned User</label
                                    >
                                    <select
                                        class="form-control"
                                        name="def-usr"
                                        aria-label="Default select example"
                                    >
                                        <option selected>
                                            Open this select menu
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group row mb-0 mt-4 ">
                                    <div class="col-md-6">
                                        <button
                                            type="submit"
                                            class="btn btn-primary position-relative"
                                        >
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /Creation Part -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ClickOutside from "vue-click-outside";
export default {
    directives: {
        ClickOutside
    },
    data() {
        return {
            opened: false,
            show: false,
            show2: false,
            form: {
                name: "",
                test: "TEST",
                // color picker:
                bg_color: "#3f51b5",
                text_color: "#ffffff"
            },
            columns: [
                {
                    label: "Id",
                    field: "id",
                    hidden: true
                },
                {
                    label: "Name",
                    field: "name",
                    tdClass: "pt-3 text-capitalize"
                },
                {
                    label: "Preview",
                    field: row => this.displayColor(row),
                    tdClass: "pt-3",
                    html: true
                },
                {
                    label: "Created On",
                    field: "created_at",
                    type: "date",
                    dateInputFormat: "yyyy-MM-dd HH:mm:ss",
                    dateOutputFormat: "MMM do yy",
                    tdClass: "pt-3 text-left",
                    thClass: "text-left"
                },
                {
                    label: "Manage",
                    field: "manage",
                    thClass: "text-right"
                }
            ],
            priorities: [],
            // success message:
            showMessage: false,
            message: ""
        };
    },
    mounted() {
        this.getPriorities();
    },
    methods: {
        toggle() {
            this.opened = true;
        },
        hide() {
            this.opened = false;
        },
        getPriorities() {
            axios
                .get("/tickets-system/public/api/priorities")
                .then(res => {
                    this.priorities = res.data.data;
                })
                .catch(error => {
                    console.log(console.error());
                });
        },
        deletePriority(id) {
            axios
                .delete("/tickets-system/public/api/priorities/" + id)
                .then(res => {
                    this.showMessage = true;
                    this.message = res.data;
                    this.getPriorities();
                    window.scrollTo(0, 0);
                });
        },
        storePriority() {
            axios
                .post("/tickets-system/public/api/priorities", {
                    name: this.form.name,
                    bg_color: this.form.bg_color,
                    text_color: this.form.text_color
                })
                .then(res => {
                    this.showMessage = true;
                    this.message = res.data;
                    this.getPriorities();
                    this.$router
                        .push({ name: "PrioritiesIndex" })
                        .catch(() => {});
                });
        },
        removePanel() {
            if (this.show) this.show = !this.show;
        },
        removePanel2() {
            if (this.show2) this.show2 = !this.show2;
        },
        displayColor(row) {
            var intRow = parseInt(row);
            var element = document.createElement("span");
            element.setAttribute("class", "badge badge-pill");
            Object.assign(element.style, {
                backgroundColor: row.bg_color,
                color: row.text_color
            });
            element.innerHTML = row.name;
            return element.outerHTML;
        },
        toUpper() {
            return this.name.toUpper();
        }
    }
};
</script>
<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}
@media screen and (min-width: 1800px) {
    #panel {
        left: 120px;
    }
    #panel2 {
        left: 120px;
    }
}
@media screen and (min-width: 1550px) and (max-width: 1800px) {
    #panel {
        left: 100px;
    }
    #panel2 {
        left: 100px;
    }
}
@media screen and (min-width: 800px) and (max-width: 1550px) {
}
.badge-preview {
    text-transform: uppercase;
}
</style>
