<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_c extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function getDataCampaign()
    {
        header('Content-type: application/json');
        $res = array();

        $sort = "desc";
        if ($_REQUEST['order']['0']['dir'] != ""){
            $sort = $_REQUEST['order']['0']['dir'];
        }

        $payload = json_encode([
            "from" => intval($_REQUEST['from']),
            "to" => intval($_REQUEST['to']),
            "offset" => intval(($_REQUEST['start'] ? $_REQUEST['start'] : "0")),
            "keyword" => isset($_REQUEST['keyword']) ? trim($_REQUEST['keyword']) :"",
            "sort" => $sort,
            "limit" => intval(($_REQUEST['length'] ? $_REQUEST['length'] : "0"))
        ]);

        $draw = isset($_POST['draw']) ?: 0;

        $data = $this->curl->curl_post_json(serverHost."/v1/report/campaign", $payload);
        $obj = json_decode($data, true);

        if ($obj['status']){
            $arr = [];
            if (!is_null($obj['data'])){
                $arr = $obj['data'];
            }
            $res = $arr;
        }

        $res = array(
            "draw" => intval($draw),
            "iTotalRecords" => $res["rows"],
            "iTotalDisplayRecords" => $res["rows"],
            "aaData" => isset($res["data"]) ? $res["data"] : [],
          );
          
        echo json_encode($res);
    }

    public function getDataDetail($campaign_id)
    {
        header('Content-type: application/json');
        $res = array();

        $sort = "desc";
        if ($_REQUEST['order']['0']['dir'] != ""){
            $sort = $_REQUEST['order']['0']['dir'];
        }

        $from = ($_REQUEST['from']) ? strtotime($_REQUEST['from']) : "0";
        $to = ($_REQUEST['to']) ? strtotime($_REQUEST['to'])+(3600*24)-1 : "0";

        $payload = json_encode([
            "from" => $from,
            "to" => $to,
            "offset" => intval(($_REQUEST['start'] ? $_REQUEST['start'] : "0")),
            "keyword" => $campaign_id,
            "sort" => $sort,
            "limit" => intval(($_REQUEST['length'] ? $_REQUEST['length'] : "0"))
        ]);

        $draw = isset($_POST['draw']) ?: 0;

        $data = $this->curl->curl_post_json(serverHost."/v1/report/detail", $payload);
        $obj = json_decode($data, true);

        if ($obj['status']){
            $arr = [];
            if (!is_null($obj['data'])){
                $arr = $obj['data'];
            }
            $res = $arr;
        }

        $res = array(
            "draw" => intval($draw),
            "iTotalRecords" => $res["rows"],
            "iTotalDisplayRecords" => $res["rows"],
            "aaData" => isset($res["data"]) ? $res["data"] : [],
          );
          
        echo json_encode($res);
    }

    public function getDataSummaryAggregate()
    {
        header('Content-type: application/json');
        $res = array();
        $sort = "desc";
        if ($_REQUEST['order']['0']['dir'] != ""){
            $sort = $_REQUEST['order']['0']['dir'];
        }

        $from = ($_REQUEST['from']) ? strtotime($_REQUEST['from']) : "0";
        $to = ($_REQUEST['to']) ? strtotime($_REQUEST['to'])+(3600*24)-1 : "0";

        $payload = json_encode([
            "from" => $from,
            "to" => $to,
            "offset" => intval(($_REQUEST['start'] ? $_REQUEST['start'] : "0")),
            "keyword" => isset($_REQUEST['keyword']) ? trim($_REQUEST['keyword']) :"",
            "sort" => $sort,
            "limit" => intval(($_REQUEST['length'] ? $_REQUEST['length'] : "0"))
        ]);

        $draw = isset($_POST['draw']) ?: 0;

        $data = $this->curl->curl_post_json(serverHost."/v1/report/summary_aggregate", $payload);
        $obj = json_decode($data, true);

        if ($obj['status']){
            $arr = [];
            if (!is_null($obj['data'])){
                $arr = $obj['data'];
            }
            $res = $arr;
        }

        $res = array(
            "draw" => intval($draw),
            "iTotalRecords" => $res["rows"],
            "iTotalDisplayRecords" => $res["rows"],
            "aaData" => isset($res["data"]) ? $res["data"] : [],
          );
          
        echo json_encode($res);
    }

    public function getDataDetailSummary($kol_id)
    {
        header('Content-type: application/json');
        $res = array();

        $sort = "desc";
        if ($_REQUEST['order']['0']['dir'] != ""){
            $sort = $_REQUEST['order']['0']['dir'];
        }

        $from = ($_REQUEST['from']) ? strtotime($_REQUEST['from']) : "0";
        $to = ($_REQUEST['to']) ? strtotime($_REQUEST['to'])+(3600*24)-1 : "0";

        $payload = json_encode([
            "from" => $from,
            "to" => $to,
            "offset" => intval(($_REQUEST['start'] ? $_REQUEST['start'] : "0")),
            "keyword" => isset($_REQUEST['keyword']) ? trim($_REQUEST['keyword']) :"",
            "sort" => $sort,
            "limit" => intval(($_REQUEST['length'] ? $_REQUEST['length'] : "0")),
            "column" => $kol_id
        ]);

        $draw = isset($_POST['draw']) ?: 0;

        $data = $this->curl->curl_post_json(serverHost."/v1/report/detail_summary", $payload);
        $obj = json_decode($data, true);

        if ($obj['status']){
            $arr = [];
            if (!is_null($obj['data'])){
                $arr = $obj['data'];
            }
            $res = $arr;
        }

        $res = array(
            "draw" => intval($draw),
            "iTotalRecords" => $res["rows"],
            "iTotalDisplayRecords" => $res["rows"],
            "aaData" => isset($res["data"]) ? $res["data"] : [],
          );
          
        echo json_encode($res);
    }

    public function getDataUser()
    {
        header('Content-type: application/json');
        $res = array();

        $sort = "desc";
        if ($_REQUEST['order']['0']['dir'] != ""){
            $sort = $_REQUEST['order']['0']['dir'];
        }

        $payload = json_encode([
            "from" => "0",
            "to" => "0",
            "offset" => intval(($_REQUEST['start'] ? $_REQUEST['start'] : "0")),
            "keyword" => "",
            "sort" => $sort,
            "limit" => intval(($_REQUEST['length'] ? $_REQUEST['length'] : "0"))
        ]);

        $draw = isset($_POST['draw']) ?: 0;

        $data = $this->curl->curl_post_json(serverHost."/v1/report/user", $payload);
        $obj = json_decode($data, true);

        if ($obj['status']){
            $arr = [];
            if (!is_null($obj['data'])){
                $arr = $obj['data'];
            }
            $res = $arr;
        }

        $res = array(
            "draw" => intval($draw),
            "iTotalRecords" => $res["rows"],
            "iTotalDisplayRecords" => $res["rows"],
            "aaData" => isset($res["data"]) ? $res["data"] : [],
          );
          
        echo json_encode($res);
    }

}


