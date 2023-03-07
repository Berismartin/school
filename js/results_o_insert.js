$(document).ready(function(){
    
    // Add Class
    $('.mark_o_edit').click(function(){
        $(this).addClass('editMode');
    
    });

    // Save data
    $(".mark_o_edit").focusout(function(){
        $(this).removeClass("editMode");
 
        var term_id  = $(this).attr('term_id');
        var class_id  = $(this).attr('class_id');
        var stream_id  = $(this).attr('stream_id');
        var subj_id  = $(this).attr('subj_id');
        var tr_id  = $(this).attr('tr');
        var std_id  = $(this).attr('std_id');
        var mark = $(this).text();
        var exam_typ = $(this).attr('exam');

         
        
        
        $.ajax({
            url: 'auto_o_save.php',
            method: 'POST',
            data: {
                term_id:term_id,
                class_id:class_id,
                stream_id: stream_id,
                subj_id: subj_id,
                tr_id: tr_id,
                std_id: std_id,
                mark: mark,
                exam_typ: exam_typ
            },
            success:function(response){ 
                if(response == 1){ 
                    console.log('Save successfully');
                   
                    
                }else{ 
                    console.log("Not saved."); 
                  
                }             
            }
        });
    });

});
