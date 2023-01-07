<?php include "inc/header.php" ?>

<style>
 body{
    background: #edf1f5;
    margin-top:20px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: 0;
}
.card {
    margin-bottom: 30px;
}
.card-body {
    flex: 1 1 auto;
    padding: 1.57rem;
}

 .note-has-grid .nav-link {
     padding: .5rem
 }

 .note-has-grid .single-note-item .card {
     border-radius: 10px
 }

 .note-has-grid .single-note-item .favourite-note {
     cursor: pointer
 }

 .note-has-grid .single-note-item .side-stick {
     position: absolute;
     width: 3px;
     height: 35px;
     left: 0;
     background-color: rgba(82, 95, 127, .5)
 }

 .note-has-grid .single-note-item .category-dropdown.dropdown-toggle:after {
     display: none
 }

 .note-has-grid .single-note-item .category [class*=category-] {
     height: 15px;
     width: 15px;
     display: none
 }

 .note-has-grid .single-note-item .category [class*=category-]::after {
     content: "\f0d7";
     font: normal normal normal 14px/1 FontAwesome;
     font-size: 12px;
     color: #fff;
     position: absolute
 }

 .note-has-grid .single-note-item .category .category-business {
     background-color: rgba(44, 208, 126, .5);
     border: 2px solid #2cd07e
 }

 .note-has-grid .single-note-item .category .category-social {
     background-color: rgba(44, 171, 227, .5);
     border: 2px solid #2cabe3
 }

 .note-has-grid .single-note-item .category .category-important {
     background-color: rgba(255, 80, 80, .5);
     border: 2px solid #ff5050
 }

 .note-has-grid .single-note-item.all-category .point {
     color: rgba(82, 95, 127, .5)
 }

 .note-has-grid .single-note-item.note-business .point {
     color: rgba(44, 208, 126, .5)
 }

 .note-has-grid .single-note-item.note-business .side-stick {
     background-color: rgba(44, 208, 126, .5)
 }

 .note-has-grid .single-note-item.note-business .category .category-business {
     display: inline-block
 }

 .note-has-grid .single-note-item.note-favourite .favourite-note {
     color: #ffc107
 }

 .note-has-grid .single-note-item.note-social .point {
     color: rgba(44, 171, 227, .5)
 }

 .note-has-grid .single-note-item.note-social .side-stick {
     background-color: rgba(44, 171, 227, .5)
 }

 .note-has-grid .single-note-item.note-social .category .category-social {
     display: inline-block
 }

 .note-has-grid .single-note-item.note-important .point {
     color: rgba(255, 80, 80, .5)
 }

 .note-has-grid .single-note-item.note-important .side-stick {
     background-color: rgba(255, 80, 80, .5)
 }

 .note-has-grid .single-note-item.note-important .category .category-important {
     display: inline-block
 }

 .note-has-grid .single-note-item.all-category .more-options,
 .note-has-grid .single-note-item.all-category.note-favourite .more-options {
     display: block
 }

 .note-has-grid .single-note-item.all-category.note-business .more-options,
 .note-has-grid .single-note-item.all-category.note-favourite.note-business .more-options,
 .note-has-grid .single-note-item.all-category.note-favourite.note-important .more-options,
 .note-has-grid .single-note-item.all-category.note-favourite.note-social .more-options,
 .note-has-grid .single-note-item.all-category.note-important .more-options,
 .note-has-grid .single-note-item.all-category.note-social .more-options {
     display: none
 }

 @media (max-width:767.98px) {
     .note-has-grid .single-note-item {
         max-width: 100%
     }
 }

 @media (max-width:991.98px) {
     .note-has-grid .single-note-item {
         max-width: 216px
     }
 } 
</style>
<section>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="page-content container note-has-grid">
<?php
 $sql = "SELECT * FROM board";
 $result = mysqli_query($conn,$sql);
 $output = mysqli_fetch_all($result,MYSQLI_ASSOC); 
?>
    <div class="tab-content bg-transparent">
        <div id="note-full-container" class="note-has-grid row">
        <?php foreach($output as $data): ?>
            <div class="col-md-8 m-auto single-note-item all-category note-business">
                <div class="card card-body">
                    <span class="side-stick"></span>
                    <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Give review for foods"><?php echo $data['title']?> <i class="point fa fa-circle ml-1 font-10"></i></h5>
                    <p class="note-date font-12 text-muted"><?php echo $data['time']?></p>
                    <div class="note-content">
                        <p class="note-inner-content text-muted" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis."><?php echo $data['message']?>.</p>
                    </div>
                    <div class="d-flex align-items-center">
                       
                        <div class="ml-auto">
                            <div class="category-selector btn-group">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Modal Add notes -->
    <div class="modal fade" id="addnotesmodal" tabindex="-1" role="dialog" aria-labelledby="addnotesmodalTitle" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title text-white">Add Notes</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="notes-box">
                        <div class="notes-content">
                            <form action="javascript:void(0);" id="addnotesmodalTitle">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="note-title">
                                            <label>Note Title</label>
                                            <input type="text" id="note-has-title" class="form-control" minlength="25" placeholder="Title" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="note-description">
                                            <label>Note Description</label>
                                            <textarea id="note-has-description" class="form-control" minlength="60" placeholder="Description" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-n-save" class="float-left btn btn-success" style="display: none;">Save</button>
                    <button class="btn btn-danger" data-dismiss="modal">Discard</button>
                    <button id="btn-n-add" class="btn btn-info" disabled="disabled">Add</button>
                </div>
            </div>
        </div>
    </div>
</div>
</section>











<?php include "inc/footer.php" ?>