<template>
    <!-- Page Wrapper -->
    <!-- Sidebar -->
    <ul
        class="col-1 navbar-nav bg-gradient-primary sidebar sidebar-dark accordion fixed-left"
        id="accordionSidebar"
        style="width: 12.499999995%;
    flex: 0 0 12.499%;max-width: 12.499%;"
    >
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <router-link
                :to="{
                    name: 'Dashboard'
                }"
                class="nav-link"
                ><i class="fas fa-fw fa-tachometer-alt"></i
                >Dashboard</router-link
            >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Nav Item - Knowledge Bases Collapse Menu -->
        <li class="nav-item">
            <a
                class="nav-link collapsed"
                href="#"
                data-toggle="collapse"
                data-target="#collapseKB"
                aria-expanded="true"
                aria-controls="collapseKB"
            >
                <i class="fas fa-fw fa-cog"></i>
                <span>Knowledge Bases</span>
            </a>
            <div
                id="collapseKB"
                class="collapse"
                aria-labelledby="headingKB"
                data-parent="#accordionSidebar"
            >
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Knowledge Bases</h6>
                    <router-link
                        :to="{
                            name: 'KnowledgeBasesIndex'
                        }"
                        class="collapse-item"
                        >Knowledge Bases</router-link
                    >
                    <router-link
                        :to="{
                            name: 'CategoriesIndex'
                        }"
                        class="collapse-item"
                        >Categories</router-link
                    >
                    <router-link
                        :to="{
                            name: 'SubCategoriesIndex'
                        }"
                        class="collapse-item"
                        >Sub Categories</router-link
                    >
                </div>
            </div>
        </li>

        <!-- Nav Item - FAQ Collapse Menu -->
        <li class="nav-item">
            <a
                class="nav-link collapsed"
                href="#"
                data-toggle="collapse"
                data-target="#collapseFAQ"
                aria-expanded="true"
                aria-controls="collapseFAQ"
            >
                <i class="fas fa-fw fa-wrench"></i>
                <span>FAQ</span>
            </a>
            <div
                id="collapseFAQ"
                class="collapse"
                aria-labelledby="headingFAQ"
                data-parent="#accordionSidebar"
            >
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">FAQ</h6>
                    <router-link
                        :to="{
                            name: 'FAQsIndex'
                        }"
                        class="collapse-item"
                        >FAQs</router-link
                    >
                    <router-link
                        :to="{
                            name: 'FAQCategoriesIndex'
                        }"
                        class="collapse-item"
                        >Categories</router-link
                    >
                </div>
            </div>
        </li>

        <!-- Departments -->
        <li class="nav-item">
            <router-link
                :to="{
                    name: 'DepartmentsIndex'
                }"
                class="nav-link"
                >Departments</router-link
            >
        </li>

        <!-- Priority -->
        <li class="nav-item">
            <router-link
                :to="{
                    name: 'PrioritiesIndex'
                }"
                class="nav-link"
                >Priorities</router-link
            >
        </li>

        <!-- Nav Item - Tickets Collapse Menu -->
        <li class="nav-item">
            <a
                class="nav-link collapsed"
                href="#"
                data-toggle="collapse"
                data-target="#collapseTickets"
                aria-expanded="true"
                aria-controls="collapseTickets"
            >
                <i class="fas fa-fw fa-wrench"></i>
                <span>Tickets</span>
            </a>
            <div
                id="collapseTickets"
                class="collapse"
                aria-labelledby="headingTickets"
                data-parent="#accordionSidebar"
            >
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Tickets</h6>
                    <router-link
                        :to="{
                            name: 'CannedMessagesIndex'
                        }"
                        class="collapse-item"
                        >Canned Messages</router-link
                    >
                    <router-link
                        :to="{
                            name: 'TicketsIndex'
                        }"
                        class="collapse-item"
                        >All Tickets</router-link
                    >
                    <a class="collapse-item" href="utilities-border.html"
                        >Unassigned Tickets</a
                    >
                    <a class="collapse-item" href="utilities-border.html"
                        >Open Tickets</a
                    >
                    <a class="collapse-item" href="utilities-border.html"
                        >Closed Tickets</a
                    >
                </div>
            </div>
        </li>

        <!-- Customers -->
        <li class="nav-item">
            <a class="nav-link" href="index.html"> <span>Customers</span></a>
        </li>

        <!-- Nav Item - Users Collapse Menu -->
        <li class="nav-item">
            <a
                class="nav-link collapsed"
                href="#"
                data-toggle="collapse"
                data-target="#collapseUsers"
                aria-expanded="true"
                aria-controls="collapseUsers"
            >
                <i class="fas fa-fw fa-wrench"></i>
                <span>Users</span>
            </a>
            <div
                id="collapseUsers"
                class="collapse"
                aria-labelledby="headingUsers"
                data-parent="#accordionSidebar"
            >
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Users</h6>
                    <a class="collapse-item" href="utilities-color.html"
                        >Roles</a
                    >
                    <router-link
                        :to="{
                            name: 'UsersIndex'
                        }"
                        class="collapse-item"
                        >Users</router-link
                    >
                </div>
            </div>
        </li>

        <!-- Nav Item - Settings Collapse Menu -->
        <li class="nav-item">
            <a
                class="nav-link collapsed"
                href="#"
                data-toggle="collapse"
                data-target="#collapseSettings"
                aria-expanded="true"
                aria-controls="collapseSettings"
            >
                <i class="fas fa-fw fa-wrench"></i>
                <span>Settings</span>
            </a>
            <div
                id="collapseSettings"
                class="collapse"
                aria-labelledby="headingSettings"
                data-parent="#accordionSidebar"
            >
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Settings</h6>
                    <a class="collapse-item" href="utilities-color.html"
                        >General Settings</a
                    >
                    <a class="collapse-item" href="utilities-border.html"
                        >Language Settings</a
                    >
                    <a class="collapse-item" href="utilities-border.html"
                        >API Settings</a
                    >
                    <a class="collapse-item" href="utilities-border.html"
                        >Frontend Settings</a
                    >
                    <a class="collapse-item" href="utilities-border.html"
                        >Ticket Settings</a
                    >
                    <a class="collapse-item" href="utilities-border.html"
                        >Email Settings</a
                    >
                    <a class="collapse-item" href="utilities-border.html"
                        >Email Templates</a
                    >
                </div>
            </div>
        </li>
    </ul>
    <!-- End of Sidebar -->
</template>

<script>
export default {
    name: "SideBar"
};
</script>
