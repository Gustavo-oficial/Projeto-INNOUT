<?php 

require_once(dirname(__FILE__, 2) . '/src/config/config.php');
require_once(dirname(__FILE__, 2) . '/src/models/User.php');

$user = new User([" 'name' => 'Gustavo' , 'email' => 'gustavo@gmail.com'"]);
print_r($user);


/*$user->email = 'felix@gmail.com';
print_r($user->email);
*/

echo User::getSelect(['id => 1'], 'name','email');
echo '<br>';
echo User::getSelect(['name' => 'Chaves' , 'email' => 'chaves@cod3r.com.br']);





/*$sql = 'SELECT * FROM users';
$resultado = DataBase::getResultFromQuery($sql);

 while ($row = $resultado->fetch_assoc()) {
     print_r($row);
     echo '<br>';
 }
 */