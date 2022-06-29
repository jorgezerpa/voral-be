<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>infomación del pedido</title>
</head>
<body>
    <h2 style="text-align: center; margin: 0; color: rgba(255,53,184); font-size: 40px" >¡Tienes un nuevo voralPedido!</h2>
    <h3 style="text-align: center; margin: 0; color: #333; font-size: 30px">Es hora de voralTrabajar :)</h4>

    <h3 style="margin: 60px 0 10px 0; color: #444; font-size: 25px">Datos del Cliente</h3>
    <ul style="margin-bottom: 20px;">
        <li style="color: #555; font-size: 22px;">nombre: {{$information['clientInfo']['name']}}</li>
        <li style="color: #555; font-size: 22px;">teléfono: {{$information['clientInfo']['phone']}}</li>
    </ul>

    <h3 style="margin: 40px 0 10px 0; color: #444; font-size: 25px">Datos del pedido</h3>
    <ul>
    @foreach($information['products'] as $product)
        <li style="margin-bottom: 10px; color: #555; font-size: 22px;">
            producto: {{$product['name']}} <br>
            talla: {{$product['size']}} <br>
            precio: {{$product['price']}} $
        </li>
    @endforeach
    </ul>

</body>
</html>
