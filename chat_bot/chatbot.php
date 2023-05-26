<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css"> 
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <style type="text/css">
        #btn{
            position: fixed;
            right: 0;
            bottom: 0;
            display: block;
            z-index: 1080;
            width: 5em;
            height: 5em;
        }
        #btn:hover{
            background-color: gray;
            border: none;
        }
        #chatbot{
            position: fixed;
            right: 0;
            bottom: 0;
            z-index: 1080;
            display: none;
            overflow: auto;
        }
        .pop-up-wrapper{
            position: fixed;
            right: 0;
            bottom: 0;
            z-index: 1080;
            margin-right: 15px;
            margin-bottom: 70px;
            width: 350px;
            background-color: white;
            box-shadow: 3px 5px 10px darkgray;
        }

        .header{
            height: 50px;
            background-color: #32CD32;
            color: black;
            font-size: 18px;
            font-weight: bold;
            text-align: left; 
        }
        .header-title{
            color: #F5F5F5;
            font-size: 22pt ;
        }
        .close{
            font-size: 35px;
            color: white;
            position: absolute;
            right: 14px;
            top: 3px;
        }
        .close:hover{
            cursor: pointer;
            color: white;
        }
        .isi{
            overflow-y: auto;
            width: 350px;
            height: 350px;
        }
        .pesan-bot{
            float: left;
            background-color: #32CD32;
            color: black;
            font-size: 14px;
            width: 50%;
            border-radius: 5px;
            padding: 4px;
            margin: 12px;
        }
        .pesan-user{
            background-color: #87CEFA;
            color: black;
            font-size: 14px;
            width: 50%;
            border-radius: 5px !important;
            padding: 4px;
            margin: 12px;
            float: right;
        }
        .footer{
            height: 50px; 
            background-color: white;
            border-top: 1px solid grey;
            padding-top: 10px;
        }
        .pesan{
            width: 310px !important;
            height: 34px !important;
            color: black;
            font-size: 10pt !important;
            border: 1px solid #e3e3e3;
            margin-top: 2px !important;
            padding-left: 5px !important;

        }
        .btnsend{
            border-style: none;
            background-color: transparent;
            font-size: 18px;
            margin: 2px;
        }
    </style>
    <title></title>
</head>
<body>   
    <button type="button" onclick="document.getElementById('chatbot').style.display='block'" id="btn" class="btn btn-success rounded-circle p-0 m-3">
    <img src="chat_bot/LogoVijipi.png" width="70"/>
    </button>
    <div id="chatbot" class="rounded">
        <div class="pop-up-wrapper rounded">
            <div class="header rounded">
            
                <p class="header-title"><img src="chat_bot/LogoVijipi.png" width="100"/>Vijipi Furniture</p>
                <span class="close" onclick="document.getElementById('chatbot').style.display='none'">&times;</span>
            </div>
            <div class="isi">
                <div class="chat-bot">
                    <div class="pesan-bot">
                        <p>Selamat datang di Vijipi Furniture! Ada yang bisa kami bantu?</p>
                    </div>
                </div>
            </div>
            <div class="footer">
                <form class="form-inline chatform"></form>
                <input type="text" class="pesan" id="pesan" name="chat-form" placeholder="Type your massage...">
                <button type="button" class="btnsend"><i class="fas fa-solid fa-paper-plane"></i></button>
            </div>
        </div>
    </div>
 <!-- membuat pesan chatbototomatis tanpa reload -->
 <script>
        $(document).ready(function(){
            $(".btnsend").on("click", function(){
                $pesan = $(".pesan").val();
                $msg = '<div class="pesan-user"><p>'+$pesan+'</p></div>';
                $(".isi").append($msg);
                $(".pesan").val("");

                // membuat balasan

                $.ajax({
                    type: "POST",
                    url: "chat_bot/chatbot_check.php",
                    data: 'text='+$pesan,
                    success: function(result){
                        $balasan = '<div class="chat-bot"><div class="pesan-bot"><p>'+result+'</p></div></div>';
                        $(".isi").append($balasan);
                        $(".isi").scrollTop($(".isi")[0].scrollHeight);
                    }
                });
            });
        });
    </script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>