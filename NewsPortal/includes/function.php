<?php
//function to get admin details 
function getAdminInfo($db,$email){
    $query="SELECT * FROM admin WHERE email='$email'";
    $run=mysqli_query($db,$query);
    $data = mysqli_fetch_assoc($run);
    return $data;
}
// function to dynamically show which category current post is based on
function getCategory($db,$id)
{
    $query="SELECT * FROM category WHERE id=$id";
    $run=mysqli_query($db,$query);
    $data=mysqli_fetch_assoc($run);
    return $data['name'];
}
function getAllCategory($db){
    $query="SELECT * FROM category";
    $run=mysqli_query($db,$query);
    $data = array();
    while($d=mysqli_fetch_assoc($run)){
        $data[]=$d;
    }
    return $data;
}
//function to select images dynamically according to its post id
function getImagesByPost($db,$post_id)
{
    $query="SELECT * FROM images WHERE post_id=$post_id";
    $run=mysqli_query($db,$query);
    $data=array();
    while($d=mysqli_fetch_assoc($run))
    {
        $data[]=$d;

    }
    return $data;
}

//function for getting comments
function getComments($db,$post_id)
{
    $query="SELECT * FROM comments WHERE post_id=$post_id ORDER BY id DESC";
    $run=mysqli_query($db,$query);
    $data=array();
    while($d=mysqli_fetch_assoc($run))
    {
        $data[]=$d;

    }
    return $data;
}
//function to get submenu 
function getSubMenu($db,$menu_id){
    $query="SELECT * FROM submenu WHERE parent_menu_id=$menu_id";
    $run=mysqli_query($db,$query);
    $data=array();
    while($d=mysqli_fetch_assoc($run))
    {
        $data[]=$d;

    }
    return $data;
}

//function that return us number of submenu
function getSubMenuNo($db,$menu_id){
    $query="SELECT * FROM submenu WHERE parent_menu_id=$menu_id";
    $run=mysqli_query($db,$query);
    return mysqli_num_rows($run);
}

?> 