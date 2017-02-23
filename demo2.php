<?php
class user
{
    private static $count = 0 ; //记录所有用户的登录情况.
    public function __construct() {
        self::$count = self::$count + 1;
    }
    public function getcount() {
        return self::$count;
    }
    public function __destruct() {
        self::$count = self::$count - 1;
    }
}
$user1 = new user();
$user2 = new user();
$user3 = new user();
echo "now here have " . $user1->getcount() . " user";
echo "<br />";
unset($user3);
echo "now here have " . $user1->getcount() . " user";
?>