<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_pdf {
    private static $CI;
    function M_pdf()
    {
        self::$CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }
 
    function load($params = NULL)
    {
        include_once APPPATH.'/third_party/mpdf/mpdf.php';
         
        if ($params === NULL)
        {
            $param = '"en-GB-x","A4","","",10,10,10,10,6,3';  
            return new mPDF($param);        		
        }else{
            return new mPDF('c', 'A4-L');
        }
         
        //return new mPDF($param);
        
    }

    public function getPdf($name = 'asb', $lokasi = '', $data = array(), $format = NULL)
  	{
        
        ini_set('max_execution_time', 0); 
        ini_set('memory_limit','2048M');
        // header("Content-type: text/text");
        // header("Content-type:application/pdf");
        // header('Content-type: application/pdf; charset=utf-8');
// It will be called downloaded.pdf
// header("Content-Disposition:attachment;filename='downloaded.pdf'");
        // echo $lokasi;
        //load mPDF library
        // $this->load->library('M_pdf');
        header('Content-Type: application/pdf'); 
        header('Content-Description: inline; filename.pdf'); 
        
        // $paran = "miring";
        $paran = $format;
        // die('s');
        // load tampilan
        $html = self::$CI->load->view($lokasi,$data, true); 
        // $html = '<h1>tes</h1>';
        // $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
        
        // $this->load->view('kelurahan/'.$jenis,$data); 
        
        //nama file
        $pdfFilePath =$name."-".time()."-download.pdf";
        
        
        //actually, you can pass mPDF parameter on this load() function
        // $pdf = $this->m_pdf->load($paran);
        $pdf = $this->load($paran);

        $pdf->allow_charset_conversion=true;
        $pdf->charset_in='UTF-8';


        $pdf->mirrorMargins = 1; // Use different Odd/Even headers and footers and mirror margins

        $pdf->defaultheaderfontsize = 10; /* in pts */
        $pdf->defaultheaderfontstyle = B; /* blank, B, I, or BI */
        //    $pdf->defaultheaderline = 1;  /* 1 to include line below header/above footer */

        $pdf->defaultfooterfontsize = 9; /* in pts */
        $pdf->defaultfooterfontstyle = I; /* blank, B, I, or BI */
        //$pdf->defaultfooterline = 1;  /* 1 to include line below header/above footer */
        // $pdf->SetHTMLHeader('<img src="' . base_url() . 'public/img/pdf/logo.png"/>');

        $htmlHeader = '<html><div>'
                . '<div><img src="'.base_url().'public/image/morowali.png" style="width: 7%;padding-left: 45%; padding-top:10px;"/></div>'
                
            . '</div></html>';

        $htmlHeader2 = '<html><div>'
                . '<div><img src="'.base_url().'public/image/morowali.png" style="width: 7%;padding-left: 45%; padding-top:10px;" /></div>'
                
            . '</div></html>';

        $htmlFooter = ' <div>'
                . '<div id="descriptionDerouleCourse"><span>Halaman {PAGENO} </span></div>'

            . '</div>';

        // $pdf->SetHTMLHeader($htmlHeader);
        // $pdf->SetHTMLHeader($htmlHeader, 'O', true);
        // $pdf->SetHTMLHeader($htmlHeader2, 'E', false);
        // $pdf->SetHTMLFooter($htmlFooter, 'O');
        // $pdf->SetHTMLFooter($htmlFooter, 'E');


        // $pdf->SetHeader('Dicetak dari: si PANDAI Kab. Kolaka Utara pada '.date("d").'-'.date("m").'-'.date("Y"));
        $pdf->SetFooter('Halaman {PAGENO}'); /* defines footer for Odd and Even Pages - placed at Outer margin */
        // $pdf->SetAutoFont();
        $pdf->AddPage('', // L - landscape, P - portrait 
            '', '', '', '',
            10, // margin_left
            10, // margin right
            10, // margin top
            10, // margin bottom
            0, // margin header
            0
        );

        //generate the PDF!
        $pdf->WriteHTML($html,2);

        //offer it to user via browser download! (The PDF won't be saved on your server HDD)
        $pdf->Output($pdfFilePath, "D");
        exit;
  	}

    
    
}