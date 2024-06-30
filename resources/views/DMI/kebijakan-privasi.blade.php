@extends('DMI.layouts.app')

@section('title', 'DMI')

@section('content')
    <section class="kebijakan_privasi mb-5">
        <div class="kebijakan" style="height: 400px; background-color: #001D3D;">
            <div class="lingkaran"></div>
            <div class="lingkaran1"></div>
            <div class="container pt-5">
                <h2 class="text-white pt-5 mt-5" style="position: absolute; ">Kebijakan Privasi</h2>
                <div class="text-white tag-kebijakan">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae exercitationem ab earum mollitia officia aliquam vero vel! Architecto tempore, harum voluptas fuga mollitia magnam officia omnis eos cupiditate molestias exercitationem.</div>
            </div>
            <div class="border card-tabel-kebijakan p-4 pb-1 shadow" style="border-radius: none">
                <div class="card-content mx-4 my-3 pb-3">
                    <div class="px-4 p-1 fs-5">Daftar Isi</div>
                <div class="px-4 pt-3 pb-3 fs-6">
                    <a href="#pengantar" class="list-group-item list-group-item-action active pt-2 pb-1" aria-current="true">
                      1. Pengantar
                    </a>
                    <a href="#" class="list-group-item list-group-item-action pb-1">2. Bagaimana Kami Menggunakan Data Anda</a>
                    <a href="#" class="list-group-item list-group-item-action pb-1">3. A third link item</a>
                    <a href="#" class="list-group-item list-group-item-action pb-1">4. A fourth link item</a>
                    <a class="list-group-item list-group-item-action disabled pb-1">5. Other Important Information</a>
                    <a class="list-group-item list-group-item-action disabled">6. Other Important Information</a>
                  </div>
                </div>
            </div>
        </div>
    </section>

    <section class="privasi">
        <div class="container mt-5 pt-5">
            <div class="text" style="width: 50%">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur quisquam voluptas voluptatem omnis sunt nisi voluptates similique voluptatibus quae aut temporibus ea blanditiis a, numquam vel itaque culpa deleniti! Illo!</div>
            <h2 class="py-4 fw-bold">Privasi Anda Penting</h2>
            <div class="text pb-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur quisquam voluptas voluptatem omnis sunt nisi voluptates similique voluptatibus quae aut temporibus ea blanditiis a, numquam vel itaque culpa deleniti! Illo! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, eligendi, impedit cumque blanditiis id facere ad, necessitatibus illo expedita quasi iusto? Quo eos nesciunt sunt doloremque veniam eveniet dolore ab. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam quasi ipsa corporis adipisci molestiae unde ab labore praesentium vero. Laborum, assumenda voluptate? Ab eligendi natus amet delectus eum id perferendis.</div>
            <div class="text pb-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur quisquam voluptas voluptatem omnis sunt nisi voluptates similique voluptatibus quae aut temporibus ea blanditiis a, numquam vel itaque culpa deleniti! Illo! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, eligendi, impedit cumque blanditiis id facere ad, necessitatibus illo expedita quasi iusto? Quo eos nesciunt sunt doloremque veniam eveniet dolore ab. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam quasi ipsa corporis adipisci molestiae unde ab labore praesentium vero. Laborum, assumenda voluptate? Ab eligendi natus amet delectus eum id perferendis.</div>
            <hr>

            <div id="pengantar">
                <h4 class="py-3 fw-bold" style="color: #2B7698">Pengantar</h4>
            <div class="text pb-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur quisquam voluptas voluptatem omnis sunt nisi voluptates similique voluptatibus quae aut temporibus ea blanditiis a, numquam vel itaque culpa deleniti! Illo! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, eligendi, impedit cumque blanditiis id facere ad, necessitatibus illo expedita quasi iusto? Quo eos nesciunt sunt doloremque veniam eveniet dolore ab. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam quasi ipsa corporis adipisci molestiae unde ab labore praesentium vero. Laborum, assumenda voluptate? Ab eligendi natus amet delectus eum id perferendis.</div>
            <div class="text pb-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur quisquam voluptas voluptatem omnis sunt nisi voluptates similique voluptatibus quae aut temporibus ea blanditiis a, numquam vel itaque culpa deleniti! Illo! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, eligendi, impedit cumque blanditiis id facere ad, necessitatibus illo expedita quasi iusto? Quo eos nesciunt sunt doloremque veniam eveniet dolore ab. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam quasi ipsa corporis adipisci molestiae unde ab labore praesentium vero. Laborum, assumenda voluptate? Ab eligendi natus amet delectus eum id perferendis.</div>
            <div class="text pb-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur quisquam voluptas voluptatem omnis sunt nisi voluptates similique voluptatibus quae aut temporibus ea blanditiis a, numquam vel itaque culpa deleniti! Illo! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, eligendi, impedit cumque blanditiis id facere ad, necessitatibus illo expedita quasi iusto? Quo eos nesciunt sunt doloremque veniam eveniet dolore ab. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam quasi ipsa corporis adipisci molestiae unde ab labore praesentium vero. Laborum, assumenda voluptate? Ab eligendi natus amet delectus eum id perferendis.</div>
            </div>


            <div class="accordion accordion-flush mt-5">
                <div class="accordion-item">
                  <button id="accordion-button-1" aria-expanded="false">
                    <span class="accordion fw-bold">Why is the moon sometimes out during the day?</span>
                    <span class="icon" aria-hidden="true"></span>
                  </button>
                  <div class="accordion-content">
                    <div class="pb-3">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                      incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut.
                      Ut tortor pretium viverra suspendisse potenti.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <button id="accordion-button-2" aria-expanded="false">
                    <span class="accordion-title fw-bold">Why is the sky blue?</span>
                    <span class="icon" aria-hidden="true"></span>
                  </button>
                  <div class="accordion-content">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                      incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut.
                      Ut tortor pretium viverra suspendisse potenti.
                    </p>
                  </div>
                </div>
                <div class="accordion-item">
                  <button id="accordion-button-3" aria-expanded="false">
                    <span class="accordion-title fw-bold">Will we ever discover aliens?</span>
                    <span class="icon" aria-hidden="true"></span>
                  </button>
                  <div class="accordion-content">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                      incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut.
                      Ut tortor pretium viverra suspendisse potenti.
                    </p>
                  </div>
                </div>
                <div class="accordion-item">
                  <button id="accordion-button-4" aria-expanded="false">
                    <span class="accordion-title fw-bold">How much does the Earth weigh?</span>
                    <span class="icon" aria-hidden="true"></span>
                  </button>
                  <div class="accordion-content">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                      incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut.
                      Ut tortor pretium viverra suspendisse potenti.
                    </p>
                  </div>
                </div>
                <div class="accordion-item">
                  <button id="accordion-button-5" aria-expanded="false">
                    <span class="accordion-title fw-bold">How do airplanes stay up?</span>
                    <span class="icon" aria-hidden="true"></span>
                  </button>
                  <div class="accordion-content">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                      incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut.
                      Ut tortor pretium viverra suspendisse potenti.
                    </p>
                  </div>
                </div>
              </div>
            </div>
        </div>


    </section>
@endsection
