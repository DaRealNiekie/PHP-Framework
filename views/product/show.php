<?php $this->layout("layout", ["title" => "products"]) ?>


<h1>Product</h1>

<p><?= $this->e($product->getDescription()) ?></p>

<p><?= $product->getSize() ?></p>