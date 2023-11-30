<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use SebastianBergmann\Environment\Console;

class App extends CI_Controller
{

    function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Mmanp');
        $this->load->library('session');
    }

    function index()
    {
        $this->session->unset_userdata('session');
        $data['current_page'] = 'Revision Schedule';
        $data['list'] = $this->Mmanp->get_rev();
        $this->load->view('page/index_header_temp', $data);
        $this->load->view('page/rev_sch', $data);
        $this->load->view('page/index_footer_temp', $data);
    }

    function employee()
    {
        $data['list'] = $this->Mmanp->get_employee();
        $data['current_page'] = 'Employee';
        $this->load->view('page/index_header_temp', $data);
        $this->load->view('page/employee', $data);
        $this->load->view('page/index_footer_temp', $data);
    }

    function add_rev()
    {
        $data['rev_dat'] = $this->Mmanp->get_temp_rev_dat();
        $data['current_page'] = 'Add Revision';
        $this->load->view('page/index_header_temp', $data);
        $this->load->view('page/add_rev', $data);
        $this->load->view('page/index_footer_temp');
    }

    function mpp()
    {
        $sqlFile = APPPATH . 'sql/process.sql';
        $sqlCommands = file_get_contents($sqlFile);

        $data['mmp_dat'] = $this->db->query($sqlCommands)->result();
        $data['current_page'] = 'Manpower Planning';
        $this->load->view('page/index_header_temp', $data);
        $this->load->view('page/mpp_view', $data);
        $this->load->view('page/index_footer_temp');
    }

    function add_mpp()
    {
        $data['mmp_plan'] = $this->Mmanp->get_manpower();
        $data['mmp_add'] = $this->Mmanp->get_mpp_rev();

        $data['current_page'] = 'Add Manpower';

        $this->load->view('page/index_header_temp', $data,);
        $this->load->view('page/mpp_add', $data);
        $this->load->view('page/index_footer_temp');
    }

    function mpp_edit()
    {

        $edit_year = $this->input->post('edit_year');
        $edit_ent = $this->input->post('edit_ent');
        $edit_rev_no = $this->input->post('edit_rev_no');

        if (!empty($edit_year) && !empty($edit_ent) && !empty($edit_rev_no)) {
            $data['edit_mmp'] = $this->Mmanp->get_edit_mpp($edit_year, $edit_ent,  $edit_rev_no);
            $data['current_page'] = 'Edit Manpower';

            $this->load->view('page/index_header_temp', $data);
            $this->load->view('page/mpp_edit', $data);
            $this->load->view('page/index_footer_temp', $data);
        } else {
            echo 'ERROR 404';
        }
    }

    function edit_rev()
    {
        $rev_id = $this->input->post('rev_id', TRUE);
        $data['current_page'] = 'Edit Revision';

        if (!empty($rev_id)) {
            $data['rev_sch'] = $this->Mmanp->get_rev_sch($rev_id);
            $data['priv_rev'] = $this->Mmanp->get_priv_rev($rev_id);

            $this->load->view('page/index_header_temp', $data);
            $this->load->view('page/edit_rev_sch', $data);
            $this->load->view('page/index_footer_temp', $data);
        } else {
            echo 'ERROR 404';
        }
    }

    //command api

    public function upload_excel()
    {
        $config['upload_path']   = './document/'; // Set your desired upload path
        $config['allowed_types'] = 'xlsx|xls';   // Allow Excel file types
        $config['max_size']      = 2048;        // Maximum file size in kilobytes (2MB in this case)

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('excel_file')) {
            $error = $this->upload->display_errors();
            echo json_encode($error);
        } else {
            $upload_data = $this->upload->data();
            $originalFileName = $upload_data['file_name']; // Get the original file name
            $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
            $newFileName = uniqid() . '.' . $fileExtension;
            $excelFilePath = $upload_data['file_path'] . $newFileName;

            // Rename the uploaded file
            rename($upload_data['full_path'], $excelFilePath);

            require_once(APPPATH . '../vendor/autoload.php');

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

            $check_diff = $this->db->query('SELECT t_gid, t_local_emp_id, t_sfid, t_full_name, t_job_family, t_job_position, t_dept, t_job_title, t_hay_grade, t_cc_code, t_cc_payroll, t_company, t_grouping, t_dob, t_jog, t_gender, t_eoc, t_contract_status, t_contract_type, t_hod1, t_hod1_email, t_hod2, t_hod2_email, t_hod3, t_hod3_email  FROM internal.tb_temp_emp EXCEPT SELECT gid, local_emp_id, sfid, full_name, job_family, job_position, dept, job_title, hay_grade, cc_code, cc_payroll, company, "grouping", dob, jog, gender, eoc, contract_status, contract_type, hod1, hod1_email, hod2, hod2_email, hod3, hod3_email  FROM internal.tbm_emp');
            $result = $check_diff->result_array();

            $existing_count = 0;
            $non_existing_count = 0;

            foreach ($result as $row) {
                $gid = $row['t_gid'];

                $query2 = $this->db->query("SELECT COUNT(*) as count FROM internal.tbm_emp WHERE gid = '$gid'");
                $query_result = $query2->row_array();

                if ($query_result['count'] > 0) {
                    $existing_count++;
                } else {
                    $non_existing_count++;
                }
            }

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
                $data_sent = array(
                    "msg" => "not",
                    "update" => $existing_count,
                    "new_dat" => $non_existing_count,
                );

                $this->db->truncate('internal.tb_temp_emp');
            } else {
                $data_sent = array(
                    "msg" => "clear"
                );
                $this->db->truncate('internal.tb_temp_emp');
            }
            unlink($excelFilePath);
            echo json_encode($data_sent);
        }
    }


    function add_rev_dat()
    {
        $rev_data = $_POST['rev_data'];
        $rev_sch = $_POST['rev_sch'];

        $data1 = array(
            'year' => $rev_data['rev_year'],
            'rev_no' => $rev_data['rev_no'],
            'date_start' => $rev_data['rev_start'],
            'date_end' => $rev_data['rev_end'],
            'status' => $rev_data['rev_status'],
            'created_by' => 'admin',
            'created_date' => date('Y-m-d H:i:s'),
            'modified_by' => 'admin',
            'modified_date' => date('Y-m-d H:i:s'),
            'is_dlt' => '0'
        );

        $rev_add = $this->db->insert('internal.tbm_rev', $data1);
        if ($rev_add) {
            $rev_id = $this->db->insert_id();

            foreach ($rev_sch as $row2) {
                $data2 = array(
                    'rev_id' => $rev_id,
                    'hod1' => $row2['hod1'],
                    'hod2' => $row2['hod2'],
                    'hod3' => $row2['hod3'],
                    'start' => $row2['start'],
                    'end' => $row2['end'],
                    'status' => $row2['status'],
                    'created_by' => 'admin',
                    'created_date' => date('Y-m-d H:i:s'),
                    'modified_by' => 'admin',
                    'modified_date' => date('Y-m-d H:i:s'),
                    'is_dlt' => '0',
                    'ent' => $row2['ent']
                );
                $rev_sch_add = $this->db->insert('internal.tbm_rev_sch', $data2);
                if ($rev_sch_add) {
                    $resp = array(
                        'msg' => 'true'
                    );
                } else {
                    $resp = array(
                        'msg' => 'false-1'
                    );
                }
            }
        } else {
            $resp = array(
                'msg' => 'false-2'
            );
        }
        echo json_encode($resp);
    }

    function del_rev()
    {
        $rev_id = $this->input->post('rev_id', TRUE);
        $sql = "UPDATE internal.tbm_rev SET is_dlt = '1' WHERE rev_id='$rev_id' ";
        $sql2 = "UPDATE internal.tbm_rev_sch SET is_dlt = '1' WHERE rev_id='$rev_id' ";
        $this->db->query($sql);
        $this->db->query($sql2);
    }

    function addRevSch()
    {
        $temp_rev_id = $this->input->post('temp_rev_id', TRUE);
        $start = $this->input->post('start', TRUE);
        $end = $this->input->post('end', TRUE);
        $status = $this->input->post('status', TRUE);

        $data = array(
            'start' => $start,
            'end' => $end,
            'status' => $status,
        );
        $this->db->where('temp_rev_id', $temp_rev_id);
        $this->db->update('internal.tbt_rev_sch', $data);
    }

    function editRevSch()
    {

        $rev_sch_id = $this->input->post('rev_sch_id_edit', TRUE);
        $start = $this->input->post('start_edit', TRUE);
        $end = $this->input->post('end_edit', TRUE);
        $status = $this->input->post('status_edit', TRUE);

        $data = array(
            'start' => $start,
            'end' => $end,
            'status' => $status,
        );

        $this->db->where('rev_sch_id', $rev_sch_id);
        $update_dat = $this->db->update('internal.tbm_rev_sch', $data);


        if ($update_dat === true) {
            $data_resp = array(
                'msg' => 'true',
            );
        } else {
            $data_resp = array(
                'msg' => 'false',
            );
        }
        echo json_encode($data_resp);
    }

    function submit_rev_sch()
    {
        $rev_data = $_POST['rev_data'];
        $rev_id = $rev_data['rev_id'];

        $data1 = array(
            'year' => $rev_data['rev_year'],
            'rev_no' => $rev_data['rev_no'],
            'date_start' => $rev_data['rev_start'],
            'date_end' => $rev_data['rev_end'],
            'status' => $rev_data['rev_status'],
            'modified_by' => 'admin',
            'modified_date' => date('Y-m-d H:i:s'),
        );

        $this->db->where('rev_id', $rev_id);
        $rev_update = $this->db->update('internal.tbm_rev', $data1);

        if ($rev_update === true) {
            $data_resp = array(
                'msg' => 'true',
            );
        } else {
            $data_resp = array(
                'msg' => 'false',
            );
        }
        echo json_encode($data_resp);
    }

    function submit_emp_mpp()
    {
        $emp_mpp = $_POST['emp_mpp'];

        $data1 = array(
            'rev_id' => $emp_mpp['rev_id'],
            'gid' => $emp_mpp['gid'],
            'local_emp_id' => $emp_mpp['local_emp_id'],
            'sfid' => $emp_mpp['sfid'],
            'position_no' => $emp_mpp['position_no'],
            'full_name' => $emp_mpp['full_name'],
            'job_family' => $emp_mpp['job_family'],
            'job_title' => $emp_mpp['job_title'],
            'dept' => $emp_mpp['dept'],
            'job_position' => $emp_mpp['job_position'],
            'hay_grade' => $emp_mpp['hay_grade'],
            'company' => $emp_mpp['company'],
            'cc_code' => $emp_mpp['cc_code'],
            'cc_payroll_code' => $emp_mpp['cc_payroll_code'],
            'grouping' => $emp_mpp['grouping'],
            'start' => $emp_mpp['start'],
            'end' => $emp_mpp['end'],
            'remark' => $emp_mpp['remark'],
            'notes' => $emp_mpp['notes'],
            'year' => $emp_mpp['rev_year'],
            'ent' => $emp_mpp['ent'],
            'is_dlt' => '0',
            'rev_no' => $emp_mpp['rev_no'],
            'created_by' => 'admin',
            'created_date' => date('Y-m-d H:i:s')
        );

        $add_tb_m_planning = $this->db->insert('internal.tb_m_planning', $data1);

        if ($add_tb_m_planning) {
            $resp = array(
                'msg' => 'true'
            );
        } else {
            $resp = array(
                'msg' => 'false-1'
            );
        }
        echo json_encode($resp);
    }
}
