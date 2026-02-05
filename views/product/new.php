<?php $this->layout("layout", ["title" => "New Product"]) ?>

<h1>New Product</h1>

<form method="post">
    <div>
        <label for="name">name</label>
        <input type="text" id="name" name="name">
    </div>
    <div>
        <label for="description">description</label>
        <textarea id="description" name="description"></textarea>
    </div>
    <div>
        <label for="size">size </label>
        <input type="number" id="size" name="size" min="o">
    </div>

    <button type="submit">Create Product</button>
</form>