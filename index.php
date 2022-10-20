<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียนและรับคูปองอาหาร - ประชุมวิชาการโรงพยาบาลค่ายสุรศักดิ์มนตรี</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6b4c2963a2.js" crossorigin="anonymous"></script>
</head>
<body>
    
<nav class="navbar fixed-top navbar-expand-lg bg-light">
    <div class="container-fluid">
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex w-100" role="search" id="formSearch" action="javascript:void(0);">
                <!-- <input class="form-control me-2" type="search" placeholder="ค้นหาจากเลขบัตรประชาชน หรือ ชื่อ-นามสกุล" aria-label="Search" id="searchTxt">
                <button class="btn btn-success" type="submit">ค้นหา</button> -->

                <div class="input-group">
                    <input type="text" class="form-control" placeholder="ค้นหาจากเลขบัตรประชาชน หรือ ชื่อ-นามสกุล">
                    <button type="button" class="btn bg-transparent" style="margin-left: -40px; z-index: 100;">
                    <i class="fa fa-times"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">&nbsp;</div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            
            <ul class="list-group">
                <li class="list-group-item">
                    <span></span>คุณชนินี รุ่งรัศมีทรัพย์ 
                    <div class="float-end">
                        <a class="btn btn-success btn-sm print-sticker" data-id="111" href="javascript:void(0);" role="button">ลงทะเบียนและรับคูปอง</a>
                    </div>
                </li>
                <li class="list-group-item">
                    <span></span>คุณกนกพงศ์ เผ่ารอด 
                    <div class="float-end">
                        <a class="btn btn-success btn-sm print-sticker" data-id="222" href="javascript:void(0);" role="button">ลงทะเบียนและรับคูปอง</a>
                    </div>
                </li>
                <li class="list-group-item">
                    <span></span>คุณพีรยา ธนากานต์ 
                    <div class="float-end">
                        <a class="btn btn-success btn-sm print-sticker" data-id="333" href="javascript:void(0);" role="button">ลงทะเบียนและรับคูปอง</a>
                    </div>
                </li>
                <li class="list-group-item">
                    <span></span>คุณมาริสา วรภัทรศิริสกุล 
                    <div class="float-end">
                        <a class="btn btn-success btn-sm print-sticker" data-id="444" href="javascript:void(0);" role="button">ลงทะเบียนและรับคูปอง</a>
                    </div>
                </li>
                <li class="list-group-item">
                    <span class="me-2">คุณภาสกร ศิริวรภัทร</span><span><i class="fas fa-utensils me-2 text-success"></i><i class="fas fa-check text-success"></i></span>
                    <div class="float-end">
                    <span><i class="fas fa-sync fa-spin me-2"></i></span><a class="btn btn-success btn-sm print-sticker" data-id="555" href="javascript:void(0);" role="button">ลงทะเบียนและรับคูปอง</a>
                    </div>
                </li>
            </ul>

        </div>
        <div class="col-2"></div>
    </div>
</div>

<script>

    // enter เลขบัตรประชาชน+ชื่อสกุล
    document.getElementById('formSearch').addEventListener('submit',()=>{ 
        document.getElementById('searchTxt').value="";
    });

    var elements = document.getElementsByClassName('print-sticker');

    var myFunction = function() {
        var id = this.getAttribute("data-id");
        // alert(attribute);

        var w = window.open('print_coupon.php?id='+id,'Popup_Window','toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=400,height=300,left = 312,top = 234');
        // this.target = 'Popup_Window';
        w.print();
        w.close();

    };

    for (var i = 0; i < elements.length; i++) {
        elements[i].addEventListener('click', myFunction, false);
    }



    // var myFormXray = document.getElementById('formIDXray');
    // myFormXray.onsubmit = function() {
    //     var w = window.open('about:blank','Popup_Window','toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=400,height=300,left = 312,top = 234');
    //     this.target = 'Popup_Window';
    // };
    

</script>
</body>
</html>