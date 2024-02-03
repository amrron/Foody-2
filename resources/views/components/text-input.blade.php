@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-birumuda dark:focus:border-birumuda focus:ring-birumuda dark:focus:ring-birumuda rounded-md shadow-sm']) !!}>
