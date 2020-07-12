
$("#btn_etudiant_submit").on("click",function(){
  
  console.log($("#form_etu_edit").serializeArray());
     
     $.ajax({
               method: "POST",
         url:"http://127.0.0.1:8000/etudiant/ajax",
               data:$("#form_etu_edit").serialize(), 
               //dataType: "JSON",
           })
           .done(data =>{
             console.log(data);
         alert(data);
       })
   
   })//testsok