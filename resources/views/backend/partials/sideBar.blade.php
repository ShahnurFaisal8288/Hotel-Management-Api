@push('css')
<style>
    .bacground-1 {
        background: rgb(231, 231, 154);
    }

    /* .side_bar {
        background: #aacf39;
    } */
    /* .dash_hover:hover {
    background: #20df49 !important;
} */

</style>
@endpush
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme bacground-1">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img height="80px" width="180px" style="object-fit:cover;height: 78px;
                width: 94px;
                margin: 15px 0 0 56px;" src="{{ asset('backend/img/images.png') }}" alt="">
            </span>

        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->

        <li class="menu-item {{ $data['active_menu'] == 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>


        {{-- User panel --}}
        {{-- @if(Auth::guard('admin')->user()->can('view-investor')) --}}
        <li class="menu-item  {{ $data['active_menu']  == 'Investor' || $data['active_menu']  == 'InvestorCreate'|| $data['active_menu']  == 'investorApprove' || $data['active_menu']  == 'investorList' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Tenant Management</div>
            </a>
            <ul class="menu-sub ">

                <li class="menu-item {{ $data['active_menu'] == 'InvestorCreate' ? 'active' : '' }}">
                    <a href="{{ route('investor_create') }}" class="menu-link">
                        <div data-i18n="Without menu">Add Tenant</div>
                    </a>
                </li>

                <li class="menu-item {{ $data['active_menu'] == 'investorApprove' ? 'active' : '' }}">
                    <a href="{{ route('investorApprove') }}" class="menu-link">
                        <div data-i18n="Without navbar">Tenant Approval Required</div>
                    </a>
                </li>
                <li class="menu-item {{ $data['active_menu'] == 'investorList' ? 'active' : '' }}">
                    <a href="{{ route('investorList') }}" class="menu-link">
                        <div data-i18n="Without navbar">Tenant List</div>
                    </a>
                </li>
            </ul>
        </li>
        {{-- @endif --}}
        {{-- Lead Management panel --}}

        {{-- <li class="menu-item {{  $data['active_menu']  == 'hr_management' || $data['active_menu']  == 'LeadList' || $data['active_menu']  == 'LeadProcess' || $data['active_menu']  == 'task' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Lead Management</div>
            </a>
            <ul class="menu-sub">

                <li class="menu-item {{ $data['active_menu'] == 'LeadList' ? 'active' : '' }}">
                    <a href="{{ route('lead') }}" class="menu-link">
                        <div data-i18n="Without menu">Add Lead</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item {{ $data['active_menu'] == 'task' ? 'active' : '' }}">
                    <a href="{{ route('tasks.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Update Task</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item {{ $data['active_menu'] == 'LeadProcess' ? 'active' : '' }}">
                    <a href="{{ route('lead.process') }}" class="menu-link">
                        <div data-i18n="Without menu">Work Progress</div>
                    </a>
                </li>
            </ul>

        </li> --}}

        {{--Lead Management End --}}
        {{-- Employee Management panel --}}
        {{-- @if(Auth::guard('admin')->user()->can('view-employee')) --}}
        {{-- <li class="menu-item {{ $data['active_menu']  == 'system_management' || $data['active_menu']  == 'employee' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Employee Management</div>
            </a>
            <ul class="menu-sub">

                <li class="menu-item {{ $data['active_menu'] == 'employee' ? 'active' : '' }}">
                    <a href="{{ route('employee') }}" class="menu-link">
                        <div data-i18n="Without menu">Add Employee</div>
                    </a>
                </li>

            </ul>

        </li> --}}
        {{-- @endif --}}

        {{--Employee Management End --}}
        {{-- payment panel --}}
        @if(Auth::guard('admin')->user()->can('view-payment'))
        <li class="menu-item {{ $data['active_menu']  == 'payment' || $data['active_menu']  == 'InvestorPay' || $data['active_menu']  == 'InvestorList'? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Account</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $data['active_menu'] == 'InvestorPay' ? 'active' : '' }}">
                    <a href="{{ route('investor_pay') }}" class="menu-link">
                        <div data-i18n="Without menu">Payment Form</div>
                    </a>
                </li>
                <li class="menu-item {{ $data['active_menu'] == 'InvestorList' ? 'active' : '' }}">
                    <a href="{{ route('payment.list') }}" class="menu-link">
                        <div data-i18n="Without menu">Payment List</div>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        {{--payment panel End --}}
        {{-- expense panel --}}
        @if(Auth::guard('admin')->user()->can('view-payment'))
        <li class="menu-item {{ $data['active_menu']  == 'Expense' || $data['active_menu']  == 'Category' || $data['active_menu']  == 'CategoryList' || $data['active_menu']  == 'Expense' || $data['active_menu']  == 'expenseList' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Expense</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $data['active_menu'] == 'Category' ? 'active' : '' }}">
                    <a href="{{ route('categoryGet') }}" class="menu-link">
                        <div data-i18n="Without menu">Category</div>
                    </a>
                </li>
                <li class="menu-item {{ $data['active_menu'] == 'CategoryList' ? 'active' : '' }}">
                    <a href="{{ route('categoryList') }}" class="menu-link">
                        <div data-i18n="Without menu">Category List</div>
                    </a>
                </li>
                <li class="menu-item {{ $data['active_menu'] == 'Expense' ? 'active' : '' }}">
                    <a href="{{ route('expense') }}" class="menu-link">
                        <div data-i18n="Without menu">Expense</div>
                    </a>
                </li>
                <li class="menu-item {{ $data['active_menu'] == 'expenseList' ? 'active' : '' }}">
                    <a href="{{ route('expenseList') }}" class="menu-link">
                        <div data-i18n="Without menu">Expense List</div>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        {{--expense panel End --}}
        {{-- Reward panel --}}
        @if(Auth::guard('admin')->user()->can('view-payment'))
        <li class="menu-item {{ $data['active_menu']  == 'book' || $data['active_menu']  == 'booking' || $data['active_menu']  == 'onlineBooking' || $data['active_menu']  == 'offlineBooking'? 'active open' : '' }}">

            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Community Center</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $data['active_menu'] == 'booking' ? 'active' : '' }}">
                    <a href="{{ route('community.list') }}" class="menu-link">
                        <div data-i18n="Without menu">Booking List</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item {{ $data['active_menu'] == 'onlineBooking' ? 'active' : '' }}">
                    <a href="{{ route('community.onlineBooking') }}" class="menu-link">
                        <div data-i18n="Without menu">Online Booking List</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item {{ $data['active_menu'] == 'offlineBooking' ? 'active' : '' }}">
                    <a href="{{ route('community.offlineBooking') }}" class="menu-link">
                        <div data-i18n="Without menu">Offline Booking List</div>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        {{--reward panel End --}}
        {{-- payment panel --}}
        {{-- @if(Auth::guard('admin')->user()->can('view-role')) --}}
        <li class="menu-item {{ $data['active_menu']  == 'role' || $data['active_menu']  == 'module' || $data['active_menu']  == 'subModule' || $data['active_menu']  == 'permission' || $data['active_menu']  == 'accessControl' || $data['active_menu']  == 'role' || $data['active_menu']  == 'adminList' || $data['active_menu']  == 'adminCreate' || $data['active_menu']  == 'adminEdit'? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Role Management</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $data['active_menu'] == 'module' ? 'active' : '' }}">
                    <a href="{{route('module')}}" class="menu-link">
                        <div data-i18n="Basic">Module </div>
                    </a>
                </li>
                <li class="menu-item {{ $data['active_menu'] == 'subModule' ? 'active' : '' }}">
                    <a href="{{route('subModule')}}" class="menu-link">
                        <div data-i18n="Basic">Sub Module </div>
                    </a>
                </li>
                <li class="menu-item {{ $data['active_menu'] == 'permission' ? 'active' : '' }}">
                    <a href="{{route('permission')}}" class="menu-link">
                        <div data-i18n="Basic">Permission</div>
                    </a>
                </li>
                <li class="menu-item {{ $data['active_menu'] == 'accessControl' ? 'active' : '' }}">
                    <a href="{{route('access-control')}}" class="menu-link">
                        <div data-i18n="Basic">Access Control</div>
                    </a>
                </li>
                <li class="menu-item {{ $data['active_menu'] == 'role' ? 'active' : '' }}">
                    <a href="{{route('role')}}" class="menu-link">
                        <div data-i18n="Basic">Role </div>
                    </a>
                </li>

                <li class="menu-item  {{ $data['active_menu'] == 'adminList' ? 'active' : '' }}">
                    <a href="{{route('adminList')}}" class="menu-link">
                        <div data-i18n="Basic">Admin</div>
                    </a>
                </li>

            </ul>
        </li>
        {{-- @endif --}}
        {{--payment panel End --}}





        {{-- Report Management panel --}}
        @if(Auth::guard('admin')->user()->can('view-report'))
        <li class="menu-item {{ $data['active_menu']  == 'report_management' || $data['active_menu']  == 'reportList' || $data['active_menu']  == 'investorReport' || $data['active_menu']  == 'dueReport' || $data['active_menu']  == 'expenseReport' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Report</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $data['active_menu'] == 'investorReport' ? 'active' : '' }}">
                    <a href="{{ route('investorReport') }}" class="menu-link">
                        <div data-i18n="Without menu">Tenant Report</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item {{ $data['active_menu'] == 'dueReport' ? 'active' : '' }}">
                    <a href="{{ route('dueReport') }}" class="menu-link">
                        <div data-i18n="Without menu">Due Report</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item {{ $data['active_menu'] == 'expenseReport' ? 'active' : '' }}">
                    <a href="{{ route('expenseReport') }}" class="menu-link">
                        <div data-i18n="Without menu">Expense Report</div>
                    </a>
                </li>
            </ul>
        </li>

        @endif
    </ul>
</aside>
<!-- / Menu -->
