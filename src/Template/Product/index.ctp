<style type="text/css">
    .menu_bar{
        width: 600px;
    }
    .menu_bar input[type="text"] {
        width: 250px;
        height: 30px;
        margin: 10px 10px;
        float: left;
    }
</style>
<div class="menu_bar">
    <input type="text" name="search" id="search" placeholder="Search product name, product no, attribute/values">
    <button id="searchBtn">Search</button>
</div>
<table id="records_table">
    <button id="show">Show All Products</button>
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
        $('#searchBtn').on('click', function(e) {
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

        $('#show').on('click', function() {
            $("tr:has(td)").remove();

            $.get('product/get', function(data) {
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
            })
        })
    });
</script>