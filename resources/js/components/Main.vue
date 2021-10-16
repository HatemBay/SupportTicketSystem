<template>
    <div class="row col-lg-12 col-xl-12" style="max-width:100% !important;">
        <!-- sidebar: col-2 -->
        <side-bar></side-bar>
        <div
            class="col-11"
            style="position:relative; padding-left:0 !important; width: 87.500000005%;
    flex: 0 0 87.5%; max-width: 87.5%;"
        >
            <div class="col-12" style="padding-left:0 !important;">
                <top-bar></top-bar>
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            currentUser: {},
            token: localStorage.getItem("token"),
        };
    },
    mounted() {
        window.axios.defaults.headers.common[
            "Authorization"
        ] = `Bearer ${this.token}`;
        axios
            .get("/tickets-system/public/api/user")
            .then(response => {
                this.currentUser = response.data;
            })
            .catch(errors => {
                console.log(errors);
            });
    },
    methods: {
        onToggleCollapse(collapsed) {
            if (this.width == "290px") {
                this.width = "50px";
            } else {
                this.width = "290px";
            }
        }
    }
};
</script>

<style>
.small {
    max-width: 600px;
    margin: 150px auto;
}
.v-sidebar-menu {
    background-color: red;
}
</style>
