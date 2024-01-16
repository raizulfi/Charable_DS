<?php 
//$category_ids = isset($_GET['cids']) ? $_GET['cids'] : 'all';
?>
<style>
    .heading {
  background: url(uploads/3.2.png) no-repeat;
  /*background-color: #aed3e3;*/
  background-size: cover;
  background-position: center;
  /*text-align: center;*/
  padding-top: 5rem;
  padding-bottom: 5rem;
  width:100%;
}

.heading h1 {
  color: black;
  font-size: 4rem;
  text-align: right;
  padding-right: 3rem;
}

.heading p {
  padding-top: .5rem;
  font-size: 1.45rem;
  padding-right: 21rem;
  text-align: center;
  color: #666;
}

.heading p a {
  color: black;
  padding-right: .5rem;
}

.heading p a:hover {
  color: #df6f79;
}
    </style>

    <div class="heading">
        <h1>Emergency Relief Programs</h1>
        <p> <a href="index.php">Home >></a> Programs </p>
    </div>

<div class="content py-3">
    <div class="row">
        <!--<div class="col-md-4">
            <div class="card card-outline rounded-0 card-primary shadow">
                <div class="card-body">
                    <div class="list-group">
                        <div class="list-group-item list-group-item-action">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input custom-control-input-primary custom-control-input-outline cat_all" type="checkbox" id="cat_all" <?//= !is_array($category_ids) && $category_ids =='all' ? "checked" : "" ?>>
                                <label for="cat_all" class="custom-control-label"> All</label>
                            </div>
                        </div>
                        <?php 
                        //$categories = $conn->query("SELECT * FROM `category_list` where delete_flag = 0 and status = 1 order by `name` asc ");
                        //while($row = $categories->fetch_assoc()):
                        ?>
                        <div class="list-group-item list-group-item-action">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input custom-control-input-primary custom-control-input-outline cat_item" type="checkbox" id="cat_item
                                <?//= $row['id'] ?>" <?//= in_array($row['id'],explode(',',$category_ids)) ? "checked" : '' ?> value="<?//= $row['id'] ?>">
                                <label for="cat_item<?//= $row['id'] ?>" class="custom-control-label"> <?//= $row['name'] ?></label>
                            </div>
                        </div>
                        <?php //endwhile; ?>
                    </div>
                </div>
            </div>
            
        </div>-->
        <div class="col-md-12">
            <div class="card card-outline card-primary shadow rounded-0">
                <div class="card-body">
                    <div class="container-fluid">
                        <!--<div class="row justify-content-center mb-3">
                            <div class="col-lg-8 col-md-10 col-sm-12">
                                <form action="" id="search-frm">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">Search</span></div>
                                        <input type="search" id="search" class="form-control" value="<?//= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                                        <div class="input-group-append"><span class="input-group-text"><i class="fa fa-search"></i></span></div>
                                    </div>
                                </form>
                            </div>
                        </div>-->
                        <div class="row" id="product_list">
                            <?php 
                            //$swhere = "";
                            /*if(!empty($category_ids)):
                            if($category_ids !='all'){
                                $swhere = " and p.category_id in ({$category_ids}) ";
                            }
                            if(isset($_GET['search']) && !empty($_GET['search'])){
                                $swhere .= " and (program.name LIKE '%{$_GET['search']}%' or program.description LIKE '%{$_GET['search']}%') ";
                            }*/

                            $program = $conn->query("SELECT * FROM program");
                            while($row = $program->fetch_assoc()):
                            ?>
                            <div class="col-lg-4 col-md-6 col-sm-12 product-item">
                                <a href="./?page=program/view_program&id=<?= $row['id'] ?>" class="card shadow rounded-0 text-reset text-decoration-none">
                                <div class="product-img-holder position-relative">
                                    <img src="<?= validate_image($row['image_path']) ?>" alt="Product-image" class="img-top product-img bg-gradient-gray">
                                </div>
                                    <div class="card-body border-top border-gray">
                                        <h5 class="card-title text-truncate w-100"><strong><?= $row['name'] ?></strong></h5>
                                        <!--<div class="d-flex w-100">
                                            <div class="col-auto px-0"><small class="text-muted">Vendor: </small></div>
                                            <div class="col-auto px-0 flex-shrink-1 flex-grow-1"><p class="text-truncate m-0"><small class="text-muted"><?//= $row['vendor'] ?></small></p></div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-auto px-0"><small class="text-muted">Category: </small></div>
                                            <div class="col-auto px-0 flex-shrink-1 flex-grow-1"><p class="text-truncate m-0"><small class="text-muted"><?//= $row['category'] ?></small></p></div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-auto px-0"><small class="text-muted">Price: </small></div>
                                            <div class="col-auto px-0 flex-shrink-1 flex-grow-1"><p class="m-0 pl-3"><small class="text-primary"><?//= format_num($row['price']) ?></small></p></div>
                                        </div>-->
                                        <br>
                                        <p class="card-text truncate-3 w-100"><small><?= strip_tags(html_entity_decode($row['description'])) ?></small></p>
                                    </div>
                                </a>
                            </div>
                            <?php endwhile; ?>
                            <?php //else: ?>
                                <!--<div class="col-12 text-center">
                                    Please select atleast 1 product category
                                </div>-->
                            <?php //endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
