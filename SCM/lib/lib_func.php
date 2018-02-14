<?php

	function koneksi_db(){
		$host = "localhost";
		$database = "pt_mi";
		$user = "root";
		$password = "";
		$link=mysql_connect($host, $user, $password);
		mysql_select_db($database, $link);
		if(!$link)
			echo "Error : ".mysql_error();

		return $link;
	}

	function control(){
		if(isset($_GET['page']))
		{
      //Administrator
			switch ($_GET['page'])
			{
				case 'pengelolaan_data_karyawan': include('pengelolaan_data_karyawan.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'karyawan_input': include('karyawan_input.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'karyawan_edit': include('karyawan_edit.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'pengelolaan_data_pengguna_karyawan': include('pengelolaan_data_pengguna_karyawan.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'pengguna_karyawan_input': include('pengguna_karyawan_input.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'pengguna_karyawan_edit': include('pengguna_karyawan_edit.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'pengelolaan_data_pengguna_pemasok': include('pengelolaan_data_pengguna_pemasok.php');
				break;
			}

			//Pengadaan
			switch ($_GET['page'])
			{
				case 'pengelolaan_data_pemasok': include('pengelolaan_data_pemasok.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'pemasok_input': include('pemasok_input.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'pemasok_edit': include('pemasok_edit.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'pengelolaan_data_bahanbaku': include('pengelolaan_data_bahanbaku.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'bahanbaku_input': include('bahanbaku_input.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'bahanbaku_edit': include('bahanbaku_edit.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'preko': include('preko.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'pembelian_bahan': include('pembelian_bahan.php');
				break;
			}


			//Pemasaran
			switch ($_GET['page'])
			{
				case 'pengelolaan_data_pelanggan': include('pengelolaan_data_pelanggan.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'pelanggan_input': include('pelanggan_input.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'pelanggan_edit': include('pelanggan_edit.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'pengelolaan_data_ekspedisi': include('pengelolaan_data_ekspedisi.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'ekspedisi_input': include('ekspedisi_input.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'ekspedisi_edit': include('ekspedisi_edit.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'pengelolaan_data_penjualan': include('pengelolaan_data_penjualan.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'penjualan_input': include('penjualan_input.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'penjualan_detil': include('penjualan_detil.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'pengelolaan_data_pembayaran': include('pengelolaan_data_pembayaran.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'pengelolaan_data_pengiriman': include('pengelolaan_data_pengiriman.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'pengiriman_input': include('pengiriman_input.php');
				break;
			}

			//Produksi
			switch ($_GET['page'])
			{
				case 'produk_input': include('produk_input.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'produk_edit': include('produk_edit.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'pengelolaan_data_produk': include('pengelolaan_data_produk.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'produk_detil': include('produk_detil.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'komposisi_edit': include('komposisi_edit.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'perencanaan_produksi': include('perencanaan_produksi.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'permintaan_bahanbaku': include('permintaan_bahanbaku.php');
				break;
			}

			//GUDANG INDUK
			switch ($_GET['page'])
			{
				case 'monitoring_persediaan': include('monitoring_persediaan.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'detil_safetystock': include('detil_safetystock.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'penerimaan_bahan_baku': include('penerimaan_bahan_baku.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'pengeluaran_bahan_baku': include('pengeluaran_bahan_baku.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'produksi_harian': include('produksi_harian.php');
				break;
			}


/*

			//ALL
			switch ($_GET['page'])
			{
				case 'data-profil': include('data-profil.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'edit-data-profil': include('edit-data-profil.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'edit-kata-sandi': include('edit-kata-sandi.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'edit-nama-pengguna': include('edit-nama-pengguna.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'data-kritik-dan-saran': include('data-kritik-dan-saran.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'data-periode-kritik-dan-saran': include('data-periode-kritik-dan-saran.php');
				break;
			}

			//Sales Manager
			switch ($_GET['page'])
			{
				case 'data-pegawai': include('data-pegawai.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'tambah-data-pegawai': include('tambah-data-pegawai.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'edit-data-pegawai': include('edit-data-pegawai.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'detail-data-pegawai': include('detail-data-pegawai.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'data-pelanggan': include('data-pelanggan.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'tambah-data-pelanggan': include('tambah-data-pelanggan.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'edit-data-pelanggan': include('edit-data-pelanggan.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'data-pembayaran': include('data-pembayaran.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'tambah-data-pembayaran': include('tambah-data-pembayaran.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'edit-data-pembayaran': include('edit-data-pembayaran.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'data-pemesanan': include('data-pemesanan.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'tambah-data-pemesanan': include('tambah-data-pemesanan.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'edit-data-pemesanan': include('edit-data-pemesanan.php');
				break;
			}


			switch ($_GET['page'])
			{
				case 'data-produk': include('data-produk.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'tambah-data-produk': include('tambah-data-produk.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'edit-data-produk': include('edit-data-produk.php');
				break;
			}



			//Marketing manager
			switch ($_GET['page'])
			{
				case 'data-lokasi-calon-cabang': include('data-lokasi-calon-cabang.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'tambah-data-lokasi-calon-cabang': include('tambah-data-lokasi-calon-cabang.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'edit-data-lokasi-calon-cabang': include('edit-data-lokasi-calon-cabang.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'data-sub-lokasi-calon-cabang': include('data-sub-lokasi-calon-cabang.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'tambah-data-sub-lokasi-calon-cabang': include('tambah-data-sub-lokasi-calon-cabang.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'edit-data-sub-lokasi-calon-cabang': include('edit-data-sub-lokasi-calon-cabang.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'detail-data-sub-lokasi-calon-cabang': include('detail-data-sub-lokasi-calon-cabang.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'data-jasa': include('data-jasa.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'tambah-data-jasa': include('tambah-data-jasa.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'edit-data-jasa': include('edit-data-jasa.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'data-promosi': include('data-promosi.php');
				break;
			}


			switch ($_GET['page'])
			{
				case 'tambah-data-promosi': include('tambah-data-promosi.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'edit-data-promosi': include('edit-data-promosi.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'data-kategori-segmentasi': include('data-kategori-segmentasi.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'tambah-data-kategori-segmentasi': include('tambah-data-kategori-segmentasi.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'edit-data-kategori-segmentasi': include('edit-data-kategori-segmentasi.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'data-penentuan-segmentasi': include('data-penentuan-segmentasi.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'data-periode-penentuan-segmentasi': include('data-periode-penentuan-segmentasi.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'tambah-data-periode-penentuan-segmentasi': include('tambah-data-periode-penentuan-segmentasi.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'penentuan-segmentasi': include('penentuan-segmentasi.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'periode-hasil-penentuan-segmentasi': include('periode-hasil-penentuan-segmentasi.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'hasil-penentuan-segmentasi': include('hasil-penentuan-segmentasi.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'data-kriteria-penilaian': include('data-kriteria-penilaian.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'tambah-data-kriteria-penilaian': include('tambah-data-kriteria-penilaian.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'edit-data-kriteria-penilaian': include('edit-data-kriteria-penilaian.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'penentuan-penilaian': include('penentuan-penilaian.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'periode-penentuan-penilaian': include('periode-penentuan-penilaian.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'hasil-penentuan-nilai': include('hasil-penentuan-nilai.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'periode-hasil-penentuan-nilai': include('periode-hasil-penentuan-nilai.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'data-periode-penilaian': include('data-periode-penilaian.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'tambah-data-periode-penilaian': include('tambah-data-periode-penilaian.php');
				break;
			}

			switch ($_GET['page'])
			{
				case 'edit-data-periode-penilaian': include('edit-data-periode-penilaian.php');
				break;
			}

			// FINANCE

			switch ($_GET['page'])
			{
				case 'data-penentuan-promosi': include('data-penentuan-promosi.php');
				break;
			}

*/
		}

		else {
			include('beranda.php');
		}
	}
?>
