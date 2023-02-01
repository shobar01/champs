<?php

class DbOperation
{
    //Database connection link
    private $con;

    //private $pgcon;

    //Class constructor
    public function __construct()
    {
        //Getting the DbConnect.php file
        require_once dirname(__FILE__) . '/DbConnect.php';

        //Creating a DbConnect object to connect to the database
        $db = new DbConnect();

        //Initializing our connection link of this class
        //by calling the method connect of DbConnect class
        $this->con = $db->connect();
        //$this->pgcon = $db->pg_connect();
    }

    //storing token in database
    public function registerDevice($email, $token)
    {
//        if(!$this->isEmailExist($email)){
        $stmt = $this->con->prepare("INSERT INTO m_token (departement, tokendevice, telepon, nip, email)"
            . " VALUES ('','$token','','','$email') ");
//            $stmt->bind_param("ss",$email,$token);
        if ($stmt->execute()) {
            return 0;
        }
        //return 0 means success
        return 1; //return 1 means failure
        //        }else{
        //            return 2; //returning 2 means email already exist
        //        }
    }

    //getting all tokens to send push to all devices
    public function getAllTokens()
    {
        // $stmt = $//this->con->prepare(“SELECT token FROM devices”);
        // $stmt->execute();
        // $result = $stmt->get_result();
        $result = $this->con->query("SELECT tokendevice FROM m_token");
        $tokens = array();
        while ($token = $result->fetch_assoc()) {
            array_push($tokens, $token['tokendevice']);
        }
        return $tokens;
    }

    public function getMgambar($notiket)
    {
        $result = $this->con->query("SELECT tr.to_dept, mg.nm_gambar, mg.no_tiket "
            . " FROM t_request tr "
            . " INNER JOIN m_gambar mg ON mg.no_tiket = tr.no_tiket "
            . " WHERE mg.no_tiket= '$notiket' ");

        return $result;

    }

    public function getTokenByEmail($email)
    {
        $result = $this->con->query("SELECT tokendevice FROM m_token where departement = '$email'");
        $tokens = array();
        while ($token = $result->fetch_assoc()) {
            array_push($tokens, $token['tokendevice']);
        }
        return $tokens;
    }

    // //getting all the registered devices from database
    public function getAllDevices()
    {
        $stmt = $this->con->query("SELECT * FROM m_token");
        // $stmt->execute();
        // $result = $stmt->get_result();
        return $stmt;
    }

    public function getTokenC2()
    {
        $result = $this->con->query("SELECT devtoken FROM tmp_token");
        $tokens = array();
        while ($token = $result->fetch_assoc()) {
            array_push($tokens, $token['devtoken']);
        }
        return $tokens;
    }

    public function getTokenDlvMcc($fkdoutlet)
    {
        $result = $this->con->query("select tokendevice from m_token where kdoutlet = '" . $fkdoutlet . "'");
        $tokens = array();
        while ($token = $result->fetch_assoc()) {
            array_push($tokens, $token['tokendevice']);
        }
        return $tokens;
    }

    public function getTokenNipHris($Nip)
    {
        $result = $this->con->query("select tokendevice from m_token where nip = '" . $Nip . "'");
        $tokens = array();
        while ($token = $result->fetch_assoc()) {
            array_push($tokens, $token['tokendevice']);
        }
        return $tokens;
    }
    public function getTokenKdakses($kdakses)
    {
        $result = $this->con->query("SELECT mt.departement, mt.tokendevice, mt.nip, mp.nm_lengkap, mc.kdakses from dbchamps.m_token mt 
        INNER JOIN dbmaster.m_champsuser mc on mc.nip = mt.nip 
        INNER JOIN dbmaster.m_pegawai mp on mp.nip = mt.nip 
        WHERE mc.kdakses='".$kdakses."' and s_aktif='Aktif'");
        $tokens = array();
        while ($token = $result->fetch_assoc()) {
            array_push($tokens, $token['tokendevice']);
        }
        return $tokens;
    }

    public function getTokenICT()
    {
        $result = $this->con->query("SELECT tokendevice FROM dbchamps.m_token aa " .
            " INNER JOIN dbmaster.m_champsuser bb ON aa.nip = bb.nip " .
            " INNER JOIN dbmaster.m_pegawai cc ON aa.nip = cc.nip " .
            " WHERE kdakses IN('AVXXX','AV005','AV004') AND id_dept = 'ICT' " .
            " AND s_aktif = 'Aktif'");
        $tokens = array();
        while ($token = $result->fetch_assoc()) {
            array_push($tokens, $token['tokendevice']);
        }
        return $tokens;
    }
    public function getTokenKdaksesKdoutlet($kdakses, $kdoutlet)
    {
        $result = $this->con->query("SELECT aa.nip, aa.s_aktif, aa.nm_lengkap, aa.jabatan, bb.kdakses, mt.tokendevice FROM dbmaster.m_pegawai aa "
        ." INNER JOIN dbmaster.m_champsuser bb ON aa.nip = bb.nip "
        ." INNER JOIN m_token mt  on aa.nip=mt.nip "
        ." WHERE (CASE WHEN tgl_rotasi IS NULL THEN kd_dept " 
        ." WHEN tgl_rotasi > CURRENT_DATE THEN kd_dept " 
        ." WHEN tgl_rotasi < CURRENT_DATE THEN kd_dept_baru END) = '".$kdoutlet."' "
        ." AND kdakses = '".$kdakses."' AND aa.s_aktif='Aktif' ");

        // $result = $this->con->query("select tokendevice from m_token where nip = '22110004'");
        $tokens = array();
        while ($token = $result->fetch_array()) {
            array_push($tokens, $token['tokendevice']);
        }
        return $tokens;
    }
}
