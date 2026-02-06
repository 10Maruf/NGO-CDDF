@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-10 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Contact Information</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('contact.store') }}" method="post">
                        @csrf
                        
                        <!-- Contact Type -->
                        <div class="col-md-6">
                            <label for="type" class="form-label">Contact Type <span class="text-danger">*</span></label>
                            <select name="type" id="type" class="form-select @error('type') is-invalid @enderror" required>
                                <option value="">Select Type</option>
                                <option value="head_office" {{ old('type') == 'head_office' ? 'selected' : '' }}>Head Office</option>
                                <option value="branch" {{ old('type') == 'branch' ? 'selected' : '' }}>Branch</option>
                                <option value="person" {{ old('type') == 'person' ? 'selected' : '' }}>Person</option>
                            </select>
                            @error('type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Title (For both office and person) -->
<div class="col-md-12" id="title-field">
                            <label for="title" class="form-label">
                                <span id="title-label">Title/Designation</span> <span class="text-danger" id="title-required" style="display: none;">*</span>
                            </label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="e.g., Branch Name / Chief Executive" value="{{ old('title') }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Office Fields -->
                        <div id="office-fields" style="display: none;">
                            <div class="col-md-12">
                                <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" rows="3" placeholder="Enter office address">{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Person Fields -->
                        <div id="person-fields" style="display: none;">
                            <div class="col-md-12">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter person name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Common Fields -->
                        <div class="col-md-6">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" id="mobile" placeholder="017XXXXXXXX" value="{{ old('mobile') }}">
                            @error('mobile')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="mobile2" class="form-label">Mobile 2 (Optional)</label>
                            <input type="text" name="mobile2" class="form-control" id="mobile2" placeholder="017XXXXXXXX" value="{{ old('mobile2') }}">
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="example@email.com" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="email2" class="form-label">Email 2 (Optional)</label>
                            <input type="email" name="email2" class="form-control" id="email2" placeholder="example@email.com" value="{{ old('email2') }}">
                        </div>

                        <!-- Optional Fields for Person only -->
                        <div id="optional-person-fields" style="display: none;">
                            <div class="col-md-4">
                                <label for="skype" class="form-label">Skype (Optional)</label>
                                <input type="text" name="skype" class="form-control" id="skype" placeholder="Skype ID" value="{{ old('skype') }}">
                            </div>

                            <div class="col-md-4">
                                <label for="whatsapp" class="form-label">WhatsApp (Optional)</label>
                                <input type="text" name="whatsapp" class="form-control" id="whatsapp" placeholder="WhatsApp number" value="{{ old('whatsapp') }}">
                            </div>

                            <div class="col-md-4">
                                <label for="twitter" class="form-label">Twitter (Optional)</label>
                                <input type="text" name="twitter" class="form-control" id="twitter" placeholder="@username" value="{{ old('twitter') }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">
                                <i class="bx bx-save"></i> Save Contact
                            </button>
                            <a href="{{ route('contact.index') }}" class="btn btn-secondary">
                                <i class="bx bx-x"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const typeSelect = document.getElementById('type');
    const officeFields = document.getElementById('office-fields');
    const personFields = document.getElementById('person-fields');
    const optionalPersonFields = document.getElementById('optional-person-fields');
    const titleLabel = document.getElementById('title-label');
    const titleRequired = document.getElementById('title-required');

    typeSelect.addEventListener('change', function() {
        const type = this.value;
        
        if (type === 'head_office' || type === 'branch') {
            if (type === 'head_office') {
                titleLabel.textContent = 'Head Office Name';
            } else {
                titleLabel.textContent = 'Branch Name';
            }
            titleRequired.style.display = 'none';
            officeFields.style.display = 'block';
            personFields.style.display = 'none';
            optionalPersonFields.style.display = 'none';
            // Clear person fields
            document.getElementById('name').value = '';
            document.getElementById('skype').value = '';
            document.getElementById('whatsapp').value = '';
            document.getElementById('twitter').value = '';
        } else if (type === 'person') {
            titleLabel.textContent = 'Designation';
            titleRequired.style.display = 'inline';
            officeFields.style.display = 'none';
            personFields.style.display = 'block';
            optionalPersonFields.style.display = 'flex';
            // Clear office fields
            document.getElementById('address').value = '';
        } else {
            titleLabel.textContent = 'Title/Designation';
            titleRequired.style.display = 'none';
            officeFields.style.display = 'none';
            personFields.style.display = 'none';
            optionalPersonFields.style.display = 'none';
        }
    });

    // Trigger on page load if old value exists
    if (typeSelect.value) {
        typeSelect.dispatchEvent(new Event('change'));
    }
});
</script>
@endsection
