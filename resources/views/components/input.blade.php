@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-yellowMovimento focus:ring-yellowMovimento rounded-md shadow-sm']) !!}>
