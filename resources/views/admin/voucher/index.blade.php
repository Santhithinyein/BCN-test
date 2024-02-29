@extends('layouts.app')

@section('content')
    <div class="container col-md-8">
        <h1 class="mb-4" style="font-family: 'Arial', sans-serif; font-size: 32px;">
            Voucher Lists
        </h1>
        <!-- Search form -->
        <form action="{{ route('admin.vouchers.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="id" class="form-control" placeholder="Search vouchers...">
                <button type="submit" class="btn btn-outline-secondary">Search</button>
            </div>
        </form>
        <div class="list-group">
            @forelse ($vouchers as $voucher)
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Voucher ID: {{ $voucher->id }}</h5>
                        <small>Uploaded by: {{ $voucher->user->name }}</small>
                    </div>
                    <p class="mb-1">Uploaded on: {{ $voucher->created_at->format('d-m-y') }}</p>
                    @if ($voucher->image_path)
                        <img src="{{ $voucher->image_path }}" class="img-thumbnail voucher-image" alt="Voucher Image" style="max-width: 100px;">
                    @endif
                </a>
            @empty
                <div class="alert alert-info" role="alert">
                    No vouchers found.
                </div>
            @endforelse
        </div>
        <!-- Pagination -->
        <div class="mt-3">
            {{ $vouchers->links() }}
        </div>
    </div>

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Voucher Image</h5>
                </div>
                <div class="modal-body">
                    <img src="" id="modalImage" class="img-fluid" alt="Voucher Image">
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    

    <script>
        // JavaScript to handle image click and show modal
        $(document).ready(function() {
            $('.voucher-image').click(function() {
                var imageUrl = $(this).attr('src');
                $('#modalImage').attr('src', imageUrl);
                $('#imageModal').modal('show');
            });
        });
    </script>
@endsection
