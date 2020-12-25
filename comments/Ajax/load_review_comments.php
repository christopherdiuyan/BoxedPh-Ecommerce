<?php

session_start();

require_once '../Config/Functions.php';
$Fun_call = new Functions();
global $post_no;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(isset($_POST['pro_id']) && is_numeric($_POST['pro_id'])){

        $post_no = $Fun_call->validate($_POST['pro_id']);

        $condition1['mc_p_uni_id'] = $post_no;
        $fetch_comment = $Fun_call->select_order_where('review_comments', $condition1, 'mc_id');

        $countwhere['mc_p_uni_id'] = $post_no;
        $totalcomment = $Fun_call->select_count('review_comments', $countwhere);
    
        $field['customer_u_id'] = $_SESSION['user_uni_no'];
        $sel_user_img = $Fun_call->select_assoc('customers', $field);

    }
    else{
        echo "Invalid Data";
    }

}
else{
    echo "Invalid Method";
}


?>



<form id="rev-comment_post_replay" style="display:none;">
<div class="comment-area" id="rev-reply_comment">
    <div class="comment-area-text" style="width: 80%;">
        <textarea class="form-control" style="font-size: 1.5em;"id="rev-usercommentreplay" rows="3"
            placeholder="Write Something."></textarea>
    </div>
    <div class="comment-area-btn">
        <button type="submit" class="btn btn-lg btn-primary comment-btn">Add Reply</button>
        <button type="button" id="rev-close_rep" class="btn btn-lg btn-danger comment-btn mt-1">Close</button>
    </div>
    <span id="rev-comment_rep_error" class="error-msg"></span>
</div>
</form>

<div style="height: 20px;"></div>
<div class="panel panel-default" style="width: 99%;">
<div class="panel-heading" style="padding-top: 10px;"><h4>(<?php echo $totalcomment['NumberComments']; ?>) Comments</h4></div>
<div class="card-body  scroll-menu" style="padding: 0rem;">
<?php
    if($totalcomment['NumberComments'] == 0){
    
    echo"
    <div style='height: 30%;'></div>
    <center>
    <table>
    <tr>
    <th style='text-align: center;font-size:1em;'>
    This product has no reviews.</th>
    </tr>
    <tr>
    <th style='text-align: center;font-size:1em;'>Let others know what do you think and be the first to write a reviews.</th>
    </tr>
    </center>";}
?>
<?php if($fetch_comment){ foreach($fetch_comment as $fetch_cdata){ ?>
   
    <div style="width: 98%;">
        <div class="al-comment-ar">

            <?php
               $u_field['customer_u_id'] = $fetch_cdata['mc_u_uni_id'];
               $user_info = $Fun_call->select_assoc('customers',$u_field);
               $date = date_create($fetch_cdata['mc_date']);
            ?>
            <!--<div class="customer-review-option" style="padding-top: 0px; margin-bottom: 0px;">-->
            <!--    <div class="comment-option" style="padding-top: 0px;">-->
            <!--        <div class="co-item" style="margin-bottom: 0px;">-->
            <!--            <div class="avatar-pic">-->
            <!--                <img src="comments/Images/User/<?php echo $user_info['customer_img']; ?>" alt="Image Not Found">-->
            <!--            </div>  -->
            <!--            <div class="avatar-text">-->
            <!--                <h5><?php echo $user_info['customer_name']; ?><span><?php echo date_format($date,"d M Y"); ?></span></h5>-->
            <!--                <div class="at-reply"><?php echo $fetch_cdata['mc_text']; ?></div>-->
            <!--            </div>-->
            <!--            <div class="replay-btn btn btn-lg btn-primary" data-dataid="<?php echo $fetch_cdata['mc_uni_no']; ?>">Reply</div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            
            <div class="comment-img-box-2" data-ppp="123">
                <img src="../../customer/customer_images/<?php 
                if($user_info['customer_img']!= ""){
                    echo $user_info['customer_img'];
                }else
                    echo"default_profile.png";
                
                 ?>" class="img-set-100"
                    alt="Image Not Found">
            </div>
            <div class="main-comment-area">
                <h6 class="mb-0"><b><?php echo $user_info['customer_name']; ?></b> <span
                        class="cm-date"> - <?php echo strtoupper(date_format($date,"d M Y")); ?></span></h6>
                <span class="comment-text"><?php echo $fetch_cdata['mc_text']; ?></span>
            </div>
            <?php if(isset($_SESSION['customer_email'])) { ?>
            <!--<div class="rev-replay-btn btn btn-lg btn-primary" data-dataid="<?php //echo $fetch_cdata['mc_uni_no']; ?>">Reply</div>-->
            <?php } ?>
        </div>
    </div>

    <div class="add-sub-c">

    </div>

    <?php

        $condi = $fetch_cdata['mc_uni_no'];
        $replay = $Fun_call->replay_fetch("*", "review_comments", "review_rep_comments", "mc_uni_no", "msc_mc_uni_no", $condi);                         

        if($replay){ foreach($replay as $replay_data){

    ?>

    <div class="w-90" style="margin-left: auto !important;">
        <div class="al-comment-ar" style="width:98%;">

            <?php
               $u_field1['customer_u_id'] = $replay_data['msc_u_uni_no'];
               $user_info_rep = $Fun_call->select_assoc('customers', $u_field1);
               $date = date_create($replay_data['msc_date']);
            ?>

            <div class="comment-img-box-2">
                <img src="../../customer/customer_images/<?php 
                if($user_info_rep['customer_img']!= ""){
                    echo $user_info_rep['customer_img'];
                }else
                    echo"default_profile.png";
                
                 ?>"
                    class="img-set-100" alt="Image Not Found">
            </div>
            <div class="main-comment-area">
                <h6 class="mb-0"><b><?php echo $user_info_rep['customer_name']; ?></b> <span
                        class="cm-date"> - <?php echo strtoupper(date_format($date,"d M Y")); ?></span></h6>
                <span class="comment-text"><?php echo $replay_data['msc_text']; ?></span>
            </div>
        </div>
    </div>

        <?php }}  ?>

        <?php }} ?>

</div>
</div>