<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Customer Name</th>
            <th>Site Name</th>
            <th>ID Unit</th>
            <th>ID Invoice</th>
            <th>Invoice Amount</th>
            <th>Deal Price</th>
            <th>Tanggal Konfirmasi</th>
            <th>Note</th>
            <th>Diproses Oleh</th>
            <th>Tanggal Cetak Invoice</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($data as $payment)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $payment->name_customer }}</td>
            <td>{{ $payment->name_site }}</td>
            <td>{{ $payment->code_unit }}</td>
            <td>{{ $payment->code_payment }}</td>
            <td>{{ $payment->inv_amount }}</td>
            <td>{{ $payment->deal_price }}</td>
            <td>{{ $payment->confirmation_date }}</td>
            <td>{{ $payment->note }}</td>
            <td>{{ $payment->sales }}</td>
            <td>{{ $payment->print_date }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
