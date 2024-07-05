@extends('layouts.admin')
@section('title_admin', 'Visi Misi Puskesmas')

@section('content_admin')
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary card-outline" id="card-mobile" style="
        width: 100%;
        /* align: center; */
        border-radius: 30px;
        background-color: #fff;
        box-shadow: 0px 0px 50px 0px #ccc;
        padding: 10px;">
            <div class=" card-body">
                <div class="container">
                    <div class="table-responsive">
                        {{ $pertanyaan }}
                        <table id="myTable" class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Pertanyaan</th>
                                    <th>Jawaban</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="tampilan_data">
                                {{-- @foreach ($indexs as $index)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $index->judul_visi }}</td>
                                    <td>
                                        {!! $index->keterangan_visi !!}
                                    </td>
                                    <td>{{ $index->judul_misi }}</td>
                                    <td>
                                        {!! $index->keterangan_misi !!}
                                    </td>
                                    <td>
                                        <span class="badge badge bg-success mb-1">
                                            <a href="{{ route('edit_visi_misi', Crypt::encrypt($index->id_visi_misi)) }}"
                                                class="btn btn" style="padding: 0.2rem 0.3rem; font-size: 1rem;">
                                                <i class="fas fa-pencil-alt" style="font-size: 1.2rem;"></i>
                                            </a>
                                        </span>

                                    </td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection