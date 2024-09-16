@php
    $class ??= null;
    $name ??= '';
    $value ??= [];
    $label ??= ucfirst($name);
    $options ??= []; // Tableau d'options pour le select
    $isMultiple ??= false; // Pour activer ou non la multi-sélection
    // dd($options);
@endphp

<div @class(['form-group', $class])>
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>

    <select class="form-control custom-select @error($name) is-invalid @enderror" id="{{ $name }}"
        name="{{ $name }}{{ $isMultiple ? '[]' : '' }}" {{ $isMultiple ? 'multiple' : '' }}>

        @if (!$isMultiple)
            <option value="" disabled selected>-- Sélectionner {{ strtolower($label) }} --</option>
        @endif

        @foreach ($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" @selected($value->contains($optionValue))>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
