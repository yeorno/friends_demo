<?php 

include 'header.php';
include 'config.php'; 
$page = isset($_GET['page'])?$_GET['page']:1;
$offset = ( $page-1 ) * 50;
$result = findAll("SELECT * FROM wc_banner order by id desc limit $offset,50");

if(isset($_GET["id"])) {
    unlink($_GET['path']);
    findAll("DELETE FROM wc_banner WHERE id={$_GET['id']}");
    header('location:tables.php');exit; 
}

?>
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="tables.php">Home</a></li>
            <li class="breadcrumb-item active">Tables</li>
          </ul>
        </div>
      </div>
      <section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display"><strong><a href="forms.php">添加</a></strong></h1>
          </header>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>记录表</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>名称</th>
                          <th>图片</th>
                          <th>状态</th>
                          <th>网页地址</th>
                          <th>创建时间</th>
                          <th>操作</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($result as $key => $value) { ?>
                        <tr>
                          <th><?php echo $value["banner_name"]?></th>
                          <td><img width="150px" height="80px" src="<?php echo $value['banner_url']?>"> </td>
                          <td><?php echo $value["status"] == 1 ? '使用中':'禁用中'?></td>
                          <td> <a href="<?php echo $value['banner_link'] ?>"><?php echo $value["banner_link"] ?></a></td>
                          <td><?php echo date('Y-m-d H:i:s',$value["create_time"])?></td>
                          <td>
                            <a href="forms.php?id=<?php echo $value["id"]?>&path=<?php echo $value['banner_url']?>">编辑</a>&nbsp&nbsp
                            <a href="?id=<?php echo $value["id"]?>&path=<?php echo $value['banner_url']?>" onclick="if(!confirm('确认删除')){return false;}">删除</a></td>
                        </tr>
                        <?php } ?>
                       
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="3" ><a href="?page=<?php echo isset($_GET['page'])?$_GET['page']-1:1?>">上一页</a></td>
                          <td colspan="3"><a href="?page=<?php echo isset($_GET['page'])?$_GET['page']+1:2?>">下一页</a></td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
     
    </div>
    <!-- JavaScript files-->
   <?php include 'footer.php'?>
  </body>
</html>