<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
</head>
<body>
<div id="reader" style="width: 375px"></div>
<div id="qr-reader-results"></div>
<div id="qr-confirm"></div>
    <script>
        // This method will trigger user permissions
        Html5Qrcode.getCameras().then(devices => {
            /**
             * devices would be an array of objects of type:
             * { id: "id", label: "label" }
             */
            if (devices && devices.length) {
                var cameraId = devices[0].id;
                // use this to start scanning.

                // alert(cameraId);
                // document.getElementById("qr-reader-results").innerHTML += "cameraId: "+cameraId+"<br>";

                var html5QrCode = new Html5Qrcode(/* element id */ "reader");
                html5QrCode.start( 
                { facingMode: "environment" }, 
                {
                    fps: 10,    // Optional, frame per seconds for qr code scanning
                    qrbox: { width: 250, height: 250 }  // Optional, if you want bounded box UI
                },
                (decodedText, decodedResult) => { 

                    var confirm_id = decodedText;

                    updateCoupon(confirm_id);
                    var qrResult = "decodedText: "+decodedText+"<br> decodedResult: "+decodedResult;
                    
                    document.getElementById("qr-reader-results").innerHTML = qrResult;
                    
                },
                (errorMessage) => { 
                    document.getElementById('qr-confirm').innerHTML = "Confirm Coupon: -";
                    // parse error, ignore it.
                })
                .catch((err) => {
                // Start failed, handle it.
                });

            }
        }).catch(err => {
            // handle err
        });

        async function updateCoupon(confirm_id){ 
            var response = await fetch('confirm_coupon.php?id='+confirm_id);
            if (!response.ok) { 
                
            }
            var resText = await response.text();
            document.getElementById('qr-confirm').innerHTML = "Confirm Coupon: "+resText;
            
            
        }
    </script>
</body>
</html>