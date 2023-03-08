<?php
//Header Files that contain all the classes.
include('classes/db_config.php');
include ("classes/classes_lib.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Chatbot in PHP | CodingNepal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <style>
        *,
        *:before,
        *:after{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            background-color: #080710;
        }
        .background{
            width: 430px;
            height: 320px;
            position: absolute;
            transform: translate(-50%,-50%);
            left: 50%;
            top: 50%;
        }
        .background .shape{
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }
        .shape:first-child{
            background: linear-gradient(
                #ff76da,
                #ff9f5a
            );
            left: -600px;
            top: -120px;
        }
        .shape:last-child{
            background: linear-gradient(
                to right,
                #2ffcff,
                #b3ff6d
            );
            right: -600px;
            bottom: -200px;
        }

        /* CSS */
        .button-86 {

        align-items: center;
        appearance: none;
        background-color:mintcream;
        border-radius: 2px;
        border-width: 0;
        box-shadow: rgba(45, 35, 66, 0.4) 0 2px 4px,rgba(45, 35, 66, 0.3) 0 7px 13px -3px,#D6D6E7 0 -3px 0 inset;
        box-sizing: border-box;
        color: #36395A;
        cursor: pointer;
        display: inline-flex;
        font-family: serif;
            height: 28px;
        justify-content: center;
        line-height: 1;
        list-style: none;
        overflow: hidden;
        padding-left: 16px;
        padding-right: 16px;
        position: relative;
        text-align: left;
        text-decoration: none;
        transition: box-shadow .15s,transform .15s;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        white-space: nowrap;
        will-change: box-shadow,transform;
        font-size: 18px;
        }

        .button-86:focus {
        box-shadow: #D6D6E7 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
        }

        .button-86:hover {
        box-shadow: rgba(45, 35, 66, 0.4) 0 4px 8px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
        transform: translateY(-2px);
        }

        .button-86:active {
        box-shadow: #D6D6E7 0 3px 7px inset;
        transform: translateY(2px);
        }
    </style>

</head>



<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <form id="frm" name="frm" method="POST">

        <div class="wrapper">
        <div class="title">Webstix</div>
        <div class="form">
        <div class="bot-inbox inbox">
        <div class="icon">
        <i class="fas fa-user"></i>
        </div>
        <div class="msg-header">
            <?php
                $bt=new bot();
                $a=array();
                $a=$bt->init();
            ?>
            <p>Hey there, I am webstix's chatbot. How can I help you? </p> 
            <a href="#" onclick="keyop('1');">Blocks</a>

            
            <?php 
                foreach ($a as $value) 
            {
                ?>
            <button class="button-86" role="button" id="<?php echo $value; ?>" name="btns">
                <?php
                    echo "$value";
                ?>
            </button>
   
            <?php
            }
            ?>
            
            
            <script>
                function keyop(keyid)
                {
                    var ki=keyid;
                    alert(ki);
                    //store
                    //query
                    //3rd div
                    //2 div show 
                }
                document.querySelectorAll('button').forEach(occurence => {
                let id = occurence.getAttribute('id');
                occurence.addEventListener('click', function() {
                    document.cookie
                alert(id + ' was clicked!') 

                } );
                });
            </script>
            <br/><br/><br/><br/>

            <?php
                if (isset($_POST['btns'])) 
                {
                    $val=$_POST['btns'];
                    $c=array();
                    $c=$bt->init_contentdetails($val);
                    foreach ($c as $value) 
                    {
            ?>
                        <button class="button-86" role="button" id="btns" name="btns">
                        <?php
                            echo "$value";
                        ?>
                        </button>
                      

            <?php
            } 
            }
            ?>



    
        </div>
        </div>
        </div>
        <div class="typing-field">
        <div class="input-data">
            <input id="t1" name="t1" type="text" placeholder="Type something here.." >
            <button id="send-btn">Send</button>
        </div>
        </div>
        </div>

</form>



<script>
    //JQUERY CODE
    $(document).ready(function()
    {
        $("#frm").load(function() 
        {

            $v = $("#t1").val();
            $("#demo").text($v);
            $value = $("#frm").serialize();
            $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $v +'</p></div></div>';
            $(".form").append($msg);
            $("#t1").val('');



        //AJAX CODE
        $.ajax({
            url: 'botwork.php',
            type: 'POST',
            data: $value,
            success: function(result)
            {
                $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +.'<br/></p></div></div>';
                $(".form").append($replay);
                $(".form").scrollTop($(".form")[0].scrollHeight);
            }
            });
        });
    });
</script>
</body>
</html>