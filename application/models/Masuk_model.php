<?php


class Masuk_model{

    public function __construct()
	{
		$this->db = new Database;
	}
	
	public function getPassword($IdPeg)
	{
		$this->db->query('select Password from pegawai where IdPeg=:IdPeg');
		$this->db->blind('IdPeg',$IdPeg);
		return $this->db->single();
	}
	
	public function cekIdPeg($IdPeg)
	{
		$this->db->query('select IdPeg from pegawai where IdPeg=:IdPeg');
		$this->db->blind('IdPeg',$IdPeg['IdPeg']);
		return $this->db->single();
	}

	public function cekAktivasi($IdPeg)
	{
		$this->db->query('select Aktif from pegawai where IdPeg=:IdPeg');
		$this->db->blind('IdPeg',$IdPeg['IdPeg']);
		return $this->db->single();
	}

    public function tambahDataPegawai($data)
    {
        $query="insert into pegawai values (:IdPeg,:Nama,:Jabatan,0,:Password,:NoTelp,:Email,'')";
		$data['Password']=password_hash($data['Password'],PASSWORD_DEFAULT);
		$this->db->query($query);
		$this->db->blind('IdPeg',$data['IdPeg']);
		$this->db->blind('Nama',$data['Nama']);
		$this->db->blind('Jabatan',$data['Jabatan']);
		$this->db->blind('Password',$data['Password']);
		$this->db->blind('NoTelp',$data['NoTelp']);
		$this->db->blind('Email',$data['Email']);

        $this->db->execute();
        
        return $this->db->rowCount();
	}
	
    
}
