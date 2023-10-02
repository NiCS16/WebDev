<?php
include("model.php");
session_start();

if (!isset($_SESSION['menulist'])) {
    $_SESSION['menulist'] = array();
}

if (!isset($_SESSION['cheflist'])) {
    $_SESSION['cheflist'] = array();
}

if (!isset($_SESSION['relationlist'])) {
    $_SESSION['relationlist'] = array();
}
function createmenu()
{
    $menu = new menumodel();
    $menu->type = $_POST['type'];
    $menu->namaMenu = $_POST['namaMenu'];
    $menu->harga = $_POST['harga'];
    $menu->deskripsi = $_POST['deskripsi'];
    array_push($_SESSION['menulist'], $menu);
}

function createchef()
{
    $chef = new chefmodel();
    $chef->namaChef = $_POST['namaChef'];
    $chef->nomortelp = $_POST['notelp'];
    $chef->keahlian = $_POST['keahlian'];
    array_push($_SESSION['cheflist'], $chef);
}

function editmenu($menuID)
{
    $menu = $_SESSION['menulist'][$menuID];
    $menu->type = $_POST['type'];
    $menu->namaMenu = $_POST['namaMenu'];
    $menu->harga = $_POST['harga'];
    $menu->deskripsi = $_POST['deskripsi'];
}

function editchef($chefID)
{
    $chef = $_SESSION['cheflist'][$chefID];
    $chef->namaChef = $_POST['namaChef'];
    $chef->nomortelp = $_POST['notelp'];
    $chef->keahlian = $_POST['keahlian'];
}

function getmenu(){
    return $_SESSION['menulist'];
}

function getchef(){
    return $_SESSION['cheflist'];
}

function deletemenu($menuIndex){
    unset($_SESSION['menulist'][$menuIndex]);
}

function deletechef($chefIndex){
    unset($_SESSION['cheflist'][$chefIndex]);
}

function getMenuById($menuID){
    return $_SESSION['menulist'][$menuID];
}

function getChefById($chefID){
    return $_SESSION['cheflist'][$chefID];
}

// Function to create a relationship between menu and chef by name
function createRelationByName($menuName, $chefName)
{
    $menuID = array_search($menuName, array_column($_SESSION['menulist'], 'namaMenu'));
    $chefID = array_search($chefName, array_column($_SESSION['cheflist'], 'namaChef'));

    if ($menuID !== false && $chefID !== false) {
        $relation = new stdClass();
        $relation->menuID = $menuID;
        $relation->chefID = $chefID;
        array_push($_SESSION['relationlist'], $relation);
    }
}

// Function to delete a relationship
function deleteRelation($menuID, $chefID)
{
    $relations = $_SESSION['relationlist'];
    foreach ($relations as $key => $relation) {
        if ($relation->menuID == $menuID && $relation->chefID == $chefID) {
            unset($_SESSION['relationlist'][$key]);
        }
    }
}
function getRelations()
{
    return $_SESSION['relationlist'];
}

if (isset($_POST['submitmenu'])) {
    createmenu();
    header("Location:view_item.php");
}

if (isset($_POST['submitchef'])) {
    createchef();
    header("Location:view_chef.php");
}

if (isset($_GET['deletemenuID'])) {
    deletemenu($_GET['deletemenuID']);
    header("Location:view_item.php");
}

if (isset($_GET['deletechefID'])) {
    deletechef($_GET['deletechefID']);
    header("Location:view_chef.php");
}

if (isset($_POST['submitmenuedit'])) {
    editmenu($_POST['inputmenu_id']);
    header("Location:view_item.php");
}

if (isset($_POST['submitchefedit'])) {
    editchef($_POST['inputchef_id']);
    header("Location:view_chef.php");
}

