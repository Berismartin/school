<?php

include 'conn/conn.php';

if(!isset($_POST['term_id']) || !isset($_POST['class_id']) || !isset($_POST['stream_id']) || !isset($_POST['subj_id']) || !isset($_POST['tr_id']) || !isset($_POST['std_id']) ){
    echo 0;
}else{
    $term_id = $_POST['term_id'];
    $class_id = $_POST['class_id'];
    $stream_id = $_POST['stream_id'];
    $subj_id = $_POST['subj_id'];
    $tr_id = $_POST['tr_id'];
    $std_id = $_POST['std_id'];
    $mark = $_POST['mark'];
    $exam = $_POST['exam_typ'];


    // correct the mark

    if($mark == ''){
        $mark = 0;
    }

// first check if students has some marks

    $std_sel = $db->prepare("SELECT * FROM results WHERE std_id = ?");
    $std_sel->bindparam(1, $std_id);
    $std_sel->execute(); 
     $t  = $std_sel->fetch();

    if($std_sel->rowCount() ==1){

       

        if(empty($t['term_id'])){
            $marks_update = "UPDATE results SET 
            term_id = '$term_id',
            class_id = '$class_id',
            subject_id = '$subj_id',
            $exam = '".$mark."',
            teacher_id = '$tr_id' WHERE std_id = ?";
            
            $ins_marks= $db->prepare($marks_update);
            $ins_marks->bindparam(1, $std_id); 
            $succ = $ins_marks->execute();
     
            if($succ){
                echo 1;
            }else{
                echo 0;
            }
        }else if($t['term_id'] == $term_id){
            $marks_update = "UPDATE results SET 
            $exam = '".$mark."' WHERE std_id = ?";
            
            $ins_marks= $db->prepare($marks_update);
            $ins_marks->bindparam(1, $std_id); 
            $succ = $ins_marks->execute();
     
            if($succ){
                echo 1;
            }else{
                echo 0;
            }

        }else{
            $mark_inss = "INSERT INTO 
        results(std_id, term_id, class_id, subject_id, teacher_id, $exam)
        VALUES (:std_id, :term_id, :class_id, :subject_id, :teacher_id, :exam)";

            $stmt = $db->prepare($mark_inss);
            $stmt->bindparam(':std_id', $std_id);
            $stmt->bindparam(':term_id', $term_id);
            $stmt->bindparam(':class_id', $class_id);
            $stmt->bindparam(':subject_id', $subj_id);
            $stmt->bindparam(':teacher_id', $tr_id);
            $stmt->bindparam(':exam', $mark);
            $succ = $stmt->execute();

            if($succ){
                echo 1;
                }else{
                    echo 0;
                }
        }

         
    }else if($std_sel->rowCount() ==2){
        // reselect the student
        $q = $db->prepare("SELECT * FROM results WHERE std_id = ? AND term_id = ?");
        $q->bindparam(1, $std_id);
        $q->bindparam(2, $term_id);
        $q->execute();
        $ss = $q->fetch();
        

        if($ss['term_id'] == $term_id){
            $marks_update = "UPDATE results SET 
            $exam = '".$mark."' WHERE std_id = ? AND term_id = ?";
            
            $ins_marks= $db->prepare($marks_update);
            $ins_marks->bindparam(1, $std_id);
            $ins_marks->bindparam(2, $term_id); 
            $succ = $ins_marks->execute();
     
            if($succ){
                echo 1;
            }else{
                echo 0;
            }

        }else{
            $mark_inss = "INSERT INTO 
        results(std_id, term_id, class_id, subject_id, teacher_id, $exam)
        VALUES (:std_id, :term_id, :class_id, :subject_id, :teacher_id, :exam)";

            $stmt = $db->prepare($mark_inss);
            $stmt->bindparam(':std_id', $std_id);
            $stmt->bindparam(':term_id', $term_id);
            $stmt->bindparam(':class_id', $class_id);
            $stmt->bindparam(':subject_id', $subj_id);
            $stmt->bindparam(':teacher_id', $tr_id);
            $stmt->bindparam(':exam', $mark);
            $succ = $stmt->execute();

            if($succ){
                echo 1;
                }else{
                    echo 0;
                }
        }
    }else if($std_sel->rowCount() ==3){
        // reselect the student
        $q = $db->prepare("SELECT * FROM results WHERE std_id = ? AND term_id = ?");
        $q->bindparam(1, $std_id);
        $q->bindparam(2, $term_id);
        $q->execute();
        $ss = $q->fetch();
        

        if($ss['term_id'] == $term_id){
            $marks_update = "UPDATE results SET 
            $exam = '".$mark."' WHERE std_id = ? AND term_id = ?";
            
            $ins_marks= $db->prepare($marks_update);
            $ins_marks->bindparam(1, $std_id);
            $ins_marks->bindparam(2, $term_id); 
            $succ = $ins_marks->execute();
     
            if($succ){
                echo 1;
            }else{
                echo 0;
            }

        }
    }
}

?>