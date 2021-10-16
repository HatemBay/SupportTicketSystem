<template>
    <div class="pl-3 container-fluid">
        <div class="d-sm-flex row mb-5">
            <h2 class="col-lg-6 col-7 h3 mb-0 text-gray-800 pl-5">
                Dashboard
            </h2>
        </div>
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div
                                    class="text-xs font-weight-bold text-primary text-uppercase mb-1"
                                >
                                    Tickets
                                </div>
                                <div
                                    class="h5 mb-0 font-weight-bold text-gray-800"
                                >
                                    {{ countAll }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i
                                    class="fas fa-calendar fa-2x text-gray-300"
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div
                                    class="text-xs font-weight-bold text-success text-uppercase mb-1"
                                >
                                    Open Tickets
                                </div>
                                <div
                                    class="h5 mb-0 font-weight-bold text-gray-800"
                                >
                                    {{ countOpen }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i
                                    class="fas fa-dollar-sign fa-2x text-gray-300"
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div
                                    class="text-xs font-weight-bold text-info text-uppercase mb-1"
                                >
                                    Tasks
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div
                                            class="h5 mb-0 mr-3 font-weight-bold text-gray-800"
                                        >
                                            50%
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div
                                                class="progress-bar bg-info"
                                                role="progressbar"
                                                style="width: 50%"
                                                aria-valuenow="50"
                                                aria-valuemin="0"
                                                aria-valuemax="100"
                                            ></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i
                                    class="fas fa-clipboard-list fa-2x text-gray-300"
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div
                                    class="text-xs font-weight-bold text-warning text-uppercase mb-1"
                                >
                                    Pending Requests
                                </div>
                                <div
                                    class="h5 mb-0 font-weight-bold text-gray-800"
                                >
                                    18
                                </div>
                            </div>
                            <div class="col-auto">
                                <i
                                    class="fas fa-comments fa-2x text-gray-300"
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                    >
                        <h6 class="m-0 font-weight-bold text-primary">
                            Overview
                        </h6>
                        <div class="dropdown no-arrow">
                            <a
                                class="dropdown-toggle"
                                href="#"
                                role="button"
                                id="dropdownMenuLink"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                <i
                                    class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"
                                ></i>
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink"
                            >
                                <div class="dropdown-header">
                                    Dropdown Header:
                                </div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#"
                                    >Another action</a
                                >
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"
                                    >Something else here</a
                                >
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <LineChart
                            :label="labels"
                            :chart-data="tcount"
                        ></LineChart>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                    >
                        <h6 class="m-0 font-weight-bold text-primary">
                            Tickets Overview
                        </h6>
                        <div class="dropdown no-arrow">
                            <a
                                class="dropdown-toggle"
                                href="#"
                                role="button"
                                id="dropdownMenuLink"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                <i
                                    class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"
                                ></i>
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink"
                            >
                                <div class="dropdown-header">
                                    Dropdown Header:
                                </div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#"
                                    >Another action</a
                                >
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"
                                    >Something else here</a
                                >
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <pie-chart :chart-data="values"></pie-chart>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row"></div>
        <!-- Content Row -->
    </div>
</template>

<script>
import LineChart from "./LineChart";
import PieChart from "./PieChart";

export default {
    components: {
        LineChart,
        PieChart
    },
    data() {
        return {
            menu: [
                {
                    header: true,
                    title: "Main Navigation",
                    hiddenOnCollapse: true
                },
                {
                    href: "/",
                    title: "Dashboard",
                    icon: "fa fa-user"
                },
                {
                    href: "/charts",
                    title: "Charts",
                    icon: "fa fa-chart-area",
                    child: [
                        {
                            href: "/charts/sublink",
                            title: "Sub Link"
                        }
                    ]
                }
            ],
            currentUser: {},
            token: localStorage.getItem("token"),
            countAll: "",
            countMonth: "",
            countOpen: "",
            labels: [],
            tcount: [],
            values: [],
            width: "290px"
        };
    },
    async beforeRouteEnter(to, from, next) {
        var month = new Array();
        for (var i = 1; i < 13; i++) {
            month[i - 1] = await axios.get(
                "/tickets-system/public/api/tickets/count/" + i
            );
        }
        const all = await axios.get(
            "/tickets-system/public/api/tickets/count-all"
        );
        const open = await axios.get(
            "/tickets-system/public/api/tickets/count-open"
        );

        next(vm => {
            for (var i = 0; i < 12; i++) {
                vm.tcount.push(month[i].data);
            }
        });
        next(vm => {
            vm.values.push(open.data, all.data - open.data);
        });
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
        this.getTickets();
        this.getTicketsPerMonth();
        this.getOpenTickets();
    },
    methods: {
        getTickets() {
            axios
                .get("/tickets-system/public/api/tickets/count-all")
                .then(res => {
                    this.countAll = res.data;
                });
        },
        getOpenTickets() {
            axios
                .get("/tickets-system/public/api/tickets/count-open")
                .then(res => {
                    this.countOpen = res.data;
                });
        },
        getTicketsPerMonth() {
            axios
                .get("/tickets-system/public/api/tickets/count/5")
                .then(res => {
                    this.countMonth = res.data;
                });
        },
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
