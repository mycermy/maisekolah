<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        // check the account already exist
        $db = App::resolve(Database::class);

        $sql = "SELECT * FROM guru WHERE IDGuru = ?";

        $user = $db->query($sql, [
            $db->sanitize($email),
        ])->find();

        if ($user) {
            $hashPassword = $user['katalaluan'];

            if (password_verify($password, $hashPassword)) {

                $this->login($user);

                return true;
            }
        }
        
        return false;
    }

    function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['IDGuru'],
            'name' => $user['namaGuru'],
        ];

        session_regenerate_id(true);
    }

    function logout()
    {
        Session::destroy();
    }
}
