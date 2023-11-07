
@props(['title', 'linkText', 'linkUrl'])

<section class="bg-primary p-5 mb-2">
    <div class="d-flex justify-content-center">
        <span class="text-white fw-bold fs-2">{{ $title }} / </span>
        <a href="{{ $linkUrl }}" class="text-white fw-bold fs-2 mx-1">{{ $linkText }}</a>
    </div>
</section>