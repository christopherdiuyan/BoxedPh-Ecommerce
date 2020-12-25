<?php 

$aMan = array();
$aCat = array();
$aPcat = array();


// This is for categories Begin //

if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

    foreach($_REQUEST['cat'] as $sKey=>$sVal){

        if((int)$sVal!=0){

            $aCat[(int)$sVal] = (int)$sVal;

        }

    }

}

// This is for categories Finisih //

// This is for products_categories Begin //

if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

    foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

        if((int)$sVal!=0){

            $aPcat[(int)$sVal] = (int)$sVal;

        }

    }

}

// This is for products_categories Finisih //

?>

<head>
    <style type="text/css">
        .nav,li,a {
    position: relative;
    display: block;
}
.checkbox-primary input[type='checkbox']:checked + span::before{
    background-color: #DF7861;
    border-color: #DF7861;
}
    </style>

</head>
<form  method="post">
        
    <div class="product-show-option">
            <div class="row">
                <div class="col-lg-7 col-md-7">
                    <div class="select-option">
                        
                            <div class="filter-widget">
                                <h4 class="fw-title" style="padding-top: 20px;">Filter Option</h4>
                        <select class="sorting" name="order" id="order" onchange="this.form.submit();">
                            <option value="latest_prod">
                                Sort By Latest Products</option>
                            <option value="oldest_prod">
                                Sort By Oldest Products</option>
                            <option value="highest_price">
                                Sort By Highest Price</option>
                            <option value="lowest_price">
                                Sort By Lowest Price</option>
                        </select>
                            <!--<input type="submit" class="filter-btn" value="Filter" />-->
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
     <div class="panel panel-default sidebar-menu">
        <div class="filter-widget">

            <!-- Categories Header Starts Here -->
            <div class="panel-heading" style="background: #f5f5f5; "><!-- panel-body 1 Begin -->
                <h4 class="fw-title" style="padding-top: 20px;">Categories</h4>
                <div class="input-group" style="position: relative;display: table;border-collapse: separate;box-sizing: border-box;"><!-- input-group Begin -->
                    <input type="text" style="font-size: 1.3em;" class="form-control" id="dev-table-filter" data-filters="#dev-cat" data-action="filter" placeholder="Filter Categories">
                        <a class="input-group-addon"><!-- input-group-addon Begin -->

                            <i class="fa fa-search"></i>

                        </a><!-- input-group-addon Finish -->
                </div><!-- input-group Finish -->
            </div><!-- panel-body 1 Finish -->
            <!-- Categories Header ends Here -->

            <!--  style="max-width: 230;overflow-y: scroll;" -->
            <div class="panel-body scroll-menu"><!-- panel-body 2 Begin -->
                <ul class="nav nav-pills nav-stacked category-menu" style="background-color:white;" id="dev-cat"><!-- nav nav-pills nav-stacked category-menu Begin -->
                    
                    <?php 
                    $get_cat = "select * from categories where cat_top='yes'";
                    $run_cat = mysqli_query($con,$get_cat);

                    while($row_cat=mysqli_fetch_array($run_cat)){

                        $cat_id = $row_cat['cat_id'];
                        $cat_title = $row_cat['cat_title'];
                        // style='background:#dddddd'
                        echo "
                        <li  class='checkbox checkbox-primary'>
                            <a>
                                <label >
                                    <input ";
                                    if(isset($aCat[$cat_id])){
                                        echo "checked='checked'";
                                    } 
                                    echo " value='$cat_id' type='checkbox' class='get_cat' name='cat' style='vertical-align: bottom;'>
                                    <span style='font-size: 1.3em'>
                                    $cat_title
                                    </span>
                                </label>
                            </a>
                        </li>
                        ";
                    }
                    
                    $get_cat = "select * from categories where cat_top='no'";
                    $run_cat = mysqli_query($con,$get_cat);

                    while($row_cat=mysqli_fetch_array($run_cat)){

                        $cat_id = $row_cat['cat_id'];
                        $cat_title = $row_cat['cat_title'];
                        echo "
                        <li class='checkbox checkbox-primary'>
                            <a>
                                <label>
                                    <input ";
                                    if(isset($aCat[$cat_id])){
                                        echo "checked='checked'";
                                    }
                                    echo " value='$cat_id' type='checkbox' class='get_cat' name='cat'>
                                    <span style='font-size: 1.3em'>
                                    $cat_title
                                    </span>
                                </label>
                            </a>
                        </li>
                        ";
                    }
                    ?>
                </ul><!-- nav nav-pills nav-stacked category-menu Finish -->
                
            </div><!-- panel-body 2 Finish -->
        </div>
    </div>
    <!-- Categories ends here -->

    <!-- Product Categories starts here -->
    <div class="panel panel-default sidebar-menu">
        <div class="filter-widget">
            <!-- <h4 class="fw-title">Brand</h4> -->

            <div class="panel-heading" style="background: #f5f5f5;"><!-- panel-body 1 Begin -->
                    <h4 class="fw-title" style="padding-top: 20px;">Product Types</h4>
                        
                <div class="input-group" style="position: relative;display: table;border-collapse: separate;box-sizing: border-box;"><!-- input-group Begin -->
                    <input type="text" style="font-size: 1.3em;" class="form-control" id="dev-table-filter" data-filters="#dev-p-cat" data-action="filter" placeholder="Filter Product Types">
                        <a class="input-group-addon"><!-- input-group-addon Begin -->

                            <i class="fa fa-search"></i>

                        </a><!-- input-group-addon Finish -->
                </div><!-- input-group Finish -->

            </div><!-- panel-body 1 Finish -->

            <div class="panel-body scroll-menu"><!-- panel-body 2 Begin -->
                <ul class="nav nav-pills nav-stacked category-menu" style="background-color:white;" id="dev-p-cat"><!-- nav nav-pills nav-stacked category-menu Begin -->
                    
                    <?php 
                    $get_p_cat = "select * from product_categories where p_cat_top='yes'";
                    $run_p_cat = mysqli_query($con,$get_p_cat);

                    while($row_p_cat=mysqli_fetch_array($run_p_cat)){

                        $p_cat_id = $row_p_cat['p_cat_id'];
                        $p_cat_title = $row_p_cat['p_cat_title'];
                        // style='background:#dddddd'
                        echo "
                        <li  class='checkbox checkbox-primary'>
                            <a>
                                <label>
                                    <input ";
                                    if(isset($aPcat[$p_cat_id])){
                                        echo "checked='checked'";
                                    }
                                    echo " value='$p_cat_id' type='checkbox' class='get_p_cat' name='p_cat'>
                                    <span style='font-size: 1.3em'>
                                    $p_cat_title
                                    </span>
                                </label>
                            </a>
                        </li>
                        ";
                    }
                    
                    $get_p_cat = "select * from product_categories where p_cat_top='no'";
                    $run_p_cat = mysqli_query($con,$get_p_cat);

                    while($row_p_cat=mysqli_fetch_array($run_p_cat)){

                        $p_cat_id = $row_p_cat['p_cat_id'];
                        $p_cat_title = $row_p_cat['p_cat_title'];
                        echo "
                        <li class='checkbox checkbox-primary'>
                            <a>
                                <label>
                                    <input ";
                                    if(isset($aPcat[$p_cat_id])){
                                        echo "checked='checked'";
                                    }
                                    echo " value='$p_cat_id' type='checkbox' class='get_p_cat' name='p_cat'>
                                    <span style='font-size: 1.3em'>
                                    $p_cat_title
                                    </span>
                                </label>
                            </a>
                        </li>
                        ";
                    }
                    ?>
                </ul><!-- nav nav-pills nav-stacked category-menu Finish -->
            </div><!-- panel-body 2 Finish -->
            
        </div>
    </div>
    </form>
 