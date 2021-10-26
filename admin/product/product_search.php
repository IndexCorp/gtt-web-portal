<?php 

    if(isset($_GET['product_search'])){
        $url_d = $_GET['product_search'];

    
    }


?>   <!-- Content -->


  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading">
    <div class="container-fluid page__container">
        <h1 class="mb-0">Product Search Result</h1>
        <a href="admin/products/" class="badge badge-dark-gray text-white">Back to Product</a>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="card">
        
        <div class="card-header">
        
            <form class="form-inline" method="post" id="product_search_form">
                <label class="mr-sm-2" for="inlineFormFilterBy">Filter by:</label>
                <div class="search-form mr-3 search-form--light">

                <input type="text" name="product_search" class="form-control" placeholder="Search Post" id="product_search"><!--
                    <input class="btn " name="submit_product_search" value="" type="submit"><i type="submit" id="search_btn" class="btn material-icons">search</i>
               -->
                </div>
                <div class="custom-control mb-2 mr-sm-2 mb-sm-0">
                <a href="admin/create_product/"  class="btn btn-outline-secondary ml-auto">
                   New Product
                </a>
                </div>

                <div class="custom-control mb-2 mr-sm-2 mb-sm-0">
              
                <a href="admin/product-category" class="btn btn-outline-secondary ml-auto">
                  New Category
                </a>
                </div>
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

                 /*  $students =  $getFromGeneric->get_multi('user');
                        $sn = 0;
                   foreach($students as $student):
                    $sn +=1;*/
                ?>


                <?php 

                if(isset($_GET['product_search']))
                {
                    $term = $_GET['product_search'];
                    $sn = 0;
                    $new = $getFromProduct->get_products($term);
                    //var_dump($news);
                    foreach($new as $news):
                        $sn +=1;
                ?>

<tr class="selected" >
                        <td>
                           <?=$sn;?>
                        </td>
                        <td>

                            <div class="media align-items-center">
                                <div class="avatar avatar-xs mr-2">
                                    <img src="<?=BASE_URL?>admin/<?=$news->img_url;?>" alt="Avatar" class="avatar-img rounded-circle">
                                </div>
                              
                            </div>

                        </td>

                        <td>

                            <div class="media align-items-center">
                               
                                <div class="media-body">

                                    <span class="js-lists-values-em"><?=$news->names?></span>

                                </div>
                            </div>

                            </td>

                            <td>

                            <div class="media align-items-center">
                            
                                <div class="media-body">

                                    <span class="js-lists-values-em"><?=$news->price?></span>

                                </div>
                            </div>

                            </td>
                      
                        <td>
                        <?php 
                            if ($news->product_status == 1){
                        
                            ?>
                        <span class="badge badge-success">Active
                        </span>
                        <?php
                       }else{
        
                        ?>
                        
                        <span class="badge badge-danger">Inactive
                        </span>
                       <?php } ?></td>
                        <td><small class="text-muted"> <?=$getFromGeneric->timeAgo($news->date_created);?></small></td>
                       <!-- <td>$1,402</td>-->
                       <?php 
                    if(isset($_SESSION['super_admin'])  OR isset($_SESSION['community'])){
                
                ?>
                        <td>
                            <div class="media align-items-center">
                                <?php
                                    if($news->product_status == 1){
                                
                                ?>
                                <form method="post" action="admin/products/">
                                        <input type="hidden" name="product_id" value="<?=$news->id?>" >
                                     <input type="submit"  name="products_deactivate"  class="btn btn-danger" value="Unpublish">
                                </form>
                                <?php }else{ ?>
                                    <form method="post" action="admin/products/">
                                    <input type="hidden" name="product_id" value="<?=$news->id?>" >
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
                                    <a class="dropdown-item" href="admin/create_product/<?=$news->id?>">Edit Product</a>
                                </div>
                            </div>
                        </td>
                        <?php }?>
                        
                    </tr>
                                 <?php endforeach; }?>
                    
                  

                </tbody>
            </table>
        </div>

     

    </div>

</div>


</div>
<!-- // END content -->