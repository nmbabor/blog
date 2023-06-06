/*==== For Dynamic Image Upload*/

function photoLoad(input,id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#'+id).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

tinymce.init({
  selector: '.tinymce',
  menubar: false,
  height: 400,
  theme: 'modern',
  plugins: 'image code link lists textcolor imagetools colorpicker ',
browser_spellcheck: true,
  toolbar1: 'formatselect | bold italic strikethrough | link image | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
  // enable title field in the Image dialog
  image_title: true, 
  // enable automatic uploads of images represented by blob or data URIs
  automatic_uploads: true,
  // URL of our upload handler (for more details check: https://www.tinymce.com/docs/configure/file-image-upload/#images_upload_url)
  // images_upload_url: 'postAcceptor.php',
  // here we add custom filepicker only to Image dialog
  file_picker_types: 'image', 
  // and here's our custom image picker
  file_picker_callback: function(cb, value, meta) {
    var input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');
    
    // Note: In modern browsers input[type="file"] is functional without 
    // even adding it to the DOM, but that might not be the case in some older
    // or quirky browsers like IE, so you might want to add it to the DOM
    // just in case, and visually hide it. And do not forget do remove it
    // once you do not need it anymore.

    input.onchange = function() {
      var file = this.files[0];
      
      var reader = new FileReader();
      reader.onload = function () {
        // Note: Now we need to register the blob in TinyMCEs image blob
        // registry. In the next release this part hopefully won't be
        // necessary, as we are looking to handle it internally.
        var id = 'blobid' + (new Date()).getTime();
        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        var base64 = reader.result.split(',')[1];
        var blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        // call the callback and populate the Title field with the file name
        cb(blobInfo.blobUri(), { title: file.name });
      };
      reader.readAsDataURL(file);
    };
    
    input.click();
  }
});

var abc = 0; //Declaring and defining global increement variable
//To add new input file field dynamically, on click of "Add More Files" button below function will be executed
    $('#add_more').click(function() {
        $(this).before($("<div/>", {id: 'filediv'}).fadeIn('slow').append(
                $("<input/>", {name: 'photo[]', type: 'file', id: 'files'})
                ));
    });

    $('#package_category').on('change',function(){
        var cat_id= $('#package_category').val();
        var url=$('.url').attr('id');
        var $sub_category=$("#sub_category");
        if(cat_id===null)
        {
            $sub_category.html('');
        }
        else
        {
            $.ajax({
            url: url+"/package-category/"+cat_id,
            type: 'GET',
            success: function(result) {
                var append="";
               
                
                for (var i =0 ; i <result.length ; i++) {
                     if(result[i].length!=0){
                    append=append+"<label class='control-label col-md-3' >"+result[i][0]['category_name']+"</label><div class='col-md-8'><input type='hidden' name='exist_cat[]' value='"+result[i][0]['category_id']+"'><select id='sub_category_select' name='sub_category[]' class='form-control'><option value=''>--select--</option>";
                    var innerLength=result[i].length;
                    for (var j =0 ; j < innerLength ; j++) {
                    append=append+"<option value='"+result[i][j]['sub_id']+"'>"+result[i][j]['sub_name']+"</option>";
                    };
                    append=append+"</select></div></br></br>";
                     }

                    
                };
                $sub_category.html(append);
            

            }
        });
        }
        

    });

//following function will executes on change event of file input to select different file   
$('body').on('change', '#files', function(){
            if (this.files && this.files[0]) {
                 abc += 1; //increementing global variable by 1
                
                var z = abc - 1;
                var x = $(this).parent().find('#previewimg' + z).remove();
                $(this).before("<div id='abcd"+ abc +"' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
               
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
               
                $(this).hide();
                $("#abcd"+ abc).append($("<img/>", {id: 'img', src:'/public/img/x.png', alt: 'X',title: 'Delete'}).click(function() {
                $(this).parent().parent().remove();
                }));

            }
        });


//To preview image     
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };

    $('#upload').click(function(e) {
        var name = $(":photo").val();
        if (!name)
        {
            alert("First Image Must Be Selected");
            e.preventDefault();
        }
    });

/*============*/
$('img#exist_img').click(function() {
    var exist_val = $(this).prev().val();
    $('<input name="del_photo[]" type="hidden" />').appendTo('#loadDelete').val(exist_val);
    $(this).parent().parent().remove();
    })
/*==== For Dynamic Image Upload*/
$(document).ready(function(){
    $("#file").change(function(){
        readURL(this);
    });

});

function loadPhoto(input,id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#'+id).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image_load').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
/*============*/
