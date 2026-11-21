@foreach ([
    'judul' => ['label' => 'Judul Buku', 'type' => 'text', 'placeholder' => 'Judul buku'],
    'penulis' => ['label' => 'Penulis', 'type' => 'text', 'placeholder' => 'Nama penulis'],
    'penerbit' => ['label' => 'Penerbit', 'type' => 'text', 'placeholder' => 'Nama penerbit'],
] as $name => $field)
    <div class="mb-3">
        <label for="{{ $name }}" class="form-label">{{ $field['label'] }} <span class="text-danger">*</span></label>
        <input type="{{ $field['type'] }}" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $buku?->{$name}) }}" placeholder="{{ $field['placeholder'] }}" required>
        @error($name)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
@endforeach

<div class="row g-3 mb-4">
    <div class="col-md-6">
        <label for="tahun_terbit" class="form-label">Tahun Terbit <span class="text-danger">*</span></label>
        <input type="number" class="form-control @error('tahun_terbit') is-invalid @enderror" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit', $buku?->tahun_terbit) }}" placeholder="Contoh: 2023" required>
        @error('tahun_terbit')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="stok" class="form-label">Stok <span class="text-danger">*</span></label>
        <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{ old('stok', $buku?->stok ?? 0) }}" required>
        @error('stok')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
