<?php
require 'db.php';

$messages = [];

if(isset($_GET['update'])){
  array_push($messages, 'Product was successfully edited.');
}
if(isset($_GET['create'])){
  array_push($messages, 'Product was successfully created.');
}
if(isset($_GET['delete'])){
  array_push($messages, 'Product was successfully deleted.');
}

// strankovani
if (isset($_GET['offset'])) {
    $offset = (int)$_GET['offset'];
} else {
    $offset = 0;
}

$count = $goodsDB->getPDO()->query("SELECT COUNT(id) FROM goods")->fetchColumn();

$statement = $goodsDB->getPDO()->prepare("SELECT * FROM goods ORDER BY id DESC LIMIT 9 OFFSET ?");
$statement->bindValue(1, $offset, PDO::PARAM_INT);
$statement->execute();
$goods = $statement->fetchAll();
?>

<?php require __DIR__.'/components/header.php' ?>

  <!-- Page Content -->
  <main class="container padding">
  <?php if(count($messages)): ?>
        <div class="alert alert-success">
                <?php foreach($messages as $message): ?>
                <p><?php echo $message; ?></p>
                <?php endforeach ?>
        </div>
    <?php endif ?>
    <h1>Homepage</h1>
    <p>Total mango count: <?php echo $count ?></p>
    <a class="btn btn-dark" href="new.php">Add new mango</a>
    <br><br>
    <?php if($count){ ?>
    <div class="products">
      <?php foreach($goods as $product): ?>
        <div class="card product" style="width: calc(100% / 3)">
          <img class="card-img-top" src="https://via.placeholder.com/300x150" alt="Card image">
          <div class="card-body">
            <h4 class="card-title"><?php echo $product['name'] ?></h4>
            <div class="card-subtitle"><?php echo $product['price'] ?> Kč</div>
            <div class="card-text"><?php echo $product['description'] ?></div>
            <a class="btn btn-dark" href='./buy.php?id=<?php echo $product['id'] ?>'>Buy</a>
            <a class="btn btn-secondary" href='./update.php?id=<?php echo $product['id'] ?>'>Edit</a>
            <a class="btn btn-secondary" href='./delete.php?id=<?php echo $product['id'] ?>'>Delete</a>
          </div>
          <div class="card-footer">
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <br>
    <div class="pagination">
      <?php for ($i = 1; $i <= ceil($count / 9); $i++) { ?>
        <a class="<?php echo $offset / 9 + 1 == $i ? "active" : ""; ?>" href="./index.php?offset=<?php echo ($i - 1) * 9; ?>"><?php echo $i; ?></a>
      <?php } ?>
    </div>
    <br>
    <?php } ?>
      </main>

<?php require __DIR__.'/components/footer.php' ?>