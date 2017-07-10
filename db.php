<?php
class MyDb extends SQLite3
{
    function __construct()
    {
        $this->open('db/db.db');
    }
}
$db = new MyDb();
if (!$db)
{
    echo $db->lastErrorMsg();
}
//$sql = <<<EOF
//CREATE TABLE users
//(ID INT PRIMARY KEY NOT NULL,
//fname VARCHAR(250) NOT NULL,
//email VARCHAR(250) NOT NULL,
//uname VARCHAR(250) NOT NULL,
//pword VARCHAR(250) NOT NULL,
//date_stamp VARCHAR(250));
//EOF;
//$ret = $db->exec($sql);
//if(!$ret){
//    echo $db->lastErrorMsg();
//} else {
//    echo "Table created successfully\n";
//}
//$db->close();