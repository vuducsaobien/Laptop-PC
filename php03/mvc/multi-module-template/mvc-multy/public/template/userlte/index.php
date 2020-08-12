<!DOCTYPE html>
<html>

<head>
    <?= $this->_metaHTTP;?>
    <?= $this->_metaName;?>
    <?= $this->_title;?>
    <?= $this->_cssFiles;?>
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <?php 
			require_once APPLICATION_PATH. $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php';
      ?>


    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

    <?= $this->_jsFiles;?>

</body>
</html>
