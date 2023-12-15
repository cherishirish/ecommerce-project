import './bootstrap';

    document.getElementById("shipping_address_different").addEventListener('click', checkShipping());
    document.getElementById("visa").addEventListener('click', cardType('visa'));
    document.getElementById("mastercard").addEventListener('click', cardType('mastercard'));
    document.getElementById("amex").addEventListener('click', cardType('amex'));

    function checkShipping(){
        if(document.getElementById("shipping_address_different").checked){
            document.getElementById("address").readOnly = true;
            document.getElementById("address").style.opacity = .2;

            document.getElementById("city").readOnly = true;
            document.getElementById("city").style.opacity = .2;

            document.getElementById("province").readOnly = true;
            document.getElementById("province").style.opacity = .2;

            document.getElementById("postal_code").readOnly = true;
            document.getElementById("postal_code").style.opacity = .2;

        }else{
            document.getElementById("address").readOnly = false;
            document.getElementById("address").style.opacity = 1;

            document.getElementById("city").readOnly = false;
            document.getElementById("city").style.opacity = 1;

            document.getElementById("province").readOnly = false;
            document.getElementById("province").style.opacity = 1;

            document.getElementById("postal_code").readOnly = false;
            document.getElementById("postal_code").style.opacity = 1;
        }
        }

    function cardType($type){
        alert("hi");
        document.getElementById("card_type").value = $type;
        document.getElementById("visa").style.borderBottom = "3px solid green";
        }

