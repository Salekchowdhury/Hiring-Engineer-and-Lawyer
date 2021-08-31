<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 01-Nov-19
 * Time: 8:13 PM
 */

namespace App\Registration;

use App\Model\DatabaseConnection as DB;
class Registration extends DB
{
    public
        $fullname,
        $email,
        $member_id,
        $pass,
        $type;
    public function registrationSetData($data)
    {
        if (array_key_exists("fullname",$data))
        {
            $this->fullname = $data["fullname"];
        }
        if (array_key_exists("email",$data))
        {
            $this->email = $data["email"];
        }
        if (array_key_exists("pass",$data))
        {
            $this->pass = $data["pass"];
        }
        if (array_key_exists("type",$data))
        {
            if ($data["type"] == "engineer_lawyer"){
                $this->type = $data["type"];
            }
            else
            {
                $this->type = $data["type"];
            }
        }
    }
    public function insertLawyerEngineer($fullname,$email,$emailToken,$pass,$type)
    {
        $array = array($fullname,$email,$emailToken,$pass,$type);
        $sql = "insert into engineer_lawyer (fullname,email,emailtoken,pass,type) VALUE (?,?,?,?,?)";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }
    public function insertUser($fullname,$email,$emailToken,$pass,$type)
    {
        $array = array($fullname,$email,$emailToken,$pass,$type);
        $sql = "insert into user (name,email,emailtoken,pass,type) VALUE (?,?,?,?,?)";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }
    public function isExistEmail()
    {
        $sql = "select email from engineer_lawyer where email ='".$this->email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public  function checkUserActivetokenUpdate($mail,$token){
        $sql="update user  set emailtoken = '".$token."'  WHERE email = '".$mail."'";
        $status = $this->conn->exec($sql);
        return $status;
    }
      public  function checkEngineerLawyerActivetokenUpdate($mail,$token){
        $sql="update engineer_lawyer  set emailtoken = '".$token."'  WHERE email = '".$mail."'";
        $status = $this->conn->exec($sql);
        return $status;
    }
      public  function checkAdminActivetokenUpdate($mail,$token){
        $sql="update admin  set emailtoken = '".$token."'  WHERE email = '".$mail."'";
        $status = $this->conn->exec($sql);
        return $status;
    }
    public  function updateUserPassword($user_id,$re_pass){
        $array=array($re_pass);
        $sql="update  user set pass=? WHERE email ='".$user_id."'";
        $data= $this->conn->prepare($sql);
        $status=$data->execute($array);
        return $status;
    }
     public  function checkValidMailForUser($user_mail,$otp){
         $sql="update user set emailtoken='yes' WHERE email ='".$user_mail."' && emailtoken='".$otp."'";
         $data= $this->conn->exec($sql);
         return $data;
    }
     public  function checkValidMailForUserEngineerLawyer($user_mail,$otp){
         $sql="update  engineer_lawyer set emailtoken='yes' WHERE email ='".$user_mail."' && emailtoken='".$otp."'";
         $data= $this->conn->exec($sql);
         return $data;
    }


    public  function updateEngineerLawyerPassword($user_id,$re_pass){
        $array=array($re_pass);
        $sql="update  engineer_lawyer set pass=? WHERE email ='".$user_id."'";
        $data= $this->conn->prepare($sql);
        $status=$data->execute($array);
        return $status;
    }
    public  function updateAdminPassword($user_id,$re_pass){
        $array=array($re_pass);
        $sql="update  admin set pass=? WHERE email ='".$user_id."'";
        $data= $this->conn->prepare($sql);
        $status=$data->execute($array);
        return $status;
    }

    public function isExistEmailUser()
    {
        $sql = "select email from user where email ='".$this->email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    /////end//////

    public function authSetData($data)
    {
        if (array_key_exists("email",$data))
        {
            $this->email = $data["email"];
        }
        if (array_key_exists("pass",$data))
        {
            $this->pass = $data["pass"];
        }
    }
    public function admin()
    {
        $sql = "select * from admin where pass = '".$this->pass."' && email ='".$this->email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function checkAdminEmail($email){
        $sql="select * from admin WHERE email ='$email'";
        $sth=$this->conn->query($sql);
        $sth->setFetchMode(\PDO::FETCH_OBJ);
        $data=$sth->fetch();
        return $data;
    }
     public function checkEngineerLawyerEmail($email){
        $sql="select * from engineer_lawyer WHERE email ='$email'";
        $sth=$this->conn->query($sql);
        $sth->setFetchMode(\PDO::FETCH_OBJ);
        $data=$sth->fetch();
        return $data;
    }

    public function checkUserEmail($email){
        $sql="select * from user WHERE email ='$email'";
        $sth=$this->conn->query($sql);
        $sth->setFetchMode(\PDO::FETCH_OBJ);
        $data=$sth->fetch();
        return $data;
    }

    public function engineer_lawyer()
    {
        $sql = "select * from engineer_lawyer where approved = 'yes' && pass = '".$this->pass."' && email ='".$this->email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function user()
    {
        $sql = "select * from user where activate = 'yes' && pass = '".$this->pass."' && email ='".$this->email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function userEmail($email)
    {
        $sql = "select * from user where email ='".$email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function userengineer_lawyerEmail($email)
    {
        $sql = "select * from engineer_lawyer where email ='".$email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function moderatorApprovedNo()
    {
        $sql = "select * from engineer_lawyer where approved = 'no'&& pass = '".$this->pass."' && email ='".$this->email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function member_idSetData($data)
    {
        if (array_key_exists("member_id",$data))
        {
            $this->member_id = $data['member_id'];
        }
    }
    public function isExistMemberId($member_id){
        $sql = "select * from member WHERE member_id = '".$member_id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function updateUser($email)
    {
        $array = array($this->member_id);
        $sql = "update user set activate = 'yes', member_id =? WHERE email='".$email."'";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }
    public function alluserengineer_lawyerEmail()
    {
        $sql = "select * from engineer_lawyer ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }

}