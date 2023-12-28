<table>
    <thead>
        <tr>
            <th>Brand</th>
            @foreach ($months as $month => $monthName)
                <th>{{ is_string($monthName) ? $monthName : '' }}</th>
                @if ($month % 3 == 0)
                    <th>Q{{ is_string($monthName) ? $month / 3 : '' }}</th>
                @endif
            @endforeach
            <th>Total</th>
            <th>Can</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($brands as $brand)
            <tr>
                <td>{{ $brand->name }}</td>
                @foreach ($months as $month => $monthName)
                    <td>{{ is_string($monthName) ? number_format($totals[$month][$brand->id], 2) : '' }}</td>
                    @if ($month % 3 == 0)
                        <td>{{ is_string($monthName) ? number_format($brandTotals[$brand->id]['Q' . ($month / 3)], 2) : '' }}</td>
                    @endif
                @endforeach
                <td>{{ number_format($grandTotal['total'][$brand->id], 2) }}</td>
                <td>{{ number_format(($grandTotal['total'][$brand->id] * 0.1) / 100, 2) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
