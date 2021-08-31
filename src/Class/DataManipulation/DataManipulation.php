<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 01-Nov-19
 * Time: 8:15 PM
 */

namespace App\DataManipulation;

use App\Model\DatabaseConnection as DB;
use PDO,PDOException;
class DataManipulation extends DB
{



    ////.....Select Query.....///


    public function showAllNotice()
    {
        $sql = "select * from notice";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function showPaymentSchedule()
    {
        $sql = "select * from payment_schedule";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }  public function showAdminProfile()
    {
        $sql = "select * from admin";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function viewEnginnerLawyer($id)
    {
        $sql = "select * from engineer_lawyer where id='".$id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function editiNotice($id)
    {
        $sql = "select * from notice where id='".$id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function isExitsAdminEmail($email)
    {
        $sql = "select * from admin where email='".$email."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function showAllClientByUserId($id)
    {
        $sql = "select * from client where user_id='".$id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function showClienttByid($id)
    {
        $sql = "select * from client where id='".$id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function showAllAdmin()
    {
        $sql = "select * from admin";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function showAllprojectByUserId($id)
    {
        $sql = "select * from project where user_id='".$id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function showAllCaseByUserId($id)
    {
        $sql = "select * from client_case where user_id='".$id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function showTodayData()

    {
        $currentDate =date("y-m-d");

        $sql = "select * from client_case where add_date ='".$currentDate."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function showUpcomingData()

    {
        $currentDate =date("y-m-d");

        $sql = "select * from client_case where add_date >'".$currentDate."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function showProjectByid($id)
    {
        $sql = "select * from project where id='".$id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function showUserDataByEmail($email)
    {
        $sql = "select * from user where email='".$email."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function showAllEngineer()
    {
        $sql = "select * from engineer_lawyer where type='Engineer'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function showAllLawyer()
    {
        $sql = "select * from engineer_lawyer where type='Lawyer'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }

    public function showEngineerProfileBYid($id)
    {
        $sql = "select * from engineer_lawyer where id='".$id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function todayPayment($date)
    {
        $sql = "select sum(amount) as amount from moneydetails where Pay_date='".$date."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function ShowPaymentList()
    {
        $sql = "select * from moneydetails";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function totalPayment()
    {
        $sql = "select sum(amount) as amount from moneydetails";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function viewAllEngineerPendingProfile()
    {
        $sql = "select * from engineer_lawyer where approved='no' && type='Engineer'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    } public function viewAllLawyerPendingProfile()
    {
        $sql = "select * from engineer_lawyer where approved='no' && type='Lawyer'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function showBookingHistoryBy($id)
    {
        $sql = "select * from hire_confim where user_id='".$id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function showAllapproveAccount()
    {
        $sql = "select * from engineer_lawyer where approved='yes'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
     public function showAllDeleteAccount()
    {
        $sql = "select * from engineer_lawyer where approved='Delete'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }

    public function showBookingHistory()
    {
        $sql = "select * from hire_confim ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function adminProfile($email)
    {
        $sql = "select * from admin where email='".$email."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function showUserDataByid($id)
    {
        $sql = "select * from user where id='".$id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
     public function viewHireRequest($type,$id)
    {
        $sql = "select * from hire_confim  where hired_id='".$id."' && type='".$type."'  ORDER BY  date DESC  ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }

    public function memberDataInsert()
    {
        $array = array($this->fullname,$this->gender,$this->age,$this->gurdianname,$this->gurdianpnumber,$this->address,$this->member_id,$this->health,$this->joindate);
        $sql = "insert into member (fullname,gender,age,gurdianname,gurdianpnumber,address,member_id,health,joindate) VALUE (?,?,?,?,?,?,?,?,?)";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }

    public function singleMember($id)
    {
        $sql = "select * from member WHERE id = '".$id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;

    }
    public function showDuration($paymentDate,$id)
    {
        $sql = "select * from moneydetails WHERE Pay_date ='$paymentDate' && engi_law_id = '$id'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;

    }
    public function checkPaymentDate($currentDate,$paymentDate)
    {
        $sql = "SELECT DATEDIFF( '".$currentDate."', '".$paymentDate."') as day";
        $data = $this->conn->query($sql);
        $data->setFetchMode(PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;

    }
    public function showPermissionDateById($id)
    {
        $sql = "SELECT max(Pay_date) as date FROM moneydetails WHERE engi_law_id='".$id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;

    }
    public function singleMember_Id()
    {
        $sql = "select * from member";
        $data = $this->conn->query($sql);
        $data->setFetchMode(PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
//        return $id;
    }
    public function updateMemberDetails($id)
    {
        $array = array($this->fullname,$this->gender,$this->age,$this->gurdianname,$this->gurdianpnumber,$this->address,$this->cost,$this->health,$this->joindate);
        $sql = "update member set fullname=?,gender=?,age=?,gurdianname=?,gurdianpnumber=?,address=?,cost=?,health=?,joindate=? WHERE id='".$id."'";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }
    public function memberIdMatchByUser($member_id)
    {
        $sql = "select m.fullname,m.gender,m.age,m.gurdianname,m.gurdianpnumber,m.address,m.member_id,m.health,m.joindate from member as m INNER JOIN user as u on m.member_id = '".$member_id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }

    ////....Update Query....///


    public  function updateNotice($id,$notic){

        $array = array($notic);
        $sqls = "update notice set note=? WHERE  id='".$id."'";
        $data = $this->conn->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }

    public  function confirmEngineerProfile($id){
         $approved="yes";
        $array = array($approved);
        $sqls = "update engineer_lawyer set	approved=? WHERE  id='".$id."'";
        $data = $this->conn->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
        public  function ActivationDelete($id){
         $approved="Delete";
        $array = array($approved);
        $sqls = "update engineer_lawyer set	approved=? WHERE  id='".$id."'";
        $data = $this->conn->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
        public  function changeDeleteToyesApproved($id){
         $approved="yes";
        $array = array($approved);
        $sqls = "update engineer_lawyer set	approved=? WHERE  id='".$id."'";
        $data = $this->conn->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }

    public  function ChangeAdminImage($email,$destinationFile){

        $array = array($destinationFile);
        $sqls = "update admin set  image=? WHERE  email='".$email."'";
        $data = $this->conn->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
    public  function approveConfirm($id){
        $approved="yes";
        $array = array($approved);
        $sqls = "update moneydetails set  approve=? WHERE  id='".$id."'";
        $data = $this->conn->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
    public function textareaPostSave($user_id,$name,$post,$position){
        $dataArray=array($user_id,$name,$post,$position);
        $sql="insert into post(user_id,name,post,position,date,time)VALUES (?,?,?,?,now(),now())";
        $sth=$this->conn->prepare($sql);
        $status=$sth->execute($dataArray);
        return $status;
    }

    public function postUpdateDataCollectviaUserId($user_id,$post){
        $dataArray=array($post);
        $sql="update  post set post=? WHERE no ='".$user_id."'";
        $data= $this->conn->prepare($sql);
        $status=$data->execute($dataArray);
        return $status;
    }
    public function managePostDelete($postNo){
        $sql=" delete from post WHERE commentNo ='".$postNo."' || no='".$postNo."'";
        $data= $this->conn->exec($sql);
        return $data;
    }
    public function postDataCollectviaUserId($id){
        $sql = "SELECT * FROM post WHERE no ='".$id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetch();

        return $satatus;
    }
    public function viewPostByUserId($id)
    {
        $sql = "select * from post WHERE user_id = '".$id."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;

    }
    public function viewPostComment($postNo){
        $sql = "SELECT * FROM post where commentNo = '".$postNo."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();
        return $satatus;
    }
    public function viewalluserforchat(){
        $sql = "SELECT * FROM user WHERE activate = 'yes' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();
        return $satatus;
    }
    public function showAlertonMessageforbuyers($id){
        $message = "unseen";
        $sql = "select eng_law_id, messageRead from chat where users_id = '".$id."' && messageRead='".$message."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();

        return $status;
    }
    public function insertMessageForChatSellers($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message){
        $data=array($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message);
        $sql="insert into chat(eng_law_id,users_id,eng_law_name,users_name,message_to,date,time)VALUES (?,?,?,?,?,now(),now())";
        $sth=$this->conn->prepare($sql);
        $status=$sth->execute($data);
        $update = "update chat set message = 'seen' where eng_law_id = '".$buyers_id."' &&  users_id = '".$sellers_id."'";
        $this->conn->exec($update);
        return $status;
    }
    public function showAlertonMessage($sellers_id){
        $message = "unseen";
        $sql = "select users_id, message from chat where  eng_law_id = '".$sellers_id."' &&  message='".$message."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();

        return $status;
    }
    public function viewSellerBuyersTotalInfoS($buyers_id,$sellers_id){
        $sql = "SELECT * FROM chat where eng_law_id = '".$buyers_id."' &&  users_id = '".$sellers_id."' ORDER BY no DESC";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();

        $update = "update chat set message = 'seen' where eng_law_id = '".$buyers_id."' &&  users_id = '".$sellers_id."'";
        $this->conn->exec($update);

        return $satatus;
    }
    public function insertMessageForChat($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message){
        $dataArray=array($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message);
        $sql="insert into chat(users_id,eng_law_id,users_name,eng_law_name,message_from,date,time)VALUES (?,?,?,?,?,now(),now())";
        $sth=$this->conn->prepare($sql);
        $status=$sth->execute($dataArray);
        $update = "update chat set messageRead = 'seen' where users_id = '".$buyers_id."' &&  eng_law_id = '".$sellers_id."'";
        $this->conn->exec($update);
        return $status;
    }
    public function viewSellerBuyersTotalInfo($buyers_id,$sellers_id){
        $sql = "SELECT * FROM chat where users_id = '".$buyers_id."' &&  eng_law_id = '".$sellers_id."' ORDER BY no DESC";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();

        $updates = "update chat set messageRead = 'seen' where users_id = '".$buyers_id."' &&  eng_law_id = '".$sellers_id."'";
        $this->conn->exec($updates);

        return $satatus;
    }
    public function viewAllPostForAdmin(){
        $sql = "SELECT * FROM post WHERE commentNo is NULL ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();

        return $satatus;
    }
    public function showSearchData($type){
        $sql = "SELECT * FROM engineer_lawyer WHERE category='".$type."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();

        return $satatus;
    }
    public function getPostDataToShow(){
        $sql = "SELECT * FROM post ORDER BY no DESC ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function insertComment($user_id,$name,$post,$commentNo){
        $dataArray=array($user_id,$name,$post,$commentNo);
        $sql="insert into post(user_id,name,post,date,time,commentNo)VALUES (?,?,?,now(),now(),?)";
        $sth=$this->conn->prepare($sql);
        $status=$sth->execute($dataArray);
        return $status;
    }

    public  function updateEngineerDocument($engineerNID,$engineerCertificate,$id){

        $array = array($engineerNID,$engineerCertificate);
        $sqls = "update engineer_lawyer set nid_image=?,document_image=? WHERE  id='".$id."'";
        $data = $this->conn->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
    public  function updateProject($id,$title,$address,$phone,$owner_name,$amount,$advance,$add_date,$date_line){

        $array = array($title,$address,$phone,$owner_name,$amount,$advance,$add_date,$date_line);
        $sqls = "update project set title=?,address=?,phone=?,owner_name=?,amount=?,advance=?,add_date=?,date_line=? WHERE  id='".$id."'";
        $data = $this->conn->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
    public  function updateClient($id,$name,$address,$gender,$age,$phone,$join_date,$note){

        $array = array($name,$address,$gender,$age,$phone,$join_date,$note);
        $sqls = "update client set name=?,address=?,gender=?,age=?,phone=?,join_date=?,note=? WHERE  id='".$id."'";
        $data = $this->conn->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
    public  function updateUserProfile($id,$email,$name,$gender,$age,$pass,$address,$phone){

        $array = array($email,$name,$gender,$age,$pass,$address,$phone);
        $sqls = "update user set email=?,name=?,gender=?,age=?,pass=?,address=?,phone=? WHERE  id='".$id."'";
        $data = $this->conn->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
    public  function updateAdminData($id,$pass,$email,$fname,$address,$city,$pnumber){

        $array = array($pass,$email,$fname,$address,$city,$pnumber);
        $sqls = "update admin set pass=?,email=?,fname=?,address=?,city=?,pnumber=? WHERE  id='".$id."'";
        $data = $this->conn->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
    public  function updateEngineerLawyerPhoto($image,$id){

        $array = array($image);
        $sqls = "update engineer_lawyer set image=? WHERE  id='".$id."'";
        $data = $this->conn->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
    public  function updateUserPhoto($image,$id){

        $array = array($image);
        $sqls = "update user set image=? WHERE  id='".$id."'";
        $data = $this->conn->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
    public  function updateEngineerLawyerProfile($id,$email,$fullname,$age,$pass,$address,$category,$experience,$office,$university,$city,$pnumber){

        $array = array($email,$fullname,$age,$pass,$address,$category,$experience,$office,$university,$city,$pnumber);
        $sqls = "update engineer_lawyer set email=?, fullname=?,age=?,pass=?,address=?,category=?,experience=?,office=?,university=?,city=?,pnumber=? WHERE  id='".$id."'";
        $data = $this->conn->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }




    ////....insert Query....///




    public  function insertNotice($notice){

        $array = array($notice);
        $sql = "insert into notice (note,date,time) VALUE (?,now(),now())";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }
    public  function insertPayment($amount,$duration){

        $array = array($amount,$duration);
        $sql = "insert into payment_schedule (amount,duration) VALUE (?,?)";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }
    public  function inserManyDetails($engi_law_id,$name,$pay_amount,$type,$number,$duration,$transaction){

        $array = array($engi_law_id,$name,$pay_amount,$type,$number,$duration,$transaction);
        $sql = "insert into moneydetails (engi_law_id,name,amount,type,number,duration,transaction,Pay_date) VALUE (?,?,?,?,?,?,?,now())";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }

    public  function addAdmin($name,$address,$city,$county,$phone,$email,$password,$destinationFile){

        $array = array($name,$address,$city,$county,$phone,$email,$password,$destinationFile);
        $sql = "insert into admin (fname,address,city,country,pnumber,email,pass,image) VALUE (?,?,?,?,?,?,?,?)";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }
    public  function inserHireData($user_id,$user_name,$user_email,$hired_id,$hired_name,$hired_email,$type){

        $array = array($user_id,$user_name,$user_email,$hired_id,$hired_name,$hired_email,$type);
        $sql = "insert into hire_confim (user_id,user_name,user_email,hired_id,hired_name,hired_email,type,date) VALUE (?,?,?,?,?,?,?,now())";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }
    public  function inserClient($user_id,$name,$address,$gender,$age,$phone,$join_date,$note,$image){

        $array = array($user_id,$name,$address,$gender,$age,$phone,$join_date,$note,$image);
        $sql = "insert into client (user_id,name,address,gender,age,phone,join_date,note,image) VALUE (?,?,?,?,?,?,?,?,?)";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }
    public  function inserProject($user_id,$title,$address,$phone,$owner_name,$amount,$advance,$add_date,$date_line){

        $array = array($user_id,$title,$address,$phone,$owner_name,$amount,$advance,$add_date,$date_line);
        $sql = "insert into project (user_id,title,address,phone,owner_name,amount,advance,add_date,date_line) VALUE (?,?,?,?,?,?,?,?,?)";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }
    public  function insertCase($user_id,$title,$court_name,$case_type,$case_no,$behalf,$party_name,$phone,$respodent_name,$advocate_name,$advocate_phone,$add_date){

        $array = array($user_id,$title,$court_name,$case_type,$case_no,$behalf,$party_name,$phone,$respodent_name,$advocate_name,$advocate_phone,$add_date);
        $sql = "insert into client_case (user_id,title,court_name,case_type,case_no,behalf,party_name,phone,respodent_name,advocate_name,advocate_phone,add_date) VALUE (?,?,?,?,?,?,?,?,?,?,?,?)";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }

    public function insertUserDonate()
    {
        $array = array($this->amount,$this->pnumber,$this->transaction,$this->date,$this->email);
        $sql = "insert into moneyDetails (amount,pnumber,transaction,date,email) VALUE (?,?,?,?,?)";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }




    ////.....Delete Query.....///


    public function deleteNotice($id)
    {
        $sql = "delete from notice WHERE id = '".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }

    public function delete_booking_history($id)
    {
        $sql = "delete from hire_confim WHERE id = '".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }
    public function deletePaymentSchedule($id)
    {
        $sql = "delete from payment_schedule WHERE id = '".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }
    public function delete_admin($id)
    {
        $sql = "delete from admin WHERE id = '".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }
    public function delete_project($id)
    {
        $sql = "delete from project WHERE id = '".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }
    public function delete_client($id)
    {
        $sql = "delete from client WHERE id = '".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }
}