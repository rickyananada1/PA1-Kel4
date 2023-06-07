<h1>Hasil Pencarian</h1>

@if($results->isEmpty())
    <p>Tidak ada hasil yang ditemukan.</p>
@else
    <ul>
        @foreach($results as $result)
            <li>{{ $result['name'] }} - {{ $result['description'] }}</li>
        @endforeach
    </ul>
@endif
