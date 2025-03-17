<style>
    .sb-sidenav {
        background-color: #1E1E2F;
        color: white;
        width: 250px;
    }

    .sb-sidenav-menu .nav-link {
        color: white;
        padding: 12px 18px;
        display: flex;
        align-items: center;
        font-size: 16px;
        font-weight: 500;
        transition: all 0.3s ease;
        border-radius: 5px;
    }

    .sb-sidenav-menu .nav-link i {
        margin-right: 12px;
    }

    .sb-sidenav-menu .nav-link:hover {
        background: linear-gradient(90deg, #2E2E48 0%, #3A3A5A 100%);
        color: #F8F9FA;
    }

    .sb-sidenav-menu .nav-link.active {
        background-color: #17A2B8 !important;
        color: white !important;
        font-weight: bold;
    }

    .sb-sidenav-collapse-arrow {
        margin-left: auto;
        transition: transform 0.3s ease-in-out;
    }

    .collapsed .sb-sidenav-collapse-arrow {
        transform: rotate(-90deg);
    }
</style>

<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">

            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard
            </a>


            <a class="nav-link collapsed {{ request()->is('admin/bookings*','agent-booking*') ? 'active bg-warning text-dark' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBookings">
                <i class="fas fa-calendar-alt"></i>&nbsp; Make Offline Bookings
                <i class="fas fa-angle-down sb-sidenav-collapse-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('admin/bookings*','agent-booking*') ? 'show' : '' }}" id="collapseBookings">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ request()->routeIs('agent.booking.create') ? 'active bg-warning text-dark' : '' }}" href="{{ route('agent.booking.create') }}">Agent Booking</a>
                    <a class="nav-link {{ request()->routeIs('admin.bookings.schoolcreate') ? 'active bg-warning text-dark' : '' }}" href="{{ route('admin.bookings.schoolcreate') }}">School Booking</a>
                    <a class="nav-link {{ request()->routeIs('admin.bookings.create') ? 'active bg-warning text-dark' : '' }}" href="{{ route('admin.bookings.create') }}">Manual Bookings</a>
                </nav>
            </div>

            <a class="nav-link {{ request()->routeIs('reports.daily') ? 'active bg-warning text-dark' : '' }}" href="{{ route('reports.daily') }}"><i class="fas fa-clipboard-list"></i>&nbsp;&nbsp;Daily Bookings</a>

            <a class="nav-link {{ Request::routeIs('rooms.*') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseRooms">
                <i class="fas fa-home"></i>&nbsp; Rooms
                <i class="fas fa-angle-down sb-sidenav-collapse-arrow"></i>
            </a>
            <div class="collapse {{ Request::routeIs('rooms.*') ? 'show' : '' }}" id="collapseRooms">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ Request::routeIs('rooms.index') ? 'active' : '' }}" href="{{ route('rooms.index') }}">Available Rooms</a>
                    <a class="nav-link {{ Request::routeIs('rooms.occupied') ? 'active' : '' }}" href="{{ route('rooms.occupied') }}">Occupied Rooms</a>
                    <a class="nav-link {{ Request::routeIs('rooms.booking_details') ? 'active' : '' }}" href="{{ route('rooms.booking_details') }}">Booking Details</a>
                    <a class="nav-link {{ Request::routeIs('rooms.online_booking') ? 'active' : '' }}" href="{{ route('rooms.online_booking') }}">Online Bookings</a>
                    <a class="nav-link {{ Request::routeIs('rooms.details') ? 'active' : '' }}" href="{{ route('rooms.details') }}">Add Room</a>
                </nav>
            </div>


            <a class="nav-link {{ Request::routeIs('staff.*') || Request::routeIs('attendance.*') || Request::routeIs('salary.*') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseStaff">
                <i class="fas fa-users"></i>&nbsp; Staff Management
                <i class="fas fa-angle-down sb-sidenav-collapse-arrow"></i>
            </a>
            <div class="collapse {{ Request::routeIs('staff.*') || Request::routeIs('attendance.*') || Request::routeIs('salary.*') ? 'show' : '' }}" id="collapseStaff">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ Request::routeIs('staff.addstaff') ? 'active' : '' }}" href="{{ route('staff.addstaff') }}">Add New Staff</a>
                    <a class="nav-link {{ Request::routeIs('staff.index') ? 'active' : '' }}" href="{{ route('staff.index') }}">Staff List</a>
                    <a class="nav-link {{ Request::routeIs('attendance.index') ? 'active' : '' }}" href="{{ route('attendance.index') }}">Attendance</a>
                    <a class="nav-link {{ Request::routeIs('attendance.view') ? 'active' : '' }}" href="{{ route('attendance.view') }}">View Attendance</a>
                    <a class="nav-link {{ Request::routeIs('salary.paylist') ? 'active' : '' }}" href="{{ route('salary.paylist') }}">Salary Management</a>
                </nav>
            </div>

            <a class="nav-link collapsed {{ request()->is('bills*', 'generatebill*') || request()->routeIs('generatebill') ? 'active bg-warning text-dark' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBill">
                <i class="fas fa-receipt"></i>&nbsp; Bill Generation
                <i class="fas fa-angle-down sb-sidenav-collapse-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('bills*', 'generatebill*') || request()->routeIs('generatebill') ? 'show' : '' }}" id="collapseBill">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ request()->routeIs('generatebill') ? 'active bg-warning text-dark' : '' }}" href="{{ route('generatebill') }}">Generate Bill</a>
                    <a class="nav-link {{ request()->routeIs('bills.index') ? 'active bg-warning text-dark' : '' }}" href="{{ route('bills.index') }}">View Generated Bills</a>
                </nav>
            </div>


            <a class="nav-link collapsed {{ request()->is('investments*', 'daily-income*', 'daily-expenses*') ? 'active bg-warning text-dark' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAccount">
                <i class="fas fa-file-invoice"></i>&nbsp; Account
                <i class="fas fa-angle-down sb-sidenav-collapse-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('investments*', 'daily-income*', 'daily-expenses*') ? 'show' : '' }}" id="collapseAccount">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ request()->routeIs('investments.index') ? 'active bg-warning text-dark' : '' }}" href="{{ route('investments.index') }}">Investments</a>
                    <a class="nav-link {{ request()->routeIs('daily-income.index') ? 'active bg-warning text-dark' : '' }}" href="{{ route('daily-income.index') }}">Daily Income</a>
                    <a class="nav-link {{ request()->routeIs('daily-expenses.index') ? 'active bg-warning text-dark' : '' }}" href="{{ route('daily-expenses.index') }}">Daily Expenses</a>
                </nav>
            </div>


            <a class="nav-link collapsed {{ request()->is('reports/*') ? 'active bg-warning text-dark' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseReports">
                <i class="fas fa-file-alt"></i>&nbsp; Reports
                <i class="fas fa-angle-down sb-sidenav-collapse-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('reports/*') ? 'show' : '' }}" id="collapseReports">
                <nav class="sb-sidenav-menu-nested nav">

                    <a class="nav-link {{ request()->routeIs('reports.daily_booking', 'reports.admin_booking', 'reports.website_booking', 'reports.agent_booking', 'reports.school_picnic') ? 'active bg-warning text-dark' : '' }}"
                        href="{{ route('reports.daily_booking') }}">
                        Booking Report
                    </a>

                    <a class="nav-link {{ request()->routeIs('reports.staff') ? 'active bg-warning text-dark' : '' }}" href="{{ route('reports.staff') }}">Staff Report</a>
                    <a class="nav-link {{ request()->routeIs('reports.account') ? 'active bg-warning text-dark' : '' }}" href="{{ route('reports.account') }}">Account Report</a>
                </nav>
            </div>
            <a class="nav-link collapsed {{ request()->is('kitchen_purchases/*','kitchen_purchases*') || request()->is('purchases/*','purchases*') ? 'active bg-warning text-dark' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseInv">
                <i class="fas fa-warehouse"></i>&nbsp; Inventory Management
                <i class="fas fa-angle-down sb-sidenav-collapse-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('kitchen_purchases/*','kitchen_purchases') || request()->is('purchases/*','purchases*') ? 'show' : '' }}" id="collapseInv">
                <nav class="sb-sidenav-menu-nested nav">

                    <a class="nav-link {{ request()->routeIs('kitchen_purchases.create') ? 'active bg-warning text-dark' : '' }}" href="{{ route('kitchen_purchases.create') }}">Make Entry for Kitchen</a>
                    <a class="nav-link {{ request()->routeIs('kitchen_purchases.index') ? 'active bg-warning text-dark' : '' }}" href="{{ route('kitchen_purchases.index') }}">View Entries</a>

                    <a class="nav-link {{ request()->routeIs('purchases.create') ? 'active bg-warning text-dark' : '' }}" href="{{ route('purchases.create') }}">Make Purchase Entry</a>
                    <a class="nav-link {{ request()->routeIs('purchases.index') ? 'active bg-warning text-dark' : '' }}" href="{{ route('purchases.index') }}">View Entries</a>
                </nav>
            </div>

            <a class="nav-link {{ request()->routeIs('inquiries.index') ? 'active bg-warning text-dark' : '' }}" href="{{ route('inquiries.index') }}"><i class="fas fa-inbox"></i>&nbsp;&nbsp;View Inquiries</a>
            <a class="nav-link {{ request()->routeIs('gallery.show') ? 'active bg-warning text-dark' : '' }}" href="{{ route('gallery.show') }}"><i class="fas fa-images"></i>&nbsp;&nbsp;Manage Gallery</a>
            <a class="nav-link {{ request()->routeIs('admin.packages.*') ? 'active bg-warning text-dark' : '' }}" href="{{ route('admin.packages.index') }}">
                <i class="fas fa-box-open"></i>&nbsp;&nbsp;Manage Packages
            </a>

        </div>
    </div>
</nav>