<style type="text/css">
    body {
        font-family: sans-serif;
        background: #fff5f5;
    }
    input, button {
        font-size: 15px;
        padding: 5px;
    }
    button {
        background: #333;
        color: #fff;
    }

    /**
    * Nestable Draggable Handles
    */
    .dd3-content { 
        display: block;
        height: 45px;
        padding: 5px 10px 5px 54px;
        color: #333;
        text-decoration: none;
        font-weight: bold;
        line-height: 32px;
        border: 1px solid #ccc;
        background: #fafafa;
        background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
        background: -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
        background: linear-gradient(top, #fafafa 0%, #eee 100%);
        -webkit-border-radius: 3px;
        border-radius: 0;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .dd3-content:hover {
        color: #2ea8e5;
        background: #fff;
    }

    .dd-dragel > .dd3-item > .dd3-content {
        margin: 0;
    }

    
    .dd3-item {
        margin: 10px 0;
    }
    .dd3-item > button {
        margin-left: 30px;
    }

    .dd3-handle {
        position: absolute;
        margin: 0;
        left: 0;
        top: 0;
        cursor: move;
        width: 45px;
        height: 45px;
        text-indent: 70px;
        white-space: nowrap;
        overflow: hidden;
        border: 1px solid #aaa;
        background: #ddd;
        background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
        background: -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
        background: linear-gradient(top, #ddd 0%, #bbb 100%);
        border-radius: 0;
    }

    .dd3-handle:before {
        content: '≡';
        display: block;
        position: absolute;
        left: 0;
        top: 12px;
        width: 100%;
        text-align: center;
        text-indent: 0;
        color: #fff;
        font-size: 25px;
        font-weight: bolder;
    }

    .dd3-handle:hover {
        background: #ddd;
    }

    .item-edit {
        font-size: 13px;
        float: right;
        color: rgb(49, 35, 248);
        cursor: pointer;
    }
    .item-edit:hover {
        text-decoration: underline;
    }

    .item-settings.d-none {
        display: none!important;
    }
    .item-settings {
        display: block;
        padding: 10px;
        position: relative;
        z-index: 10;
        border: 1px solid #e5e5e5;
        background: #fff;
        border-top: none;
        box-shadow: 0 1px 1px rgba(0,0,0,.04);
    }
    .item-settings p {
        margin-top: 0;
    }

    .item-settings p label {
        font-size: 13px;
        color: #666;
        line-height: 1.5;
    }

    .item-settings p label input {
        border: 1px solid #ddd;
        box-shadow: inset 0 1px 2px rgba(0,0,0,.07);
        background-color: #fff;
        color: #32373c;
        outline: 0;
        border-spacing: 0;
        width: -webkit-fill-available;
        clear: both;
        margin: 0;
        font-size: 14px;
        padding: 5px;
        border-radius: 0;
    }

    .item-settings .item-delete {
        color: #a00;
    }

</style>


        <!-- Begin page -->
<div id="layout-wrapper"> 
    <style>

        .form-check-input {
            background-color: #e5e5e5;
        }
        .blockquote {
                border-left: 4px solid #224a98;
        }
        .blockquote h5{
            color: #224a98;
        }
    </style>
<div class="main-content">

    <div class="page-content">
    <div class="card mt-n4 mx-n3 border-0 rounded-0 bg-primary-subtle breadcrumb_bg">
    <div class="card-body pb-0 px-4">
      <div class="container-fluid">
        <div class="row justify-content-between align-items-center g-3 mb-5 pb-1 pt-3">
          <div class="col-lg-4">
            <h4 class="mb-0">Menus</h4>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="container-fluid">
        <div class="row mt-n5">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <div class="card">
                <div class="card-body">
                    <div class="row">
                        
                    <div class="col-sm-6">
                        <div class="card p-3">
                            <figure class="mb-0">
                              <blockquote class="blockquote">
                                  <h5 class="mb-0">Menu Title</h5>
                              </blockquote>
                            </figure>
                            <form id="addMenuForm" action="<?php echo SITEURL;?>menus/updateMenuDetails" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                          <label for="firstNameinput" class="form-label">Menu Name*</label>
                                          <input type="text" class="form-control" placeholder="Menu Name" id="firstNameinput" name="menu_name" value="<?php echo $this->menuDetails['menu_name'];?>" >
                                        </div>
                                    </div>

                                    

                                         <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="menu_contenttype" class="form-label">Content Type*</label>
                                        <select id="menu_contenttype" class="form-select" name="menu_type">
                                            <option value="" selected>Select</option>
                                            <option value="page" <?php echo ($this->menuDetails['menu_type'] == 'page') ? 'selected' : ''; ?>>Content Page</option>
                                            <option value="module" <?php echo ($this->menuDetails['menu_type'] == 'module') ? 'selected' : ''; ?>>Module</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="conid" class="form-label">Select Content*</label>
                                        <span id="conid">
                                            <select class="form-select" name="menu_module">
                                                <option value="" selected>--Please Select Content--</option>
                                                
                                            </select>
                                        </span>
                                    </div>
                                </div>

                                   

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Menu Status</label>
                                            
                                            <div class="row">
                                                <div class="col-sm-3 col-xs-6">
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio"  id="flexRadioDefault16"  name="menu_status" value="y" <?php if($this->menuDetails['menu_status'] == 'y') echo "checked"; ?> >
                                                        <label class="form-check-label" for="flexRadioDefault16">
                                                           Active
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-xs-6">
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio"  id="flexRadioDefault17"  name="menu_status" value="n" <?php if($this->menuDetails['menu_status'] == 'n') echo "checked"; ?> >
                                                        <label class="form-check-label" for="flexRadioDefault17">
                                                         In-Active
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>

                                        </div>
                                        
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                           <div class="text-start">
                                            <input type="hidden" name="menu_id" value="<?php echo $this->menuDetails['menu_id'];?>">


                                              <input type="submit" value="Update" name="submit" class="btn btn-primary">

                                            <button type="button" class="btn btn-danger" onClick="window.history.go(-1);">Cancel</button>
                                        </div>
                                    </div>  

                                </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card p-3">
                          <figure class="mb-0">
                            <blockquote class="blockquote">
                              <h5 class="mb-0">Menu</h5>
                              <div class="dd" id="nestable">
                            <?php echo $this->menuDisplayString; ?>
                          </div>
                              <div class="btns">
                                <button class="btn btn-danger show-tooltip" data-original-title="Reset" id="loadreset"><i class="bi bi-recycle"></i></button>
                                <button class="btn btn-success show-tooltip" data-original-title="Save" id="serialize" ><i class="bi bi-save "></i></button>
                              </div>
                            </blockquote>
                          </figure>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>  
            </div>
        </div> 
    </div>
        <!--end row-->

</div>

</div>











<script type="text/javascript"> 
// <![CDATA[
$(document).ready(function () {
$("#divsuccess").fadeOut(5000);
$('#loadreset').click(function () {  
loadList();
});        
function loadList() {

$.ajax({
    type: 'post',
    url: "<?php echo SITEURL;?>menus/ajaxDisplayMenu",
    data: 'getmenus=1',
    cache: false,
    success: function (html) {
        $("div.sortable").html(html);
    }
});
}
loadList();
function showResponse(msg) {
$(this).html(msg);
setTimeout(function () {
    $(loadList()).fadeIn("slow");
}, 2000);
$("html, body").animate({
    scrollTop: 0
}, 600);
}


$('#serialize').click(function () {
    serialized = JSON.stringify($('#nestable').nestable('serialize'));
    //serialized += '&sortmenuitems=1';

    $.ajax({
        method: 'post',
        url: "<?php echo SITEURL;?>menus/ajaxSaveMenu",
        data: 'menu='+serialized,
        success: function (msg) {
          $("#divSuccessMsg").show();
          $("#divSuccessMsg").html(msg);
          $(loadList()).fadeIn("slow");   
          $("#divSuccessMsg").fadeOut(10000);
        }

    });
});

$('#menu_contenttype').change(function () {
var option = $(this).val();
console.log(option);
if(option == 'page') {

    $.ajax({
        url:'<?php echo SITEURL; ?>footer_menu/getAllPages',
        type: 'POST',
        datatype:'json',
        success:function(data){
            console.log(data);
            
            data = JSON.parse(data);
            var htmlString ='';
            htmlString += '<select id="select" class="form-select" name="menu_module" >';
            htmlString += '<option value="" selected >Select Page</option>';  
            $.each(data,function(i){
                console.log(data[i]);
                htmlString +='<option value='+data[i]["meta_title"]+'>'+data[i]["page_title"]+'</option>';
            });
            htmlString+='</select>';
            $("#conid").empty();
            $("#conid").html(htmlString);
        }

    });
}else if(option == 'module') {
   $.ajax({
    url: '<?php echo SITEURL; ?>footer_menu/getAllModules',
    type: 'POST',
    dataType: 'json', // Corrected to dataType
    success: function(data) {
        console.log(data); // Logs the data for debugging

        var htmlString = '';
        htmlString += "<select id='select' name='menu_module' class='form-control'>";
        htmlString += "<option value=''>Select Module</option>";
        
        // Use $.each to iterate through the data array
        $.each(data, function(i, item) {
            htmlString += "<option value='" + item.module_name + "'>" + item.module_name + "</option>";
        });

        htmlString += "</select>";
        
        // Append the HTML to the element with id 'conid'
        $("#conid").html(htmlString);
    },
  
});

} else {    
    var htmlString ='';
    htmlString += "<input name='menu_link' type='text' class='form-control'  value='' size='25'>"
    htmlString += "<select name='menu_target' style='width:100px;' class='select'>"
    htmlString += "<option value=''>target</option>"
    htmlString += "<option value='_blank'>Blank</option>"
    htmlString += "<option value='_self'>Self</option>"
    htmlString += "</select></div>"
    htmlString += "<input name='page_id' type='hidden' value='0' />";
  $('#conid').html(htmlString).show();
}
});
});



function deleteMenu(id){ 
if(confirm("Are You Sure Delete!")){    
$.ajax({
    type: "POST",
    url: "<?php echo SITEURL;?>menus/deleteMenuItems",
    data: 'deletId='+ id +'&delete=delete',
    success:function(data) {
     //document.location.reload();
     //alert(data);
     $('#list_'+id).hide();
     $('#divSuccessMsg').show();
    $('#divSuccessMsg').html("<i class='icon-check'></i><span class='text-success'>Record deleted Sucessfully </span>")
    .fadeIn(1000).fadeOut(5000); 
    }
    });
} else {
return false;
}
}



</script> 