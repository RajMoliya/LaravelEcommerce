<div>
    <div>
        @include('livewire.admin.brand.modal_form')
    </div>
    <div>
        <div class="row">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Brand List
                            <a class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
                                data-bs-target="#addBrandModal">Add Brands</a>
                        </h4>

                    </div>
                    <div class=" card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($brands as $b)
                                    <tr>
                                        <td>{{ $b->id }}</td>
                                        <td>{{ $b->name }}</td>
                                        <td>
                                            @if ($b->category)
                                                {{ $b->category->name }}
                                            @else
                                                No Category
                                            @endif
                                        </td>
                                        <td>{{ $b->slug }}</td>
                                        <td>{{ $b->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                        <td>
                                            <a wire:click="editBrand({{ $b->id }})" data-bs-toggle="modal"
                                                data-bs-target="#updateBrandModal"
                                                class="btn btn-sm btn-success">Edit</a>
                                            <a wire:click="deleteBrand({{ $b->id }})" data-bs-toggle="modal"
                                                data-bs-target="#deleteBrandModal"
                                                class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No Brands Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $brands->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Livewire.on('closeModal', function() {
                $('#addBrandModal').modal('hide');
            });
        });
    </script>
@endpush --}}
