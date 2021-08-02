<?php
loadModel('User');

class Login extends Model
{
    public function validate(){
        $errors = [];

        if(!$this->email){
            $errors['email'] = 'Email é um campo obrigatorio.';
        }

        if(!$this->password){
            $errors['password'] = 'Senha é obrigatoria para o acesso.';
        }

        if(count($errors) > 0){
            throw new ValidationException($errors);
        }
    }


    public function checkLogin()
    {
        $this->validate();
        $user = User::getOne(['email' => $this->email]);
        if(@$user->end_date){
            throw new AppException('Usuario desligado da empresa');
        }
        if ($user) {
            if (password_verify($this->password, $user->password)) {
                return $user;
            }
        }
        throw new AppException('Email ou senha invalidos');
    }
}
