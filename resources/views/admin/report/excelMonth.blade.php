<!-- File: monthly_report.blade.php -->

<table>
    <thead>
        <tr>
            <th>Brand</th>
            @foreach ($platforms as $platform)
            <th>{{ $platform->name }}</th>
            @endforeach
            <th>Total</th>
            <th>GROSS MARGIN</th>
            <th>%</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($brands as $brand)
        <tr>
            <td>{{ $brand->name }}</td>
            @foreach ($platforms as $platform)
            <td>{{ number_format($totals[$brand->id][$platform->id], 2) }}$</td>
            @endforeach
            <td>{{ number_format($brandTotals[$brand->id], 2) }}$</td>
            <td>{{ number_format($brandGrossMargins[$brand->id], 2) }}$</td>
            <td>{{ number_format($Percentages[$brand->id], 2) }}%</td>
        </tr>
        @endforeach
    </tbody>
</table>
