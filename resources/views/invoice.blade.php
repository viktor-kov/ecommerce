<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{auth()->user()->email}}</title>
    <style>
        .right {
            float: right;
        }

        .left {
            float: left;
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        .product-table {
            width: 100%;
        }

        .product-table th {
            text-align: left;
        }
    </style>
</head>
<body>
    <header>
        <section class="clearfix">
            <aside class="left">
                <p>easy-shop.sk</p>
                <p>Bratislava, Dúbravka</p>
            </aside>
            <aside class="right">
                <p>{{auth()->user()->name}}</p>
                <p>{{auth()->user()->email}}</p>
            </aside>
        </section>
    </header>
    <main>
        <hr>
        <table class="product-table">
            <tr>
                <th>Produkt</th>
                <th>Kus</th>
                <th>Cena</th>
            </tr>
            @foreach (Cart::content() as $product)
               <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->qty}}</td>
                    <td>{{$product->price}}€</td>
               </tr>
            @endforeach
        </table>
        <hr>
        <section class="clearfix">
            <p class="left">Cena bez DPH:</p>
            <p class="right">{{Cart::subtotal() * 0.80}}€</p>
        </section>
        <section class="clearfix">
            <p class="left">Cena:</p>
            <p class="right">{{Cart::subtotal()}}€</p>
        </section>
    </main>
</body>
</html>