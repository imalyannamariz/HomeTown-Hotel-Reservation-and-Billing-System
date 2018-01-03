<!DOCTYPE html>
<!-- saved from url=(0100)file:///C:/Users/resetfactory/Desktop/Bootstrap/Bootstrap%20Admin/Rooms_files/saved_resource(1).html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                                
                                <meta name="viewport" content="width=device-width, initial-scale=1">
                                <title>Snippet - Bootsnipp.com</title>
                                <link href="./bootstrap.min(1).css" rel="stylesheet">
                                <style></style>
                                <script type="text/javascript" src="./jquery-1.10.2.min.js.download"></script>
                                <script type="text/javascript" src="./bootstrap.min.js(1).download"></script>
                                <script type="text/javascript">$(document).ready(function(){
$("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    
    $("[data-toggle=tooltip]").tooltip();
});
</script>
                            </head>
                            <body style="" class="">
                            <script src="./jquery.min.js.download"></script>
<script src="./bootstrap.min.js(2).download"></script>

<div class="container">
	<div class="row">
		
        
        <div class="col-md-12">
        <h4>HomeTown Hotel Admin</h4>
        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <tr><th><input type="checkbox" id="checkall"></th>
                   <th>Room Name</th>
                    <th>Room Number</th>
                     <th>Room Description</th>
                     
                     
                      <th>Edit</th>
                      
                       <th>Delete</th>
                   </tr></thead>
    <tbody>
    
    <tr>
    <td><input type="checkbox" class="checkthis"></td>
    <td>Queen Room #1</td>
    <td>QR1</td>
    <td>2 BEDS 1 CR</td>
    
    
    <td><p data-placement="top" data-toggle="tooltip" title="" data-original-title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="" data-original-title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>
    
 <tr>
    <td><input type="checkbox" class="checkthis"></td>
    <td></td>
    <td></td>
    <td></td>
    
    
    <td><p data-placement="top" data-toggle="tooltip" title="" data-original-title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="" data-original-title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>
    
    
 <tr>
    <td><input type="checkbox" class="checkthis"></td>
    <td></td>
    <td></td>
    <td></td>
    
    
    <td><p data-placement="top" data-toggle="tooltip" title="" data-original-title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="" data-original-title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>
    
    
    
 <tr>
    <td><input type="checkbox" class="checkthis"></td>
    <td></td>
    <td></td>
    <td></td>
    
    
    <td><p data-placement="top" data-toggle="tooltip" title="" data-original-title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="" data-original-title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>
    
    
 <tr>
    <td><input type="checkbox" class="checkthis"></td>
    <td></td>
    <td></td>
    <td></td>
    
    
    <td><p data-placement="top" data-toggle="tooltip" title="" data-original-title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="" data-original-title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>
    
   
    
   
    
    </tbody>
        
</table>

<div class="clearfix"></div>
<ul class="pagination pull-right">
  <li class="disabled"><a href="https://bootsnipp.com/snippets/featured/bootstrap-snipp-for-datatable#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
  <li class="active"><a href="https://bootsnipp.com/snippets/featured/bootstrap-snipp-for-datatable#">1</a></li>
  <li><a href="https://bootsnipp.com/snippets/featured/bootstrap-snipp-for-datatable#">2</a></li>
  <li><a href="https://bootsnipp.com/snippets/featured/bootstrap-snipp-for-datatable#">3</a></li>
  <li><a href="https://bootsnipp.com/snippets/featured/bootstrap-snipp-for-datatable#">4</a></li>
  <li><a href="https://bootsnipp.com/snippets/featured/bootstrap-snipp-for-datatable#">5</a></li>
  <li><a href="https://bootsnipp.com/snippets/featured/bootstrap-snipp-for-datatable#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
</ul>
                
            </div>
            
        </div>
	</div>
</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Room Name">
        </div>
        <div class="form-group">
        
        <input class="form-control " type="text" placeholder="Room Number">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" placeholder="Room Description"></textarea>
    
        
        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;Update</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
    
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>&nbsp;No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
                            
                        </body></html>