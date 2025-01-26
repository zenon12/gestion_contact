<?php
class User
{
  private $pdo;

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  public function register($data)
  {
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    $stmt = $this->pdo->prepare("
      INSERT INTO users 
      (first_name,last_name,email,phone,password) 
      VALUES 
      (:first_name, :last_name, :email, :phone, :password)
    ");
    return $stmt->execute($data);
  }


  public function login($email, $password)
  {
    $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
      return $user;
    }
    return false;
  }


  public function changePassword($userId, $password)
  {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $this->pdo->prepare("UPDATE users SET password = :password WHERE id = :id");
    return $stmt->execute(['id' => $userId, 'password' => $password]);
  }

  public function updateProfile($userId, $data)
  {
    $stmt = $this->pdo->prepare("
      UPDATE users SET
      first_name = :first_name,
      last_name = :last_name,
      email = :email,
      phone = :phone,
      description = :description,
      updatedAt = :updatedAt
       WHERE id = :id
    ");
    $data['id'] = $userId;
    // print_r($data) ; exit ;
    return $stmt->execute($data);
  }


  public function getUserById($userId)
  {
    $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  public function getUserByEmail($userEmail)
  {
    $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $userEmail]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }


  // public function update($userId, $data)
  // {
  //   $stmt = $this->pdo->prepare("UPDATE users SET username = :username WHERE id = :id");
  //   return $stmt->execute(['id' => $userId, 'username' => $data['username']]);
  // }

  public function delete($userId)
  {
    $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
    return $stmt->execute(['id' => $userId]);
  }



  public function storeResetToken($email, $token, $expires)
  {
    $stmt = $this->pdo->prepare("
      UPDATE users 
      SET reset_token = :token, 
          reset_token_expires = :expires 
      WHERE email = :email
    ");

    return $stmt->execute([
      'email' => $email,
      'token' => $token,
      'expires' => $expires
    ]);
  }

  public function findByResetToken($token)
  {
    $stmt = $this->pdo->prepare("
      SELECT * FROM users 
      WHERE reset_token = :token 
        AND reset_token_expires > NOW()
    ");
    $stmt->execute(['token' => $token]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function clearResetToken($userId)
  {
    $stmt = $this->pdo->prepare("
      UPDATE users 
      SET reset_token = NULL, 
          reset_token_expires = NULL 
      WHERE id = :id
    ");
    return $stmt->execute(['id' => $userId]);
  }
}
