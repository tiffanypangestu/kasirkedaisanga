@extends('customer.layouts.master')

@section('content')
    <style>
        .fruite-item {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .fruite-img {
            height: 220px;
            overflow: hidden;
        }

        .fruite-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .fruite-item .p-4 {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .fruite-item .d-flex {
            margin-top: auto;
        }

        .text-limited {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="row g-4 justify-content-center">
                {{-- CARD ITEM --}}
                @foreach ($items as $item)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="rounded position-relative fruite-item border">
                            <div class="fruite-img">
                                <img src="{{ asset('img_item_upload/' . $item->img) }}" alt=""
                                    onerror="this.oneerror=null; this.src='{{ $item->img }}'">
                            </div>

                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute
                            @if ($item->category->category_name == 'Makanan') bg-warning
                            @elseif ($item->category->category_name == 'Minuman')
                                bg-info
                            @elseif ($item->category->category_name == 'Cemilan')
                                bg-primary @endif"
                                style="top:10px;left:10px;">
                                {{ $item->category->category_name }}
                            </div>

                            <div class="p-4 border-top">
                                <h5>{{ $item->name }}</h5>
                                <p class="text-limited">
                                    {{ $item->description }}
                                </p>

                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-dark">Rp{{ number_format($item->price, 0, ',', '.') }}</span>
                                    <a href="#" onclick="addToCart {{ $item->id }}"
                                        class="btn btn-outline-primary rounded-pill btn-sm">
                                        <i class="fa fa-shopping-bag me-1"></i> Tambah Keranjang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function addToCart(menuID) {
            fetch("{{ route('cart.add') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id: menuID
                    })
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }
    </script>
@endsection
