<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6b4c2963a2.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row gap-2" style="margin-top:1em;">
            <button type="button" class="col btn btn-secondary btn-lg" onclick="setValue(1)">1</button>
            <button type="button" class="col btn btn-secondary btn-lg" onclick="setValue(2)">2</button>
            <button type="button" class="col btn btn-secondary btn-lg" onclick="setValue(3)">3</button>
        </div>
        <div class="row gap-2" style="margin-top:1em;">
            <button type="button" class="col btn btn-secondary btn-lg" onclick="setValue(4)">4</button>
            <button type="button" class="col btn btn-secondary btn-lg" onclick="setValue(5)">5</button>
            <button type="button" class="col btn btn-secondary btn-lg" onclick="setValue(6)">6</button>
        </div>
        <div class="row gap-2" style="margin-top:1em;">
            <button type="button" class="col btn btn-secondary btn-lg" onclick="setValue(7)">7</button>
            <button type="button" class="col btn btn-secondary btn-lg" onclick="setValue(8)">8</button>
            <button type="button" class="col btn btn-secondary btn-lg" onclick="setValue(9)">9</button>
        </div>
        <div class="row gap-2" style="margin-top:1em;">
            <button type="button" class="col btn btn-secondary btn-lg" onclick="setValue(0)">0</button>
            <button type="button" class="col btn btn-secondary btn-lg" onclick="removeValue()">ลบ</button>
        </div>
        <div class="row gap-2" style="margin-top:1em;">
            <button type="button" class="col btn btn-secondary btn-lg" id="testSearchNum" onclick="searchNum()">ค้นหา</button>
        </div>
    </div>
    <script>

        function setValue(id){
            opener.document.formSearch.search.value+=id;
        }

        function removeValue(){
            var num = opener.document.formSearch.search.value;
            num = num.slice(0, -1);
            opener.document.formSearch.search.value=num;
        }

        function searchNum(){
            console.log("test submit");
            window.opener.submitForm();
            // console.log(test);

            var form = window.opener.document.getElementById("formSearch");
            form.submit();
        }

    </script>
</body>
</html>