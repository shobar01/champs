<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 14100042-ICT02
 * Date: 31/12/19
 * Time: 11:06
 * To change this template use File | Settings | File Templates.
 */

defined('BASEPATH') or exit('No direct script access allowed');
class cmpresence extends CI_Controller
{

    private $myServer = "192.168.0.2";
    private $myUser = "pg";
    private $myPass = "655cec0b97d65";
    private $myDB = "sisapdb";
    private $myPort = "5432";

    private $dbhost = "127.0.0.1";
    private $dbuser = "kudalumping";
    private $dbpass = "makan20BElingS";
    private $dbname = "dbmaster";

    public function getViewAbsen()
    {

        $nip = $this->input->get("nip");
        $bln = $this->input->get("periode_bln");
        $thn = $this->input->get("periode_thn");
        $conn = pg_connect("host='" . $this->myServer . "' port='" . $this->myPort . "' dbname='" . $this->myDB . "' user='" . $this->myUser . "' password='" . $this->myPass . "'") or die("Can not connect to postgres");
        $qr1 = "SELECT tgl, otl, siaocr, hdr, dur1, jdwl, istrht, dur2, ijin, dur3, mp.nip, mp.nm_lengkap FROM sp_gen_rephadirnew('" . $thn . "','" . $bln . "','" . $nip . "','0') "
            . " AS (tgl text, otl text, siaocr text, hdr varchar(13), "
            . " dur1 text, jdwl varchar(13), istrht varchar(13), dur2 text, ijin varchar (13), dur3 text) "
            . " LEFT JOIN m_pegawai mp on mp.nip = '" . $nip . "' WHERE otl is not null";

        if (($result = pg_exec($conn, $qr1)) != false) {
            $_jml = pg_num_rows($result);
            if ($_jml > 0) {
                $response["absensi"] = array();
                while ($row = pg_fetch_array($result)) {
                    $absensi = array();
                    $absensi["tgl"] = stripslashes($row['tgl']);
                    $absensi["otl"] = stripslashes($row['otl']);
                    $absensi["siaocr"] = stripslashes($row['siaocr']);
                    $absensi["hdr"] = stripslashes($row['hdr']);
                    $absensi["dur1"] = stripslashes($row['dur1']);
                    $absensi["jdwl"] = stripslashes($row['jdwl']);
                    $absensi["istrht"] = stripslashes($row['istrht']);
                    $absensi["dur2"] = stripslashes($row['dur2']);
                    $absensi["ijin"] = stripslashes($row['ijin']);
                    $absensi["dur3"] = stripslashes($row['dur3']);
                    $absensi["nip"] = stripslashes($row['nip']);
                    $absensi["nm_lengkap"] = stripslashes($row['nm_lengkap']);
                    array_push($response["absensi"], $absensi);
                }
                $response["success"] = "1";
                $response["message"] = "success";
            } else {
                $response["absensi"] = array();
                $response["success"] = "0";
                $response["message"] = "Tidak ada data absensi";
            }
            echo json_encode($response);
        }
    }

    public function getViewAbsennow()
    {
//https://localhost/champ_dev/champ_api/cmpresence/getViewAbsennow
        $Tgl = date("Y-m-d");
        $Nip = $this->input->post("Nip");
        $conn = pg_connect("host='" . $this->myServer . "' port='" . $this->myPort . "' dbname='" . $this->myDB . "' user='" . $this->myUser . "' password='" . $this->myPass . "'") or die("Can not connect to postgres");
        $query = " SELECT ta.nip, to_char(ta.wktabsen, 'dd-mm-YYYY HH24:mi') as wktabsen, ta.m_k, ta.shift, ta.isimported, ta.kdoutlet, SUBSTRING(ta.kdoutlet,1,2) as sngktn, ta.nopengajuan , mp.nm_lengkap, rp.outlet"
            . " from t_absensi ta LEFT JOIN m_pegawai mp on mp.nip=ta.nip "
            . " LEFT JOIN r_outlet rp on ta.kdoutlet = rp.kd_outlet "
            . " WHERE ta.nip = '" . $Nip . "' AND to_char(ta.wktabsen, 'YYYY-MM-DD') = '" . $Tgl . "' "
            . " ORDER BY ta.wktabsen DESC ";
        $response = array();
        if (!empty($Nip)) {
            if (($resulta = pg_exec($conn, $query)) != false) {
                $_jmla = pg_num_rows($resulta);
                if ($_jmla > 0) {
                    $response["dftr_absennow"] = array();
                    while ($row = pg_fetch_array($resulta)) {
                        $dftr_absennow = array();
                        $dftr_absennow["nip"] = stripslashes($row["nip"]);
                        $dftr_absennow["wktabsen"] = stripslashes($row["wktabsen"]);
                        $dftr_absennow["m_k"] = stripslashes($row["m_k"]);
                        $dftr_absennow["shift"] = stripslashes($row["shift"]);
//                        $dftr_absennow["isimported"]    = stripslashes($row["isimported"]) ;
                        $dftr_absennow["kdoutlet"] = stripslashes($row["kdoutlet"]);
                        $dftr_absennow["nmoutlet"] = stripslashes($row["outlet"]);
//                        $dftr_absennow["nopengajuan"]   = stripslashes($row["nopengajuan"]) ;
                        $dftr_absennow["nm_lengkap"] = stripslashes($row["nm_lengkap"]);
                        $dftr_absennow["sngktn"] = stripslashes($row["sngktn"]);
                        if (stripslashes($row["m_k"]) == 'P') {
                            $dftr_absennow["iconimg"] = 'http://api.champ-group.com/champs-mobile/public/resource/img/cm/absen_work.png';
                            $dftr_absennow["colrimg"] = '#F4D03F'; // kuning
                            $dftr_absennow["msgbutton"] = 'Pulang Kerja';
                        } elseif (stripslashes($row["m_k"]) == 'Q') {
                            $dftr_absennow["iconimg"] = 'http://api.champ-group.com/champs-mobile/public/resource/img/cm/absen_rest.png';
                            $dftr_absennow["colrimg"] = '#F4D03F'; // kuning
                            $dftr_absennow["msgbutton"] = 'Masuk Setelah Istirahat'; // kuning
                        } elseif (stripslashes($row["m_k"]) == 'M') {
                            $dftr_absennow["iconimg"] = 'http://api.champ-group.com/champs-mobile/public/resource/img/cm/absen_in.png';
                            $dftr_absennow["colrimg"] = '#0DDF13'; // Hijau
                            $dftr_absennow["msgbutton"] = 'Keluar'; // Hijau
                        } elseif (stripslashes($row["m_k"]) == 'K') {
                            $dftr_absennow["iconimg"] = 'http://api.champ-group.com/champs-mobile/public/resource/img/cm/absen_out.png';
                            $dftr_absennow["colrimg"] = '#e61807'; // Merah
                            $dftr_absennow["msgbutton"] = 'Anda Sudah Melakukan Absen'; // Merah
                        } else {
                            $dftr_absennow["iconimg"] = 'http://api.champ-group.com/champs-mobile/public/resource/img/cm/absen_work.png';
                            $dftr_absennow["colrimg"] = '#0dd60d';
                            $dftr_absennow["msgbutton"] = 'Masuk';
                        }
                        array_push($response["dftr_absennow"], $dftr_absennow);
                    }
                    $response["geofence_radius"] = 0.04; // = 40 meter
                    $response["success"] = 1;
                    $response["imgerror"] = "http://api.champ-group.com/champs-mobile/public/resource/img/cm/presence.png";
                } else {
                    $response["geofence_radius"] = 0.04;
                    $response["success"] = 0;
                    $response["message"] = "Presence NIP " . $Nip . " Not Found";
                    $response["msgbutton"] = 'Masuk';
                    $response["imgerror"] = "http://api.champ-group.com/champs-mobile/public/resource/img/cm/presence.png";
                }

                pg_free_result($resulta);
                echo json_encode($response);

            }

        } else {
            echo "Access Denied";
        }
    }

    public function setScanAbsen()
    {
        include_once "geoiploc.php";
        $Nip = $this->input->post("Nip");
        $namacm = $this->input->post("NmLengkap");
        $parimie = $this->input->post("dvcimei"); //dvcimei,osversi,dvchp
        $osversi = $this->input->post("osversi");
        $dvchp = $this->input->post("dvchp");
        $m_k = $this->input->post("m_k");
        $data = $this->input->post("QrAbsen");
        $lokasilat = $this->input->post("lokasilat");
        $lokasilong = $this->input->post("lokasilong");
        $absen = $this->input->post("absen");
//        $data = "CXB01#2020-09-24#13:21:00#POSKASIR1" base64;
        $conn = pg_connect("host='" . $this->myServer . "' port='" . $this->myPort . "' dbname='" . $this->myDB . "' user='" . $this->myUser . "' password='" . $this->myPass . "'") or die("Can not connect to postgres");
        if ($absen == "CM") {
            list($kdotl, $tgl, $wkt, $nmkom) = explode("#", $data); //  khusus BO
        } else { 
            list($kdotl, $tgl, $wkt, $nmkom) = explode("#", base64_decode($data)); // dari QR PPOS Kasir dna Postab
        }

        $ket = "Absen-" . $nmkom;
        $tglabsen = $tgl . " " . $wkt;
        $ip = $_SERVER['REMOTE_ADDR']; // menangkap ip pengunjung
        $link = $_SERVER['PHP_SELF']; // menangkap server path
        $location = getCountryFromIP($ip, "NamE"); // menangkap server lokasi

//        echo $kdotl." ".$tglabsen." ".$nmkom." ".$Nip;

        $koneksi = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        $qcari = " SELECT mc.nip, mc.dvcid, mp.nm_lengkap, mp.kd_dept, mp.kd_jenis_outlet from m_champsuser mc "
            . " LEFT JOIN m_pegawai mp ON mc.nip = mp.nip "
            . " WHERE mp.nip='" . $Nip . "'  AND mp.s_aktif='Aktif'  ";
        $result = mysqli_query($koneksi, $qcari);
        $_jml = mysqli_num_rows($result);

        $response = array();
        if ($m_k == "M") {
            $response["message"] = "Selamat Bekerja " . $namacm . ", semoga hari ini menyenangkan tetap jaga kesehatan, Semangat. ";
            $response["clrbg"] = "#0DDF13"; // hijau
            $shift = "5";
        } elseif ($m_k == "K") {
            $response["message"] = "Anda Telah Melakukan Absensi Pulang " . $namacm . ", Hati-hati dijalan, selamat sampai Tujuan. ";
            $response["clrbg"] = "#e61807"; // merah
            $shift = "10";
        } elseif ($m_k == "P") {
            $response["message"] = "Anda Telah Melakukan Absensi Masuk Setelah Istirahat " . $namacm . " Selamat Bekerja kembali, Semangat.";
            $response["clrbg"] = "#F4D03F"; // kuning
            $shift = "26";
        } elseif ($m_k == "Q") {
            $response["message"] = "Anda Telah Melakukan Absensi Keluar Istirahat " . $namacm . " Selamat Beristirahat, Jangan lupa Absen lagi ya.";
            $response["clrbg"] = "#F4D03F"; // kuning
            $shift = "21";
        }
        /*cek nip*/
        if (!empty($Nip) && !empty($parimie) && !empty($m_k)) {
            if ($_jml > 0) {
                while ($row_mh = mysqli_fetch_array($result)) {
                    $mhd_dvcimei = $row_mh['dvcid'];
                    $jns_otl = $row_mh['kd_jenis_outlet'];
                    $hsl_kdotl = $row_mh['kd_dept'];
                }
                /*cek Imei*/
                if ($mhd_dvcimei == $parimie) {
                    if ($jns_otl == "OTL") {
                        if ($kdotl == $hsl_kdotl) {
                            $response["success"] = 1;

                            $qrabsn = " INSERT INTO t_absensi( nip,wktabsen, m_k, shift, isimported, kdoutlet, nopengajuan)" .
                                " VALUES( '" . $Nip . "', '" . $tglabsen . "', '" . $m_k . "', '" . $shift . "', 'F', '" . $kdotl . "', null)";
                            pg_exec($conn, $qrabsn);
                            $qrabsnlog = " INSERT INTO dbchamps.log_absenchamps (urutan, nip, iddvc, longabsen, latabsen, wktabsen, mk, kdoutlet, ket) "
                                . " VALUES (0 , '" . $Nip . "', '" . $parimie . "', '" . $lokasilong . "' , '" . $lokasilat . "' , '" . $tglabsen . "' , '" . $m_k . "' , '" . $kdotl . "' , '" . $ket . "');";
                            $rabsnlogt = mysqli_query($koneksi, $qrabsnlog);

//                                     $response["qrpgg"] = pg_exec($conn, $qrabsn);
                            $response["qrlogmsyql"] = $rabsnlogt;
                        } else {
                            $response["success"] = 0;
                            $response["message"] = "NIP " . $Nip . " Tidak terdaftar di outlet " . $kdotl;
                        }

                        echo json_encode($response);
                    } elseif ($jns_otl == "BO") {
                        $response["success"] = 1;
                        $qrabsn = " INSERT INTO t_absensi( nip,wktabsen, m_k, shift, isimported, kdoutlet, nopengajuan)" .
                            " VALUES( '" . $Nip . "', '" . $tglabsen . "', '" . $m_k . "', '" . $shift . "', 'F', '" . $kdotl . "', null)";
                        pg_exec($conn, $qrabsn);
                        $qrabsnlog = " INSERT INTO dbchamps.log_absenchamps (urutan, nip, iddvc, longabsen, latabsen, wktabsen, mk, kdoutlet, ket) "
                            . " VALUES (0 , '" . $Nip . "', '" . $parimie . "', '" . $lokasilong . "' , '" . $lokasilat . "' , '" . $tglabsen . "' , '" . $m_k . "' , '" . $kdotl . "' , '" . $ket . "');";
                        $rabsnlogt = mysqli_query($koneksi, $qrabsnlog);

//                                 $response["qrpgg"] = pg_exec($conn, $qrabsn);
                        $response["qrlogmsyql"] = $rabsnlogt;
                        echo json_encode($response);
                    }
//                    echo "imei sama ".$mhd_dvcimei." imei parm >".$parimie;
                } else {
                    $response["success"] = 0;
                    $response["message"] = "Perangkat anda " . $namacm . " (" . $Nip . ") tidak sama dengan yang di daftarkan, Silahkan hubungi ICT! ";
                    echo json_encode($response);

                }
            } else {
                $response["success"] = 0;
                $response["message"] = "Nip Not Found " . $Nip;
                echo json_encode($response);
            }
        } else {
            echo "Access Denied";
        }
    }

    public function setScanAbsenBody()
    {
        include_once "geoiploc.php";
        $jsonInputan = json_decode(file_get_contents('php://input')); 
        $Nip = $jsonInputan->Nip;
        $namacm = $jsonInputan->NmLengkap;
        $parimie = $jsonInputan->dvcimei;
        $osversi = $jsonInputan->osversi;
        $dvchp = $jsonInputan->dvchp;
        $m_k = $jsonInputan->m_k;
        $data = $jsonInputan->QrAbsen;
        $lokasilat = $jsonInputan->lokasilat;
        $lokasilong = $jsonInputan->lokasilong;
        $absen = $jsonInputan->absen;  
//        $data = "CXB01#2020-09-24#13:21:00#POSKASIR1" base64;
        $conn = pg_connect("host='" . $this->myServer . "' port='" . $this->myPort . "' dbname='" . $this->myDB . "' user='" . $this->myUser . "' password='" . $this->myPass . "'") or die("Can not connect to postgres");
        if ($absen == "CM") {
     
            list($kdotl, $tgl, $wkt, $nmkom) = explode("#", $data); //  khusus BO
        } else { 
            list($kdotl, $tgl, $wkt, $nmkom) = explode("#", base64_decode($data)); // dari QR PPOS Kasir dna Postab
        }

        $ket = "Absen-" . $nmkom;
        $tglabsen = $tgl . " " . $wkt;
        $ip = $_SERVER['REMOTE_ADDR']; // menangkap ip pengunjung
        $link = $_SERVER['PHP_SELF']; // menangkap server path
        $location = getCountryFromIP($ip, "NamE"); // menangkap server lokasi

//        echo $kdotl." ".$tglabsen." ".$nmkom." ".$Nip;

        $koneksi = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        $qcari = " SELECT mc.nip, mc.dvcid, mp.nm_lengkap, mp.kd_dept, mp.kd_jenis_outlet from m_champsuser mc "
            . " LEFT JOIN m_pegawai mp ON mc.nip = mp.nip "
            . " WHERE mp.nip='" . $Nip . "'  AND mp.s_aktif='Aktif'  ";
        $result = mysqli_query($koneksi, $qcari);
        $_jml = mysqli_num_rows($result);

        $response = array();
        if ($m_k == "M") {
            $response["message"] = "Selamat Bekerja " . $namacm . ", semoga hari ini menyenangkan tetap jaga kesehatan, Semangat. ";
            $response["clrbg"] = "#0DDF13"; // hijau
            $shift = "5";
        } elseif ($m_k == "K") {
            $response["message"] = "Anda Telah Melakukan Absensi Pulang " . $namacm . ", Hati-hati dijalan, selamat sampai Tujuan. ";
            $response["clrbg"] = "#e61807"; // merah
            $shift = "10";
        } elseif ($m_k == "P") {
            $response["message"] = "Anda Telah Melakukan Absensi Masuk Setelah Istirahat " . $namacm . " Selamat Bekerja kembali, Semangat.";
            $response["clrbg"] = "#F4D03F"; // kuning
            $shift = "26";
        } elseif ($m_k == "Q") {
            $response["message"] = "Anda Telah Melakukan Absensi Keluar Istirahat " . $namacm . " Selamat Beristirahat, Jangan lupa Absen lagi ya.";
            $response["clrbg"] = "#F4D03F"; // kuning
            $shift = "21";
        }
        /*cek nip*/
        if (!empty($Nip) && !empty($parimie) && !empty($m_k)) {
            if ($_jml > 0) {
                while ($row_mh = mysqli_fetch_array($result)) {
                    $mhd_dvcimei = $row_mh['dvcid'];
                    $jns_otl = $row_mh['kd_jenis_outlet'];
                    $hsl_kdotl = $row_mh['kd_dept'];
                }
                /*cek Imei*/
                if ($mhd_dvcimei == $parimie) {
                    if ($jns_otl == "OTL") {
                        if ($kdotl == $hsl_kdotl) {
                            $response["success"] = 1;

                            $qrabsn = " INSERT INTO t_absensi( nip,wktabsen, m_k, shift, isimported, kdoutlet, nopengajuan)" .
                                " VALUES( '" . $Nip . "', '" . $tglabsen . "', '" . $m_k . "', '" . $shift . "', 'F', '" . $kdotl . "', null)";
                            pg_exec($conn, $qrabsn);
                            $qrabsnlog = " INSERT INTO dbchamps.log_absenchamps (urutan, nip, iddvc, longabsen, latabsen, wktabsen, mk, kdoutlet, ket) "
                                . " VALUES (0 , '" . $Nip . "', '" . $parimie . "', '" . $lokasilong . "' , '" . $lokasilat . "' , '" . $tglabsen . "' , '" . $m_k . "' , '" . $kdotl . "' , '" . $ket . "');";
                            $rabsnlogt = mysqli_query($koneksi, $qrabsnlog);

//                                     $response["qrpgg"] = pg_exec($conn, $qrabsn);
                            $response["qrlogmsyql"] = $rabsnlogt;
                        } else {
                            $response["success"] = 0;
                            $response["message"] = "NIP " . $Nip . " Tidak terdaftar di outlet " . $kdotl;
                        }

                        echo json_encode($response);
                    } elseif ($jns_otl == "BO") {
                        $response["success"] = 1;
                        $qrabsn = " INSERT INTO t_absensi( nip,wktabsen, m_k, shift, isimported, kdoutlet, nopengajuan)" .
                            " VALUES( '" . $Nip . "', '" . $tglabsen . "', '" . $m_k . "', '" . $shift . "', 'F', '" . $kdotl . "', null)";
                        pg_exec($conn, $qrabsn);
                        $qrabsnlog = " INSERT INTO dbchamps.log_absenchamps (urutan, nip, iddvc, longabsen, latabsen, wktabsen, mk, kdoutlet, ket) "
                            . " VALUES (0 , '" . $Nip . "', '" . $parimie . "', '" . $lokasilong . "' , '" . $lokasilat . "' , '" . $tglabsen . "' , '" . $m_k . "' , '" . $kdotl . "' , '" . $ket . "');";
                        $rabsnlogt = mysqli_query($koneksi, $qrabsnlog);

//                                 $response["qrpgg"] = pg_exec($conn, $qrabsn);
                        $response["qrlogmsyql"] = $rabsnlogt;
                        echo json_encode($response);
                    } elseif ($jns_otl == "PP") {
                        $response["success"] = 1;
                        $qrabsn = " INSERT INTO t_absensi( nip,wktabsen, m_k, shift, isimported, kdoutlet, nopengajuan)" .
                            " VALUES( '" . $Nip . "', '" . $tglabsen . "', '" . $m_k . "', '" . $shift . "', 'F', '" . $kdotl . "', null)";
                        pg_exec($conn, $qrabsn);
                        $qrabsnlog = " INSERT INTO dbchamps.log_absenchamps (urutan, nip, iddvc, longabsen, latabsen, wktabsen, mk, kdoutlet, ket) "
                            . " VALUES (0 , '" . $Nip . "', '" . $parimie . "', '" . $lokasilong . "' , '" . $lokasilat . "' , '" . $tglabsen . "' , '" . $m_k . "' , '" . $kdotl . "' , '" . $ket . "');";
                        $rabsnlogt = mysqli_query($koneksi, $qrabsnlog);

//                                 $response["qrpgg"] = pg_exec($conn, $qrabsn);
                        $response["qrlogmsyql"] = $rabsnlogt;
                        echo json_encode($response);
                    }
//                    echo "imei sama ".$mhd_dvcimei." imei parm >".$parimie;
                } else {
                    $response["success"] = 0;
                    $response["message"] = "Perangkat anda " . $namacm . " (" . $Nip . ") tidak sama dengan yang di daftarkan, Silahkan hubungi ICT! ";
                    echo json_encode($response);

                }
            } else {
                $response["success"] = 0;
                $response["message"] = "Nip Not Found " . $Nip;
                echo json_encode($response);
            }
        } else {
            echo "Access Denied";
        }
    }



}
