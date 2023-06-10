@extends('layouts.app')
@section('content')
<section id="basic-datatable">
    <div class="row">
    <div class="col-12">
    <div class="card">
        {{-- foreach by kriteria --}}
        <div class="card-header border-bottom p-1">
            <div class="head-label"><h6 class="mb-0">Menghitung Bobot ROC</h6></div>
        </div>
        <div class="container">
        <table class="data-table table">
            <thead>
                <tr>
                    <th>Kode Kriteria</th>
                    <th>Bobot</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bobotROC as $item2)
                <tr>
                    <td>C{{ $loop->iteration }}</td>
                    {{-- <td>{{ $item->nama_kriteria }}</td>    --}}
                    <td>{{ $item2 }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    
        {{-- end foreach --}}
    </div>
    </div>
    </div>
</section>
<section id="basic-datatable">
    <div class="row">
    <div class="col-12">
    <div class="card">
        {{-- foreach by kriteria --}}
        <div class="card-header border-bottom p-1">
            <div class="head-label"><h6 class="mb-0">Membentuk Matriks Keputusan</h6></div>
        </div>
        <div class="container">
        <table class="data-table table">
            <thead>
                <tr>
                    <th>C1</th>
                    <th>C2</th>
                    <th>C3</th>
                    <th>C4</th>
                    <th>C5</th>
                    <th>C6</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-primary">
                    <td>{{ $minC1 }}</td>
                    <td>{{ $minC2 }}</td>
                    <td>{{ $minC3 }}</td>
                    <td>{{ $minC4 }}</td>
                    <td>{{ $maxC5 }}</td>
                    <td>{{ $minC6 }}</td>
                </tr>
                @foreach ($alternatif as $item)
                <tr>
                    <td>{{ $item->c1 }}</td>
                    <td>{{ $item->c2 }}</td>
                    <td>{{ $item->c3 }}</td>
                    <td>{{ $item->c4 }}</td>
                    <td>{{ $item->c5 }}</td>
                    <td>{{ $item->c6 }}</td>
                </tr>
                @endforeach
                <tr class="table-primary">
                    <td>{{ $sumC1 }}</td>
                    <td>{{ $sumC2 }}</td>
                    <td>{{ $sumC3 }}</td>
                    <td>{{ $sumC4 }}</td>
                    <td>{{ $sumC5 }}</td>
                    <td>{{ $sumC6 }}</td>
                </tr>
            </tbody>
        </table>
        </div>
    
        {{-- end foreach --}}
    </div>
    </div>
    </div>
</section>

<section id="basic-datatable">
    <div class="row">
    <div class="col-12">
    <div class="card">
        {{-- foreach by kriteria --}}
        <div class="card-header border-bottom p-1">
            <div class="head-label"><h6 class="mb-0">Normalisasi Matriks Keputusan</h6></div>
        </div>
        <div class="container">
        <table class="data-table table">
            <thead>
                <tr>
                    <th>C1</th>
                    <th>C2</th>
                    <th>C3</th>
                    <th>C4</th>
                    <th>C5</th>
                    <th>C6</th>
                </tr>
            </thead>
            <tbody>
                {{-- tampilkan array matriks multidimensi --}}

                @foreach ($matriks as $item)
                <tr>
                    @foreach ($item as $i)
                    <td>{{ number_format($i, 8) }}</td>
                    @endforeach
                </tr>
                @endforeach
                {{-- tampilkan array sumMatriks --}}
                <td></td>
                <tr class="table-primary">
                    <td>{{ number_format($sumMatriks[0], 8) }}</td>
                    <td>{{ number_format($sumMatriks[1], 8) }}</td>
                    <td>{{ number_format($sumMatriks[2], 8) }}</td>
                    <td>{{ number_format($sumMatriks[3], 8) }}</td>
                    <td>{{ number_format($sumMatriks[4], 8) }}</td>
                    <td>{{ number_format($sumMatriks[5], 8) }}</td>
                </tr>
                <td></td>
                {{-- tampilkan array nmatriks --}}
                @foreach ($nmatriks as $item)
                <tr>
                    @foreach ($item as $i)
                    <td>{{ number_format($i, 8) }}</td>
                    @endforeach
                </tr>
                @endforeach
                {{-- tampilkan array sumNMatriks --}}
            </tbody>
        </table>
        </div>
    
        {{-- end foreach --}}
    </div>
    </div>
    </div>
</section>

<section id="basic-datatable">
    <div class="row">
    <div class="col-12">
    <div class="card">
        {{-- foreach by kriteria --}}
        <div class="card-header border-bottom p-1">
            <div class="head-label"><h6 class="mb-0">Menentukan Bobot Matriks</h6></div>
        </div>
        <div class="container">
        <table class="data-table table">
            <thead>
                <tr>
                    <th>C1</th>
                    <th>C2</th>
                    <th>C3</th>
                    <th>C4</th>
                    <th>C5</th>
                    <th>C6</th>
                </tr>
            </thead>
            <tbody>
                {{-- tampilkan array matriks multidimensi dari $bmatriks --}}
                @foreach ($bmatriks as $item)
                <tr>
                    @foreach ($item as $i)
                    <td>{{ number_format($i, 8) }}</td>
                    @endforeach
                </tr>
                @endforeach
                {{-- tampilkan array sumBMatriks --}}

            </tbody>
        </table>
        </div>
    
    </div>
    </div>
    </div>
</section>

<section id="basic-datatable">
    <div class="row">
    <div class="col-12">
    <div class="card">
        {{-- foreach by kriteria --}}
        <div class="card-header border-bottom p-1">
            <div class="head-label"><h6 class="mb-0">Menentukan Nilai Fungsi Optimum</h6></div>
        </div>
        <div class="container">
        <table class="data-table table">
            <thead>
                <tr>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {{-- tampilkan array matriks multidimensi dari $bmatriks --}}
                @foreach ($sumBmatriks as $item)
                <tr>
                    {{-- loop number start 0 --}}
                    {{-- <td>{{ 0++ }}</td> --}}
                    <td>{{ $item }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    
    </div>
    </div>
    </div>
</section>

<section id="basic-datatable">
    <div class="row">
    <div class="col-12">
    <div class="card">
        {{-- foreach by kriteria --}}
        <div class="card-header border-bottom p-1">
            <div class="head-label"><h6 class="mb-0">Menentukan Tingkatan Peringkat/Prioritas Kelayakan</h6></div>
        </div>
        <div class="container">
        <table class="data-table table">
            <thead>
                <tr>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {{-- tampilkan array matriks multidimensi dari $bmatriks --}}
                @foreach ($prioritas as $item)
                <tr>
                    {{-- loop number start 0 --}}
                    {{-- <td>{{ 0++ }}</td> --}}
                    <td>{{ $item }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    
    </div>
    </div>
    </div>
</section>

<section id="basic-datatable">
    <div class="row">
    <div class="col-12">
    <div class="card">
        {{-- foreach by kriteria --}}
        <div class="card-header border-bottom p-1">
            <div class="head-label"><h6 class="mb-0">Hasil Perankingan</h6></div>
        </div>
        <div class="container">
        <table class="data-table table">
            <thead>
                <tr>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($perankingan as $item)
                <tr>
                    @foreach ($item as $i)
                    <td>{{ $i }}</td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    
    </div>
    </div>
    </div>
</section>
@endsection