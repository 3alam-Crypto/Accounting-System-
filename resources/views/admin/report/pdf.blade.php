<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>A Fancy Table</h1>

<table id="customers">
    <thead>
        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th class="min-w-100px">Brand</th>
            @foreach ($platforms as $platform)
            <th class="min-w-75px">{{ $platform->name }}</th>
            @endforeach
            <th class="text-end min-w-75px">Total</th>
            <th class="text-end min-w-75px">GROSS MARGIN</th>
            <th class="text-end min-w-100px">%</th>
        </tr>
    </thead>
    <tbody class="fw-semibold text-gray-600">
        @foreach ($brands as $brand)
        <tr>
            <td>{{ $brand->name }}</td>
            @foreach ($platforms as $platform)
            <td class="text-end pe-0">
                {{ number_format($totals[$brand->id][$platform->id], 2) }}$
            </td>
            @endforeach
            <td class="text-end pe-0"> {{ number_format($brandTotals[$brand->id], 2) }}$ </td>
            <td class="text-end pe-0"> </td>
            <td class="text-end"></td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>