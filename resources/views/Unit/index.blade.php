@extends('layout.master')
@section('content')

<div class="content">
    @include('layout.sidebar')
    {{-- @include('layout.navbar') --}}

    <div class="container-fluid pt-4 px-4 mb-5">
      <div class="border-bottom">
        <h3 class="all-adjustment text-center pb-2 mb-0" style="width: 25%;">Unit of Measurement</h3>
      </div>

      <div class="card card-shadow border-0 mt-4 rounded-3">
        <div class="card-header bg-white border-0 rounded-3">
          <div class="row my-3">
            <div class="col-md-4 col-12">
              <div class="input-search position-relative">
                <input
                  type="text"
                  placeholder="Search Table"
                  class="form-control rounded-3 subheading"
                />
                <span
                  class="fa fa-search search-icon text-secondary"
                ></span>
              </div>
            </div>

            <div class="col-md-8 col-12 text-end">
              <button
                class="btn create-btn rounded-3 mt-2"
                data-bs-target="#exampleModalToggle"
                data-bs-toggle="modal"
              >
                Create <i class="bi bi-plus-lg"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="table-responsive p-2">
          <table class="table">
            <thead>
              <tr>
                <th class="text-secondary">
                  <label for="myCheckbox09" class="checkbox">
                    <input
                      class="checkbox__input"
                      type="checkbox"
                      id="myCheckbox09"
                    />
                    <svg
                      class="checkbox__icon"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 22 22"
                    >
                      <rect
                        width="21"
                        height="21"
                        x=".5"
                        y=".5"
                        fill="#FFF"
                        stroke="rgba(76, 73, 227, 1)"
                        rx="3"
                      />
                      <path
                        class="tick"
                        stroke="rgba(76, 73, 227, 1)"
                        fill="none"
                        stroke-linecap="round"
                        stroke-width="3"
                        d="M4 10l5 5 9-9"
                      />
                    </svg>
                  </label>
                </th>
                <th class="text-secondary">Name</th>
                <th class="text-secondary">Short Name</th>
                <th class="text-secondary">Base Unit</th>
                <th class="text-secondary">Operator</th>
                <th class="text-secondary">Operator Value</th>
                <th class="text-secondary">Action</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle">{{ $units->name ?? '' }}</td>
                    <td class="align-middle">{{ $units->short_name ?? '' }}</td>
                    <td class="align-middle">{{ $units->base_unit ?? '' }}</td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div
        class="modal fade"
        id="exampleModalToggle"
        aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel"
        tabindex="-1"
      >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header border-0">
              <h3 class="all-adjustment text-center pb-2 mb-0 w-50">
                Create Unit
              </h3>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
                <form action="{{route('Unit.store')}}" method="POST">
                    @csrf
              <div class="form-group">
                <label for="exampleFormControlSelect1" class="mb-1"
                  >Name <span class="text-danger">*</span></label
                >
                <input
                  type="text"
                  class="form-control subheading"
                  name="name"
                  placeholder="Name"
                />
              </div>

              <div class="form-group mt-2">
                <label for="exampleFormControlSelect1" class="mb-1"
                  >Short Name <span class="text-danger">*</span></label
                >
                <input
                  type="text"
                  class="form-control subheading"
                  name="short_name"
                  placeholder="Name"
                />
              </div>

              <div class="form-group mt-2">
                <label for="exampleFormControlSelect1" class="mb-1"
                  >Base Unit</label
                >
                <select
                  class="form-control form-select subheading"
                  aria-label="Default select example"
                  name="base_unit"
                >
                  <option>Select Base Unit</option>
                  <option>Base Unit 1</option>
                  <option>Base Unit 2</option>
                  <option>Base Unit 3</option>
                </select>
              </div>
              <button type="submit" class="btn save-btn text-white mt-4">Done</button>

            </form>
            </div>
          </div>
        </div>
      </div>
  </div>
@include('layout.footer')

@endsection
