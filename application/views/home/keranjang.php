<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <style>
        .cart-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #f5f5f5;
        }

        .remove-link {
            color: #d9534f;
            text-decoration: none;
            cursor: pointer;
        }

        .remove-link:hover {
            text-decoration: underline;
        }

        .empty-cart {
            margin-top: 20px;
            text-align: center;
        }

        .empty-cart a {
            color: #fff;
            background-color: #d9534f;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-PaGgbSrnyIiy8ATO"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>
    <div class="cart-container">
        <h2>Keranjang Belanja</h2>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0; // inisialisasi variabel total
                foreach ($cart as $item) :
                    $subtotal = $item['qty'] * $item['price']; // hitung subtotal per item
                    $total += $subtotal; // akumulasi subtotal ke total
                ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['price']; ?></td>
                        <td><?php echo $item['qty']; ?></td>
                        <td><?php echo $subtotal; ?></td>
                        <td><a href="<?php echo site_url('home/hapus_item_keranjang/') . $item['rowid']; ?>" class="remove-link">Remove</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div>
            <strong>Total: <?php echo $total; ?></strong> 
            <a href="<?php echo site_url('home/kosongkan_keranjang'); ?>" class="btn btn-danger">Empty Cart</a>
        </div>

        <form id="payment-form" method="post" action="<?= site_url() ?>/snap/finish">
            <input type="hidden" name="result_type" id="result-type" value="">
            <input type="hidden" name="result_data" id="result-data" value="">
            <button id="pay-button">Pay!</button>
        </form>
    </div>

    <script type="text/javascript">
        $('#pay-button').click(function(event) {
            event.preventDefault();
            $(this).attr("disabled", "disabled");

            var total = <?php echo $total; ?>; 

            $.ajax({
                type: 'POST',
                url: '<?= site_url() ?>/snap/token',
                data: {
                    total: total
                },
                cache: false,
                success: function(data) {
                    console.log('token = ' + data);
                    var resultType = document.getElementById('result-type');
                    var resultData = document.getElementById('result-data');

                    function changeResult(type, data) {
                        $("#result-type").val(type);
                        $("#result-data").val(JSON.stringify(data));
                    }

                    snap.pay(data, {
                        onSuccess: function(result) {
                            changeResult('success', result);
                            console.log(result.status_message);
                            console.log(result);
                            $("#payment-form").submit();
                        },
                        onPending: function(result) {
                            changeResult('pending', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        },
                        onError: function(result) {
                            changeResult('error', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>