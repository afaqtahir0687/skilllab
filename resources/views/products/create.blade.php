@extends('layout.master')
@section('content')

    <div class="container-fluid py-5 px-4">
        <div class="border-bottom">
            <h3 class="all-adjustment text-center pb-2 mb-0">Create Product</h3>
        </div>
        <div class="row mt-4">
            <div class="col-md-8">
                <div class="card rounded-3 border-0 card-shadow">
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group fw-bold">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control subheading mt-2" name="name" placeholder="Name"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group fw-bold">
                                    <label for="brand_id">Brand</label>
                                    <select class="form-control form-select subheading mt-1" name="brand_id" required>
                                        <option value="">Select Brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group fw-bold">
                                    <label for="category_id">Category <span class="text-danger">*</span></label>
                                    <select class="form-control form-select subheading mt-2" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group fw-bold">
                                    <label for="sub_category_id">Sub Category <span class="text-danger">*</span></label>
                                    <select class="form-control form-select subheading mt-2" name="sub_category_id" required>
                                        <option value="">Select Sub Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->sub_category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group fw-bold">
                                    <label for="description">Product Description</label>
                                    <textarea placeholder="Products Description" class="form-control subheading" name="description" rows="5" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card rounded-3 mt-4 border-0 card-shadow">
                    <div class="card-body">
                        <div class="row fw-bold mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Product Price<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control subheading mt-2" name="price" placeholder="Price" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="currency">Product Currency<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control subheading mt-2" name="currency" placeholder="Currency"/>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="card rounded-3 mt-4 border-0 card-shadow">
                    <div class="card-body">
                        
                        <div class="row fw-bold mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="quantity">Product Quantity
                                        <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control subheading mt-2" name="quantity" placeholder="Quantity"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="barcode">Product Code</label>
                                <div class="input-group mt-1 subheading">
                                    <input type="number" class="form-control subheading" name="barcode" placeholder="Barcode" id="productCode1" />
                                    <span class="input-group-text subheading" id="basic-addon2"><i class="bi bi-upc-scan"></i></span>
                                </div>
                                <p>Scan the barcode or symbology</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card rounded-3 mt-4 border-0 card-shadow">
                    <div class="card-body">
                        
                        <div class="row fw-bold mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">Production Date<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control subheading mt-2" name="date" placeholder="Date"/>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <label for="status">Status</label>
                                <div class="input-group mt-1 subheading">
                                    <input type="status" class="form-control subheading" name="status" placeholder="Status" id="Status" />
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 rounded-3 card-shadow">
                    <div class="card-header bg-white p-3">
                        <p class="m-0 fw-bold">Product Images</p>
                    </div>
                    <div class="card-body">
                        <div class="file-upload">
                            <input class="file-input" type="file" name="image" multiple />
                            <img src="{{ asset('assets/img/upload-btn.svg') }}" class="img-fluid" alt="" />
                            <div class="mt-2 subheading">
                                Drag and Drop to upload or
                            </div>
                            <button class="btn create-btn mt-2">Select Image</button>
                        </div>
                    </div>
                </div>

                <div class="card rounded-3 border-0 mt-3 card-shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-1">
                                <label for="myCheckbox09" class="checkbox d-flex mt-1">
                                    <input class="checkbox__input" type="checkbox" id="IMEI" />
                                    <svg class="checkbox__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                        <rect width="21" height="21" x=".5" y=".5" fill="#FFF" stroke="rgba(76, 73, 227, 1)" rx="3" />
                                        <path class="tick" stroke="rgba(76, 73, 227, 1)" fill="none" stroke-linecap="round"
                                            stroke-width="3" d="M4 10l5 5 9-9" />
                                    </svg>
                                </label>
                            </div>
                            <div class="col-10">
                                <label for="IMEI">This Item has IMEI number</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <label for="myCheckbox09" class="checkbox d-flex mt-1">
                                    <input class="checkbox__input" type="checkbox" id="IMEI" />
                                    <svg class="checkbox__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                        <rect width="21" height="21" x=".5" y=".5" fill="#FFF" stroke="rgba(76, 73, 227, 1)"
                                            rx="3" />
                                        <path class="tick" stroke="rgba(76, 73, 227, 1)" fill="none" stroke-linecap="round"
                                            stroke-width="3" d="M4 10l5 5 9-9" />
                                    </svg>
                                </label>
                            </div>
                            <div class="col-10">
                                <label for="IMEI">This Product is Live</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card rounded-3 border-0 mt-3 card-shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-1">
                                <label for="myCheckbox09" class="checkbox d-flex mt-1">
                                    <input class="checkbox__input" type="checkbox" id="IMEI" />
                                    <svg class="checkbox__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                        <rect width="21" height="21" x=".5" y=".5" fill="#FFF" stroke="rgba(76, 73, 227, 1)"
                                            rx="3" />
                                        <path class="tick" stroke="rgba(76, 73, 227, 1)" fill="none" stroke-linecap="round"
                                            stroke-width="3" d="M4 10l5 5 9-9" />
                                    </svg>
                                </label>
                            </div>
                            <div class="col-10">
                                <label for="IMEI">Add to New product</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-1">
                                <label for="myCheckbox09" class="checkbox d-flex mt-1">
                                    <input class="checkbox__input" type="checkbox" id="IMEI" />
                                    <svg class="checkbox__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                        <rect width="21" height="21" x=".5" y=".5" fill="#FFF" stroke="rgba(76, 73, 227, 1)"
                                            rx="3" />
                                        <path class="tick" stroke="rgba(76, 73, 227, 1)" fill="none" stroke-linecap="round"
                                            stroke-width="3" d="M4 10l5 5 9-9" />
                                    </svg>
                                </label>
                            </div>
                            <div class="col-10">
                                <label for="IMEI">Add to featured product</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-1">
                                <label for="myCheckbox09" class="checkbox d-flex mt-1">
                                    <input class="checkbox__input" type="checkbox" id="IMEI" />
                                    <svg class="checkbox__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                        <rect width="21" height="21" x=".5" y=".5" fill="#FFF" stroke="rgba(76, 73, 227, 1)"
                                            rx="3" />
                                        <path class="tick" stroke="rgba(76, 73, 227, 1)" fill="none" stroke-linecap="round"
                                            stroke-width="3" d="M4 10l5 5 9-9" />
                                    </svg>
                                </label>
                            </div>
                            <div class="col-10">
                                <label for="IMEI">Add to Best Seller</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-1">
                                <label for="myCheckbox09" class="checkbox d-flex mt-1">
                                    <input class="checkbox__input" type="checkbox" id="IMEI" />
                                    <svg class="checkbox__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                        <rect width="21" height="21" x=".5" y=".5" fill="#FFF" stroke="rgba(76, 73, 227, 1)"
                                            rx="3" />
                                        <path class="tick" stroke="rgba(76, 73, 227, 1)" fill="none" stroke-linecap="round"
                                            stroke-width="3" d="M4 10l5 5 9-9" />
                                    </svg>
                                </label>
                            </div>
                            <div class="col-10">
                                <label for="IMEI">Add to Recommended</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card rounded-3 border-0 mt-3 p-2 card-shadow">
                    <div class="card-header rounded-3 bg-white border-0 m-0">
                        <p class="m-0">Registered Barcode(s)</p>
                    </div>
                    <div class="card-body p-0 ps-3 m-0">
                        <p class="m-0">1</p>
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <button type="submit" class="btn save-btn text-white mt-3">Submit</button>
            </div>
        </form>  
        </div>
    
    </div>
@endsection