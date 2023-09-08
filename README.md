# refer
ระบบ Refer
support linux , window
1 ฐานข้อมูล referdb_hos ซัพพอร์ต (mysql,postgress) 
2.dump ฐานข้อมูล เข้า server ที่ ซัพพอร์ต  (mysql,postgress) 
3.ลง node กรณี ทำ api ,git bash windown 

คำสั่ง primary key auto + 1
CREATE SEQUENCE referdb_hos_seq START 1;

CREATE OR REPLACE FUNCTION auto_increment_primary_key()
RETURNS TRIGGER AS $$
BEGIN
    NEW.id := nextval('referdb_hos_seq');
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

DO $$ 
DECLARE 
    r record;
BEGIN
    FOR r IN (SELECT tablename FROM pg_tables WHERE schemaname = 'public' AND tablename LIKE 'referdb_hos_%') LOOP
        EXECUTE format('CREATE TRIGGER %1$s_auto_increment
            BEFORE INSERT ON %1$s
            FOR EACH ROW
            EXECUTE FUNCTION auto_increment_primary_key()', r.tablename);
    END LOOP;
END $$;
