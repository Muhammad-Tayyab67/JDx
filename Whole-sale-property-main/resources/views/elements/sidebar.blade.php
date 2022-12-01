<div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a class="has-arrow ai-icon" href="{!! url('/index'); !!}" aria-expanded="false">
                            <i class="flaticon-381-networking"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                         <ul aria-expanded="false">
                            <!-- Dashboard -->
                            <li><a href="{!! url('/index'); !!}">Dashboard</a></li>
                            @canany('View Analytics')
                            <li><a href="{!! url('/analytics'); !!}">Analytics</a></li>
                            @endcanany
                            <!-- <li><a href="{!! url('/review'); !!}">Review</a></li>
                            <li><a href="{!! url('/order-list'); !!}">Order List</a></li>
                            <li><a href="{!! url('/customer-list'); !!}">Customer</a></li>
                            <li><a href="{!! url('/property-details'); !!}">Property Details</a></li> -->
                        </ul> 
                    </li>
                    {{-- User Management --}}
                    @canany(['View Role', 'View User'])
                    <li>
                        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">User Management System</span>
                        </a>
                        <ul aria-expanded="false">
                            @canany('View Role')
                            <li><a href="{!! url('/roles'); !!}">Roles</a></li>
                            @endcanany
                            @canany('View User')
                            <li><a href="{!! url('/user'); !!}">User</a></li>
                            @endcanany
                        </ul>
                    </li>
                    @endcanany
                    {{-- View Human Resources Management --}}
                    @canany('View Employee')
                    <li>
                        <a class="has-arrow ai-icon" href="{!! url('/employees'); !!}" aria-expanded="false">
                            <i class="la la-users"></i>
                            <span class="nav-text">Human Resource Management</span>
                        </a>
                        {{-- <ul aria-expanded="false">
                            <li><a href="">Employees Information</a></li>
                        </ul> --}}
                    </li>
                    @endcanany
                    {{-- Property Management System --}}
                    @canany('View Property')
                    <li>
                            <a class="has-arrow ai-icon" @if (Auth::user()->roles[0]->name=="Super Admin") href="{!! url('/property/list'); !!}"  @else href="{!! url('/scout/list'); !!}" @endif 

                            aria-expanded="false">
                                <i class="flaticon-381-notepad"></i>
                                <span class="nav-text">Property Management</span>
                            </a>
                        {{-- <ul aria-expanded="false">
                            @canany('View Property')
                            <li><a href="{!! url('/scout_list'); !!}">Property Information </a></li>
                            @endcanany
                            @canany('View Master Property')
                            <li><a href="{!! url('/property_list'); !!}">Property Information </a></li>
                            @endcanany
                        </ul> --}}
                    </li>
                    @endcanany
                    
                </ul>
			</div>
 </div>