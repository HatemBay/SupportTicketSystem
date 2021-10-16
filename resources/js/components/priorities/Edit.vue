<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div v-if="showMessage">
                    <div class="alert alert-danger">{{ message }}</div>
                </div>
                <div class="card shadow">
                    <div class="card-header">
                        Update Priority
                        <router-link
                            :to="{ name: 'PrioritiesIndex' }"
                            class="float-right"
                            >Back</router-link
                        >
                    </div>

                    <div class="card-body">
                        <form @submit.prevent="updatePriority">
                            <div class="form-group row">
                                <label
                                    for="subject"
                                    class="col-md-4 col-form-label text-md-right"
                                    >Subject</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="subject"
                                        v-model="form.subject"
                                        type="text"
                                        class="form-control"
                                        name="subject"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="state"
                                    class="col-md-4 col-form-label text-md-right"
                                    >State</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="state"
                                        v-model="form.state"
                                        type="text"
                                        class="form-control"
                                        name="state"
                                        required
                                    />
                                </div>
                            </div>

                            <div class="wrapper" v-bind:style="bgc">
                                <div class="content">
                                    <input
                                        type="text"
                                        v-on:input="
                                            bgc.backgroundColor =
                                                $event.target.value
                                        "
                                    />
                                </div>
                            </div>

                            <div class="form-group row mb-0 mt-4">
                                <div class="col-md-6 offset-md-4">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        Update
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
// Vue.directive("click-outside", {
//     bind: function(el, binding, vnode) {
//         el.clickOutsideEvent = function(event) {
//             // here I check that click was outside the el and his children
//             if (!(el == event.target || el.contains(event.target))) {
//                 // and if it did, call method provided in attribute value
//                 vnode.context[binding.expression](event);
//             }
//         };
//         document.body.addEventListener("click", el.clickOutsideEvent);
//     },
//     unbind: function(el) {
//         document.body.removeEventListener("click", el.clickOutsideEvent);
//     }
// });
export default {
    data() {
        return {
            form: {
                subject: "",
                state: ""
            },
            bgc: {
                backgroundColor: ""
            },
            showMessage: false,
            message: ""
        };
    },
    created() {
        this.getPriority();
    },
    methods: {
        updatePriority() {
            axios
                .put(
                    "/tickets-system/public/api/priorities/" +
                        this.$route.params.id,
                    {
                        subject: this.form.subject,
                        state: this.form.state
                    }
                )
                .then(res => {
                    this.$router.push({ name: "PrioritiesIndex" });
                });
        },
        getPriority() {
            axios
                .get(
                    "/tickets-system/public/api/priorities/" +
                        this.$route.params.id
                )
                .then(res => {
                    this.form = res.data.data;
                })
                .catch(error => console.log(error));
        }
    }
};
</script>

<style></style>
