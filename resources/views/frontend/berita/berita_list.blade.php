<div class="container-lg">
    <div class="bg-holder"
        style="background-image:url('{{ asset('assets/img/illustrations/dot-2.png') }}');background-position:left top;background-size:initial;margin-top:120px;margin-left:-35px;">
    </div>
    <!--/.bg-holder-->

    <div class="row flex-center">
        <div class="col-auto text-center">
            <h2 class="fw-bold">Informasi</h2>
            <hr class="mx-auto text-dark" style="height:2px;width:50px" />
        </div>
    </div>
    <div class="row h-100 justify-content-center pt-6">
        @foreach ($allBerita as $berita)
            <div class="col-12 col-sm-9 col-md-4 mt-4">
                <div class="card h-100 rounded-3 shadow text-white">
                    <img src='{{ asset("images/berita/$berita->gambar_berita") }}' alt="Gambar Berita">
                    <div class="card-body p-4 text-center text-md-start">
                        <h5 class="fw-bold">{{ $berita->judul_berita }}</h5>
                        <!-- <h5 class="fw-bold">{{ $berita->isi_berita }}</h5> -->
                        <p class="card-text">
                            {!! Illuminate\Support\Str::limit($berita->isi_berita, $limit = 150, $end = '...') !!}
                        </p>
                        <a class="stretched-link text-decoration-none"
                            href="{{ route('user_detail_berita', $berita->slug_berita) }}" role="button"
                            style="color: white">Read more
                            <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="text-center pt-4 z-index-2">
            {{-- <button class="btn btn-lg btn-outline-success rounded-pill z-index-2 hover-top" type="submit">
                <a href="{{ route('user_detail_berita', Crypt::encrypt($berita->id_berita)) }}" style="color:green">
                    View
                    all </a>
            </button> --}}

            {{-- <button class="btn btn-lg rounded-pill z-index-2 hover-top" type="submit" id="green-text">
            </button> --}}
            <a href="{{ route('user_semua_berita') }}" class="btn btn-lg rounded-pill z-index-2 hover-top">
                Berita Lainnya
            </a>
            <style>
                .btn {
                    background: #BEADFA;
                    /* color: green; */
                    /* Warna teks awal */
                    transition: color 0.3s;
                    text-decoration: none;
                    /* Efek transisi saat perubahan warna */
                }

                .btn:hover {
                    color: white;
                    text-decoration: none;
                    /* Warna teks ketika dihover */
                }
            </style>
        </div>
    </div>
</div>
