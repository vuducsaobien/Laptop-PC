<!DOCTYPE html>
<html>

<head>
    <?php require_once 'html/head.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed text-sm">
    <div class="wrapper">

        <!-- Navbar -->
        <?php require_once 'html/navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php require_once 'html/sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Group Manage::Add</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Group</a></li>
                        <li class="breadcrumb-item active">Form</li>
                        </ol>
                    </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                <!-- Horizontal Form -->
                <div class="col-md-10">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Group Managa::Add</h3>
                        </div>
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h5><i class="fas fa-exclamation-triangle"></i> Lỗi!</h5>
                                    Name: Giá trị này không được rỗng !!<br>
                                    Ordering: Phải từ 1 - 15 !!
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-1 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-1 col-form-label">Ordering</label>
                                    <div class="col-10">
                                        <input type="number" class="form-control" id="inputPassword3" placeholder="Ordering">
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-1 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2" style="width: 100%;">
                                            <option selected="selected">- Select Status -</option>
                                            <option>Active</option>
                                            <option>InActive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-1 col-form-label">Group ACP</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2" style="width: 100%;">
                                            <option selected="selected">- Select Group ACP -</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="hidden" class="btn col-1"></button>
                                    <button type="submit" class="btn btn-success col-sm-2">Save</button>
                                    <button type="submit" class="btn btn-success col-2">Save & Close</button>
                                    <button type="submit" class="btn btn-success col-2">Save & New</button>

                                    <button type="hidden" class="btn col-5.5"></button>
                                    <button type="hidden" class="btn col-8.5"></button>
                                    <button type="hidden" class="btn col-1"></button>

                                    <button type="submit" class="btn btn-danger col-2">Cancel</button>

                                    <!-- <button type="submit" class="btn btn-danger float-sm-right">Cancel</button>
                                    <button type="submit" class="btn btn-danger float-right">Cancel</button> -->

                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php require_once 'html/page-footer.php'; ?>
    </div>
    <!-- ./wrapper -->

    <!-- script -->
    <?php require_once 'html/script.php'; ?>
</body>

</html>