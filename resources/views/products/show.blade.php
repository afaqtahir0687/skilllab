@extends('layout.master')
@section('content')

  <style>
    .skil-lab-img {
      border-radius: 160px;
      width: 256px;
      margin-left: 32px;
    }

    @media print {
      .no-print {
        display: none;
      }
    }
  </style>

  <div class="container-fluid py-5 px-4">
    <div class="border-bottom">
      <h3 class="all-adjustment text-center pb-2 mb-0">Product Detail</h3>
    </div>
    <div class="card rounded-3 border-0 card-shadow mt-4 p-0">
      <div class="card-header p-3 border-0">
        <button class="btn create-btn py-2 px-3 no-print" onclick="window.print()"><i class="fa-solid fa-print me-2"></i>Print</button>
      </div>
     
      <div class="card-body p-3">
        <div class="row">
          <div class="col-md-9">
            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <tr>
                  <td>Product Name</td>
                  <td class="fw-bold">{{ $product->name }}</td>
                </tr>
                <tr>
                  <td>Brand Name</td>
                  <td class="fw-bold">{{ $product->brand->name }}</td>
                </tr>
                <tr>
                  <td>Category Name</td>
                  <td class="fw-bold">{{ $product->category->category }}</td>
                </tr>
                <tr>
                  <td>Sub Category</td>
                  <td class="fw-bold">{{ $product->category->sub_category }}</td>
                </tr>
                <tr>
                  <td>Product Description</td>
                  <td class="fw-bold">{{ $product->description }}</td>
                </tr>
                <tr>
                  <td>Product Currency</td>
                  <td class="fw-bold">{{ $product->currency }}</td>
                </tr>
                <tr>
                  <td>Product Price</td>
                  <td class="fw-bold">{{ $product->price }}</td>
                </tr>
                <tr>
                  <td>Product Order No</td>
                  <td class="fw-bold">{{ $product->order_no }}</td>
                </tr>
                <tr>
                  <td>Product Price</td>
                  <td class="fw-bold">{{ $product->production_date }}</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              @if($product->image && Storage::exists('public/' . $product->image))
              <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image"
                style="width: 200; height: 200px; border-radius: 50%; object-fit: cover;" class="img-fluid" />
              @else
              <img src="{{ asset('storage/default-image.jpg') }}" alt="Default Image"
                style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;" class="img-fluid" />
              @endif
            </div>

            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1500">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="{{ asset('assets/img/skill-lab.jpeg') }}" class="img-fluid align-middle skil-lab-img" alt="">
                </div>
                <div class="carousel-item">
                  <img src="{{ asset('assets/img/skil-lab-2.jpeg') }}" class="img-fluid skil-lab-img" alt="">
                </div>
                <div class="carousel-item">
                  <img src="{{ asset('assets/img/skill-lab-3.jpeg') }}" class="img-fluid align-middle skil-lab-img"
                    alt="">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <i class="fa-solid fa-chevron-left text-dark fw-bold fs-2"></i>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <i class="fa-solid fa-chevron-right text-dark fw-bold fs-2"></i>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection