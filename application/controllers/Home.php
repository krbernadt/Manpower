<?php
defined('BASEPATH') or exit('No direct script access allowed');


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends CI_Controller
{

	function __construct()
	{
		date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		$this->load->model('Mdata');
		$this->db->schema = 'internal';
	}

	function index()
	{
		$data['list'] = [];
		$this->load->view('page/index_header_temp', $data);
		$this->load->view('page/company_temp', $data);
		$this->load->view('page/index_footer_temp', $data);
	}

	function person()
	{
		$data['list'] = $this->Mdata->get_person();

		$this->load->view('page/index_header_temp', $data);
		$this->load->view('page/company_temp', $data);
		$this->load->view('page/index_footer_temp', $data);
	}

	function costcenter()
	{
		$data['list'] = [];
		$this->load->view('page/index_header_temp', $data);
		$this->load->view('page/costcenter_temp', $data);
		$this->load->view('page/index_footer_temp', $data);
	}

	function dept()
	{
		$data['list'] = [];
		$this->load->view('page/index_header_temp', $data);
		$this->load->view('page/dept_temp', $data);
		$this->load->view('page/index_footer_temp', $data);
	}

	function grade()
	{
		$data['list'] = [];
		$this->load->view('page/index_header_temp', $data);
		$this->load->view('page/grade_temp', $data);
		$this->load->view('page/index_footer_temp', $data);
	}

	function jabatan()
	{
		$data['list'] = [];
		$this->load->view('page/index_header_temp', $data);
		$this->load->view('page/jabatan_temp', $data);
		$this->load->view('page/index_footer_temp', $data);
	}

	function education()
	{
		$data['list'] = [];
		$this->load->view('page/index_header_temp', $data);
		$this->load->view('page/education_temp', $data);
		$this->load->view('page/index_footer_temp', $data);
	}

	function testIns()
	{
		$api_url = 'https://kevinxcode.com/apps/ocean/api/getattjson';

		// Read JSON file
		$json_data = file_get_contents($api_url);
		$json = json_decode($json_data, true);
		foreach ($json as $val) {
			$id_scan = $val['id_scan'];
			$emp_nik = $val['emp_nik'];
			$qrToken = $val['qrToken'];
			$datetime_rec = $val['datetime_rec'];
			$emp_name = $val['emp_name'];
			$emp_dept = $val['emp_dept'];
			$status = $val['status'];
			$date_rec = $val['date_rec'];
			$time_rec = $val['time_rec'];
			$updated_on = $val['updated_on'];

			$data_out = array( //creating data-out if employee have attendance log before
				'_id_scan' => $id_scan,
				'_emp_nik' => $emp_nik,
				'_qrtoken' => $qrToken,
				'_datetime_rec' => $datetime_rec,
				'_emp_name' => $emp_name,
				'_emp_dept' => $emp_dept,
				'_status' => $status,
				'_date_rec' => $date_rec,
				'_time_rec' => $time_rec,
				'_updated_on' => $updated_on,
			);

			// echo json_encode($data_out);
			$this->db->insert('tb_ex_att', $data_out);
		}
	}

	function attLogExt()
	{
		$api_url = 'https://kevinxcode.com/apps/ocean/api/getattjson';
		$json_data = file_get_contents($api_url);
		if ($json_data != null) {
			$json = json_decode($json_data);

			$data['list'] = $json;

			$this->load->view('page/index_header_temp', $data);
			$this->load->view('page/att_log', $data);
			$this->load->view('page/index_footer_temp', $data);
		}
	}

	function attLog()
	{
		$data['list'] = $this->Mdata->get_ex_data();


		$this->load->view('page/index_header_temp', $data);
		$this->load->view('page/att_log', $data);
		$this->load->view('page/index_footer_temp', $data);
	}


	function attLog2()
	{
		$api_url = 'https://kevinxcode.com/apps/ocean/api/getattjson';
		$json_data = file_get_contents($api_url);
		if ($json_data != null) {
			$json = json_decode($json_data, true);


			$data['list'] = $json;
		}
	}


	public function import_excel()
	{
		require_once(APPPATH . '../vendor/autoload.php');

		$excelFilePath = 'document/test.xlsx';

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
				$cellValue = $worksheet->getCellByColumnAndRow($index + 1, $row)->getValue();
				if ($header == 'date_rec') {
					if (is_numeric($cellValue)) {
						$cellValue = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($cellValue)->format('d-m-Y');
					} else {
						$cellValue = '';
					}
				} elseif ($header == 'time_rec') {
					if (is_numeric($cellValue)) {
						$cellValue = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($cellValue)->format('H:i:s');
					} else {
						$cellValue = '';
					}
				}
				$rowData[$header] = $cellValue;
			}

			if (empty($rowData[$columnHeaders[0]])) {
				break;
			}
			$data1_json = $rowData;
		}

		$temporaryTableName = "temp_table_2";

		$this->db->insert($temporaryTableName, $data1_json);

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
	}
}
