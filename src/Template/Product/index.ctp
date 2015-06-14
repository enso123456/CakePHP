<style type="text/css">
    input[type="text"] {
        width: 450px;
        height: 30px;
        margin: 10px 0;
    }
</style>
<input type="text" name="search" id="search" placeholder="Search">
<table>
    <tr>
        <th>Product No.</th>
        <th>Product Name</th>
        <th>Value</th>
        <th>Variant</th>
        <th>Pricing</th>
        <th>Image</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($products as $product): ?>
    <tr>
        <td><?= $product->product_no?></td>
        <td><?= $product->product_name?></td>
        <td><?= $product->value?></td>
        <td><?= $product->variant?></td>
        <td><?= $product->pricing?></td>
        <td>
            <?php echo $this->Html->image($product->image, ['alt' => 'CakePHP']);?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        $('#search').keydown(function() {
            console.log($('#search').val());

            $.get('product/search/' + $( this ).serialize(), function(data) {
                console.log(data);
            })
        });
    });
</script>