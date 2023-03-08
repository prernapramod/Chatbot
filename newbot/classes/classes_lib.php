<?php

//Create a class and put all functions in it.
class bot
{

    //Function to insert a query into chat_trans table
    public function insert_query($sql)
    {

        include('db_config.php');

        if (mysqli_query($conn, $sql)) 
        {
            $status="SUCCESS ";
        } 
        else 
        {
            echo "Error: " . $sql. "<br>" . mysqli_error($conn);
        }
        return $status;

    }

    public function find_lookup($string)
    {

        include('db_config.php');

        //Check with lookup if keywords match
        $sql= "SELECT Query FROM content_details WHERE Relative_ID=(select c_ID  from contents where c_name LIKE '$string')";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) 
        {
            $xyz=" ";
            $i = 0;
            while ($row = $result->fetch_assoc()) 
            {
                $st[$i] = $row;
                $abc= $st[$i]['Query'];
                $xyz .= $abc;
                echo $abc;
                $i++;
            }
            return $xyz;
        } 
        else 
        {
            $st = '';
        }

    }



    //Function to serach and return all the content details acording to the button pressed by user 
    public function lookup($string)
    {

        include('db_config.php');

        $sql= "SELECT Query FROM content_details WHERE Relative_ID=(select c_ID  from contents where c_name LIKE '$string')";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) 
        {
            $xyz=" ";
            $i = 0;
            while ($row = $result->fetch_assoc()) 
            {
                $st[$i] = $row;
                $abc= $st[$i]['Query'];
                $xyz .= $abc;
                //echo $abc;
                $i++;
            }
            return $xyz;
        } 

        else 
        {
            $st = '';
        }

    }


    


    //Functiom to fetch the first options and return to user when they enter the chatbot.
    public function init_contentdetails($str)
    {
        include('db_config.php');

        $sql= "SELECT Query FROM content_details WHERE Relative_ID=1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) 
        {
            $xyz=" ";
            $i = 0;
            $a=array();
            while ($row = $result->fetch_assoc()) 
            {
                $st[$i] = $row;
                $abc= $st[$i]['Query'];
                $xyz = $abc;
                array_push($a,$xyz);
                $i++;
            }
            return $a;
        } 
        
        else 
        {
            $st = '';
        }
    
    
    }




    public function init()
    {
        include('db_config.php');

        $sql= "SELECT c_name from contents";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) 
        {
            $xyz=" ";
            $i = 0;
            $a=array();
            while ($row = $result->fetch_assoc()) 
            {
                $st[$i] = $row;
                $abc= $st[$i]['c_name'];
                $xyz = $abc;
                array_push($a,$xyz);
                $i++;
            }
            return $a;
        } 
        
        else 
        {
            $st = '';
        }
    
    
    }
}
