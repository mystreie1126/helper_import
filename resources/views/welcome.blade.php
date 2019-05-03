@extends('template')
@section('content')
<h2>Export product details inlcude image url in CSV </h2>
<input type="show" value="612" class="get_product">
<button>click</button>
<button style="padding:10px; background:teal; color:#fff" id="export">Export</button>

<table class="data_table">
    <thead>
        <tr>
            <th>name</th>
            <th>Barcode</th>
            <th>updated Quantity</th>
            <th>updated Time</th>
            <th>send_qty</th>
            <th>current Quantity</th>
        </tr>
    </thead>
    <tbody id="data">

    </tbody>
</table>

@stop