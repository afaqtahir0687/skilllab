@extends('layout.master')
@section('content')
  <div class="content">
    <div class="container-fluid pt-4 px-4 mb-5">
      <div class="border-bottom">
        <h3 class="all-adjustment text-center pb-2 mb-0">All Category</h3>
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
              <button class="btn create-btn rounded-3 mt-2" data-bs-target="#add_category_Modal" data-bs-toggle="modal">Create <i class="bi bi-plus-lg"></i></button>
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
                      <rect width="21" height="21" x=".5" y=".5" fill="#FFF" stroke="rgba(76, 73, 227, 1)" rx="3" />
                      <path class="tick" stroke="rgba(76, 73, 227, 1)" fill="none" stroke-linecap="round" stroke-width="3"
                        d="M4 10l5 5 9-9" />
                    </svg>
                  </label>
                </th>
                <th class="align-middle">Category</th>
                <th class="align-middle">Sub Category</th>
                <th class="align-middle">Category Code</th>
                <th class="align-middle">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
                <tr>
                  <td class="align-middle">
                    <label for="myCheckbox09" class="checkbox">
                      <input class="checkbox__input" type="checkbox" id="myCheckbox09"/>
                        <svg class="checkbox__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                          <rect width="21" height="21" x=".5" y=".5" fill="#FFF" stroke="rgba(76, 73, 227, 1)" rx="3"/>
                          <path class="tick" stroke="rgba(76, 73, 227, 1)" fill="none" stroke-linecap="round" stroke-width="3" d="M4 10l5 5 9-9"/>
                        </svg>
                    </label>
                  </td>
                    <td class="align-middle">{{ $category->category }}</td>
                        <td class="align-middle">{{ $category->sub_category }}</td>
                        <td class="align-middle">{{ $category->category_code }}</td>
                        <td class="align-middle">
                          <div class="d-flex gap-1 justify-content-start">
                            <a href="#" data-bs-target="#edit_category_Modal" data-bs-toggle="modal" onclick="editCategory({{ $category->id }})" data-category="{{ $category->id }}">
                              <img src="{{ asset('assets/img/edit-2.svg') }}" class="btn p-0 me-2 ms-0" alt=""/></a>
                              <img src="{{ asset('assets/img/plus-circle.svg') }}" class="btn p-0" data-bs-toggle="modal" data-bs-target="#delete_category_Modal" onclick="setDeleteId('{{ $category->id }}')" alt=""/>
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
  <!-- STart Added Category Modal -->
  <div class="modal fade" id="add_category_Modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h3 class="all-adjustment text-center pb-2 mb-0" style="width: 25%;">
            Create Category
          </h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mt-2">
                  <label for="exampleFormControlSelect1" class="mb-1 fw-bold">Category Name <span
                      class="text-danger">*</span></label>
                  <input type="text" class="form-control subheading" name="category" placeholder="Category Add" required />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mt-2">
                  <label for="exampleFormControlSelect1" class="mb-1 fw-bold">Category Code <span
                      class="text-danger">*</span></label>
                  <input type="number" class="form-control subheading" name="category_code" placeholder="Category Code" required />
                </div>
              </div>
            </div>
            <div class="mt-4">
              <label for="" class="fw-bold">Sub Categories</label>
              <div id="tags" class="tags-container">
                <span class="tag default-tag">Placeholder</span>
                <span class="tag default-tag">Placeholder</span>
                <input type="text" id="search" name="sub_category"/>
              </div>
            </div>
            <button type="submit" class="btn save-btn text-white mt-4">Done</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Added Category Modal -->

  <!-- STart Edit Category Modal -->
  <div class="modal fade" id="edit_category_Modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h3 class="all-adjustment text-center pb-2 mb-0" style="width: 25%;">
            Edit Category
          </h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @if(isset($category))
            <form action="{{ route('category.update', $category->id) }}" method="POST" id="edit-category-form">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group mt-2">
                    <label for="exampleFormControlSelect1" class="mb-1 fw-bold">Category Name <span
                        class="text-danger">*</span></label>
                    <input type="text" class="form-control subheading" name="category" value="{{ $category->category ?? '' }}" placeholder="Category Add" required />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mt-2">
                    <label for="exampleFormControlSelect1" class="mb-1 fw-bold">Category Code <span
                        class="text-danger">*</span></label>
                    <input type="number" class="form-control subheading" name="category_code" value="{{ $category->category_code ?? '' }}" placeholder="Category Code" required />
                  </div>
                </div>
              </div>
              <div class="mt-4">
                <label for="" class="fw-bold">Sub Categories</label>
                <div id="tags" class="tags-container">
                  <span class="tag default-tag">Placeholder</span>
                  <span class="tag default-tag">Placeholder</span>
                  <input type="text" id="search" name="sub_category" value="{{ $category->sub_category ?? '' }}"/>
                </div>
              </div>
              <button type="submit" class="btn save-btn text-white mt-4">Done</button>
            </form>
          @endif

        </div>
      </div>
    </div>
  </div>
  <!-- End Edit Category Modal -->

  <!-- STart Delete Category Modal -->
  <div class="modal fade" id="delete_category_Modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
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
            <input type="hidden" name="id" id="categoryId" value="">
            <button type="submit" class="btn delete-btn text-white">Delete</button>
            <button class="btn save-btn text-white" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Delete Category Modal -->

  <!-- STart Skill Lab Category Script -->
  <script>
    const BACKSPACE = 8;
    const ENTER = 13;
    document.getElementById("search").addEventListener("keydown", adjust);

    function adjust(e) {
      const val = e.target.value;

      if (
        e.keyCode === BACKSPACE &&
        !val &&
        document.querySelectorAll(".tag").length
      ) {
        deleteTag();
      }
      if (e.keyCode === ENTER && val) {
        e.target.value = "";
        addTag(val);
      }
      const textLength = textLengthToPx(val);
      const inputWidth = e.target.offsetWidth;
      const minThreshold = 5;
      const maxThreshold = 200;
      const delta = inputWidth - textLength;
      const shouldGrow = delta < minThreshold;
      const shouldShrink = delta > maxThreshold;

      if (shouldGrow) {
        setStyle(e.target, "width", "90%");
      } else if (shouldShrink) {
        e.target.style = "";
      }
    }

    function deleteTag() {
      const tags = document.querySelectorAll(".tag");
      tags[tags.length - 1].remove();
    }

    function addTag(val) {
      const tag = document.createElement("span");
      tag.className = "tag";
      tag.innerHTML = val;

      // Create a remove listener for the tag
      tag.addEventListener("click", function () {
        tag.remove();
      });

      const tagsContainer = document.getElementById("tags");
      tagsContainer.insertBefore(tag, document.getElementById("search"));
    }

    function setStyle(node, rule, value) {
      node.style[rule] = value;
    }

    function textLengthToPx(text) {
      const span = document.createElement("span");
      span.innerHTML = text;
      span.className = "invisible";
      document.body.appendChild(span);
      const width = span.offsetWidth;
      span.remove();
      return width;
    }

    // Add a remove listener for the default tags
    const defaultTags = document.querySelectorAll(".default-tag");
    defaultTags.forEach((tag) => {
      tag.addEventListener("click", function () {
        this.remove();
      });
    });
  </script>
  <!-- End Skill Lab Category Script -->
    <!-- STart Success Message Script -->
  <script>
    window.setTimeout(function() {
        $("#success-alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 2000);
    </script>
  <!-- End Success Message Script -->

  <!-- STart Edit Category Script -->
  <script>
  function editCategory(id) {
      $.ajax({
          type: "GET",
          url: "{{ route('category.edit', ['id' => '__id__']) }}".replace('__id__', id),
          success: function(data) {
              $('#edit_category_Modal input[name="category"]').val(data.category);
              $('#edit_category_Modal input[name="category_code"]').val(data.category_code);
              $('#edit_category_Modal input[name="sub_category"]').val(data.sub_category);
          }
      });
  }
  </script>
  <!-- End Edit Category Script -->

  <!-- STart Updated Category Script -->
  <script>
    function editCategory(id) {
    var updateRoute = "{{ route('category.update', ':id') }}";
      $.ajax({
          type: "GET",
          url: "{{ route('category.edit', ['id' => '__id__']) }}".replace('__id__', id),
          success: function(data) {
              $('#edit_category_Modal input[name="category"]').val(data.category);
              $('#edit_category_Modal input[name="category_code"]').val(data.category_code);
              $('#edit_category_Modal input[name="sub_category"]').val(data.sub_category);
              $('#edit_category_Modal input[name="id"]').val(id);
              $('#edit-category-form').attr('action', updateRoute.replace(':id', id));
          }
      });
    }
  </script>
  <!-- End Edit Category Script -->

  <!-- STart Delete Script -->
  <script>
    function setDeleteId(id) {
        document.getElementById('categoryId').value = id;
        document.getElementById('deleteForm').action = '{{ route('category.destroy', '') }}/' + id;
    }
  </script>
  <script>
    $('#deleteForm .save-btn').on('click', function(event) {
      event.preventDefault();
      $('#deleteForm').find('input[name="id"]').val('');
  });
  </script>
    <!-- End Delete Script -->

  <!-- STart Filter Category Script -->
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
  <!-- STart Filter Category Script -->
      
@endsection