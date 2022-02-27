
function ShowImgPreview(input) {
    var target = 'prevImg' + input.id;
    if (input.files && input.files[0]) {
        var ImageDir = new FileReader();
        ImageDir.onload = function (e) {
            $('#' + target).attr('src', e.target.result);
        }
        ImageDir.readAsDataURL(input.files[0]);
    }
}
