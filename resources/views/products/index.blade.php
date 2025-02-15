@extends('layout.master')
@section('content')

    <div class="content">
        <div class="container-fluid pt-4 px-4 mb-5">
            <div class="border-bottom">
                <h3 class="all-adjustment text-center pb-2 mb-0">All Products</h3>
            </div>

            <div class="card border-0 card-shadow rounded-3 p-2 mt-4">
                <div class="card-header border-0 bg-white">
                    <div class="row my-3">
                        <div class="col-md-3 col-12 mt-2">
                            <div class="input-search position-relative">
                                <input type="text" placeholder="Search Table" id="search-input" class="form-control rounded-3 subheading" />
                                <span class="fa fa-search search-icon text-secondary"></spanclass=>
                            </div>
                        </div>

                        <div class="col-md-9 col-12 text-end">
                            <a href="#" class="btn create-btn rounded-3 mt-2">Filter <i class="bi bi-funnel"></i></a>
                            <a href="#" class="btn rounded-3 mt-2 excel-btn">Excel <i
                                    class="bi bi-file-earmark-text"></i></a>
                            <a href="#" class="btn pdf rounded-3 mt-2">Pdf <i class="bi bi-file-earmark"></i></a>
                            <a href="{{ route('products.create') }}" class="btn create-btn rounded-3 mt-2">Create <i
                         
                                class="bi bi-plus-lg"></i></a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table text-center" id="table">
                        <thead>
                            <tr>
                                <th class="text-secondary">
                                    <input class="form-check-input fs-5" type="checkbox" />
                                </th>
                                <th class="text-secondary">Image</th>
                                <th class="text-secondary">Date</th>
                                <th class="text-secondary">Product Name</th>
                                <th class="text-secondary">Brand Name</th>
                                <th class="text-secondary">Category Name</th>
                                <th class="text-secondary">Sub Category Name</th>
                                <th class="text-secondary">Description</th>
                                <th class="text-secondary">Currency</th>
                                <th class="text-secondary">Price</th>
                                <th class="text-secondary">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td class="align-middle">
                                    <input class="form-check-input fs-5" type="checkbox" />
                                </td>
                                <td class="align-middle">
                                    @if($product->image && Storage::exists('public/' . $product->image))
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="product Image"
                                        style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;" />
                                    @else
                                    <img src="{{ asset('storage/default-image.jpg') }}" alt="Default Image"
                                        style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;" />
                                    @endif
                                </td>
                                <td class="align-middle">{{ $product->production_date }}</td>
                                <td class="align-middle">{{ $product->name }}</td>
                                <td class="align-middle">{{ $product->brand->name }}</td>
                                <td class="align-middle">{{ $product->category->category }}</td>
                                <td class="align-middle">{{ $product->category->sub_category }}</td>
                                <td class="align-middle">{{ $product->description }}</td>
                                <td class="align-middle">{{ $product->currency }}</td>
                                <td class="align-middle">{{ $product->price }}</td>
                                <td>
                                    <div>
                                        <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-v"></i>
                                        </a>
                
                                        <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('products.show', $product->id) }}">
                                            <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-1" alt=""/>
                                            Product Detail
                                        </a>
                                        <a class="dropdown-item" href="{{ route('pay', $product->id) }}">
                                            <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-1" alt=""/>
                                            Edit Payment
                                        </a>
                                        <a class="dropdown-item" href="{{ route('products.edit', $product->id) }}">
                                            <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-1" alt=""/>
                                            Edit Product
                                        </a>
                                        <a class="dropdown-item" href="createproduct.html">
                                            <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-1" alt=""/>
                                            Download PDF
                                        </a>
                                        <a class="dropdown-item" href="createproduct.html">
                                            <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-1" alt=""/>
                                            Email Notification
                                        </a>
                                        <a class="dropdown-item" href="createproduct.html">
                                            <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-1" alt=""/>
                                            SMS Notification
                                        </a>
                                        <a class="dropdown-item confirm-text" href="#" data-bs-toggle="modal" data-bs-target="#deleteProductsModal" onclick="setDeleteId({{$product->id}})">
                                            <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-1" alt=""/>
                                            Delete Quotation
                                        </a>
                                       
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- STart Delete Products Modal -->
    <div class="modal fade" id="deleteProductsModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-4">
            <h3 class="all-adjustment border-0 text-center pb-2 mb-0 w-100">
                <b>Are you sure to delete this row? </b>
            </h3>
            <p class="subheading">
                You would not be able to revert these changes once deleted
            </p>
            <form id="deleteForm" method="POST" action="">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" id="productId" value="">
                <button type="submit" class="btn delete-btn text-white">Delete</button>
                <button class="btn save-btn text-white" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    <!-- End Delete Products Modal -->

    <!-- STart Delete Script -->
    <script>
    function setDeleteId(id) {
            document.getElementById('productId').value = id;
            document.getElementById('deleteForm').action = '{{ route('products.destroy', '') }}/' + id;
        }
    </script>
    <script>
        $('#deleteForm .save-btn').on('click', function(event) {
        event.preventDefault();
        $('#deleteForm').find('input[name="id"]').val('');
    });
    </script>
    <!-- End Delete Script -->

    <!-- STart Filter Products Script -->
  <script>
    $(document).ready(function() {
      $('#search-input').on('keyup', function() {
          var value = $(this).val().toLowerCase();
          $('#table tr').show().filter(function() {
              var rowText = $(this).text().toLowerCase();
              return !rowText.includes(value);
          }).hide();
      });
    });
  </script>
  <!-- STart Filter Products Script -->
@endsection