@extends('layout.master')
@section('content')

    <div class="content">
        <div class="container-fluid pt-4 px-4 mb-5">
            <div class="border-bottom">
                <h3 class="all-adjustment text-center pb-2 mb-0">Brand</h3>
            </div>
            <div class="card card-shadow border-0 mt-4 rounded-3">
                <div class="card-header bg-white border-0 rounded-3">
                    <div class="row my-3">
                        <div class="col-md-4 col-12">
                            <div class="input-search position-relative">
                                <input type="text" placeholder="Search Table" id="search-input" class="form-control rounded-3 subheading" />
                                <span class="fa fa-search search-icon text-secondary"></span>
                            </div>
                        </div>

                        <div class="col-md-6 col-12 text-center">
                            @if (\Session::has('success'))
                                <div class="alert alert-success" id="success-alert">
                                    <ul>
                                        <li>{!! \Session::get('success') !!}</li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-2 col-12 text-end">
                            <button class="btn create-btn rounded-3 mt-2" data-bs-target="#add_brand_Modal"
                                data-bs-toggle="modal">Create <i class="bi bi-plus-lg"></i></button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive p-2">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th class="align-middle">
                                    <label for="myCheckbox09" class="checkbox">
                                        <input class="checkbox__input" type="checkbox" id="myCheckbox09" />
                                        <svg class="checkbox__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                            <rect width="21" height="21" x=".5" y=".5" fill="#FFF"
                                                stroke="rgba(76, 73, 227, 1)" rx="3" />
                                            <path class="tick" stroke="rgba(76, 73, 227, 1)" fill="none"
                                                stroke-linecap="round" stroke-width="3" d="M4 10l5 5 9-9" />
                                        </svg>
                                    </label>
                                </th>
                                <th class="align-middle">Brand Image</th>
                                <th class="align-middle">Brand Name</th>
                                <th class="align-middle">Brand Description</th>
                                <th class="align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                            <tr>
                                <td class="align-middle">
                                    <label for="myCheckbox09" class="checkbox">
                                        <input class="checkbox__input" type="checkbox" id="myCheckbox09" />
                                        <svg class="checkbox__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                            <rect width="21" height="21" x=".5" y=".5" fill="#FFF"
                                                stroke="rgba(76, 73, 227, 1)" rx="3" />
                                            <path class="tick" stroke="rgba(76, 73, 227, 1)" fill="none"
                                                stroke-linecap="round" stroke-width="3" d="M4 10l5 5 9-9" />
                                        </svg>
                                    </label>
                                </td>
                                <td class="align-middle">
                                    @if($brand->image && Storage::exists('public/' . $brand->image))
                                    <img src="{{ asset('storage/' . $brand->image) }}" alt="Brand Image"
                                        style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;" />
                                    @else
                                    <img src="{{ asset('storage/default-image.jpg') }}" alt="Default Image"
                                        style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;" />
                                    @endif
                                </td>
                                <td class="align-middle">{{ $brand->name ?? '' }}</td>
                                <td class="align-middle">{{ $brand->description ?? '' }}</td>
                                <td class="align-middle">
                                    <div class="d-flex gap-1 justify-content-start">
                                        <a href="#" data-bs-target="#edit_brand_Modal" data-bs-toggle="modal"
                                            onclick="editBrand({{ $brand->id }})" data-brand="{{ $brand->id }}">
                                            <img src="{{ asset('assets/img/edit-2.svg') }}" class="btn p-0 me-2 ms-0"
                                                alt="" /></a>
                                            <img src="{{ asset('assets/img/plus-circle.svg') }}" class="btn p-0 m-0"  data-bs-toggle="modal" data-bs-target="#delete_brand_Modal" onclick="setDeleteId('{{ $brand->id }}')" alt=""/>
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
    <!-- Recent Sales End -->
    <!-- STart Added Brand Modal -->
      <div class="modal fade" id="add_brand_Modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h3 class="all-adjustment text-center pb-2 mb-0" style="width: 50%">Create Brand</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="mb-1">Brand Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control subheading" name="name" placeholder="Name" required />
                        </div>

                        <div class="form-group mt-2">
                            <label for="description" class="mb-1">Brand Description</label>
                            <textarea placeholder="Brand Description" class="form-control subheading" name="description"
                                rows="3" required></textarea>
                        </div>

                        <div class="form-group mt-2">
                            <label for="image" class="mb-1">Brand Image</label>
                            <input type="file" class="form-control subheading" name="image" />
                        </div>
                        <button type="submit" class="btn save-btn text-white mt-4">Done</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Added Brand Modal -->

    <!-- STart Edit Brand Modal -->
    <div class="modal fade" id="edit_brand_Modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h3 class="all-adjustment text-center pb-2 mb-0" style="width: 50%">Edit Brand</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if(isset($brand))
                        <form action="{{ route('brands.update', $brand->id) }}" id="edit_brand_form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="mb-1">Brand Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control subheading" name="name" value="{{ $brand->name ?? '' }}"
                                    placeholder="Name" required />
                            </div>
                            <div class="form-group mt-2">
                                <label for="description" class="mb-1">Brand Description</label>
                                <textarea placeholder="Brand Description" class="form-control subheading" name="description"
                                    value="{{ $brand->description ?? '' }}" rows="3" required></textarea>
                            </div>

                            <div class="form-group mt-2">
                                <label for="image" class="mb-1">Brand Image</label>
                                <input type="file" class="form-control subheading" name="image" />
                                <!-- Display current image -->
                                @if($brand->image && Storage::exists('public/' . $brand->image))
                                <img src="{{ asset('storage/' . $brand->image) }}" alt="Current Image"
                                    class="mt-2 current-image"
                                    style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;" />
                                @else
                                <img src="{{ asset('storage/default-image.jpg') }}" alt="Default Image"
                                    class="mt-2 current-image"
                                    style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;" />
                                @endif
                            </div>
                            <button type="submit" class="btn save-btn text-white mt-4">Done</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- End Edit Brand Modal -->

    <!-- STart Delete Brand Modal -->
    <div class="modal fade" id="delete_brand_Modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
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
                <input type="hidden" name="id" id="brandId" value="">
                <button type="submit" class="btn delete-btn text-white">Delete</button>
                <button class="btn save-btn text-white" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    <!-- End Delete Brand Modal -->

    <!-- STart Edit Brand Script -->
    <script>
        function editBrand(id) {
            $.ajax({
            type: "GET",
            url: "{{ route('brands.edit', ['id' => '__id__']) }}".replace('__id__', id),
                success: function(data) {
                    $('#edit_brand_Modal input[name="name"]').val(data.name);
                    $('#edit_brand_Modal textarea[name="description"]').text(data.description);
                    if (data.image) {
                        $('#edit_brand_Modal .current-image').attr('src', "{{ asset('storage/') }}/" + data.image).show();
                    } else {
                        $('#edit_brand_Modal .current-image').attr('src', "{{ asset('storage/default-image.jpg') }}").show();
                    }
                }
            });
        }
    </script>
    <!-- End Edit Brand Script -->

    <!-- STart Updated Brand Script -->
    <script>
        function editBrand(id) {
            var updateRoute = "{{ route('brands.update', ':id') }}";
            $.ajax({
                type: "GET",
                url: "{{ route('brands.edit', ['id' => '__id__']) }}".replace('__id__', id),
                success: function(data) {
                    $('#edit_brand_Modal input[name="name"]').val(data.name);
                    $('#edit_brand_Modal textarea[name="description"]').text(data.description);
                    if (data.image) {
                        $('#edit_brand_Modal .current-image').attr('src', "{{ asset('storage/') }}/" + data.image).show();
                    } else {
                        $('#edit_brand_Modal .current-image').attr('src', "{{ asset('storage/default-image.jpg') }}").show();
                    }
                    $('#edit_brand_form').attr('action', updateRoute.replace(':id', id));
                }
            });
        }
    </script>
    <!-- End Updated Brand Script -->

    <!-- STart Deleted Brand Script -->

    <script>
        function setDeleteId(id) {
            document.getElementById('brandId').value = id;
            document.getElementById('deleteForm').action = '{{ route('brands.destroy', '') }}/' + id;
        }
    </script>

    <script>
        $('#deleteForm .save-btn').on('click', function(event) {
        event.preventDefault();
        $('#deleteForm').find('input[name="id"]').val('');
    });
    </script>

    <!-- End Updated Brand Script -->

    <!-- STart Success Message Script -->
    <script>
        window.setTimeout(function() {
            $("#success-alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 2000);
    </script>
    <!-- End Success Message Script -->

    <!-- STart Filter Brand Script -->
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
  <!-- End Filter Brand Script -->
@endsection