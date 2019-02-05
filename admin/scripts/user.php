<?php

function createUser($fname,$username,$password,$email){
    include('connect.php');

    //to do: optional
    // check if user exists already, if yes then return a message right away

    //TO DO: the following query will create a new row in tbl_user table
    // with user_fname = $fname
    // user_name = $username
    // user_pass = $password
   // user_email = $email

    
    $create_user_query = 'INSERT INTO tbl_user(user_fname,user_name,user_pass,user_email)'; 
    $create_user_query .= ' VALUES(:fname,:username,:password,:email)'; 

    $create_user_set = $pdo->prepare($create_user_query); 
    $create_user_set->execute(
        array(
            ':fname'=>$fname,
            ':username'=>$username,
            ':password'=>$password,
            ':email'=>$email
    )
);

if($create_user_set->rowCount()){ //PDOStatement:rowCount returns how many rows have been affected..  //if there are more than zero rows being affected 
    redirect_to('index.php');
}else{
    $message = 'Your hiring practices have failed you... this individual sucks...';
    return $message;
};
    //TO DO: redirect user to index.php if success
    // otherwise return a message


    // in hackathon, we will be doing something similar
    // won't be a login though

}
?>