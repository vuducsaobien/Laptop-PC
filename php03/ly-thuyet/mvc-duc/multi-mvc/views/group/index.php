<?php
    $searchForm = Helper::searchPost('searchForm');
    if(!empty($_POST['clear'])){
        $searchForm = '';
    }

    $countStatus = Helper::countValue($this->items, 'status');


    if(!empty($this->items)){
        foreach($this->items as $key => $value){
            $id = $value['id'];
            $groupName = $value['name'];
            $status = Helper::showIconStatus($value['status']);
            $resultName = str_replace($searchForm, "<mark>$searchForm</mark>", $value['name']);


            $xhtml .= 
            '<div class="row" id="item-'.$id.'">
                <p class="w-10">
                    <input type="checkbox" name="checkbox[]" value="'.$id.'">
                </p>
                <p>'.$resultName.'</p>
                <p class="w-10">'.$id.'</p>
                <p class="w-10">'.$status.'</p>
                <p class="w-10">'.$value['ordering'].'</p>
                <p class="w-10">'.$value['total'].'</p>
                <p class="w-10 action">
                    <a href="#">Edit</a>
                    <a href="javascript:deleteItem('.$id.')">Delete</a> 
                </p>
            </div>';
            

        }
    }
?>

<div class="content">
    <div id="dialog-confirm" title="Thông báo!" style="display: none;">
        <p>Đức có chắc muốn xóa phần tử này hay không?</p>
    </div>

    <h3>Group::List</h3>

    <?= $countStatus;?>

    <form action="#" method="post" name="form-search" id="form">
        <p class="no">
            <input type="text" name="searchForm" value = "<?= $searchForm ;?>" placeholder="Type Here" />
        </p><br>

        <input type="submit" value="Search" />
        <input type="submit" name="clear" value="Clear" />
    </from>



    <div class="list">
        <div class="row head">
            <p class="w-10">
                <input type="checkbox" name="checkbox-all" id="check-all">
            </p>

            <p>Group Name</p>
            <p class="w-10">ID</p>
            <p class="w-10">Status</p>
            <p class="w-10">Ordering</p>
            <p class="w-10">Member</p>
            <p class="w-10 action">Action</p>
        </div>


        <?= $xhtml; ?>

    </div>
</div>
