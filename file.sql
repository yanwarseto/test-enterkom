/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : PostgreSQL
 Source Server Version : 160003 (160003)
 Source Host           : localhost:5432
 Source Catalog        : test-enterkomp
 Source Schema         : PO

 Target Server Type    : PostgreSQL
 Target Server Version : 160003 (160003)
 File Encoding         : 65001

 Date: 10/08/2024 12:48:53
*/


-- ----------------------------
-- Table structure for daftar_meja
-- ----------------------------
DROP TABLE IF EXISTS "PO"."daftar_meja";
CREATE TABLE "PO"."daftar_meja" (
  "pid_meja" varchar(255) COLLATE "pg_catalog"."default",
  "nomor_meja" numeric(10,0)
)
;

-- ----------------------------
-- Records of daftar_meja
-- ----------------------------
INSERT INTO "PO"."daftar_meja" VALUES ('7b0c62e7-5c7e-4cd7-8287-03eb22a5ecb9', 1);
INSERT INTO "PO"."daftar_meja" VALUES ('ab8409f0-3221-4afc-a0c2-46fd7b1a1666', 2);
INSERT INTO "PO"."daftar_meja" VALUES ('30e11bcc-5375-45bf-97d6-c26e0eca82e2', 3);

-- ----------------------------
-- Table structure for daftar_menu
-- ----------------------------
DROP TABLE IF EXISTS "PO"."daftar_menu";
CREATE TABLE "PO"."daftar_menu" (
  "pid_menu" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "nama_menu" varchar(400) COLLATE "pg_catalog"."default",
  "kategori" varchar(100) COLLATE "pg_catalog"."default",
  "keterangan" varchar(1000) COLLATE "pg_catalog"."default",
  "gambar" varchar(2000) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of daftar_menu
-- ----------------------------
INSERT INTO "PO"."daftar_menu" VALUES ('8e09baf6-fd1d-4856-bc14-75faf21a83ff', 'Nasi Goreng', 'Makanan', 'Nasi Goreng Spesial dengan sosis dan ayam', 'https://cdn1-production-images-kly.akamaized.net/EjwV7j3Y4JrlqUFuavke4NtRWtM=/1200x675/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3108566/original/079979700_1587487794-Sajiku_1.jpg');
INSERT INTO "PO"."daftar_menu" VALUES ('a18525b2-638e-4e92-892c-84faf728291e', 'Mie', 'Makanan', 'Mie Spesial dengan varian goreng maupun kuah', 'https://images.panomnom.com/upload/v1676357265/ST%20RECIPES/NOODLES/Bakmie%20Goreng/BakmieGoreng_lcrxxk.jpg?dpr=2.625&bv=2&webp=true');
INSERT INTO "PO"."daftar_menu" VALUES ('b921af75-ba8e-4403-a15f-4128fde54a90', 'Jeruk', 'Minuman', 'Jeruk Peras dengan varian dingin maupun panas', 'https://images.tokopedia.net/img/cache/500-square/VqbcmM/2021/8/18/b6b65a42-e078-471a-9c39-df8ea66b0113.jpg');
INSERT INTO "PO"."daftar_menu" VALUES ('d63e9cab-69ec-4e53-9826-3bd62712a03f', 'Ekstra Es Batu', 'Minuman', 'Tambah jika es batu dirasa kurang', 'https://asset.kompas.com/crops/zA_INSEI1h0BttRxI-x_wXXnsRc=/0x41:1000x708/750x500/data/photo/2022/04/29/626bbeb52b215.jpg');
INSERT INTO "PO"."daftar_menu" VALUES ('7d4f2eff-9e7b-4510-9178-fd701a0d1c8a', 'Kopi', 'Minuman', 'Minuman Kopi dengan varian dingin maupun panas', 'https://media.istockphoto.com/id/497863160/id/foto/es-kopi-dalam-cangkir-takeaway.jpg?s=612x612&w=0&k=20&c=xp1lJOzg0T36-yy5idHVC6Cvxth1w7qBVly9G2PDpHQ=');
INSERT INTO "PO"."daftar_menu" VALUES ('2e1805f4-d329-40a9-9b0a-796e6a6dbf17', 'Teh', 'Minuman', 'Teh dengan varian manis dan tawar', 'https://gratisongkir-storage.com/products/900x900/CGMKkhPRDAmD.jpg');
INSERT INTO "PO"."daftar_menu" VALUES ('168402d6-f9a7-4d19-8fd9-7680024670b4', 'Promo Bundle', 'Promo', 'Promo Bundling Nasgor + Jeruk Dingin', 'https://png.pngtree.com/png-vector/20230605/ourmid/pngtree-special-promo-banner-design-for-sale-and-offer-vector-png-image_7121132.png');

-- ----------------------------
-- Table structure for detail_pesanan
-- ----------------------------
DROP TABLE IF EXISTS "PO"."detail_pesanan";
CREATE TABLE "PO"."detail_pesanan" (
  "uid_order" varchar(1000) COLLATE "pg_catalog"."default" NOT NULL,
  "nama_pesanan" varchar(255) COLLATE "pg_catalog"."default",
  "varian" varchar(255) COLLATE "pg_catalog"."default",
  "quantity" numeric(20,0),
  "price" numeric(20,0),
  "uid_pesanan_master" varchar(400) COLLATE "pg_catalog"."default" NOT NULL,
  "pidvarian" varchar(400) COLLATE "pg_catalog"."default",
  "no_meja" varchar(200) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of detail_pesanan
-- ----------------------------
INSERT INTO "PO"."detail_pesanan" VALUES ('uid-ip370k4yw', 'Nasi Goreng', '-', 1, 15000, 'uid-m1xtv5j7g', '4a3adde2-5ad1-444e-b8fc-8455bd938688', '1');
INSERT INTO "PO"."detail_pesanan" VALUES ('uid-2ikrt1dhm', 'Ekstra Es Batu', '-', 1, 2000, 'uid-m1xtv5j7g', '46b38fab-51c3-4af5-933b-f8ee2487c877', '1');

-- ----------------------------
-- Table structure for varian_menu
-- ----------------------------
DROP TABLE IF EXISTS "PO"."varian_menu";
CREATE TABLE "PO"."varian_menu" (
  "pid_varian" varchar(255) COLLATE "pg_catalog"."default",
  "varian" varchar(300) COLLATE "pg_catalog"."default",
  "harga" numeric(50,0),
  "v_pid_menu" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of varian_menu
-- ----------------------------
INSERT INTO "PO"."varian_menu" VALUES ('c2d9f992-ce99-4283-ad7f-ceaac912e010', 'Dingin', 12000, 'b921af75-ba8e-4403-a15f-4128fde54a90');
INSERT INTO "PO"."varian_menu" VALUES ('33e882b2-f393-4181-a042-d086ecc1f769', 'Panas', 10000, 'b921af75-ba8e-4403-a15f-4128fde54a90');
INSERT INTO "PO"."varian_menu" VALUES ('101bf411-5b91-4174-ab5f-d431fa1f33b9', 'Manis', 8000, '2e1805f4-d329-40a9-9b0a-796e6a6dbf17');
INSERT INTO "PO"."varian_menu" VALUES ('b3d7923f-c1ae-4fbf-b795-3fd53248d864', 'Tawar', 5000, '2e1805f4-d329-40a9-9b0a-796e6a6dbf17');
INSERT INTO "PO"."varian_menu" VALUES ('16ac636f-45b8-4d9a-a02e-aac2395d6e1b', 'Dingin', 8000, '7d4f2eff-9e7b-4510-9178-fd701a0d1c8a');
INSERT INTO "PO"."varian_menu" VALUES ('46034218-1f10-470b-bcfa-357d993bceba', 'Panas', 6000, '7d4f2eff-9e7b-4510-9178-fd701a0d1c8a');
INSERT INTO "PO"."varian_menu" VALUES ('665c42b2-7b53-46b0-8cf1-94cb7769ea2c', 'Goreng', 15000, 'a18525b2-638e-4e92-892c-84faf728291e');
INSERT INTO "PO"."varian_menu" VALUES ('46b38fab-51c3-4af5-933b-f8ee2487c877', NULL, 2000, 'd63e9cab-69ec-4e53-9826-3bd62712a03f');
INSERT INTO "PO"."varian_menu" VALUES ('4a3adde2-5ad1-444e-b8fc-8455bd938688', NULL, 15000, '8e09baf6-fd1d-4856-bc14-75faf21a83ff');
INSERT INTO "PO"."varian_menu" VALUES ('09bd7e74-98e9-4ea7-916a-4de47ba7f2ee', 'Kuah', 15000, 'a18525b2-638e-4e92-892c-84faf728291e');
INSERT INTO "PO"."varian_menu" VALUES ('c9372fa8-3894-40a0-bf1c-9e2e9b47bc76', NULL, 23000, '168402d6-f9a7-4d19-8fd9-7680024670b4');

-- ----------------------------
-- Function structure for set_log_id
-- ----------------------------
DROP FUNCTION IF EXISTS "PO"."set_log_id"();
CREATE OR REPLACE FUNCTION "PO"."set_log_id"()
  RETURNS "pg_catalog"."trigger" AS $BODY$
BEGIN
    -- Mendapatkan nilai maksimal dari LOG_ID dan menambahkannya
    NEW."LOG_ID" := COALESCE((SELECT MAX("LOG_ID") FROM "PO"."T_LOG"), 0) + 1;
		NEW."LOG_TANGGAL"  := CURRENT_TIMESTAMP AT TIME ZONE 'Asia/Jakarta';
    
    RETURN NEW;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- View structure for vw_detailmenu
-- ----------------------------
DROP VIEW IF EXISTS "PO"."vw_detailmenu";
CREATE VIEW "PO"."vw_detailmenu" AS  SELECT df.pid_menu,
    df.nama_menu,
    df.kategori,
    df.keterangan,
    df.gambar,
    vm.pid_varian,
    vm.varian,
    vm.harga,
    vm.v_pid_menu
   FROM "PO".varian_menu vm
     RIGHT JOIN "PO".daftar_menu df ON df.pid_menu::text = vm.v_pid_menu::text;

-- ----------------------------
-- Primary Key structure for table daftar_menu
-- ----------------------------
ALTER TABLE "PO"."daftar_menu" ADD CONSTRAINT "daftar_menu_pkey" PRIMARY KEY ("pid_menu");

-- ----------------------------
-- Primary Key structure for table detail_pesanan
-- ----------------------------
ALTER TABLE "PO"."detail_pesanan" ADD CONSTRAINT "detail_pesanan_pkey" PRIMARY KEY ("uid_order");
