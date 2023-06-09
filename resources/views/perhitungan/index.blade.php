@extends('layouts.app')
@section('content')

{{-- buat 1. Matriks Keputusan, dengan persamaan (1). --}}
<section id="basic-datatable">
    <div class="row">
    <div class="col-12">
    <div class="card">
        {{-- foreach by kriteria --}}
        <div class="card-header border-bottom p-1">
            <div class="head-label"><h6 class="mb-0">Matriks Keputusan</h6></div>
        </div>
        <div class="container">
        <table class="data-table table">
            <thead>
                <tr>
                    <th>Alternatif</th>
                    <th>C1</th>
                    <th>C2</th>
                    <th>C3</th>
                    <th>C4</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($penilaian as $item)
                <tr>
                    <td>{{ $item->alternatif->kode_alternatif}}</td>
                    <td>{{ $item->C1 }}</td>
                    <td>{{ $item->C2 }}</td>
                    <td>{{ $item->C3 }}</td>
                    <td>{{ $item->C4 }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    
        {{-- end foreach --}}
    </div>
    </div>
    </div>

    {{-- buat Penormalisasian Matriks, dengan persamaan --}}
    <div class="row">
        <div class="col-12">
        <div class="card">
            {{-- foreach by kriteria --}}
            <div class="card-header border-bottom p-1">
                <div class="head-label"><h6 class="mb-0">Normalisasi Matriks</h6></div>
            </div>
            <div class="container">
            <table class="data-table table">
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($penilaian as $item)
                    <tr>
                        <td>{{ $item->alternatif->kode_alternatif}}</td>
                        <td>{{ 1 / $item->C1 }}</td>
                        <td>{{ 1 / $item->C2 }}</td>
                        <td>{{ 1 / $item->C3 }}</td>
                        <td>{{ 1 / $item->C4 }}</td>
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
@endsection