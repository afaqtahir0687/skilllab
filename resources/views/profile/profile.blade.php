<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Skil Lab</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/skill-lab.jpeg') }}" >
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <style>
        /* Style the tab */
        /* Style the buttons inside the tab */
        .tab button {
            /* display: block; */
            background-color: inherit;
            padding: 16px;
            width: 100%;
            border: none;
            /* outline: none; */
            text-align: left;
            cursor: pointer;
            /* transition: 0.3s; */
        }

        .tab button:hover {
            background: rgba(76, 73, 227, 0.1);
            border-left: 4px solid rgba(76, 73, 227, 1);
        }

        .tab button.active {
            background-color: rgba(76, 73, 227, 0.1);
            border-left: 4px solid rgba(76, 73, 227, 1);
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        <div class="sidebar pb-3">
            <nav class="navbar navbar-light">
                <a href="{{ url('dashboard') }}" class="navbar-brand ms-3" style="font-size: 40px; margin-right: 30px;">
                    <i class="fa-solid fa-face-smile text-primary"></i>
                </a>

                <div class="navbar-nav">
                    <a href="{{ url('dashboard') }}" class="nav-item nav-link text-center border-top">
                        <i class="bi bi-grid"></i>
                        <p class="pt-1 mb-0">Dashboard</p>
                    </a>
                    <div id="navbar-toggler" class="nav-item nav-link text-center">
                        <i class="bi bi-box-seam"></i>
                        <p class="pt-1 mb-0">Products</p>
                    </div>
                    <div id="navbar-toggler2" class="nav-item nav-link text-center">
                        <i class="bi bi-cart"></i>
                        <p class="pt-1 mb-0">Sales</p>
                    </div>
                    <div id="navbar-toggler3" class="nav-item nav-link text-center">
                        <i class="bi bi-file-earmark-text"></i>
                        <p class="pt-1 mb-0">Purchase</p>
                    </div>
                    <div id="navbar-toggler4" class="nav-item nav-link text-center">
                        <i class="bi bi-bag"></i>
                        <p class="pt-1 mb-0">Inventory</p>
                    </div>
                    <div id="navbar-toggler5" class="nav-item nav-link text-center">
                        <i class="bi bi-arrow-90deg-left"></i>
                        <p class="pt-1 mb-0">Transfer</p>
                    </div>
                    <div id="navbar-toggler6" class="nav-item nav-link text-center">
                        <i class="fa-solid fa-wallet"></i>
                        <p class="pt-1 mb-0">Accounting</p>
                    </div>
                    <div id="navbar-toggler7" class="nav-item nav-link text-center">
                        <i class="bi bi-person"></i>
                        <p class="pt-1 mb-0">Customer</p>
                    </div>
                    <div id="navbar-toggler8" class="nav-item nav-link text-center">
                        <i class="bi bi-house"></i>
                        <p class="pt-1 mb-0">Vendors</p>
                    </div>
                    <div id="navbar-toggler9" class="nav-item nav-link text-center">
                        <i class="bi bi-clipboard-data"></i>
                        <p class="pt-1 mb-0">Report</p>
                    </div>
                    <a href="shipment.html" class="nav-item nav-link text-center">
                        <i class="bi bi-clipboard-data"></i>
                        <p class="pt-1 mb-0">Shipment</p>
                    </a>
                    <a href="customermanagement.html" class="nav-item nav-link text-center">
                        <i class="bi bi-clipboard-data"></i>
                        <p class="pt-1 mb-0">Add Module</p>
                    </a>
                    <div id="navbar-toggler10" class="nav-item nav-link text-center">
                        <i class="bi bi-gear"></i>
                        <p class="pt-1 mb-0">Setting</p>
                    </div>
                </div>
            </nav>
        </div>

        <div class="positon-relative sidebar-ul">
            <div id="product" style="display: none">
                <ul class="list-unstyled m-0 px-4 rounded-5">
                    <li>
                        <a href="product.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />All Product</a>
                    </li>
                    <li class="mb-2">
                        <a href="createproduct.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Create Product</a>
                    </li>
                    <li class="mb-2">
                        <a href="printlable.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Print Label</a>
                    </li>
                    <li class="mb-2">
                        <a href="category.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Category</a>
                    </li>
                    <li class="mb-2">
                        <a href="brand.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Brand</a>
                    </li>
                    <li class="mb-2">
                        <a href="unit.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Unit</a>
                    </li>
                </ul>
            </div>
            <div id="sale" style="display: none">
                <ul class="list-unstyled m-0 py-3 px-4 rounded-5">
                    <li class="mb-2">
                        <a href="sale.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />All Sale</a>
                    </li>
                    <li class="mb-2">
                        <a href="createsale.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Create Sale</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Create Sale
                            Order</a>
                    </li>
                    <li class="mb-2">
                        <a href="pos.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />POS</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Create Sale
                            Return</a>
                    </li>
                </ul>
            </div>
            <div id="purchase" style="display: none">
                <ul class="list-unstyled m-0 py-3 px-4 rounded-5">
                    <li class="mb-2">
                        <a href="purchase.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />All Purchase</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Create
                            Purchase</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Create Purchase
                            Order</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Create Purchase
                            Return</a>
                    </li>
                </ul>
            </div>
            <div id="inventory" style="display: none">
                <ul class="list-unstyled m-0 py-3 px-4 rounded-5">
                    <li class="mb-2">
                        <a href="inventory.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />All Inventory</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Recieve
                            Inventory</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Create Bill</a>
                    </li>
                </ul>
            </div>
            <div id="transfer" style="display: none">
                <ul class="list-unstyled m-0 py-3 px-4 rounded-5">
                    <li class="mb-2">
                        <a href="alltransfer.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />All Transfer</a>
                    </li>
                    <li class="mb-2">
                        <a href="createtransfer.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Create
                            Transfer</a>
                    </li>
                </ul>
            </div>
            <div id="accounting" style="display: none">
                <ul class="list-unstyled m-0 py-3 px-4 rounded-5">
                    <li class="mb-2">
                        <a href="listaccount.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />List Accounts</a>
                    </li>
                    <li class="mb-2">
                        <a href="transfermoney.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Transfer
                            Money</a>
                    </li>
                    <li class="mb-2">
                        <a href="createexpense.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Create
                            Expense</a>
                    </li>
                    <li class="mb-2">
                        <a href="allexpense.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />All Expense</a>
                    </li>
                    <li class="mb-2">
                        <a href="createdeposit.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Create
                            Deposit</a>
                    </li>
                    <li class="mb-2">
                        <a href="listdeposit.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />List Deposit</a>
                    </li>
                    <li class="mb-2">
                        <a href="expensecategory.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Expense
                            Category</a>
                    </li>
                    <li class="mb-2">
                        <a href="depositcategory.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Deposit
                            Category</a>
                    </li>
                </ul>
            </div>
            <div id="customer" style="display: none">
                <ul class="list-unstyled m-0 py-3 px-4 rounded-5">
                    <li class="mb-2">
                        <a href="customer.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />All Customer</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Create
                            Customer</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Blacklist
                            Customer</a>
                    </li>
                </ul>
            </div>
            <div id="vendor" style="display: none">
                <ul class="list-unstyled m-0 py-3 px-4 rounded-5">
                    <li class="mb-2">
                        <a href="vendor.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />All Vendor</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Create Vendors
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Blacklist
                            Vendors</a>
                    </li>
                </ul>
            </div>
            <div id="report" style="display: none">
                <ul class="list-unstyled m-0 py-3 px-4 rounded-5">
                    <li class="mb-2">
                        <a href="report.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />All Report</a>
                    </li>
                    <li class="mb-2">
                        <a href="warehousereport.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Warehouse
                            Report</a>
                    </li>
                </ul>
            </div>
            <div id="setting" style="display: none">
                <ul class="list-unstyled m-0 py-3 px-4 rounded-5">
                    <li class="mb-2">
                        <a href="setting.html" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />System
                            Setting</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />User
                            Permission</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />SMS Setting</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Email Setting</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />POS Setting</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Payment
                            Setting</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none nav-item nav-link"><img
                                src="{{ url('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Tax Setting</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand border-bottom bg-white navbar-light sticky-top px-4 py-0"
                style="height: 80px">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0">LOGO</h2>
                </a>
                <a href="#"
                    class="sidebar-toggler text-decoration-none flex-shrink-0 align-items-center d-inline-flex">
                    <i class="fa fa-bars"></i>
                </a>
               
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link" data-bs-toggle="dropdown">
                            <i class="fa fa-bell align-items-center d-inline-flex"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider" />
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider" />
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider" />
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="{{ asset('assets/img/afaq.jpg') }}" alt=""
                                style="width: 40px; height: 40px" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{ url('profile') }}" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="{{ url('logout') }}" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <div class="container-fluid px-4">
                <div class="row mb-5">
                    <div class="border-bottom my-4">
                        <h3 class="all-adjustment text-center pb-2 mb-0">Profile</h3>
                    </div>
                    <div class="col-md-3 mb-2">
                        <div class="card border-0 rounded-3 card-shadow h-100">
                            <div class="card-body h-100">
                                <div class="tab">
                                    <button class="tablinks d-flex justify-content-between" id="defaultOpen"
                                        onclick="openCity(event, 'Personal-Info')">
                                        Profile Info
                                        <img src="{{ asset('assets/img/profile-info.svg') }}" alt="" />
                                    </button>
                                    <button class="tablinks d-flex justify-content-between mt-2"
                                        onclick="openCity(event, 'Change-password')">
                                        Change Password
                                        <img src="{{ asset('assets/img/change-password.svg') }}" alt="" />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div id="Personal-Info" class="tabcontent">
                            <div class="card rounded-3 border-0 card-shadow h-100">
                                <div class="card-body">
                                    <div class="row personal-info-row">
                                        <div class="col-md-6 col-xxl-3">
                                            <img src="{{ asset('assets/img/afaq.jpg') }}"
                                                class="img-fluid rounded-circle w-100 change-picture-btn profile-img"
                                                alt="" />
                                        </div>
                                        <div class="col-md-5 py-4">
                                            <h4 class="mb-3 all-adjustment w-100 border-0">
                                                {{ $user->name ?? ''}}
                                            </h4>
                                            <p class="mb-1">{{ $user->name }} </p>
                                            <p class="mb-1">{{ $user->phone_number ?? ''}}</p>
                                            <p class="mb-0">{{ $user->email ?? ''}}</p>
                                        
                                        </div>
                                        <div class="col-md-4 text-end">
                                            <!-- <button class="btn create-btn">
                          Change Profile Picture
                        </button>
                        <p class="text-danger mt-2" style="cursor: pointer">
                          Remove Profile Picture
                        </p> -->
                                            <input type="file" class="fileInput" style="display: none" />
                                            <button class="change-picture-btn btn create-btn">
                                                Change Profile Picture
                                            </button>
                                            <p class="remove-picture text-danger mt-2" style="cursor: pointer">
                                                Remove Profile Picture
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded-3 border-0 card-shadow h-100 p-3 mt-4">
                                <div class="card-body h-100">
                                    <h4 class="all-adjustment border-0 m-0">Personal Info</h4>
                                    <p>Provide your personal info</p>
                                    <form action="{{ route('update.profile', $user->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group fw-bold">
                                                <label for="exampleFormControlSelect1">Name
                                                    <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="name" value="{{ $user->name ?? '' }}" placeholder="Name"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group fw-bold">
                                                <label for="exampleFormControlSelect1">Email<span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email" required />
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group fw-bold">
                                                <label for="exampleFormControlSelect1">Email<span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email" required />
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>

                            <div class="card rounded-3 border-0 card-shadow h-100 p-3 mt-4">
                                <div class="card-body h-100">
                                    <h4 class="all-adjustment border-0 m-0">Contact Info</h4>
                                    <p>Provide your Contact info</p>
                                    <div class="row">
                                        {{-- <div class="col-md-6">
                                            <div class="form-group fw-bold">
                                                <label for="exampleFormControlSelect1">Image<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control subheading mt-2"
                                                    placeholder="MonaLissa@mail.com" id="exampleFormControlInput1" />
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6">
                                            <div class="form-group fw-bold">
                                                <label for="exampleFormControlSelect1">Phone No <span
                                                        class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" name="phone_number" value="{{ $user->phone_number }}"
                                                        placeholder="Phone" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn save-btn text-white mt-3">Profile Update</button>
                        </div>
                    </form>


                        <div id="Change-password" class="tabcontent">
                            <div class="card rounded-3 border-0 card-shadow h-100">
                                <div class="card-body">
                                    <div class="row personal-info-row">
                                        <div class="col-md-3 col-xxl-2">
                                            <img src="{{ asset('assets/img/afaq.jpg') }}"
                                                class="img-fluid rounded-circle w-100 change-picture-btn profile-img"
                                                alt="" />
                                        </div>
                                        <div class="col-md-5 py-4">
                                            <h4 class="mb-3 all-adjustment border-0 w-100">
                                                {{ $user->name }}
                                            </h4>
                                            <p class="mb-1">{{ $user->name }}</p>
                                            <p class="mb-1">{{ $user->phone_number }}</p>
                                            <p class="mb-0">{{ $user->email }}</p>
                                        </div>
                                        <div class="col-md-4 text-end">
                                            <!-- <button class="btn create-btn">
                          Change Profile Picture
                        </button>
                        <p class="text-danger mt-2" style="cursor: pointer">
                          Remove Profile Picture
                        </p> -->
                                            <input type="file" class="fileInput" style="display: none" />
                                            <button class="change-picture-btn btn create-btn">
                                                Change Profile Picture
                                            </button>
                                            <p class="remove-picture text-danger mt-2" style="cursor: pointer">
                                                Remove Profile Picture
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card rounded-3 border-0 card-shadow h-100 p-3 mt-4">
                                <div class="card-body h-100">
                                    <h4 class="all-adjustment border-0 m-0 w-100">
                                        Change Password
                                    </h4>
                                    <p>Update your password for enhanced security</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group fw-bold">
                                                <label for="exampleFormControlSelect1">Current Password</label>
                                                <div class="password-container">
                                                    <input type="password" class="form-control subheading"
                                                        placeholder="********" />
                                                    <img src="{{ asset('assets/img/profile-changed-password.svg') }}"
                                                        class="password-toggle pe-2"
                                                        onclick="togglePasswordVisibility(this)" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group fw-bold">
                                                <label for="exampleFormControlSelect1">New Password</label>
                                                <div class="password-container">
                                                    <input type="password" class="form-control subheading"
                                                        placeholder="********" />
                                                    <img src="assets/img/profile-changed-password.svg"
                                                        class="password-toggle pe-2"
                                                        onclick="togglePasswordVisibility(this)" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group fw-bold">
                                                <label for="exampleFormControlSelect1">Retype New Password</label>
                                                <div class="password-container">
                                                    <input type="password" class="form-control subheading"
                                                        placeholder="********" />
                                                    <img src="assets/img/profile-changed-password.svg"
                                                        class="password-toggle pe-2"
                                                        onclick="togglePasswordVisibility(this)" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn save-btn text-white mt-3">Update</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4 mb-5 main-footer">
                <div class="bg-footer rounded-top-5 p-3">
                    <p class="fw-bold">Skill Lab - Management System</p>
                    <div class="row">
                        <div class="col-md-6 align-items-center align-middle">
                            <div class="d-flex align-items-center">
                                <img src="dasheets/img/itsol.png" class="img-fluid" alt="" />
                                <div class="ms-2">
                                    <p class="m-0">© 2024 Developed by Afaq Tahir</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="https://www.linkedin.com/in/afaq-tahir0687" target="_blank">
                                <img src="{{ asset('assets/img/footer-linkedin.svg') }}" alt="LinkedIn Profile">
                            </a>
                            <a href="#" class="text-decoration-none"><img
                                    src="{{ asset('assets/img/footer-facebook.svg') }}" class="img-fluid me-2"
                                    alt="facebook" /></a>
                        </div>
                    </div>
                </div>
              </div>
        </div>
        <!-- Recent Sales End -->
    </div>
    <!-- Content End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>

    <script>
        function togglePasswordVisibility(toggleBtn) {
            var passwordInput = toggleBtn.previousElementSibling;
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
    <script>
        // JavaScript to handle image upload and remove picture for multiple profiles
        var changePictureButtons = document.querySelectorAll(
            ".change-picture-btn"
        );
        var removePictureButtons = document.querySelectorAll(".remove-picture");
        var fileInputs = document.querySelectorAll(".fileInput");
        var profileImages = document.querySelectorAll(".profile-img");

        // Event listener for change picture buttons
        changePictureButtons.forEach(function(button, index) {
            button.addEventListener("click", function() {
                fileInputs[index].click();
            });
        });

        // Event listener for file inputs
        fileInputs.forEach(function(fileInput, index) {
            fileInput.addEventListener("change", function() {
                var file = this.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        profileImages[index].src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        });

        // Event listener for remove picture buttons
        removePictureButtons.forEach(function(removeButton, index) {
            removeButton.addEventListener("click", function() {
                profileImages[index].src =
                "assets/img/profile-img.png"; // Replace with default image source
            });
        });
    </script>

    <!-- <script>
        // JavaScript to handle image upload
        document
            .getElementById("change-picture-btn")
            .addEventListener("click", function() {
                document.getElementById("fileInput").click();
            });

        document
            .getElementById("fileInput")
            .addEventListener("change", function() {
                var file = this.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById("profile-img").src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });

        // JavaScript to handle remove picture
        document
            .getElementById("remove-picture")
            .addEventListener("click", function() {
                document.getElementById("profile-img").src =
                    "assets/img/profile-img.png"; // Replace with default image source
            });
    </script> -->
</body>

</html>
