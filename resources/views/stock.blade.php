@extends('template')
@section('content')

<table class="tbl">
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
    <tbody v-if="results.length > 0">
       <tr v-for="r in results">
          <td>@{{r.name}}</td>
          <td>@{{r.barcode}}</td>
          <td>@{{r.updated_qty}}</td>
          <td>@{{r.updated_time}}</td>
          <td>@{{r.send_qty}}</td>
          <td>@{{r.current_qty}}</td>
      </tr>
    </tbody>
    <input type="button" value="getCsv">
</table>

@stop