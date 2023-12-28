<!-- File: yearly_report.blade.php -->

<table>
    <thead>
        <tr>
            <th>Month</th>
            @foreach ($platforms as $platform)
            <th>{{ $platform->name }}</th>
            @endforeach
            <th>Grand Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($months as $month => $monthName)
        <tr>
            <td>{{ $monthName }}</td>
            @foreach ($platforms as $platform)
            <td>{{ number_format($totals[$month][$platform->id], 2) }}$</td>
            @endforeach
            <td>{{ number_format($totals[$month]['total'], 2) }}$</td>
        </tr>
        @endforeach
        <!-- Grand Total Row -->
        <tr>
            <td>Grand Total</td>
            @foreach ($platforms as $platform)
            <td>{{ number_format($grandTotal['total'][$platform->id], 2) }}$</td>
            @endforeach
            <td>{{ number_format($grandTotal['total']['total'], 2) }}$</td>
        </tr>
    </tbody>
</table>
