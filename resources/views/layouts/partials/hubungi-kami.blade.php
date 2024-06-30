<?php $kontak = App\Models\Profil::all(); ?>
<div class="fixed-bottom mb-4 me-4">
    {{-- <a href="{{ route('contact') }}"><button type="button" class="btn rounded-pill btn-lg text-white float-end custom-btn"
            id="hubungi">
            <i class="fas fa-headset me-2"></i>
            Hubungi Kami
        </button></a> --}}
    @foreach ($kontak as $item)
        <a href="https://wa.me/{{ $item->no_hp }}" target="_blank">
            <button type="button" class="btn fw-medium mt-3 px-4 py-2 rounded-pill fs-6 text-white float-end custom-btn" id="hubungi">
                {{-- <i class="fa-brands fa-lg fa-whatsapp me-2"></i> --}}
                <i class="bi bi-whatsapp me-2"></i>
                Hubungi Kami
            </button>
        </a>
    @endforeach
</div>
