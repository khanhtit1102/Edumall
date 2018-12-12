$(document).ready(function() {
    $('#example').DataTable();
} );
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
	
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
function delete_confirm(){
    if($('.checkbox:checked').length > 0){
        var result = confirm("Bạn có chắc muốn xóa những bản ghi đã chọn?");
        if(result){
            return true;
        }else{
            return false;
        }
    }else{
        alert('Chọn ít nhất 1 bản ghi để xóa.');
        return false;
    }
}