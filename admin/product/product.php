
 <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading">
    <div class="container-fluid page__container">
        <h1 class="mb-0">Product Management Portal</h1>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="card">
        
        <div class="card-header">
        <form class="form-inline" method="post" id="product_search_form">
                <label class="mr-sm-2" for="inlineFormFilterBy">Filter by:</label>
                <div class="search-form mr-3 search-form--light">

                <input type="text" name="product_search" class="form-control" placeholder="Search Product" id="product_search">
                  <!--  <input class="btn " name="submit_product_search" value=""  id="search_product_btn"  type="submit"><i type="submit" id="search_product_btn" class="btn material-icons">search</i>
               -->
                </div>
                <?php 
                    if(isset($_SESSION['super_admin'])  OR isset($_SESSION['community'])){
                
                ?>
                <div class="custom-control mb-2 mr-sm-2 mb-sm-0">
                <a href="admin/create_product/"  class="btn btn-outline-secondary ml-auto">
                   New Product
                </a>
                </div>
               
                <div class="custom-control mb-2 mr-sm-2 mb-sm-0">
              
                <a href="admin/product-category/" class="btn btn-outline-secondary ml-auto">
                  New Product Category
                </a>
                </div>
                <?php }?>

            </form>
            
        </div>


        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;js-lists-values-employee-name&quot;]">

            <table class="table mb-0 thead-border-top-0">
                <thead>
                    <tr>

                        <th style="width: 18px;">
                           S/N
                        </th>

                        <th>Product Image</th> 
                         <th>Product Name</th>
                         <th>Product Price</th>
                        <th style="width: 37px;">Status</th>
                        <th style="width: 120px;">Date Created</th>
                        <?php 
                    if(isset($_SESSION['super_admin'])  OR isset($_SESSION['community'])){
                
                ?>
                        <th style="width: 150px;">Action</th>
                       <?php }?>
                    </tr>
                </thead>
                <tbody class="list" id="staff">
                <?php

                  /* $students =  $getFromGeneric->get_multi('user');
                        $sn = 0;
                   foreach($students as $student):
                    $sn +=1;*/
                ?>


                <?php 



                if(isset($_GET['products'])){
                
                        $limit = 10;
                    if($_GET['products'] == 0){
                            $page = 1;
                        $offset = (($page - 1)* $limit );
                    }else{
                        $page = $_GET['products'];
                        $offset = (($page - 1)* $limit );
                    }

                    $cur =  $paginations =$getFromProduct->pagination_lower_product($offset, $limit);

                    $lower = ($page - 1) * $limit + $cur;
                    $uper = $getFromProduct->pagination_count_product();


                    
                    
                    $paginations =$getFromProduct->pagination_product( $offset, $limit);
                    $sn = $offset;

                   // var_dump($paginations);
                    foreach($paginations as $products):
                        $sn +=1;
                


                ?>
                
                    <tr class="selected" >
                        <td>
                           <?=$sn;?>
                        </td>
                        <td>

                            <div class="media align-items-center">
                                <div class="avatar avatar-xs mr-2">
                                    <img src="<?=BASE_URL?>admin/<?=$products->img_url;?>" alt="Avatar" class="avatar-img rounded-circle">
                                </div>
                              
                            </div>

                        </td>

                        <td>

                            <div class="media align-items-center">
                               
                                <div class="media-body">

                                    <span class="js-lists-values-em"><?=$products->names?></span>

                                </div>
                            </div>

                            </td>


                            <td>

<div class="media align-items-center">
   
    <div class="media-body">

        <span class="js-lists-values-em">$<?=number_format($products->price,2)?></span>

    </div>
</div>

</td>
                      
                        <td>
                        <?php 
                            if ($products->product_status == 1){
                        
                            ?>
                        <span class="badge badge-success">Active
                        </span>
                        <?php
                       }else{
        
                        ?>
                        
                        <span class="badge badge-danger">Inactive
                        </span>
                       <?php } ?></td>
                        <td><small class="text-muted"> <?=$getFromGeneric->timeAgo($products->date_created);?></small></td>
                       <!-- <td>$1,402</td>-->

                       <?php 
                    if(isset($_SESSION['super_admin'])  OR isset($_SESSION['community'])){
                
                ?>
                        <td>
                            <div class="media align-items-center">
                                <?php
                                    if($products->product_status == 1){
                                
                                ?>
                                <form method="post" action="admin/products/">
                                        <input type="hidden" name="product_id" value="<?=$products->id?>" >
                                     <input type="submit"  name="products_deactivate"  class="btn btn-danger" value="Unpublish">
                                </form>
                                <?php }else{ ?>
                                    <form method="post" action="admin/products/">
                                    <input type="hidden" name="product_id" value="<?=$products->id?>" >
                                    <input type="submit" name="products_activate" class="btn btn-success" value="Publish">
                                    </form>
                                     <?php }?>
                            </div>
                        </td>
                        <td>
                            <div class="dropdown ml-3">
                                <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" style="display: none;">
                                    <a class="dropdown-item" href="admin/create_product/<?=$products->id?>">Edit Product</a>
                                </div>
                            </div>
                        </td>
                        <?php }?>
                        
                    </tr>
                 
                <?php endforeach; }?>
                    
                  

                </tbody>
            </table>
        </div>

        <div class="card-body text-right">
        <div class="ml-auto">
                                <?php 
                                    if($page == 1){

                                 
                                ?>
                                 <?php }else{
                                        ?> 

                            <a href="admin/products/<?=$page - 1?>" class=""><i class="material-icons float-left">arrow_backward</i></a>
                            <?php }?>
                              <?=$lower;?> <span class=" text-center text-black">of  <?=$uper;?></span>
                                
                              
                                 <?php 
                                    if($lower == $uper){

                                 
                                ?>
                                    <?php }else{
                                        ?> 
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="admin/products/<?=$page + 1?>" class=""><i class="material-icons float-right">arrow_forward</i></a>
                                        <?php }?>
 
                                </div>
        </div>


    </div>

</div>


</div>
<!-- // END content -->