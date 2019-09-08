<thead class="text-primary">
    <tr>
        @foreach($headers as $header => $data)
            <th>{{ $header }}</th>
        @endforeach
        @if($actions !== null)
            <th class="text-right">Actions</th>
        @endif
    </tr>
</thead>
