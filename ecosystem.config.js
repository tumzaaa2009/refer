module.exports = {
  apps: [
    {
      name: "node-api-hos",
      script: "app.js", // ชื่อไฟล์ที่จะรัน
      instances: "1", // จำนวน instances ที่ต้องการให้รัน (ในกรณีนี้คือ 1)
      autorestart: true, // ตั้งค่าให้รีสตาร์ทอัตโนมัติเมื่อเกิดข้อผิดพลาด
      watch: false, // ตั้งค่าให้ติดตามการเปลี่ยนแปลงไฟล์และรีโหลด (หากต้องการ)
      max_memory_restart: "1G", // กำหนดจำนวนหน่วยความจำสูงสุดที่ PM2 จะเริ่มต้นใหม่ (หากต้องการ)
    
    },
  ],
};