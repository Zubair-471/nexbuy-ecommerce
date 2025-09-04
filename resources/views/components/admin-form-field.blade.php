@props([
    'type' => 'text',
    'name',
    'label',
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'help' => '',
    'error' => '',
    'class' => '',
    'options' => [],
    'multiple' => false,
    'accept' => '',
    'min' => '',
    'max' => '',
    'step' => '',
    'rows' => 4
])

<div class="admin-form-group {{ $class }}">
    @if($label)
        <label for="{{ $name }}" class="admin-form-label">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    @switch($type)
        @case('textarea')
            <textarea
                name="{{ $name }}"
                id="{{ $name }}"
                rows="{{ $rows }}"
                placeholder="{{ $placeholder }}"
                {{ $required ? 'required' : '' }}
                class="admin-form-input admin-form-textarea"
                {{ $attributes->merge(['class' => '']) }}
            >{{ old($name, $value) }}</textarea>
            @break

        @case('select')
            <select
                name="{{ $name }}"
                id="{{ $name }}"
                {{ $required ? 'required' : '' }}
                {{ $multiple ? 'multiple' : '' }}
                class="admin-form-input admin-form-select"
                {{ $attributes->merge(['class' => '']) }}
            >
                @if(!$multiple)
                    <option value="">Select {{ $label }}</option>
                @endif
                
                @foreach($options as $optionValue => $optionLabel)
                    @if(is_array($optionLabel))
                        <optgroup label="{{ $optionValue }}">
                            @foreach($optionLabel as $subValue => $subLabel)
                                <option 
                                    value="{{ $subValue }}" 
                                    {{ in_array($subValue, (array) old($name, $value)) ? 'selected' : '' }}
                                >
                                    {{ $subLabel }}
                                </option>
                            @endforeach
                        </optgroup>
                    @else
                        <option 
                            value="{{ $optionValue }}" 
                            {{ in_array($optionValue, (array) old($name, $value)) ? 'selected' : '' }}
                        >
                            {{ $optionLabel }}
                        </option>
                    @endif
                @endforeach
            </select>
            @break

        @case('checkbox')
            <div class="flex items-center space-x-3">
                <input
                    type="checkbox"
                    name="{{ $name }}"
                    id="{{ $name }}"
                    value="1"
                    {{ old($name, $value) ? 'checked' : '' }}
                    class="admin-form-checkbox"
                    {{ $attributes->merge(['class' => '']) }}
                >
                <label for="{{ $name }}" class="text-sm text-gray-700 dark:text-gray-300">
                    {{ $label }}
                </label>
            </div>
            @break

        @case('radio')
            <div class="space-y-2">
                @foreach($options as $optionValue => $optionLabel)
                    <div class="flex items-center space-x-3">
                        <input
                            type="radio"
                            name="{{ $name }}"
                            id="{{ $name }}_{{ $optionValue }}"
                            value="{{ $optionValue }}"
                            {{ old($name, $value) == $optionValue ? 'checked' : '' }}
                            class="admin-form-radio"
                            {{ $attributes->merge(['class' => '']) }}
                        >
                        <label for="{{ $name }}_{{ $optionValue }}" class="text-sm text-gray-700 dark:text-gray-300">
                            {{ $optionLabel }}
                        </label>
                    </div>
                @endforeach
            </div>
            @break

        @case('file')
            <input
                type="file"
                name="{{ $name }}"
                id="{{ $name }}"
                {{ $required ? 'required' : '' }}
                {{ $multiple ? 'multiple' : '' }}
                accept="{{ $accept }}"
                class="admin-form-input"
                {{ $attributes->merge(['class' => '']) }}
            >
            @break

        @case('number')
            <input
                type="number"
                name="{{ $name }}"
                id="{{ $name }}"
                value="{{ old($name, $value) }}"
                placeholder="{{ $placeholder }}"
                {{ $required ? 'required' : '' }}
                min="{{ $min }}"
                max="{{ $max }}"
                step="{{ $step }}"
                class="admin-form-input"
                {{ $attributes->merge(['class' => '']) }}
            >
            @break

        @case('email')
            <input
                type="email"
                name="{{ $name }}"
                id="{{ $name }}"
                value="{{ old($name, $value) }}"
                placeholder="{{ $placeholder }}"
                {{ $required ? 'required' : '' }}
                class="admin-form-input"
                {{ $attributes->merge(['class' => '']) }}
            >
            @break

        @case('password')
            <input
                type="password"
                name="{{ $name }}"
                id="{{ $name }}"
                placeholder="{{ $placeholder }}"
                {{ $required ? 'required' : '' }}
                class="admin-form-input"
                {{ $attributes->merge(['class' => '']) }}
            >
            @break

        @case('url')
            <input
                type="url"
                name="{{ $name }}"
                id="{{ $name }}"
                value="{{ old($name, $value) }}"
                placeholder="{{ $placeholder }}"
                {{ $required ? 'required' : '' }}
                class="admin-form-input"
                {{ $attributes->merge(['class' => '']) }}
            >
            @break

        @default
            <input
                type="{{ $type }}"
                name="{{ $name }}"
                id="{{ $name }}"
                value="{{ old($name, $value) }}"
                placeholder="{{ $placeholder }}"
                {{ $required ? 'required' : '' }}
                class="admin-form-input"
                {{ $attributes->merge(['class' => '']) }}
            >
    @endswitch

    @if($help)
        <p class="admin-form-help">{{ $help }}</p>
    @endif

    @error($name)
        <p class="admin-form-error">{{ $message }}</p>
    @enderror
</div>
