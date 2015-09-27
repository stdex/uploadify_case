<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru" >
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="uploadify/uploadify.css" type="text/css" />
<script type="text/javascript" src="uploadify/jquery.uploadify.js"></script>
</head>
<body>

<script type="text/javascript">
$(document).ready(function() {

    $("#file_upload").fileUpload({
        'uploader': 'uploadify/uploader.swf',
        'cancelImg': 'uploadify/cancel.png',
        'script': 'libs/upload_handler.php',
        'folder': '',
        'buttonText': 'Select files ...',
      //'checkScript': 'upload/uploadify/check.php',
      //'fileDesc': 'images',
        'auto':false,
        'fileExt': '*.jpg;*.jpeg;*.gif;*.png',
        'multi': true,
      //'scriptData': '',
        'displayData': 'percentage',
        onComplete: function (){
            $("#upload_result").css("display", "block");
            $("#upload_result").html("Файлы загружены");
        },
        onUploadError : function(file, errorCode, errorMsg, errorString) {
            alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
        },
        onDialogOpen : function() {
            console.log("123");
            $("#upload_result").css("display", "none");
            $("#upload_result").html("");
        }
       });

});

function startUpload(id)
{
    $('#'+id).fileUploadStart();
}

</script>

<input id="file_upload" type="file" name="file_upload" />
<button name="submit" type="submit" style="margin-top:10px;margin-bottom:10px;" onclick="javascript:startUpload('file_upload')" >Загрузить</button>
<span id="upload_result" style="display: none;"></span>

</body>
</html>
