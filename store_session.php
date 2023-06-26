<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // รับข้อมูล session จาก AJAX request
  $sessionData = $_POST['sessionData'];

  // เก็บ session ในตัวแปร $_SESSION
  $_SESSION['mySession'] = $sessionData;

  // ตอบกลับด้วยสถานะเรียบร้อย
 
   echo json_encode(['status' => 'success','dataRes'=> $_SESSION['mySession']]);
} else {
  // หากไม่ได้รับการเรียกใช้เป็น POST request จะตอบกลับด้วยสถานะผิดพลาด
  echo json_encode(['status' => 'error']);
}
