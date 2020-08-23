<div class="card card-info card-outline">
    
        <div class="card-header">
            <h6 class="card-title">Search & Filter</h6>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
            </div>
        </div>

        <div class="card-body">
            <div class="row justify-content-between">

                <div class="mb-1">
                <?php
                $active = Helper::countStatus($this->Items, 'status', 1);
                $inactive = Helper::countStatus($this->Items, 'status', 0);
                $all = $active + $inactive;
                
                echo $allLink       = Helper::linkStatus($url, 'All', $all);
                echo $activeLink    = Helper::linkStatus("$url&status=1", 'Active', $active);
                echo $inactiveLink  = Helper::linkStatus("$url&status=0", 'Inactive', $inactive);

                ?>
                </div>

                    
                <!-- DUC ADD NEW HTML TAG -->
                <form id="form_filter" name="form_filter" method="post" action="#">  
                    <fieldset id="filter-bar">
                        <div class="mb-1">
                            <?php echo  $selectboxStatus . $selectboxGroupACP;?>
                        </div>
                    </fieldset>
                </form>
                    

            <div class="mb-1">
                <form action="#" method="get">
                    <div class="input-group">

                        <input type="hidden" name="module" value="backend">
                        <input type="hidden" name="controller" value="group">
                        <input type="hidden" name="action" value="index">

                        <input type="text" class="form-control form-control-sm" name="search_value" value="<?= $_GET['search_value'];?>" style="min-width: 300px">
                        
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-sm btn-info" id="btn-search">Search</button>
                            <button type="submit" class="btn btn-sm btn-danger" id="btn-clear-search" name="clear-keyword" value="clear">Clear</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
