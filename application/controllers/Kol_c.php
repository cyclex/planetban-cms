<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kol_c extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function delete($id, $campaignID)
    {
        header('Content-type: application/json');
        $message = 'Proses gagal';
        $alert = 'danger';

        $data = $this->curl->curl_delete(serverHost."/v1/kol/".$id);
        $obj = json_decode($data, true);
        if ($obj['status']){
            $message = $obj['message'];
            $alert = "success";
        }

        $info = array(
            'INFO'  => $obj['message'],
            'ALERT' => $alert
        );
        $this->session->set_flashdata('notif', $info);

        redirect('kol/'.$campaignID);
    }

    public function update()
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->load->library('common');

        header('Content-type: application/json');
        $message = 'Proses gagal';
        $alert = 'danger';

        $id = $_POST['id'];
        $kolName = $_POST['kol_name'];
        $campaignID = $_POST['campaign_id'];
        $source = $_POST['source'];
        $voucherCode = $_POST['voucher_code'];
        $adsPlatform = $_POST['ads_platform'];

        $payload = json_encode([
            "campaignID" => $campaignID,
            "name" => $kolName,
            "source" => $source,
            "voucherCode" => $voucherCode,
            "adsPlatform" => $adsPlatform
        ]);

        $data = $this->curl->curl_put(serverHost."/v1/kol/".$id, $payload);
        $obj = json_decode($data, true);
        
        if ($obj['status']){
            $message = $obj['message'];
            $alert = "success";
        }

        $info = array(
            'INFO'  => $obj['message'],
            'ALERT' => $alert
        );
        $this->session->set_flashdata('notif', $info);

        redirect('kol/'.$campaignID);
    }

    public function create()
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->load->library('common');

        header('Content-type: application/json');
        $message = 'Proses gagal';
        $alert = 'danger';

        $kolName = $_POST['kol_name'];
        $campaignID = intval($_POST['campaign_id']);
        $source = $_POST['source'];
        $voucherCode = $_POST['voucher_code'];
        $adsPlatform = $_POST['ads_platform'];

        // Upload file
        if (!$kolName){
            $upload = $this->common->do_upload();
            if (!$upload['status']){
                $info = array(
                    'INFO'  => $upload['error'],
                    'ALERT' => $alert
                );
                $this->session->set_flashdata('notif', $info);
        
                redirect('kol/'.$campaignID);
            }
        }

        $payload = json_encode([
            "name" => $kolName,
            "campaignID" => $campaignID,
            "source" => $source,
            "voucherCode" => $voucherCode,
            "adsPlatform" => $adsPlatform,
            "file" => $upload['full_path']
        ]);

        $data = $this->curl->curl_post_json(serverHost."/v1/kol", $payload);
        $obj = json_decode($data, true);
        
        if ($obj['status']){
            $message = $obj['message'];
            $alert = "success";
        }

        $info = array(
            'INFO'  => $obj['message'],
            'ALERT' => $alert
        );
        $this->session->set_flashdata('notif', $info);

        redirect('kol/'.$campaignID);
    }

}