<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fungsi {

    private static $CI;
    private $max_width = '2000';
    private $max_height = '2000';

    public function __construct()
    {
        self::$CI = & get_instance();
        self::$CI->load->library('image_lib');
    }
    
    public function password_hash($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function kirimEmail($toEmail, $judul, $isi, $img = false){


        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '70';
        $config['smtp_user']    = 'simple.email.website@gmail.com';
        $config['smtp_pass']    = 'qwerty123@';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      

        self::$CI->email->initialize($config);

        if($img){
            $filename = base_url().'public/images/Lambang_Kabupaten_Kolaka_Utara.png';
            self::$CI->email->attach($filename);
            $cid = self::$CI->email->attachment_cid($filename);
            // echo $cid;

            $isi = str_replace('cid:-=set-logo=-','cid:'.$cid,$isi);
            // echo $isi;

        }

        self::$CI->email->from('simple.email.website@gmail.com', 'Si PANDAI');
        self::$CI->email->to($toEmail); 

        self::$CI->email->subject($judul);
        self::$CI->email->message($isi);  
        self::$CI->email->set_mailtype("html");

        if(self::$CI->email->send()){
            // echo "sukses";
            return true;
        }else{
            
            return false;
            // show_error($this->email->print_debugger());
        }
    
        
    }

    public function imageUpload($var= 'gambar', $namaGambar = 'gambar_', $folder = 'galeri', $pdf = false)
    {
        $name = "no-image.png";
        
            if ($_FILES[$var]["name"])
            {
                $data = array();
                if(!$pdf){
                    $name = $namaGambar.time().'.gif';
                }else{
                    $ext = pathinfo($_FILES[$var]["name"], PATHINFO_EXTENSION);
                    $name = "no-file.".$ext;
                    $name = $namaGambar.time().'.'.$ext;
                }

                $security = 0755;

                $path = './attachments';
                if (!is_dir($path))
                    mkdir($path, $security);
 
                $pathMain = './attachments/'.$folder;
                if (!is_dir($pathMain))
                    mkdir($pathMain, $security);
 
                $pathThumb = './attachments/'.$folder.'/100X100';
                if (!is_dir($pathThumb))
                    mkdir($pathThumb, $security);
 
                $path2Thumb = './attachments/'.$folder.'/200X200';
                if (!is_dir($path2Thumb))
                    mkdir($path2Thumb, $security);
 
                $path3Thumb = './attachments/'.$folder.'/300X300';
                if (!is_dir($path3Thumb))
                    mkdir($path3Thumb, $security);
                
                $result = $this->do_upload($var, $pathMain, $name, $pdf);
                if (!$result['status'])
                {
                    $data['error_msg'] ="Can not upload Image for " . $result['error'] . " ";
                    // echo "<script>alert('Gambar telalu Besar. Ukuran Maximal $this->max_width X $this->max_height (2 MB)');</script>";
                    $name = "no-image.png";
                }
                else
                {
                    if(!$pdf){
                        if(!$this->resize_image($pathMain . '/' . $result['upload_data']['file_name'], $pathThumb . '/'.$name,'100','100'))
                        {
                        //    echo "<script>alert('Gagal Upload gambar ukuran 100X100');</script>";
                            $name = "no-image.png";
                        }
                            
                        if(!$this->resize_image($pathMain . '/' . $result['upload_data']['file_name'], $path2Thumb . '/'.$name,'200','200'))
                        {
                        // echo "<script>alert('Gagal Upload gambar ukuran 100X100');</script>";
                        $name = "no-image.png";
                        }
                        if(!$this->resize_image($pathMain . '/' . $result['upload_data']['file_name'], $path3Thumb . '/'.$name,'300','300'))
                        {
                            // echo "<script>alert('Gagal Upload gambar ukuran 100X100');</script>";
                            $name = "no-image.png";
                        }
                    }
                }
            }
        
        return $name;
    }

    function do_upload($htmlFieldName, $path, $name, $pdf)
    {
        $config['file_name'] = $name;
        $config['upload_path'] = $path;
        if(!$pdf){
            $config['allowed_types'] = 'gif|jpg|png|';
        }else{
            $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|xls|xlsx|gif|jpg|png|';
        }
        
        $config['max_size'] = '2048';
        $config['max_width'] = $this->max_width;
        $config['max_height'] = $this->max_height;
        self::$CI->load->library('upload', $config);
        self::$CI->upload->initialize($config);
        unset($config);
        if (!self::$CI->upload->do_upload($htmlFieldName))
        {
            return array('error' => self::$CI->upload->display_errors(), 'status' => 0);
        } else
        {
            return array('status' => 1, 'upload_data' => self::$CI->upload->data());
        }
    }

    function resize_image($sourcePath, $desPath, $width = '500', $height = '500')
    {
        self::$CI->image_lib->clear();
        $config['image_library'] = 'gd2';
        $config['source_image'] = $sourcePath;
        $config['new_image'] = $desPath;
        $config['quality'] = '100%';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = true;
        $config['thumb_marker'] = '';
        $config['width'] = $width;
        $config['height'] = $height;
        self::$CI->image_lib->initialize($config);
 
        if (self::$CI->image_lib->resize())
            return true;
        return false;
    }

    function convert_to_rupiah($angka)
	{
		return strrev(implode('.',str_split(strrev(strval($angka)),3)));
    }
    	 
	function convert_to_number($rupiah)
	{
        // return intval(preg_replace('/,.*|[^0-9]/', '', $rupiah));
        return (preg_replace('/,.*|[^0-9]/', '', $rupiah));
	}

}