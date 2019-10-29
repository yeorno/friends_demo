<?php 

include 'header.php';
include 'config.php'; 
if($_POST) {
  $id = isset($_GET['id'])?$_GET['id']:'';

  $name = $_POST["name"];//名称
  $url = $_POST["url"];//跳转链接
  $type = $_POST["type"];//可用禁用
  if(empty($id)) { //增加时就一定要上传图片
     $localUrl = upload();//本地存放路劲
      if(!$localUrl) {
      echo "上传图片时为空";die;
    }
  } else {//修改时可以为空
    
      if($_FILES["file"]['size'] > 0) {
        unlink($_GET["path"]);
        //如果不为空
        $localUrl = upload();//这里还要把原图给删了
        if(!$localUrl) {
          echo "上传图片时为空";die;
        }
      } else {
        //如果为空
        $localUrl = "";
      }
  }
 
  $time = time();
 
  if(empty($id)) {
      findAll("INSERT INTO wc_banner (banner_name,banner_url,banner_link,status,create_time) VALUES ('{$name}','{$localUrl}','{$url}',$type,$time)");
  } else {
   
      if(empty($localUrl)) {//为空时不修改图片
       
        findAll("UPDATE wc_banner set banner_name='{$name}',banner_link='{$url}',status=$type WHERE id=$id");
      } else {
        
         findAll("UPDATE wc_banner set banner_name='{$name}',banner_url='{$localUrl}',banner_link='{$url}',status=$type WHERE id=$id");
      }
 
  }
 
  header('location:tables.php');exit; 
}
if(isset($_GET["id"])) {
   $tmpData = findAll("SELECT * FROM wc_banner WHERE id={$_GET["id"]}");



}

?>
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Forms       </li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Forms            </h1>
          </header>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>资料上传</h4>
                </div>
                <div class="card-body">
                  
                  <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>名字</label>
                      <input type="text" name="name" placeholder="产品名" class="form-control" value="<?php echo isset($_GET["id"])?$tmpData[0]['banner_name']:''?>" required>
                    </div>
                    <div class="form-group">       
                      <label>跳转链接</label>
                      <input type="text" name='url' placeholder="跳转链接" class="form-control" value="<?php echo isset($_GET["id"])?$tmpData[0]['banner_link']:''?>" required>
                    </div>
                    <div class="form-group">       
                      <label>状态</label>
                      <select name='type'>
                        <option value="1" <?php if($tmpData[0]['status'] == 1) {echo 'selected';} ?>>可用</option>
                        <option value="2" <?php if($tmpData[0]['status'] == 1) {echo 'selected';} ?>>禁用</option>
                      </select>
                    </div>
                    <div class="form-group">       
                      <label>图片</label>
                      <input type="file" name='file' placeholder="跳转链接" class="form-control">
                      <?php if(isset($_GET['id'])) {
                       
                        echo "<img width='150px' height='80px' src = {$tmpData[0]['banner_url']}>";
                      } ?>
                    </div>
                    <div class="form-group">       
                      <input type="submit" value="上传" class="btn btn-primary">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
     
    </div>
    <!-- JavaScript files-->
   <?php include 'footer.php' ?>
  </body>
</html>