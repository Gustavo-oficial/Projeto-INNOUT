<?php 

require_once(dirname(__FILE__, 2) . '/src/config/config.php');
# require_once(dirname(__FILE__, 2) . '/src/models/User.php');
require_once(CONTROLLER_PATH . '/login.php');
# require_once(MODEL_PATH . '/Login.php');

/*$login  = new Login(['email' => 'chaves@cod3r.com.br', 'password' => 'a']);

try {
    $login->checkLogin();
    echo 'DEU BOM';
} catch (Exception $e) {
    echo 'DEU RUIM';
}
*/

/*$user = new User(['name' => 'Gustavo', 'email' => 'chaves@cod3r.com.br']);
echo '<br>';
*/

// print_r(User::get(['name' => 'Chaves'], 'id, name, email'));

// echo User::getResultSetFromSelect(['id' => 1], 'name , email');
// echo '<br>';

// echo User::getResultSetFromSelect(['name' => 'Chaves', 'email' => 'chaves@cod3r.com.br']);

// print_r(User::get(['name']));


/*foreach(User::get(['name']) as $user){
    echo $user->name;
    echo '<br>';
}
*/


/*$sql = 'SELECT * FROM users';
$resultado = DataBase::getResultFromQuery($sql);

 while ($row = $resultado->fetch_assoc()) {
     print_r($row);
     echo '<br>';
 }
 */
