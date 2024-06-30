@extends('DMI.layouts.app')
@section('title', 'Article')
@section('content')
    <section>
        <div class="container">
            <div class="d-flex my-4 justify-content-between row">
                <div class="col mt-2">
                    <button type="button" class="btn btn-sm text-white" style="background-color: #001D3D">Small
                        button</button>
                    <button type="button" class="btn btn-sm text-white" style="background-color: #5f5f5f">Small
                        button</button>
                    <button type="button" class="btn btn-sm text-white" style="background-color: #5f5f5f">Small
                        button</button>
                </div>
                <div class="col-4 justify-content-end d-flex">
                    <div class="input-group mb-3">
                        <input class="form-control px-5 py-2" style="border: 1px solid #969595; border-radius: 20px"
                            type="text" placeholder="Search">
                        <div class="input-group-prepend d-flex position-absolute p-2 justify-content-end"
                            style="top: 5px; right: 30px;">
                            <i class="fa fa-search" style="color: #5f5f5f" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2 mb-5 gap-3">
                <div class="col-8">
                    <div class="row" style="height: 350px">
                        <div class="col-8 mb-3">
                            <img src="{{ asset('assets/img/article.png') }}" style="width: 100%; height: 100%;"
                                alt="">
                        </div>
                        <div class="col">
                            <div class="row d-flex flex-column gap-3" style="height: 350px">
                                <div class="col">
                                    <img src="{{ asset('assets/img/article2.png') }}" style="width: 100%; height: 100%;"
                                        alt="">
                                </div>
                                <div class="col mb-3">
                                    <img src="{{ asset('assets/img/article3.png') }}" style="width: 100%; height: 100%;"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gap-2">
                        <div class="col">
                            <img src="{{ asset('assets/img/article4.png') }}" style="width: 100%; height: 100%;"
                                alt="">
                        </div>
                        <div class="col">
                            <img src="{{ asset('assets/img/article4.png') }}" style="width: 100%; height: 100%;"
                                alt="">
                        </div>
                        <div class="col">
                            <img src="{{ asset('assets/img/article4.png') }}" style="width: 100%; height: 100%;"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="col text-white p-4" style="background-color: #001D3D">
                    <h1 style="font-size: 24px">Trending News</h1>
                    <div class="row my-4">
                        <div class="col-4">
                            <img src="{{ asset('assets/img/article4.png') }}" style="width: 100%; height: 100%;"
                                alt="">
                        </div>
                        <div class="col">
                            <h1 style="font-size: 16px">Living rom by svsh</h1>
                            <div class="d-flex gap-3">
                                <p style="font-size: 12px; color: #FFD233;">6571 Views</p>
                                <p style="font-size: 12px;">Tag: Property</p>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-4">
                            <img src="{{ asset('assets/img/article4.png') }}" style="width: 100%; height: 100%;"
                                alt="">
                        </div>
                        <div class="col">
                            <h1 style="font-size: 16px">Living rom by svsh</h1>
                            <div class="d-flex gap-3">
                                <p style="font-size: 12px; color: #FFD233;">6571 Views</p>
                                <p style="font-size: 12px;">Tag: Property</p>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-4">
                            <img src="{{ asset('assets/img/article4.png') }}" style="width: 100%; height: 100%;"
                                alt="">
                        </div>
                        <div class="col">
                            <h1 style="font-size: 16px">Living rom by svsh</h1>
                            <div class="d-flex gap-3">
                                <p style="font-size: 12px; color: #FFD233;">6571 Views</p>
                                <p style="font-size: 12px;">Tag: Property</p>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-4">
                            <img src="{{ asset('assets/img/article4.png') }}" style="width: 100%; height: 100%;"
                                alt="">
                        </div>
                        <div class="col">
                            <h1 style="font-size: 16px">Living rom by svsh</h1>
                            <div class="d-flex gap-3">
                                <p style="font-size: 12px; color: #FFD233;">6571 Views</p>
                                <p style="font-size: 12px;">Tag: Property</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button class="btn text-white" style="background-color: #0D3766">Load More</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container my-5 pt-5">
            <div class="d-flex justify-content-between">
                <h1 class="fw-bold" style="font-size: 26px; color: #001D3D">Articles</h1>
                <p class="my-1" style="font-size: 16px; color: #477CB7">Show All</p>
            </div>
            <div class="row my-3">
                @foreach ($article as $article)
                    <div class="col-3">
                        <div class="card border-0 rounded-0">
                            <img src="{{ asset('uploads/admin/article/' . $article->foto) }}"
                                style="width: 100%; height: 150px;" alt="">
                            <h1 class="my-3" style="font-size: 18px; color: #0D3766">{{ $article->judul }}</h1>
                            <p style="font-size: 14px; color:#5f5f5f">{{ $article->isi }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section>
        <div class="container my-5 pt-5">
            <div class="row">
                <div class="col-8">
                    <h1 class="fw-bold" style="font-size: 26px; color: #001D3D">Recommendation</h1>
                    <div class="d-flex my-3 gap-3">
                        <div class="col-7">
                            <img src="{{ asset('assets/img/article.png') }}" style="width: 100%; height: 250px;"
                                alt="">
                            <h1 class="my-3" style="font-size: 18px; color: #0D3766">The Rubic Takes Nine-Box Form and
                                Lets the House Breathe in Hot Industrial Area</h1>
                            <p style="font-size: 14px; color:#5f5f5f">Named after the Rubik's cube toys, the nine-box mass
                                accommodates feng shui to form an atypical modern house with unique functions.</p>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column gap-3">
                                <div class="col">
                                    <img src="{{ asset('assets/img/article2.png') }}" style="width: 100%; height: 150px;"
                                        alt="">
                                    <h1 class="my-3" style="font-size: 18px; color: #0D3766">Restaurant with
                                        Contemporary Design</h1>
                                </div>
                                <div class="col">
                                    <img src="{{ asset('assets/img/article4.png') }}" style="width: 100%; height: 150px;"
                                        alt="">
                                    <h1 class="my-3" style="font-size: 18px; color: #0D3766">Total design to bring
                                        Chinese art</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h1 style="font-size: 26px; color: #001D3D">Most populer</h1>
                    <div class="row my-4">
                        <div class="col-4">
                            <img src="{{ asset('assets/img/article4.png') }}" style="width: 100%; height: 100%;"
                                alt="">
                        </div>
                        <div class="col">
                            <h1 style="font-size: 16px">Living rom by svsh</h1>
                            <div class="d-flex gap-3">
                                <p style="font-size: 12px; color: #FFD233;">6571 Views</p>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-4">
                            <img src="{{ asset('assets/img/article4.png') }}" style="width: 100%; height: 100%;"
                                alt="">
                        </div>
                        <div class="col">
                            <h1 style="font-size: 16px">Living rom by svsh</h1>
                            <div class="d-flex gap-3">
                                <p style="font-size: 12px; color: #FFD233;">6571 Views</p>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-4">
                            <img src="{{ asset('assets/img/article4.png') }}" style="width: 100%; height: 100%;"
                                alt="">
                        </div>
                        <div class="col">
                            <h1 style="font-size: 16px">Living rom by svsh</h1>
                            <div class="d-flex gap-3">
                                <p style="font-size: 12px; color: #FFD233;">6571 Views</p>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-4">
                            <img src="{{ asset('assets/img/article4.png') }}" style="width: 100%; height: 100%;"
                                alt="">
                        </div>
                        <div class="col">
                            <h1 style="font-size: 16px">Living rom by svsh</h1>
                            <div class="d-flex gap-3">
                                <p style="font-size: 12px; color: #FFD233;">6571 Views</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
