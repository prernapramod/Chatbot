t<?php
include('classes/db_config.php');
include ("classes/classes_lib.php");


$bt=new bot();
$str=$_POST['t1'];

function getbtn($xyz)
{
  $str='';
  $value=' me please';
  $name='click me';
  $id='b1';
  $str.='<input type="submit" value="'.$xyz.'" id="'.$id.'"  name="'.$name.'" onclick="'.myfun($xyz).'">';
  return $str;
}
 
function myfun($xyz)
{
  $bt=new bot();
  $y=$bt->lookup($xyz);
  echo $y;
}





/*   $bytes = random_bytes(3);
$hexa=bin2hex($bytes);
//INSERT THE QUERY
$sql = "INSERT INTO chat_trans (Chat,RandomID,Updated_by) VALUES ('$str','$hexa',1)";
$one=$bt->insert_query($sql);
foreach ($str as $one) 
{
    $xyz=$bt->find_lookup($one);
    $sql2 = "INSERT INTO chat_trans (Chat,RandomID,Updated_by) VALUES ('$xyz','$hexa',1)";
    $bt->insert_query($sql2);
}

 */


foreach ($str as $one) 
{
    $xyz=$bt->lookup($one);
    echo("<br>");
    echo getbtn($xyz);
    echo("<br>");
}
?>