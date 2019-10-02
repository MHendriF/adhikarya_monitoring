<table>
    <thead>
        <tr>
            <th>No</th>
            <th>ID Sales</th>
            <th>Name</th>
            <th>Username</th>
            <th>email</th>
            <th>gender</th>
            <th>status</th>
            <th>place of birth</th>
            <th>date of birth</th>
            <th>phone</th>
            <th>address</th>
            <th>postal code</th>
            <th>city</th>
            <th>province</th>
            <th>bank name</th>
            <th>rekening</th>
            <th>ktp</th>
            <th>npwp</th>
            <th>site</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($data as $sales)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $sales->code_user }}</td>
            <td>{{ $sales->name_user }}</td>
            <td>{{ $sales->username }}</td>
            <td>{{ $sales->email }}</td>
            <td>{{ $sales->gender }}</td>
            <td>{{ $sales->status }}</td>
            <td>{{ $sales->place_of_birth }}</td>
            <td>{{ $sales->date_of_birth }}</td>
            <td>{{ $sales->phone }}</td>
            <td>{{ $sales->address_1 }}</td>
            <td>{{ $sales->postal_code }}</td>
            <td>{{ $sales->city }}</td>
            <td>{{ $sales->province }}</td>
            <td>{{ $sales->bank_name }}</td>
            <td>{{ $sales->bank_account_number }}</td>
            <td>{{ $sales->ktp }}</td>
            <td>{{ $sales->npwp }}</td>
            <td>{{ $sales->name_site }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
