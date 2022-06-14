<?php

const CITY="SELECT * FROM restaurant WHERE city=?";
const REST="SELECT * FROM restaurant WHERE name like ? ";

function getSearchRestaurants($search, PDO $db): array
{
    $stmt = $db->prepare("SELECT * FROM restaurant WHERE name like '%".$search."%' ");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getCityRestaurants($search, PDO $db): array
{
    $stmt = $db->prepare(CITY);
    $stmt->execute(array($search));
    return $stmt->fetchAll();
}