CREATE procedure tambah_detil_penjualan(
    in id_produk_param VARCHAR(4),
    in jumlah_param int,
    in status_pembayaran VARCHAR(15)
)
begin
declare id_penjualan_param int;
--get auto increment id_penjualan

SELECT 'AUTO_INCREMENT' INTO id_penjualan_param
FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_SCHEMA = 'pt_mi' AND TABLE_NAME = 'penjualan';

INSERT INTO detil_penjualan (id_penjualan,id_produk,jumlah,status_pembayaran)
VALUES (id_penjualan_param,id_produk_param,jumlah_param,status_pembayaran);
end;
