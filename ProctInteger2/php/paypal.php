<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY; ?>"></script>
</head>
<body>
    <div id="paypal-button-container"></div>
    <script>
        paypal.Buttons({
            style:{
                color:'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function(data, actions){
                return actions.order.create({
                    purchase_units:[{
                        amount: {
                            value: 100 //Aqui se le hace un eco con la etiqueta php del total(la constante que puede ser $total)
                        }
                    }] 
                    
                        
                });
            },
            onApprove: function(data, actions){
                actions.order.capture().then(function(detalles){
                    console.log(detalles)
                    let url = 'captura.php'

                    return fetch(url, {
                        method: 'post',
                        headers: {
                            'content-type': 'application/jason'
                        },
                        body: JSON.stringify({
                            detalles: detalles
                        })
                    })

                });
            },
            onCancel: function(data){
                alert("Pago Cancelado");
                console.log(data);

            }
        }).render('#paypal-button-container');
    </script>
</body>
</html>