<!-- Creiamo un array consentente dei prodotti con
Nome
Prezzo
Immagine
Tipologia
Stampiamo tutti i nostri prodotti in pagina
Poi con una select filtriamo i nostri prodotti per prezzo o per tipologia -->
<?php
include __DIR__ . '/db.php';
// $filteredType = $products;
// $filteredPrice = $products;
$controlPrice = 1.00;

if (isset($_GET['type']) !== false) {
    $type = $_GET['type'];
    if ($type === 'all') {
        $filteredType = $products;
    } else {
    $filteredType = [];
    foreach ($products as $product) {
        if ($product['type'] === $type) {
        $filteredType[] = $product;
        }
    }
    }
};
if (isset($_GET['price']) !== false) {
    $price = $_GET['price'];
    if ($price === 'all') {
        $filteredPrice = $products;
    } else {
    $filteredPrice = [];
    foreach ($products as $product) {
        if ($product['price'] <= $controlPrice) {
        $filteredPrice[] = $product;
        }else{
            $unfilteredPrice[] = $product;
        }
    }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="navbar">
        <form action="index.php" method="GET">
            <select name="type" id="type">
                <option value="all">All</option>
                <option value="Dolce">Dolce</option>
                <option value="Salato">Salato</option>
            </select>
            <select name="price" id="price">
                <option value="all">All</option>
                <option value="eco">Economico</option>
                <option value="cos">Costoso</option>
            </select>
        <button>Cerca</button>
    </form>
        </div>
    </header>
    <main>
    <?php if($type != 'all'){
        foreach($filteredType as $product) { ?>
            <img src="<?php echo $product['image'] ?>" alt="">
            <h2> <?= $product['name'] ?></h2>
            <h3> <?=$product['price'] ?></h3>
            <h4> <?=$product['type'] ?></h4>
            <?php }} else {
            foreach($filteredPrice as $product) { ?>
            <img src="<?php echo $product['image'] ?>" alt="">
            <h2> <?= $product['name'] ?></h2>
            <h3> <?=$product['price'] ?></h3>
            <h4> <?=$product['type'] ?></h4>
        <?php }}?>
    </main>
</body>
</html>