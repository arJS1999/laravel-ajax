<html>
<head>
    <title>Datatables Server Side Processing in Laravel</title>
    
    <!-- <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>       
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</head>
<body>

<div class="container">
    <br />
    <br /><label>search</label>
    <input type="text" id="search">
    <table id="student_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</div>
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editmodal">
  Launch demo modal
</button> -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden"  id="edit_id">
    <div class="form-group mb-3">
        <label>first name</label>
        <input type="text" id="first_name" name="firstname form-control">
    </div>
     <div class="form-group mb-3">
        <label>last name</label>
        <input type="text" id="last_name" name="lastname form-control">
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary updatename">Save</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
     // $('#student_table').DataTable({
     //    "processing": true,
     //    "serverSide": true,
     //    
     //    "columns":[
     //        { "data": "firstname" },
     //        { "data": "lastname" }
     //    ]
     // });
     fetch();
     function fetch(){
        $.ajax({
            url:"ajaxdata",
            type:"get",
            
            success:function(data){

                console.log(data);
                $('tbody').html("");
                $.each(data,function(key,value){
                    $('tbody').append('<tr><td>'+value.firstname+'</td><td>'+value.lastname+'</td><td><button type="button" value="'+value.id+'" class="edit btn btn-primary" data-toggle="modal" data-target="#editmodal" >Edit</button></td></tr>');
                })
            }
        })
           
     }
     $(document).on('click','.edit',function(e){
        e.preventDefault();
        var findid=$(this).val();
                $('#editmodal').modal('show');

        console.log(findid);
                

        $.ajax({
            url:"edit",
            type:"get",
            data:{id:findid},
            success:function(data){
                console.log(data);
           $('#first_name').val(data.firstname);
           $('#last_name').val(data.lastname);
           $('#edit_id').val(data.id);    
            }
        })
     });
      $('#search').keyup(function() {
                
           var ans=$('#search').val();
           
           $.ajax({
            url:"ajaxdata/getdata",
            type:"get",
            data:{name:ans},
            success:function(any){
                console.log(any);
                $('tbody').html("");
                $.each(any,function(key,value){
                    $('tbody').append('<tr>\<td>'+value.firstname+'</td>\<td>'+value.lastname+'</td>\</tr>');
                })

            }
        })
        })
});
</script>
</body>
</html>

