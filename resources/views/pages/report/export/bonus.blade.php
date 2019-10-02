<table>
    <thead>
        <tr>
            <th>No</th>
            <th>ID Sales</th>
            <th>Site Name</th>
            <th>Sales Name</th>
            <th>Bonus Point</th>
            <th>Sold Valued</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($data as $bonus)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $bonus->code_user }}</td>
            <td>{{ $bonus->name_site }}</td>
            <td>{{ $bonus->name_user }}</td>
            <td>{{ $bonus->bonus_point }}</td>
            <td>{{ $bonus->sold_valued }}</td>
            <td>{{ $bonus->status }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
