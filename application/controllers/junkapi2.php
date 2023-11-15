<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Upload extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load Model
        $this->load->model('User_model', 'user');
        $this->ip_address    = $_SERVER['REMOTE_ADDR'];
        $this->datetime         = date("Y-m-d H:i:s");
    }

    public function index()
    {
        $this->load->view("index");
    }

    public function display()
    {
        $data     = [];
        $data["result"] = $this->user->get_all();
        $this->load->view("index");
    }

    public function import()
    {
        $path         = 'documents/users/';
        $json         = [];
        $this->upload_config($path);
        if (!$this->upload->do_upload('file')) {
            $json = [
                'error_message' => showErrorMessage($this->upload->display_errors()),
            ];
        } else {
            $file_data     = $this->upload->data();
            $file_name     = $path . $file_data['file_name'];
            $arr_file     = explode('.', $file_name);
            $extension     = end($arr_file);
            if ('csv' == $extension) {
                $reader     = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader     = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet     = $reader->load($file_name);
            $sheet_data     = $spreadsheet->getActiveSheet()->toArray();
            $list             = [];
            foreach ($sheet_data as $key => $val) {
                if ($key != 0) {
                    $result     = $this->user->get(["country_code" => $val[2], "mobile" => $val[3]]);
                    if ($result) {
                    } else {
                        $list[] = [
                            'name'                    => $val[0],
                            'country_code'            => $val[1],
                            'mobile'                => $val[2],
                            'email'                    => $val[3],
                            'city'                    => $val[4],
                            'ip_address'            => $this->ip_address,
                            'created_at'             => $this->datetime,
                            'status'                => "1",
                        ];
                    }
                }
            }
            if (file_exists($file_name))
                unlink($file_name);
            if (count($list) > 0) {
                $result     = $this->user->add_batch($list);
                if ($result) {
                    $json = [
                        'success_message'     => showSuccessMessage("All Entries are imported successfully."),
                    ];
                } else {
                    $json = [
                        'error_message'     => showErrorMessage("Something went wrong. Please try again.")
                    ];
                }
            } else {
                $json = [
                    'error_message' => showErrorMessage("No new record is found."),
                ];
            }
        }
        echo json_encode($json);
    }

    public function upload_config($path)
    {
        if (!is_dir($path))
            mkdir($path, 0777, TRUE);
        $config['upload_path']         = './' . $path;
        $config['allowed_types']     = 'csv|CSV|xlsx|XLSX|xls|XLS';
        $config['max_filename']         = '255';
        $config['encrypt_name']     = TRUE;
        $config['max_size']         = 4096;
        $this->load->library('upload', $config);
    }

    function dbCompare()
    {
        // getting data from db 1
        $api_url = 'https://kevinxcode.com/apps/ocean/api/getattjson';
        $data1 = json_decode(file_get_contents($api_url));
        foreach ($data1 as $dt) {
            $id_scan = $dt->id_scan;
            $emp_nik = $dt->emp_nik;
            $qrToken = $dt->qrToken;
            $datetime_rec = $dt->datetime_rec;
            $emp_name = $dt->emp_name;
            $emp_dept = $dt->emp_dept;
            $status = $dt->status;
            $date_rec = $dt->date_rec;
            $time_rec = $dt->time_rec;
            $updated_on = $dt->updated_on;

            $data1_json[] = array( //creating data-out if employee have attendance log before
                'id_scan' => $id_scan,
                'emp_nik' => $emp_nik,
                'qrToken' => $qrToken,
                'datetime_rec' => $datetime_rec,
                'emp_name' => $emp_name,
                'emp_dept' => $emp_dept,
                'status' => $status,
                'date_rec' => $date_rec,
                'time_rec' => $time_rec,
                'updated_on' => $updated_on
            );

            // $data1_json[] = array(
            // 'id_scan' => $id_scan,
            // 'details' => $data
            // );
        }

        // getting data from db 2
        $data2 = $this->Mdata->get_ex_data();
        foreach ($data2 as $val) {
            // $data2_json[] = $row;
            $id_scan = $val->_id_scan;
            $emp_nik = $val->_emp_nik;
            $qrToken = $val->_qrtoken;
            $datetime_rec = $val->_datetime_rec;
            $emp_name = $val->_emp_name;
            $emp_dept = $val->_emp_dept;
            $status = $val->_status;
            $date_rec = $val->_date_rec;
            $time_rec = $val->_time_rec;
            $updated_on = $val->_updated_on;

            $data2_json[] = array( //creating data-out if employee have attendance log before
                'id_scan' => $id_scan,
                'emp_nik' => $emp_nik,
                'qrToken' => $qrToken,
                'datetime_rec' => $datetime_rec,
                'emp_name' => $emp_name,
                'emp_dept' => $emp_dept,
                'status' => $status,
                'date_rec' => $date_rec,
                'time_rec' => $time_rec,
                'updated_on' => $updated_on
            );
        }

        foreach ($data1_json as $row1) {
            $found = false;
            foreach ($data2_json as $row2) {
                if ($row1 == $row2) {
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $diff2[] = $row1;
            }
        }

        if (count($diff2) > 0) {
            foreach ($diff2 as $dt) {
                $upd_data[] = json_decode(json_encode($dt), false);
            }
            $new_data = $upd_data;
            echo $new_data;
        }

        foreach ($rows1 as $data1) {
			$foundInOtherArray = false;

			foreach ($data2_json as $data2) {
				// Compare the data, adjust this condition based on your data structure
				$foundInOtherArray = false;
				if ($data1 == $data2) {
					$foundInOtherArray = true;
					break;
				}
			}

			if (!$foundInOtherArray) {
				$diff[] = $row1;
			}
		}

		if (count($diff) > 0) {
			foreach ($diff as $dt) {
				$upd_data[] = json_decode(json_encode($dt), false);
			}
			$new_data = $upd_data;
			echo json_encode($new_data);
		}
    }

    foreach ($rows1 as $data1) {
        $foundInOtherArray = false;

        foreach ($data2_json as $data2) {
            // Compare the data, adjust this condition based on your data structure
            $foundInOtherArray = false;
            if ($data1 == $data2) {
                $foundInOtherArray = true;
                break;
            }
        }

        if (!$foundInOtherArray) {
            $diff[] = $row1;
        }
    }

    if (count($diff) > 0) {
        foreach ($diff as $dt) {
            $upd_data[] = json_decode(json_encode($dt), false);
        }
        $new_data = $upd_data;
        echo json_encode($new_data);
    }

    $data1_json[] = array(
        'gid' => $rowData['GID'],
        'local_emp_id' => $rowData['Local_emp_id'],
        'sfid' => $rowData['SFID'],
        'full_name' => $rowData['Full_name'],
        'job_family' => $rowData['Job_Family'],
        'job_position' => $rowData['Job_Position'],
        'dept' => $rowData['Dept'],
        'job_title' => $rowData['Job_title'],
        'hay_grade' => $rowData['Haygrade'],
        'cc_code' => $rowData['Cost Center'],
        'cc_payroll' => $rowData['Cost Center Payroll'],
        'company' => $rowData['Company'],
        'grouping' => $rowData['Grouping'],
        'dob' => $rowData['DoB'],
        'jog' => $rowData['Jog'],
        'gender' => $rowData['Gender'],
        'eoc' => $rowData['EoC'],
        'contract_status' => $rowData['Contract_Status'],
        'contract_type' => $rowData['Contract_type'],
        'hod1' => $rowData['hod1'],
        'hod1_email' => $rowData['hod1_email'],
        'hod2' => $rowData['hod2'],
        'hod2_email' => $rowData['hod2_email'],
        'hod3' => $rowData['hod3'],
        'hod3_email' => $rowData['hod3_email'],
    );
    
}

public function import_excel()
{
    require_once(APPPATH . '../vendor/autoload.php');

    $excelFilePath = 'document/emp_excel.xlsx';

    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($excelFilePath);

    $worksheet = $spreadsheet->getActiveSheet();

    $columnHeaders = [];
    for ($col = 'A'; $col <= 'Z'; $col++) {
        $cellValue = $worksheet->getCell($col . '1')->getValue();
        if (empty($cellValue)) {
            break;
        }
        $columnHeaders[] = $cellValue;
    }

    for ($row = 2;; $row++) {
        $rowData = [];
        foreach ($columnHeaders as $index => $header) {
            $cellAddress = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($index + 1) . $row;
            $cellValue = $worksheet->getCell($cellAddress)->getValue();

            $rowData[$header] = $cellValue;
        }

        if (empty($rowData[$columnHeaders[0]])) {
            break;
        }

        $data1_json[] = array(
            't_gid' => $rowData['GID'],
            't_local_emp_id' => $rowData['Local_emp_id'],
            't_sfid' => $rowData['SFID'],
            't_full_name' => $rowData['Full_name'],
            't_job_family' => $rowData['Job_Family'],
            't_job_position' => $rowData['Job_Position'],
            't_dept' => $rowData['Dept'],
            't_job_title' => $rowData['Job_title'],
            't_hay_grade' => $rowData['Haygrade'],
            't_cc_code' => $rowData['Cost Center'],
            't_cc_payroll' => $rowData['Cost Center Payroll'],
            't_company' => $rowData['Company'],
            't_grouping' => $rowData['Grouping'],
            't_dob' => $rowData['DoB'],
            't_jog' => $rowData['Jog'],
            't_gender' => $rowData['Gender'],
            't_eoc' => $rowData['EoC'],
            't_contract_status' => $rowData['Contract_Status'],
            't_contract_type' => $rowData['Contract_type'],
            't_hod1' => $rowData['hod1'],
            't_hod1_email' => $rowData['hod1_email'],
            't_hod2' => $rowData['hod2'],
            't_hod2_email' => $rowData['hod2_email'],
            't_hod3' => $rowData['hod3'],
            't_hod3_email' => $rowData['hod3_email'],
        );
    }

    if (!empty($data1_json)) {
        $temporaryTableName = "internal.tb_temp_emp";

        // Insert all the data into the database at once
        $this->db->insert_batch($temporaryTableName, $data1_json);
    }

    $check_diff = $this->db->query('SELECT
        id_scan, emp_nik, qrtoken, emp_name, emp_dept, status, date_rec, time_rec
        FROM temp_table_2
        EXCEPT
        SELECT
            _id_scan, _emp_nik, _qrtoken, _emp_name, _emp_dept, _status, _date_rec, _time_rec
        FROM tb_ex_att;');

    if ($check_diff->num_rows() != 0) {
        $sqlFile = APPPATH . 'sql/compare.sql';
        $sqlCommands = file_get_contents($sqlFile);

        $sqlCommands = explode(';', $sqlCommands);

        foreach ($sqlCommands as $sqlCommand) {
            $sqlCommand = trim($sqlCommand);
            if (!empty($sqlCommand)) {
                $this->db->query($sqlCommand);
            }
        }

        echo "SQL commands executed successfully!";
    } else {
        echo "Difference found or error occurred.";
    }

    $session_id = $this->session->userdata('session');

        if (empty($session_id)) {
            $check_data = $this->Mmanp->check_data_av();
            if ($check_data == 1) {
                $current_create = $this->Mmanp->get_latest_create();
                $latest_create_id = $current_create[0]->latest_create_id;
                $create_id = $latest_create_id + 1;
            } else {
                $create_id = '1';
            }

            $this->session->set_userdata('session', $create_id);

            $sqlFile = APPPATH . 'sql/add_temp.sql';
            $query  = file_get_contents($sqlFile);

            $query = str_replace("{{id_create}}", $create_id, $query);
            $this->db->query($query);

            $data['ptct'] = $this->Mmanp->get_temp_rev_ptct($create_id);
            $data['scn'] = $this->Mmanp->get_temp_rev_scn($create_id);
            $data['sg'] = $this->Mmanp->get_temp_rev_sg($create_id);
        } else {

            $create_id = $this->session->userdata('session');
            $data['ptct'] = $this->Mmanp->get_temp_rev_ptct($create_id);
            $data['scn'] = $this->Mmanp->get_temp_rev_scn($create_id);
            $data['sg'] = $this->Mmanp->get_temp_rev_sg($create_id);
        }
}
