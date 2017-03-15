<?php
$a = password_hash('hello',PASSWORD_DEFAULT);

if(password_verify('hello',$a)){
    echo 1;
}