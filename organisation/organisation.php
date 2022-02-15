<?php  
    include "config.php";
    include "connect.php";

    $inn = $_REQUEST['inn'];
       ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrapper">
        <div class="inpt">
            <div><span>ИНН:</span> <input type="text" id = "inn" value = "<?php echo $inn; ?>"> 
                <button id = "btn">Send</button></div>
            <div class = "dbtn"></div>
        </div>
    </div>
    <div>
        <a href="https://www.wonder.legal/ua/creation-modele/%D0%B4%D0%BE%D0%B3%D0%BE%D0%B2%D1%96%D1%80-%D0%BD%D0%B0%D0%B4%D0%B0%D0%BD%D0%BD%D1%8F-%D0%BF%D0%BE%D1%81%D0%BB%D1%83%D0%B3-5">Договір про надання послуг</a>

    </div>
    <div id="output"></div>
    <div class="elements">
        <div class="hide" id = "usrData">
            text
        </div>
        <div class="hide" id = "usrInvoice">
            <div><label for="inptNumber">Номер рахунку</label><input type="text" id = "invoiceNumber">        </div>
            <div><label for="invoiceСontractor">Контрагент</label><input type="text" id = "invoiceСontractor">        </div>
            <div><label for="invoiceSum">Сума</label><input type="text" id = "invoiceSum">        </div>
            <div><input type="submit" value = "submit"></div>
        </div>
        <div class="hide" id = "usrAct">
        <div><label for="actNumber">Номер Акту</label><input type="text" id = "actNumber">        </div>
            <div><label for="actСontractor">Контрагент</label><input type="text" id = "actСontractor">        </div>
            <div><label for="actSum">Сума</label><input type="text" id = "actSum">        </div>
            <div><input type="submit" value = "submit"></div>
        </div>
        <div class="hide" id = "usrContract">
        <div><label for="contractNumber">Номер Договору</label><input type="text" id = "contractNumber">        </div>
            <div><label for="contractСontractor">Контрагент</label><input type="text" id = "contractСontractor">        </div>
            <div><label for="contractSum">Сума</label><input type="text" id = "contractSum">        </div>
            <div><input type="submit" value = "submit"></div>
        </div>
        <div class="hide" id = "usrCheck">
            <h2>Анализ</h2>
            <ul class="list">
                <li><button id="an1">Не понятно</button></li>
                <li><button id="an2">Продумано</button></li>
                <li><button id="an3">Прописано</button></li>
                <li><button id="an4">По методикам</button></li>
                <li><button id="an5">Автоматизировано</button></li>
            </ul>
        </div>
        <h2>Стратегия</h2>
            <ul class="list">
                <li><button id="btn1">Не понятно</button></li>
                <li><button id="btn2">Продумано</button></li>
                <li><button id="btn3">Прописано</button></li>
                <li><button id="btn4">По методикам</button></li>
                <li><button id="btn5">Автоматизировано</button></li>
            </ul>

    </div>


    </div>
<script>

    an1.addEventListener("click",chkBtn);
    an2.addEventListener("click",chkBtn);
    an3.addEventListener("click",chkBtn);
    an4.addEventListener("click",chkBtn);
    an5.addEventListener("click",chkBtn);
    function chkBtn(event){
        console.log(event.target.id);
        an1.classList = "";
        an2.classList = "";
        an3.classList = "";
        an4.classList = "";
        an5.classList = "";
        if (event.target.id == "an1"){an1.classList = "green";}
        if (event.target.id == "an2"){an2.classList = "green";}
        if (event.target.id == "an3"){an3.classList = "green";}
        if (event.target.id == "an4"){an4.classList = "green";}
        if (event.target.id == "an5"){an5.classList = "green";}

    }

</script>

    <div class="hide" id = "otpt">
        <table id="res" class = "table table-bordered table-sm table-responsive table-hover">
        </table>
    </div>
    <script>
    var usrDataFlag = 0; usrInvoiceFlag = 0; usrActFlag = 0; usrContractFlag = 0; usrCheckFlag = 0; addInvoiceFlag = 0;
    var request = new XMLHttpRequest();   var obj;
    function reqReadyStateChange() {/*console.log(request.readyState);*/
        if (request.readyState == 4) {    var status = request.status;
            if (status == 200) {
                console.log(request.responseText);       obj = JSON.parse(request.responseText);
                document.getElementById("output").innerHTML="";     var res = document.createElement("div");     res.setAttribute('role', 'alert');
                if (obj.dbIN==1){  var str = "Пользователь с ИНН "+obj.inn+" успешно зарегистрирован успешно!";      res.className = "alert alert-success";  }else{
                    var str = "Пользователь с ИНН "+obj.inn+" уже существует!";          res.className = "alert alert-warning";     }
                var node = document.createTextNode(str);      var info = document.createElement("div");
                info.innerHTML = '<div class="alert alert-success" role="alert"> <h4 class="alert-heading">Інформація про організацію!</h4>  <p>Назва: <b>'+obj.name+'</b> ІНН: <b>'+obj.inn+'</b> Адреса: <b>'+obj.adress+'</b><br> Телефон: <b>'+obj.phone+'</b> email: <b>'+obj.email+'</b> </p>  <hr>  <p class="mb-0">В указанном разделе Вы сможете ввести данные и просмотреть уже введенные данные</p></div>';            
                output.appendChild(info);   var input = document.createElement("div");
                input.innerHTML = '<div class = "inpt"><div><button id = "changeData">Змінити дані</button><button id = "addInvoice">Додати рахунок</button><button id = "addAct">Додати Акт</button><button id = "addContract">Додати Договір</button><button id = "addCheck">Пройти перевірку</button></div></div>';
                output.appendChild(input);        
                
                changeData.addEventListener("click",chngData)
                addInvoice.addEventListener("click",addInvoiceFnc)
                addAct.addEventListener("click",addActFnc)
                addContract.addEventListener("click",addContractFnc)
                addCheck.addEventListener("click",addCheckFnc)

                }   }   }

                function reqReadyStateChange1() {
                if (request.readyState == 4) { 
                       var status = request.status;
            if (status == 200) {
               // console.log(request.responseText);
                obj = JSON.parse(request.responseText);
                console.log(obj);
                var div = document.createElement('tr');
                    div.innerHTML = '<th>Назва документу, що пода\'ється</th><th>Стаття положення</th><th>Статус подання</th><th>Кількість балів</th><th>Коментар перевіряючого</th>';
                    res.appendChild(div);
                
                for (i=0;i<obj.length;i++){
                    var div = document.createElement('tr');
                    div.className = 'color'+obj[i].blstatus;
                    div.innerHTML = '<td>'+obj[i].docname+'</td><td>'+obj[i].stmnt+'</td><td>'+obj[i].status+'</td><td>'+obj[i].nballs+'</td><td>'+obj[i].comments_revisor+'</td>';
                    res.appendChild(div);
                }
                }   }   }
</script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>    <script  src="https://code.jquery.com/jquery-3.4.0.min.js"  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="  crossorigin="anonymous"></script>    
    <script>
        function clck(){
            var body = "inn=" + inn.value;
            console.log("Базовая информация");
            console.log(body);
            request.open("GET", "http://innovations.kh.ua/mse/back/organisation.php?"+body);
            request.onreadystatechange = reqReadyStateChange;
             request.send();
        }
        function clckReport(){   var input = document.createElement("div");                 input.innerHTML = '';                inpt.className = "inpt";                output.appendChild(input);        
            otpt.className = "hide";
            inpt.className = "";

        }
        function clckAnswer(){
            inpt.className = "hide";
            otpt.className = "";

            console.log("clckAnswer");
            var body = "studentId=" + obj.id;
            console.log(body);
            request.open("GET", "http://innovations.kh.ua/uni-smart/back/rep_answer.php?"+body);         request.onreadystatechange = reqReadyStateChange1;             request.send();
        }
        btn.addEventListener("click",clck);

        function showHide(fusrData,fusrInvoice,fusrAct,fusrContract,fusrCheck){
                usrData.className = "hide"; 
                usrInvoice.className = "hide";
                usrAct.className = "hide";
                usrContract.className = "hide";
                usrCheck.className = "hide";
                
                usrDataFlag = 0;
                usrInvoiceFlag = 0;
                usrActFlag = 0;
                usrContractFlag = 0;
                usrCheckFlag = 0;

                if(fusrData) {usrData.className = ""; usrDataFlag = 1;}
                if(fusrInvoice) {usrInvoice.className = "";usrInvoiceFlag = 1; }
                if(fusrAct) {usrAct.className = ""; usrContractFlag = 1;}
                if(fusrContract) {usrContract.className = ""; usrContractFlag = 1;}
                if(fusrCheck) {usrCheck.className = ""; usrCheckFlag = 1;}
                console.log(fusrCheck,usrCheckFlag);
                

        }

        function chngData(){
            console.log("chngData");
            if (usrDataFlag) showHide(0,0,0,0,0);
            else             showHide(1,0,0,0,0);
           // usrDataFlag = 1 - usrDataFlag;        
        }
        function addInvoiceFnc(){
            console.log("addInvoice");
            if (usrInvoiceFlag) showHide(0,0,0,0,0);
            else                showHide(0,1,0,0,0);
          //  usrInvoiceFlag = 1 - usrInvoiceFlag;        
        }
        function addActFnc(){
            console.log("addAct");
            if (usrActFlag) showHide(0,0,0,0,0);
            else            showHide(0,0,1,0,0);
         //   usrActFlag = 1 - usrActFlag;        
        }
        function addContractFnc(){
            console.log("chngContract");
            if (usrContractFlag) showHide(0,0,0,0,0);
            else                 showHide(0,0,0,1,0);
           // usrContractFlag = 1 - usrContractFlag;        
        }
        function addCheckFnc(){
            console.log("chngData");
            if (usrCheckFlag)  showHide(0,0,0,0,0);
            else               showHide(0,0,0,0,1);

            console.log(usrCheckFlag);
            //usrCheckFlag = 1 - usrCheckFlag;        
        }
/*
        function chngData(){
            console.log("chngData");
            if (usrDataFlag) usrData.className = "hide";
                        else         usrData.className = "";
                        usrDataFlag = 1 - usrDataFlag;        
        }
        */
    </script>

<script>
    $('#upload').on('click', function() {
    var file_data = $('#picture').prop('files')[0];
    var docname = $('#docname').val();

    // = $('#statmentId').val();
    var rds = document.getElementsByClassName('rdio');
    console.log(rds);
    var val;
    for (var i=0;i<rds.length;i++){
        if (rds[i].checked){
            val = rds[i].value;
        }
    }
    var statmentId = val;
    var nballs = $('#nballs').val();
    var comments = $('#comments').val();
    console.log(statmentId);
    userid = obj.id;
    var form_data = new FormData();
    form_data.append('userid', userid);
    form_data.append('file', file_data);
    form_data.append('docname', docname);
    form_data.append('statmentId', statmentId);
    form_data.append('nballs', nballs);
    form_data.append('comments', comments);

    console.log(form_data);
    jQuery.ajax({
                url: '/uni-smart/back/upload.php',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(php_script_response){
                    //alert(php_script_response);
                    alert("Дані відправлено");
                    $('#picture').val('');
    $('#docname').val('');
    var rds = document.getElementsByClassName('rdio');
    for (var i=0;i<rds.length;i++){rds[i].checked = false;} 
    var nballs = $('#nballs').val('');
    var comments = $('#comments').val('');

                }
     });
});
</script>


</body>
</html>