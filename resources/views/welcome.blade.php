<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
</head>
<body>

<input type="show" value="612" class="get_product">
<button>click</button>
<button style="padding:10px; background:teal; color:#fff" id="export">Export</button>

<table class="data_table">
    <thead>
        <tr>
            <th>name</th>
            <th>ref</th>
            <th>url</th>
        </tr>
    </thead>
    <tbody id="data">

    </tbody>
</table>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{URL::asset('js/table2csv.js')}}"></script>
<script type="text/javascript">

   function geturl(img_id){
     let b = img_id.toString().split('');
     let a = [];
     for(let i = 0 ; i <b.length;i++){
        a.push(b[i]+"/");
     }

     a.join('');
     return "http://old.funtechglobal.com/img/p/"+ a.join('')+img_id+".jpg";
   }

    $('button').click(function(e){
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $.ajax({
            url:window.location.href +'product',
            type:'post',
            dataType:'json',
            data:{
                cata_id : $('.get_product').val()
            },
            success:function(response){
                console.log(response);
                let html = "";

                response.forEach((e,i)=>{
                     html += "<tr>"+
                        "<td>"+e.name+"</td>"+
                        "<td>"+e.reference+"</td>"+
                        "<td>"+geturl(Number(e.id_image))+"</td>"
                        "</tr>"
                });

                $("#data").html(html);
            }
        })

    });



    $("#export").click((e)=>{e.preventDefault; $('.data_table').table2csv()})

</script>

</body>
</html>