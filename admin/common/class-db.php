<?php
class db {

    private $dbhost;
    private $dbname;
    private $dbuser;
    private $dbpass;

    var $host;
    var $conn;
    var $dbconn;

    function __construct($setnames=true) {
        $this->dbhost   = '127.0.0.1';
        $this->dbname   = 'jakboxex_admin';
        $this->dbuser   = 'jakboxex_root';
        $this->dbpass   = 'U3SdufMib]a}';

        $this->conn     = mysql_connect($this->dbhost, $this->dbuser, $this->dbpass,true);

        $this->conn     = mysql_connect($this->dbhost, $this->dbuser, $this->dbpass,true) or die("Couldn't Connect to the Server");
        $this->dbconn   = mysql_select_db($this->dbname, $this->conn) or die('Died1');
    }

    function __destruct() {
        @mysql_close($this->conn);
    }

    function dbQuery($query) {
        $dbTemp = array() ;
        $i      = 0;
        $q = mysql_query($query, $this->conn);
        if (!$q) {
            $this->displayError();
            return false;
        }
        while ($row = mysql_fetch_array($q, MYSQL_ASSOC)) {
            $i++;
            foreach ($row as $key => $value) {
                $dbTemp[$i][$key] = $value;
            }
        }
        return $dbTemp;
    }


    function dbInsert($tableName, $varPost) {
        global $dbname;

        foreach ($varPost as $key => $value) {
            $fieldList .= ", `$key`";
            $valueList .= ", \"" . addslashes($value) . "\"";
        }
        $fieldList = substr($fieldList, 1);
        $valueList = substr($valueList, 1);
        $query = "Insert Into $tableName ($fieldList) values ($valueList)";

        if (mysql_query($query, $this->conn)) {
            return mysql_insert_id($this->conn);
        } else {
            $this->displayError();
        }

    }


    function dbUpdate($table, $data, $where) {
        unset($data["Id"], $data["id"], $data["ID"]);
        $qr = "";
        foreach ($data as $k => $v) {
            $value = $v;
            $value = addslashes($value);
            $qr .= "`$k` = '$value' ,";
        }

        $qr = substr($qr, 0, -1);
        $query = "Update $table set $qr where $where limit 1";

       $result =  mysql_query($query, $this->conn);
       return $result;
    }

    function cQuery($query) {
        $q = mysql_query($query, $this->conn);
        return $q;
    }

    function clean($input){
        $o = mysql_real_escape_string($input,$this->conn);
        return $o;
    }

    function displayError(){
       echo "Could not run query: $query :" . mysql_error();
    }

}

?>
