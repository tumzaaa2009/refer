/*
 Navicat Premium Data Transfer

 Source Server         : pghos
 Source Server Type    : PostgreSQL
 Source Server Version : 150003 (150003)
 Source Host           : localhost:5432
 Source Catalog        : referdb_hos
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 150003 (150003)
 File Encoding         : 65001

 Date: 08/09/2023 12:49:11
*/


-- ----------------------------
-- Sequence structure for cancle_case_id_case_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."cancle_case_id_case_seq";
CREATE SEQUENCE "public"."cancle_case_id_case_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for car_reg_id_car_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."car_reg_id_car_seq";
CREATE SEQUENCE "public"."car_reg_id_car_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for cause_referback_cause_referback_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."cause_referback_cause_referback_id_seq";
CREATE SEQUENCE "public"."cause_referback_cause_referback_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for cause_referout_cause_referout_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."cause_referout_cause_referout_id_seq";
CREATE SEQUENCE "public"."cause_referout_cause_referout_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for department_dep_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."department_dep_id_seq";
CREATE SEQUENCE "public"."department_dep_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for doctor_doctor_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."doctor_doctor_id_seq";
CREATE SEQUENCE "public"."doctor_doctor_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for pttype_pttype_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."pttype_pttype_id_seq";
CREATE SEQUENCE "public"."pttype_pttype_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for referdb_hos_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."referdb_hos_seq";
CREATE SEQUENCE "public"."referdb_hos_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for station_station_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."station_station_id_seq";
CREATE SEQUENCE "public"."station_station_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Table structure for angina
-- ----------------------------
DROP TABLE IF EXISTS "public"."angina";
CREATE TABLE "public"."angina" (
  "angina_id" varchar(5) COLLATE "pg_catalog"."default" NOT NULL,
  "angina_name" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of angina
-- ----------------------------

-- ----------------------------
-- Table structure for auto_complete_word
-- ----------------------------
DROP TABLE IF EXISTS "public"."auto_complete_word";
CREATE TABLE "public"."auto_complete_word" (
  "uid" varchar(50) COLLATE "pg_catalog"."default",
  "autoword" varchar(1000) COLLATE "pg_catalog"."default",
  "time" timestamp(6) NOT NULL
)
;

-- ----------------------------
-- Records of auto_complete_word
-- ----------------------------

-- ----------------------------
-- Table structure for cancle_case
-- ----------------------------
DROP TABLE IF EXISTS "public"."cancle_case";
CREATE TABLE "public"."cancle_case" (
  "id_case" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1
),
  "detail_note" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of cancle_case
-- ----------------------------
INSERT INTO "public"."cancle_case" OVERRIDING SYSTEM VALUE VALUES (1, '324234');

-- ----------------------------
-- Table structure for car_reg
-- ----------------------------
DROP TABLE IF EXISTS "public"."car_reg";
CREATE TABLE "public"."car_reg" (
  "id_car" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1
),
  "reg_car" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of car_reg
-- ----------------------------
INSERT INTO "public"."car_reg" OVERRIDING SYSTEM VALUE VALUES (1, '1343asdas');

-- ----------------------------
-- Table structure for cause_referback
-- ----------------------------
DROP TABLE IF EXISTS "public"."cause_referback";
CREATE TABLE "public"."cause_referback" (
  "cause_referback_id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1
),
  "cause_referback_name" varchar(50) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of cause_referback
-- ----------------------------

-- ----------------------------
-- Table structure for cause_referout
-- ----------------------------
DROP TABLE IF EXISTS "public"."cause_referout";
CREATE TABLE "public"."cause_referout" (
  "cause_referout_id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1
),
  "cause_referout_name" varchar(50) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of cause_referout
-- ----------------------------

-- ----------------------------
-- Table structure for clinicgroup
-- ----------------------------
DROP TABLE IF EXISTS "public"."clinicgroup";
CREATE TABLE "public"."clinicgroup" (
  "clinicgroup_id" varchar(50) COLLATE "pg_catalog"."default",
  "clinicgroup_name" varchar(120) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of clinicgroup
-- ----------------------------

-- ----------------------------
-- Table structure for clinicgroupsub
-- ----------------------------
DROP TABLE IF EXISTS "public"."clinicgroupsub";
CREATE TABLE "public"."clinicgroupsub" (
  "clinicgroup_subid" varchar(50) COLLATE "pg_catalog"."default",
  "clinicsub_id" varchar(50) COLLATE "pg_catalog"."default",
  "clinicsub_name" varchar(120) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of clinicgroupsub
-- ----------------------------

-- ----------------------------
-- Table structure for conscious
-- ----------------------------
DROP TABLE IF EXISTS "public"."conscious";
CREATE TABLE "public"."conscious" (
  "conscious_id" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "conscious_name" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of conscious
-- ----------------------------
INSERT INTO "public"."conscious" VALUES ('1', '555');

-- ----------------------------
-- Table structure for conscious_sepsis
-- ----------------------------
DROP TABLE IF EXISTS "public"."conscious_sepsis";
CREATE TABLE "public"."conscious_sepsis" (
  "conscious_id" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "conscious_name" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of conscious_sepsis
-- ----------------------------

-- ----------------------------
-- Table structure for contactby
-- ----------------------------
DROP TABLE IF EXISTS "public"."contactby";
CREATE TABLE "public"."contactby" (
  "contact_id" varchar(5) COLLATE "pg_catalog"."default",
  "contact_detail" varchar(150) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of contactby
-- ----------------------------

-- ----------------------------
-- Table structure for coordinate
-- ----------------------------
DROP TABLE IF EXISTS "public"."coordinate";
CREATE TABLE "public"."coordinate" (
  "coordinate_id" varchar(5) COLLATE "pg_catalog"."default" NOT NULL,
  "coordinate_name" varchar(50) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of coordinate
-- ----------------------------

-- ----------------------------
-- Table structure for coordinate_cause
-- ----------------------------
DROP TABLE IF EXISTS "public"."coordinate_cause";
CREATE TABLE "public"."coordinate_cause" (
  "coordinate_cause_id" varchar(5) COLLATE "pg_catalog"."default" NOT NULL,
  "coordinate_cause_name" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of coordinate_cause
-- ----------------------------

-- ----------------------------
-- Table structure for coordinate_is
-- ----------------------------
DROP TABLE IF EXISTS "public"."coordinate_is";
CREATE TABLE "public"."coordinate_is" (
  "coordinate_is_id" int4 NOT NULL,
  "coordinate_is_name" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of coordinate_is
-- ----------------------------

-- ----------------------------
-- Table structure for dead
-- ----------------------------
DROP TABLE IF EXISTS "public"."dead";
CREATE TABLE "public"."dead" (
  "dead_type" varchar(5) COLLATE "pg_catalog"."default",
  "dead_detail" varchar(150) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of dead
-- ----------------------------

-- ----------------------------
-- Table structure for deny_info
-- ----------------------------
DROP TABLE IF EXISTS "public"."deny_info";
CREATE TABLE "public"."deny_info" (
  "deny_no" varchar(50) COLLATE "pg_catalog"."default",
  "referout_no" varchar(50) COLLATE "pg_catalog"."default",
  "from_hosp" varchar(50) COLLATE "pg_catalog"."default",
  "from_hosp_name" varchar(1500) COLLATE "pg_catalog"."default",
  "to_hosp" varchar(50) COLLATE "pg_catalog"."default",
  "to_hosp_name" varchar(1500) COLLATE "pg_catalog"."default",
  "deny_cause_id" varchar(50) COLLATE "pg_catalog"."default",
  "deny_cause_name" varchar(2000) COLLATE "pg_catalog"."default",
  "deny_date" timestamp(6),
  "deny_time" varchar(50) COLLATE "pg_catalog"."default",
  "fw_hosp" varchar(50) COLLATE "pg_catalog"."default",
  "fw_hosp_name" varchar(1500) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of deny_info
-- ----------------------------

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS "public"."department";
CREATE TABLE "public"."department" (
  "dep_id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1
),
  "dep_name" varchar(500) COLLATE "pg_catalog"."default" NOT NULL,
  "station_name" varchar(250) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO "public"."department" OVERRIDING SYSTEM VALUE VALUES (3, 'gg', '');

-- ----------------------------
-- Table structure for derivery_service_refer
-- ----------------------------
DROP TABLE IF EXISTS "public"."derivery_service_refer";
CREATE TABLE "public"."derivery_service_refer" (
  "id_service" int4,
  "name_service" varchar(255) COLLATE "pg_catalog"."default",
  "status_service" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of derivery_service_refer
-- ----------------------------

-- ----------------------------
-- Table structure for diagtype
-- ----------------------------
DROP TABLE IF EXISTS "public"."diagtype";
CREATE TABLE "public"."diagtype" (
  "diagtype_id" varchar(1) COLLATE "pg_catalog"."default" NOT NULL,
  "diagtype_name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of diagtype
-- ----------------------------

-- ----------------------------
-- Table structure for disaster
-- ----------------------------
DROP TABLE IF EXISTS "public"."disaster";
CREATE TABLE "public"."disaster" (
  "methane_date" timestamp(6),
  "methane_major" varchar(5) COLLATE "pg_catalog"."default",
  "mc_type" varchar(50) COLLATE "pg_catalog"."default",
  "mc_no" varchar(50) COLLATE "pg_catalog"."default",
  "hn" varchar(50) COLLATE "pg_catalog"."default",
  "patient_name" varchar(150) COLLATE "pg_catalog"."default",
  "triage" varchar(50) COLLATE "pg_catalog"."default",
  "diag" varchar(50) COLLATE "pg_catalog"."default",
  "disposition" varchar(50) COLLATE "pg_catalog"."default",
  "admit_ward" varchar(50) COLLATE "pg_catalog"."default",
  "refer_hospcode" varchar(50) COLLATE "pg_catalog"."default",
  "load_id" varchar(50) COLLATE "pg_catalog"."default",
  "load_date" timestamp(6),
  "load_time" varchar(50) COLLATE "pg_catalog"."default",
  "ett_no" varchar(50) COLLATE "pg_catalog"."default",
  "ett_mark" varchar(50) COLLATE "pg_catalog"."default",
  "management" varchar(2500) COLLATE "pg_catalog"."default",
  "fromhospcode" varchar(50) COLLATE "pg_catalog"."default",
  "fromhospname" varchar(500) COLLATE "pg_catalog"."default",
  "dead_type" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of disaster
-- ----------------------------

-- ----------------------------
-- Table structure for disaster_festival
-- ----------------------------
DROP TABLE IF EXISTS "public"."disaster_festival";
CREATE TABLE "public"."disaster_festival" (
  "festival_year" timestamp(6),
  "festival_type" varchar(5) COLLATE "pg_catalog"."default",
  "mc_type" varchar(50) COLLATE "pg_catalog"."default",
  "mc_no" varchar(50) COLLATE "pg_catalog"."default",
  "hn" varchar(50) COLLATE "pg_catalog"."default",
  "patient_name" varchar(150) COLLATE "pg_catalog"."default",
  "triage" varchar(50) COLLATE "pg_catalog"."default",
  "diag" varchar(2500) COLLATE "pg_catalog"."default",
  "disposition" varchar(50) COLLATE "pg_catalog"."default",
  "admit_ward" varchar(150) COLLATE "pg_catalog"."default",
  "refer_hospcode" varchar(50) COLLATE "pg_catalog"."default",
  "load_id" varchar(50) COLLATE "pg_catalog"."default",
  "load_date" timestamp(6),
  "load_time" varchar(50) COLLATE "pg_catalog"."default",
  "ett_no" varchar(50) COLLATE "pg_catalog"."default",
  "ett_mark" varchar(50) COLLATE "pg_catalog"."default",
  "management" varchar(2500) COLLATE "pg_catalog"."default",
  "fromhospcode" varchar(50) COLLATE "pg_catalog"."default",
  "fromhospname" varchar(500) COLLATE "pg_catalog"."default",
  "patient_age" int4,
  "dead_type" varchar(50) COLLATE "pg_catalog"."default",
  "sex" varchar(50) COLLATE "pg_catalog"."default",
  "causeinjury_id" int4,
  "causeinjury_other" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of disaster_festival
-- ----------------------------

-- ----------------------------
-- Table structure for disposition
-- ----------------------------
DROP TABLE IF EXISTS "public"."disposition";
CREATE TABLE "public"."disposition" (
  "disposition_id" varchar(50) COLLATE "pg_catalog"."default",
  "disposition_name" varchar(50) COLLATE "pg_catalog"."default",
  "disposition_order" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of disposition
-- ----------------------------

-- ----------------------------
-- Table structure for doctor
-- ----------------------------
DROP TABLE IF EXISTS "public"."doctor";
CREATE TABLE "public"."doctor" (
  "doctor_id" int4 NOT NULL GENERATED BY DEFAULT AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1
),
  "doctor_name" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "doctor_status" varchar(50) COLLATE "pg_catalog"."default",
  "doctor_tel" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of doctor
-- ----------------------------

-- ----------------------------
-- Table structure for doctor_schedul
-- ----------------------------
DROP TABLE IF EXISTS "public"."doctor_schedul";
CREATE TABLE "public"."doctor_schedul" (
  "ondatetime" timestamp(6),
  "department" varchar(50) COLLATE "pg_catalog"."default",
  "clinic" varchar(50) COLLATE "pg_catalog"."default",
  "hospcode" varchar(50) COLLATE "pg_catalog"."default",
  "ontype" varchar(50) COLLATE "pg_catalog"."default",
  "doctor_id" int4
)
;

-- ----------------------------
-- Records of doctor_schedul
-- ----------------------------

-- ----------------------------
-- Table structure for dyspnea
-- ----------------------------
DROP TABLE IF EXISTS "public"."dyspnea";
CREATE TABLE "public"."dyspnea" (
  "dyspnea_id" varchar(5) COLLATE "pg_catalog"."default" NOT NULL,
  "dyspnea_name" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of dyspnea
-- ----------------------------

-- ----------------------------
-- Table structure for icd10
-- ----------------------------
DROP TABLE IF EXISTS "public"."icd10";
CREATE TABLE "public"."icd10" (
  "code" varchar(7) COLLATE "pg_catalog"."default" NOT NULL,
  "name" varchar(200) COLLATE "pg_catalog"."default",
  "spclty" char(2) COLLATE "pg_catalog"."default",
  "tname" varchar(150) COLLATE "pg_catalog"."default",
  "code3" char(3) COLLATE "pg_catalog"."default",
  "code4" char(1) COLLATE "pg_catalog"."default",
  "code5" char(1) COLLATE "pg_catalog"."default",
  "sex" int4,
  "ipd_valid" char(1) COLLATE "pg_catalog"."default",
  "icd10compat" char(1) COLLATE "pg_catalog"."default",
  "icd10tmcompat" char(1) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of icd10
-- ----------------------------

-- ----------------------------
-- Table structure for labour
-- ----------------------------
DROP TABLE IF EXISTS "public"."labour";
CREATE TABLE "public"."labour" (
  "refer_no" varchar(20) COLLATE "pg_catalog"."default" NOT NULL,
  "symptoms" varchar(250) COLLATE "pg_catalog"."default",
  "labour_date" timestamp(6),
  "labour_time" varchar(5) COLLATE "pg_catalog"."default",
  "deliver" int4 NOT NULL,
  "sex" int4 NOT NULL,
  "wight" varchar(10) COLLATE "pg_catalog"."default",
  "apgarscore" varchar(3) COLLATE "pg_catalog"."default",
  "npo_date" timestamp(6),
  "npo_time" varchar(5) COLLATE "pg_catalog"."default",
  "risk_core" varchar(1) COLLATE "pg_catalog"."default" NOT NULL,
  "risk_pph" varchar(1) COLLATE "pg_catalog"."default" NOT NULL,
  "risk_severe" varchar(1) COLLATE "pg_catalog"."default" NOT NULL,
  "risk_preterm" varchar(1) COLLATE "pg_catalog"."default" NOT NULL,
  "risk_fetal" varchar(1) COLLATE "pg_catalog"."default" NOT NULL,
  "risk_cpd" varchar(1) COLLATE "pg_catalog"."default" NOT NULL,
  "drug_oxytocin" varchar(1) COLLATE "pg_catalog"."default" NOT NULL,
  "drug_mgso4" varchar(1) COLLATE "pg_catalog"."default" NOT NULL,
  "drug_dexamethasone" varchar(1) COLLATE "pg_catalog"."default" NOT NULL,
  "drug_ampicillin" varchar(1) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of labour
-- ----------------------------

-- ----------------------------
-- Table structure for labour_detail
-- ----------------------------
DROP TABLE IF EXISTS "public"."labour_detail";
CREATE TABLE "public"."labour_detail" (
  "rec_no" int4 NOT NULL,
  "refer_no" varchar(20) COLLATE "pg_catalog"."default" NOT NULL,
  "ddate" timestamp(6) NOT NULL,
  "dtime" varchar(5) COLLATE "pg_catalog"."default",
  "conscious" int4 NOT NULL,
  "e" int4 NOT NULL,
  "v" int4 NOT NULL,
  "m" int4 NOT NULL,
  "evm_total" int4 NOT NULL,
  "pupil_right" int4 NOT NULL,
  "pupil_left" int4 NOT NULL,
  "t" numeric(11,2) NOT NULL,
  "p" int4 NOT NULL,
  "r" int4 NOT NULL,
  "bp" varchar(10) COLLATE "pg_catalog"."default" NOT NULL,
  "fhs" int4 NOT NULL
)
;

-- ----------------------------
-- Records of labour_detail
-- ----------------------------

-- ----------------------------
-- Table structure for level
-- ----------------------------
DROP TABLE IF EXISTS "public"."level";
CREATE TABLE "public"."level" (
  "level_id" varchar(50) COLLATE "pg_catalog"."default",
  "level_name" varchar(500) COLLATE "pg_catalog"."default",
  "level_memo" varchar(1000) COLLATE "pg_catalog"."default",
  "staion_name" varchar(50) COLLATE "pg_catalog"."default",
  "level_value" varchar(255) COLLATE "pg_catalog"."default",
  "level_color" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of level
-- ----------------------------

-- ----------------------------
-- Table structure for loads
-- ----------------------------
DROP TABLE IF EXISTS "public"."loads";
CREATE TABLE "public"."loads" (
  "loads_id" varchar(5) COLLATE "pg_catalog"."default" NOT NULL,
  "loads_name" varchar(50) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of loads
-- ----------------------------

-- ----------------------------
-- Table structure for meet
-- ----------------------------
DROP TABLE IF EXISTS "public"."meet";
CREATE TABLE "public"."meet" (
  "meet_id" int4 NOT NULL,
  "meet_name" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of meet
-- ----------------------------

-- ----------------------------
-- Table structure for methane
-- ----------------------------
DROP TABLE IF EXISTS "public"."methane";
CREATE TABLE "public"."methane" (
  "methane_date" timestamp(6),
  "methane_time" varchar(50) COLLATE "pg_catalog"."default",
  "methane_major" varchar(50) COLLATE "pg_catalog"."default",
  "methane_exact" varchar(50) COLLATE "pg_catalog"."default",
  "methane_type" varchar(50) COLLATE "pg_catalog"."default",
  "methane_hazaids" varchar(150) COLLATE "pg_catalog"."default",
  "methane_access" varchar(50) COLLATE "pg_catalog"."default",
  "methane_number" varchar(50) COLLATE "pg_catalog"."default",
  "methane_emsrsey" varchar(50) COLLATE "pg_catalog"."default",
  "methane_startplan" timestamp(6),
  "methane_stopplan" timestamp(6),
  "user_edit" varchar(50) COLLATE "pg_catalog"."default",
  "user_delete" varchar(50) COLLATE "pg_catalog"."default",
  "methane_hoskey" varchar(1500) COLLATE "pg_catalog"."default",
  "methane_changwat" varchar(1500) COLLATE "pg_catalog"."default",
  "methane_tel" varchar(1500) COLLATE "pg_catalog"."default",
  "methane_reportor" varchar(1500) COLLATE "pg_catalog"."default",
  "methane_event" varchar(1500) COLLATE "pg_catalog"."default",
  "methane_location" varchar(1500) COLLATE "pg_catalog"."default",
  "methane_location_check" varchar(1500) COLLATE "pg_catalog"."default",
  "methane_fequence_check" varchar(1500) COLLATE "pg_catalog"."default",
  "methane_management_check" varchar(1500) COLLATE "pg_catalog"."default",
  "methane_rescueteam" varchar(1500) COLLATE "pg_catalog"."default",
  "methane_lat" float8,
  "methane_lng" float8
)
;

-- ----------------------------
-- Records of methane
-- ----------------------------

-- ----------------------------
-- Table structure for newborn
-- ----------------------------
DROP TABLE IF EXISTS "public"."newborn";
CREATE TABLE "public"."newborn" (
  "refer_no" varchar(20) COLLATE "pg_catalog"."default" NOT NULL,
  "symptoms" varchar(250) COLLATE "pg_catalog"."default",
  "birth_date" timestamp(6),
  "birth_time" varchar(5) COLLATE "pg_catalog"."default",
  "sex" varchar(10) COLLATE "pg_catalog"."default",
  "age" varchar(10) COLLATE "pg_catalog"."default",
  "weight" int4 NOT NULL,
  "apgarscore" varchar(5) COLLATE "pg_catalog"."default",
  "vit_k" timestamp(6),
  "hbv" timestamp(6),
  "thyroid" timestamp(6),
  "treat_et" varchar(1) COLLATE "pg_catalog"."default" NOT NULL,
  "treat_et_value" varchar(10) COLLATE "pg_catalog"."default",
  "treat_et_depth" varchar(5) COLLATE "pg_catalog"."default",
  "treat_o2" varchar(1) COLLATE "pg_catalog"."default" NOT NULL,
  "o2" varchar(5) COLLATE "pg_catalog"."default",
  "treat_ng" varchar(1) COLLATE "pg_catalog"."default" NOT NULL,
  "treat_fc" varchar(1) COLLATE "pg_catalog"."default" NOT NULL,
  "treat_bg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL,
  "treat_bg_value" varchar(10) COLLATE "pg_catalog"."default",
  "treat_iv" varchar(1) COLLATE "pg_catalog"."default" NOT NULL,
  "iv_text" varchar(250) COLLATE "pg_catalog"."default",
  "assess_detail" text COLLATE "pg_catalog"."default",
  "mather_age" varchar(5) COLLATE "pg_catalog"."default",
  "mather_week" varchar(3) COLLATE "pg_catalog"."default",
  "mather_days" varchar(3) COLLATE "pg_catalog"."default",
  "mather_g" varchar(5) COLLATE "pg_catalog"."default",
  "mather_p" varchar(5) COLLATE "pg_catalog"."default",
  "mather_a" varchar(5) COLLATE "pg_catalog"."default",
  "mather_problem" text COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of newborn
-- ----------------------------

-- ----------------------------
-- Table structure for newborn_detail
-- ----------------------------
DROP TABLE IF EXISTS "public"."newborn_detail";
CREATE TABLE "public"."newborn_detail" (
  "rec_no" int4 NOT NULL,
  "refer_no" varchar(20) COLLATE "pg_catalog"."default" NOT NULL,
  "ddate" timestamp(6) NOT NULL,
  "dtime" varchar(5) COLLATE "pg_catalog"."default",
  "meet_id" int4 NOT NULL,
  "t" numeric(11,2) NOT NULL,
  "p" int4 NOT NULL,
  "r" int4 NOT NULL,
  "bp" varchar(10) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of newborn_detail
-- ----------------------------

-- ----------------------------
-- Table structure for opd_template
-- ----------------------------
DROP TABLE IF EXISTS "public"."opd_template";
CREATE TABLE "public"."opd_template" (
  "note_id" int8 NOT NULL,
  "note_name" varchar(500) COLLATE "pg_catalog"."default",
  "note_detail" varchar(4000) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of opd_template
-- ----------------------------

-- ----------------------------
-- Table structure for opdnote
-- ----------------------------
DROP TABLE IF EXISTS "public"."opdnote";
CREATE TABLE "public"."opdnote" (
  "hcode" varchar(50) COLLATE "pg_catalog"."default",
  "referout_no" varchar(50) COLLATE "pg_catalog"."default",
  "cid" varchar(50) COLLATE "pg_catalog"."default",
  "hn" varchar(50) COLLATE "pg_catalog"."default",
  "date_app" timestamp(6),
  "time_app" varchar(50) COLLATE "pg_catalog"."default",
  "opdnote" varchar(4000) COLLATE "pg_catalog"."default",
  "doctor_id" varchar(50) COLLATE "pg_catalog"."default",
  "doctor_name" varchar(500) COLLATE "pg_catalog"."default",
  "nurse_name" varchar(500) COLLATE "pg_catalog"."default",
  "clinic_app" varchar(500) COLLATE "pg_catalog"."default",
  "makedatetime" timestamp(6),
  "download_flag" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of opdnote
-- ----------------------------

-- ----------------------------
-- Table structure for person
-- ----------------------------
DROP TABLE IF EXISTS "public"."person";
CREATE TABLE "public"."person" (
  "person_id" varchar(5) COLLATE "pg_catalog"."default" NOT NULL,
  "person_name" varchar(50) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of person
-- ----------------------------

-- ----------------------------
-- Table structure for pttype
-- ----------------------------
DROP TABLE IF EXISTS "public"."pttype";
CREATE TABLE "public"."pttype" (
  "pttype_id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1
),
  "pttype_name" varchar(500) COLLATE "pg_catalog"."default" NOT NULL,
  "pttypegroup_id" varchar(5) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of pttype
-- ----------------------------
INSERT INTO "public"."pttype" OVERRIDING SYSTEM VALUE VALUES (2, 'ewrewr', NULL);
INSERT INTO "public"."pttype" OVERRIDING SYSTEM VALUE VALUES (1, '123213', '4');
INSERT INTO "public"."pttype" OVERRIDING SYSTEM VALUE VALUES (3, 'gg', NULL);

-- ----------------------------
-- Table structure for pttypegroup
-- ----------------------------
DROP TABLE IF EXISTS "public"."pttypegroup";
CREATE TABLE "public"."pttypegroup" (
  "pttypegroup_id" varchar(5) COLLATE "pg_catalog"."default" NOT NULL,
  "pttypegroup_name" varchar(50) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of pttypegroup
-- ----------------------------

-- ----------------------------
-- Table structure for refertype
-- ----------------------------
DROP TABLE IF EXISTS "public"."refertype";
CREATE TABLE "public"."refertype" (
  "refertype_id" varchar(5) COLLATE "pg_catalog"."default" NOT NULL,
  "refertype_name" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "refergroup_id" varchar(5) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of refertype
-- ----------------------------

-- ----------------------------
-- Table structure for reg_car
-- ----------------------------
DROP TABLE IF EXISTS "public"."reg_car";
CREATE TABLE "public"."reg_car" (
  "id_car" int4 NOT NULL,
  "reg_car" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of reg_car
-- ----------------------------

-- ----------------------------
-- Table structure for serviceplan
-- ----------------------------
DROP TABLE IF EXISTS "public"."serviceplan";
CREATE TABLE "public"."serviceplan" (
  "service_id" varchar(5) COLLATE "pg_catalog"."default" NOT NULL,
  "service_name" varchar(100) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of serviceplan
-- ----------------------------

-- ----------------------------
-- Table structure for spclty
-- ----------------------------
DROP TABLE IF EXISTS "public"."spclty";
CREATE TABLE "public"."spclty" (
  "spclty_id" varchar(5) COLLATE "pg_catalog"."default" NOT NULL,
  "spclty_name" varchar(50) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of spclty
-- ----------------------------

-- ----------------------------
-- Table structure for station
-- ----------------------------
DROP TABLE IF EXISTS "public"."station";
CREATE TABLE "public"."station" (
  "station_id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1
),
  "station_name" varchar(250) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of station
-- ----------------------------
INSERT INTO "public"."station" OVERRIDING SYSTEM VALUE VALUES (2, 'OPD');

-- ----------------------------
-- Table structure for station_log
-- ----------------------------
DROP TABLE IF EXISTS "public"."station_log";
CREATE TABLE "public"."station_log" (
  "auto_id" int8 NOT NULL,
  "ip_address" varchar(30) COLLATE "pg_catalog"."default",
  "computername" varchar(500) COLLATE "pg_catalog"."default",
  "version_info" varchar(20) COLLATE "pg_catalog"."default",
  "build_info" varchar(20) COLLATE "pg_catalog"."default",
  "login_by" varchar(50) COLLATE "pg_catalog"."default",
  "login_datetime" timestamp(6)
)
;

-- ----------------------------
-- Records of station_log
-- ----------------------------

-- ----------------------------
-- Table structure for strength
-- ----------------------------
DROP TABLE IF EXISTS "public"."strength";
CREATE TABLE "public"."strength" (
  "strength_id" varchar(5) COLLATE "pg_catalog"."default" NOT NULL,
  "strength_name" varchar(50) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of strength
-- ----------------------------

-- ----------------------------
-- Table structure for typept
-- ----------------------------
DROP TABLE IF EXISTS "public"."typept";
CREATE TABLE "public"."typept" (
  "typept_id" varchar(5) COLLATE "pg_catalog"."default" NOT NULL,
  "typept_name" varchar(50) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of typept
-- ----------------------------

-- ----------------------------
-- Table structure for user_login
-- ----------------------------
DROP TABLE IF EXISTS "public"."user_login";
CREATE TABLE "public"."user_login" (
  "id" int4 NOT NULL,
  "user_name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "user_password" text COLLATE "pg_catalog"."default" NOT NULL,
  "name_user" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "section_detail" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "tel" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "auth_refer" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "status" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of user_login
-- ----------------------------
INSERT INTO "public"."user_login" VALUES (1, 'admin', '123', '55', 'IT', '0863880236', '["user","doctor","station","department","car","canclecase","sos"]', 'true');

-- ----------------------------
-- Table structure for ward
-- ----------------------------
DROP TABLE IF EXISTS "public"."ward";
CREATE TABLE "public"."ward" (
  "ward_id" varchar(5) COLLATE "pg_catalog"."default" NOT NULL,
  "ward_name" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "spclty_id" varchar(5) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of ward
-- ----------------------------

-- ----------------------------
-- Function structure for auto_increment_primary_key
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."auto_increment_primary_key"();
CREATE OR REPLACE FUNCTION "public"."auto_increment_primary_key"()
  RETURNS "pg_catalog"."trigger" AS $BODY$
BEGIN
    NEW.id := nextval('referdb_hos_seq');
    RETURN NEW;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."cancle_case_id_case_seq"
OWNED BY "public"."cancle_case"."id_case";
SELECT setval('"public"."cancle_case_id_case_seq"', 1, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."car_reg_id_car_seq"
OWNED BY "public"."car_reg"."id_car";
SELECT setval('"public"."car_reg_id_car_seq"', 1, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."cause_referback_cause_referback_id_seq"
OWNED BY "public"."cause_referback"."cause_referback_id";
SELECT setval('"public"."cause_referback_cause_referback_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."cause_referout_cause_referout_id_seq"
OWNED BY "public"."cause_referout"."cause_referout_id";
SELECT setval('"public"."cause_referout_cause_referout_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."department_dep_id_seq"
OWNED BY "public"."department"."dep_id";
SELECT setval('"public"."department_dep_id_seq"', 3, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."doctor_doctor_id_seq"
OWNED BY "public"."doctor"."doctor_id";
SELECT setval('"public"."doctor_doctor_id_seq"', 1, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."pttype_pttype_id_seq"
OWNED BY "public"."pttype"."pttype_id";
SELECT setval('"public"."pttype_pttype_id_seq"', 3, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."referdb_hos_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."station_station_id_seq"
OWNED BY "public"."station"."station_id";
SELECT setval('"public"."station_station_id_seq"', 2, true);

-- ----------------------------
-- Auto increment value for cancle_case
-- ----------------------------
SELECT setval('"public"."cancle_case_id_case_seq"', 1, true);

-- ----------------------------
-- Auto increment value for car_reg
-- ----------------------------
SELECT setval('"public"."car_reg_id_car_seq"', 1, true);

-- ----------------------------
-- Primary Key structure for table car_reg
-- ----------------------------
ALTER TABLE "public"."car_reg" ADD CONSTRAINT "car_reg_pkey" PRIMARY KEY ("id_car");

-- ----------------------------
-- Auto increment value for cause_referback
-- ----------------------------
SELECT setval('"public"."cause_referback_cause_referback_id_seq"', 1, false);

-- ----------------------------
-- Primary Key structure for table cause_referback
-- ----------------------------
ALTER TABLE "public"."cause_referback" ADD CONSTRAINT "cause_referback_pkey" PRIMARY KEY ("cause_referback_id");

-- ----------------------------
-- Auto increment value for cause_referout
-- ----------------------------
SELECT setval('"public"."cause_referout_cause_referout_id_seq"', 1, false);

-- ----------------------------
-- Primary Key structure for table cause_referout
-- ----------------------------
ALTER TABLE "public"."cause_referout" ADD CONSTRAINT "cause_referout_pkey" PRIMARY KEY ("cause_referout_id");

-- ----------------------------
-- Auto increment value for department
-- ----------------------------
SELECT setval('"public"."department_dep_id_seq"', 3, true);

-- ----------------------------
-- Primary Key structure for table department
-- ----------------------------
ALTER TABLE "public"."department" ADD CONSTRAINT "department_pkey" PRIMARY KEY ("dep_id");

-- ----------------------------
-- Auto increment value for doctor
-- ----------------------------
SELECT setval('"public"."doctor_doctor_id_seq"', 1, true);

-- ----------------------------
-- Primary Key structure for table doctor
-- ----------------------------
ALTER TABLE "public"."doctor" ADD CONSTRAINT "doctor_pkey" PRIMARY KEY ("doctor_id");

-- ----------------------------
-- Indexes structure for table icd10
-- ----------------------------
CREATE INDEX "code3" ON "public"."icd10" USING btree (
  "code3" COLLATE "pg_catalog"."default" "pg_catalog"."bpchar_ops" ASC NULLS LAST
);
CREATE INDEX "code4" ON "public"."icd10" USING btree (
  "code4" COLLATE "pg_catalog"."default" "pg_catalog"."bpchar_ops" ASC NULLS LAST
);
CREATE INDEX "code5" ON "public"."icd10" USING btree (
  "code5" COLLATE "pg_catalog"."default" "pg_catalog"."bpchar_ops" ASC NULLS LAST
);
CREATE INDEX "name" ON "public"."icd10" USING btree (
  "name" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Indexes structure for table labour
-- ----------------------------
CREATE INDEX "refer_no" ON "public"."labour" USING btree (
  "refer_no" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Uniques structure for table newborn
-- ----------------------------
ALTER TABLE "public"."newborn" ADD CONSTRAINT "refer_no_2" UNIQUE ("refer_no");

-- ----------------------------
-- Auto increment value for pttype
-- ----------------------------
SELECT setval('"public"."pttype_pttype_id_seq"', 3, true);

-- ----------------------------
-- Primary Key structure for table pttype
-- ----------------------------
ALTER TABLE "public"."pttype" ADD CONSTRAINT "pttype_pkey" PRIMARY KEY ("pttype_id");

-- ----------------------------
-- Primary Key structure for table reg_car
-- ----------------------------
ALTER TABLE "public"."reg_car" ADD CONSTRAINT "reg_car_pkey" PRIMARY KEY ("id_car");

-- ----------------------------
-- Primary Key structure for table spclty
-- ----------------------------
ALTER TABLE "public"."spclty" ADD CONSTRAINT "spclty_pkey" PRIMARY KEY ("spclty_id");

-- ----------------------------
-- Auto increment value for station
-- ----------------------------
SELECT setval('"public"."station_station_id_seq"', 2, true);

-- ----------------------------
-- Primary Key structure for table station
-- ----------------------------
ALTER TABLE "public"."station" ADD CONSTRAINT "station_pkey" PRIMARY KEY ("station_id");

-- ----------------------------
-- Primary Key structure for table typept
-- ----------------------------
ALTER TABLE "public"."typept" ADD CONSTRAINT "typept_pkey" PRIMARY KEY ("typept_id");

-- ----------------------------
-- Primary Key structure for table user_login
-- ----------------------------
ALTER TABLE "public"."user_login" ADD CONSTRAINT "user_login_pkey" PRIMARY KEY ("id");
