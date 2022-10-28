<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="demo"></div>
    <script>
        async function myDisplay(){
            var myPromis = new Promise(function(reslove, reject){
                
                setTimeout(() => {
                    reslove('Hello');
                }, 3000);
            });

            document.getElementById("demo").innerHTML = await myPromis;
        }
        
        myDisplay();
    </script>
</body>
</html>