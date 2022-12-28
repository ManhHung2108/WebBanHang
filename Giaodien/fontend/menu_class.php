<?php
include "lib/database.php"; //gọi đến file này
?>
<?php
class menu
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
}
?>