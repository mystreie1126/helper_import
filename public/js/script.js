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



   $("#export").click((e)=>{e.preventDefault; $('.data_table').table2csv()});



$('#update_ref').click((e)=>{
    e.preventDefault();

    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

$.ajax({
    url:"http://localhost:8080/helper/public/update_reference",
    type:'post',
    dataType:'json',
    data:{
        old_ref:$('#old_ref').val(),
        new_ref:$('#new_ref').val()
    },
    success:function(res){
        console.log(res);
    }

})


});





axios({method:'get',url:'http://localhost:8080/helper/public/stockinfo'}).then((res)=>{console.log(res.data)});



var tbl = new Vue({
  el:'.tbl',
  data:{
    results:[]
  },
  created(){
    axios({method:'get',url:'http://localhost:8080/helper/public/stockinfo'}).then((res)=>{
      console.log(res.data);
      tbl.results = res.data
    });

  },
  methods:{
    getcsv:function(){
      $('.tbl').table2csv()
    }
  },
  updated(){
     $('.tbl').table2csv()
  }


})






