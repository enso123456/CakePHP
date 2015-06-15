<style type="text/css">
    input[type="text"] {
        width: 450px;
        height: 30px;
        margin: 10px 0;
    }
</style>
<input type="text" name="search" id="search" placeholder="Search">
<table id="records_table">
    <thead>
        <tr>
            <th>Product No.</th>
            <th>Product Name</th>
            <th>Value</th>
            <th>Variant</th>
            <th>Pricing</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product->product_no?></td>
            <td><?= $product->product_name?></td>
            <td><?= $product->value?></td>
            <td><?= $product->variant?></td>
            <td><?= $product->pricing?></td>
            <td>
                <img src="/cakeTest/img/<?php echo $product->image;?>" >
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        $('#search').keydown(function() {

            $("tr:has(td)").remove();

            $.get('product/search/' + $('#search').val(), function(data) {

                $.each(eval(data), function(index,product) { 
                    data = '<tr>' +
                                '<td>' + product.product_no + '</td>'+
                                '<td>' + product.product_name + '</td>'+
                                '<td>' + product.value + '</td>'+
                                '<td>' + product.variant + '</td>'+
                                '<td>' + product.pricing + '</td>'+
                                '<td><img src="/cakeTest/img/'+product.image+'"></td>'+
                            '</tr>';
                    $('#records_table > tbody').append(data);
                });
            });
        });
    });
</script>