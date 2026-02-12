@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-10 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Payment Method</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session()->get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session()->get('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <strong>Error!</strong> Please fix the following issues:
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('admin.payment_methods.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="col-md-8">
                            <div class="col-md-12 mb-3">
                                <label for="type" class="form-label">Payment Type <span class="text-danger">*</span></label>
                                <select name="type" id="type" class="form-select @error('type') is-invalid @enderror" required>
                                    <option value="">-- Select Type --</option>
                                    <option value="bkash" {{ old('type') == 'bkash' ? 'selected' : '' }}>bKash</option>
                                    <option value="nagad" {{ old('type') == 'nagad' ? 'selected' : '' }}>Nagad</option>
                                    <option value="rocket" {{ old('type') == 'rocket' ? 'selected' : '' }}>Rocket</option>
                                    <option value="upay" {{ old('type') == 'upay' ? 'selected' : '' }}>Upay</option>
                                    <option value="visa" {{ old('type') == 'visa' ? 'selected' : '' }}>Visa/Card</option>
                                    <option value="bank" {{ old('type') == 'bank' ? 'selected' : '' }}>Bank Account</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="icon_image" class="form-label">Icon/Logo Image</label>
                                <input type="file" name="icon_image" class="form-control @error('icon_image') is-invalid @enderror" 
                                       id="icon_image" accept="image/*">
                                <small class="text-muted">Upload logo/icon image (Optional)</small>
                                @error('icon_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <label for="account_name" class="form-label">Account Name <span class="text-danger">*</span></label>
                                <input type="text" name="account_name" class="form-control @error('account_name') is-invalid @enderror" 
                                       id="account_name" placeholder="e.g., Md. Jane Alam" value="{{ old('account_name') }}" required>
                                @error('account_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <label for="account_number" class="form-label">Account/Mobile Number <span class="text-danger">*</span></label>
                                <input type="text" name="account_number" class="form-control @error('account_number') is-invalid @enderror" 
                                       id="account_number" placeholder="e.g., +8801825-003211" value="{{ old('account_number') }}" required>
                                @error('account_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Bank Details (Show only when type is 'bank') -->
                            <div id="bank_details" style="display: none;">
                                <div class="col-md-12 mb-3">
                                    <label for="bank_name" class="form-label">Bank Name</label>
                                    <input type="text" name="bank_name" class="form-control" 
                                           id="bank_name" placeholder="e.g., IBBL" value="{{ old('bank_name') }}">
                                </div>
                                
                                <div class="col-md-12 mb-3">
                                    <label for="branch_name" class="form-label">Branch Name</label>
                                    <input type="text" name="branch_name" class="form-control" 
                                           id="branch_name" placeholder="e.g., Maijdee Court, Noakhali" value="{{ old('branch_name') }}">
                                </div>
                                
                                <div class="col-md-12 mb-3">
                                    <label for="routing_number" class="form-label">Routing Number</label>
                                    <input type="text" name="routing_number" class="form-control" 
                                           id="routing_number" placeholder="e.g., 125260674" value="{{ old('routing_number') }}">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="display_order" class="form-label">Display Order</label>
                                    <input type="number" name="display_order" class="form-control" id="display_order" 
                                           value="{{ old('display_order', 0) }}" min="0">
                                    <small class="text-muted">Lower numbers appear first</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check mt-4">
                                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" 
                                               {{ old('is_active', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Active (Show on frontend)
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-save"></i> Save Payment Method
                            </button>
                            <a href="{{ route('admin.payment_methods.index') }}" class="btn btn-secondary">
                                <i class="bx bx-arrow-back"></i> Back to List
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Show/hide bank details based on payment type
    document.getElementById('type').addEventListener('change', function() {
        const bankDetails = document.getElementById('bank_details');
        if (this.value === 'bank') {
            bankDetails.style.display = 'block';
        } else {
            bankDetails.style.display = 'none';
        }
    });

    // Trigger on page load if type is already selected
    document.addEventListener('DOMContentLoaded', function() {
        const typeSelect = document.getElementById('type');
        if (typeSelect.value === 'bank') {
            document.getElementById('bank_details').style.display = 'block';
        }
    });
</script>
@endsection
