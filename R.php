<?php
$sql = "SELECT
a.id_alternative,
b.name,
SUM(IF(a.id_criteria=1,a.value,0)) AS C1,
SUM(IF(a.id_criteria=2,a.value,0)) AS C2,
SUM(IF(a.id_criteria=3,a.value,0)) AS C3,
SUM(IF(a.id_criteria=4,a.value,0)) AS C4,
SUM(IF(a.id_criteria=5,a.value,0)) AS C5
FROM
saw_evaluations a
JOIN saw_alternatives b USING(id_alternative)
GROUP BY a.id_alternative
ORDER BY a.id_alternative";
$result = $db_saw->query($sql);
$X = array(1 => array(), 2 => array(), 3 => array(), 4 => array(), 5 => array());

while ($row = $result->fetch_object()) {
  array_push($X[1], round($row->C1, 2));
  array_push($X[2], round($row->C2, 2));
  array_push($X[3], round($row->C3, 2));
  array_push($X[4], round($row->C4, 2));
  array_push($X[5], round($row->C5, 2));
}
$result->free();

// Periksa apakah array memiliki elemen sebelum mencoba menghitung nilai maksimum
$maxX1 = (!empty($X[1])) ? max($X[1]) : 0;
$maxX2 = (!empty($X[2])) ? max($X[2]) : 0;
$maxX3 = (!empty($X[3])) ? max($X[3]) : 0;
$maxX4 = (!empty($X[4])) ? max($X[4]) : 0;
$maxX5 = (!empty($X[5])) ? max($X[5]) : 0;

$minX1 = (!empty($X[1])) ? min($X[1]) : 0;
$minX2 = (!empty($X[2])) ? min($X[2]) : 0;
$minX3 = (!empty($X[3])) ? min($X[3]) : 0;
$minX4 = (!empty($X[4])) ? min($X[4]) : 0;
$minX5 = (!empty($X[5])) ? min($X[5]) : 0;

$sql = "SELECT
          a.id_alternative,
          SUM(
            IF(
              a.id_criteria=1,
              IF(
                b.attribute='benefit',
                a.value/" . $maxX1 . ",
                " . $minX1 . "/a.value)
              ,0)
              ) AS C1,
          SUM(
            IF(
              a.id_criteria=2,
              IF(
                b.attribute='benefit',
                a.value/" . $maxX2 . ",
                " . $minX2 . "/a.value)
               ,0)
             ) AS C2,
          SUM(
            IF(
              a.id_criteria=3,
              IF(
                b.attribute='benefit',
                a.value/" . $maxX3 . ",
                " . $minX3 . "/a.value)
               ,0)
             ) AS C3,
          SUM(
            IF(
              a.id_criteria=4,
              IF(
                b.attribute='benefit',
                a.value/" . $maxX4 . ",
                " . $minX4 . "/a.value)
               ,0)
             ) AS C4,
          SUM(
            IF(
              a.id_criteria=5,
              IF(
                b.attribute='benefit',
                a.value/" . $maxX5 . ",
                " . $minX5 . "/a.value)
               ,0)
             ) AS C5
        FROM
          saw_evaluations a
          JOIN saw_criterias b USING(id_criteria)
        GROUP BY a.id_alternative
        ORDER BY a.id_alternative
       ";
$result = $db_saw->query($sql);
$R = array();
while ($row = $result->fetch_object()) {
  $R[$row->id_alternative] = array($row->C1, $row->C2, $row->C3, $row->C4, $row->C5);
}
