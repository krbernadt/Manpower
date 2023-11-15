<?php
defined('BASEPATH') or exit('No direct script access allowed');

class test extends CI_Controller
{

    // $data2_json[] = array(
    // 'id_scan' => $id_scan,
    // 'details' => $data
    // );

    // $diff = array();
    // foreach ($data1_json as $row1) {
    // $found = false;
    // foreach ($data2_json as $row2) {
    // if ($row1['id_scan'] == $row2['id_scan']) {
    // $result_array = array_diff($row1, $row2);
    // if (empty($result_array)) {
    // } else {
    // $diff[] = $row1;
    // print_r($diff);
    // // $diff[] = $row1;
    // }
    // }
    // }
    // }

    // foreach ($data2_json as $row2) {
    // print_r($row2['id_scan'], $row2['details'] . "\n");
    // }
    // comparing data
    // $diff = array();
    // foreach ($data1_json as $row1) {
    // $found = false;
    // foreach ($data2_json as $row2) {
    // if ($row1['id_scan'] == $row2['id_scan']) {
    // $found = true;
    // print_r($row1);
    // break;
    // }
    // }
    // if (!$found) {
    // $diff[] = $row1;
    // }
    // }

    // $diff = array();
    // foreach ($data1_json as $row1) {
    // $found = false;
    // foreach ($data2_json as $row2) {
    // $result_array = array_diff($row1, $row2);
    // if (empty($result_array[0])) {
    // print_r($row1['emp_nik']);
    // } else {
    // echo "they are differents";
    // }
    // }
    // if (!$found) {
    // $diff[] = $row1;
    // }
    // }

    // foreach ($data2_json as $row2) {
    // $found = false;
    // foreach ($data1_json as $row1) {
    // if ($row2 == $row1) {
    // $found = true;
    // break;
    // }
    // }
    // if (!$found) {
    // $diff[] = $row2;
    // }
    // }
    // $anomaly = count($diff) + count($diff2);
}
// {

//     <!--begin::Modal-->
//     <div class="modal fade" tabindex="-1" id="kt_modal_1_edit">
//         <div class="modal-dialog modal-lg">
//             <div class="modal-content">
//                 <div class="modal-header">
//                     <h5 class="modal-title" id="modal_title_edit">Create Company</h5>
//                     <!--begin::Close-->
//                     <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
//                         <span class="svg-icon fs-2x"></span>
//                     </div>
//                     <!--end::Close-->
//                 </div>
//                 <div class="modal-body" id="modal_body_edit">


//                 </div>
//                 <div class="modal-footer">
//                     <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>

//                 </div>
//             </div>
//         </div>
//     </div>
//     <!--end::Modal-->




//     <!--begin::Modal-->
//     <div class="modal fade" tabindex="-1" id="kt_modal_1">
//         <div class="modal-dialog modal-lg">
//             <div class="modal-content">
//                 <div class="modal-header">
//                     <h5 class="modal-title" id="modal_title">Create Company</h5>
//                     <!--begin::Close-->
//                     <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
//                         <span class="svg-icon fs-2x"></span>
//                     </div>
//                     <!--end::Close-->
//                 </div>
//                 <div class="modal-body" id="modal_body">
//                     <form class="form w-100" novalidate="novalidate" method="POST" action="<?php echo prefix_url; 
?>app/setting/addCompany">
// <table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
    // <thead>
        // <tr class="fw-bold fs-6 text-gray-800 px-7">
            // <th>No</th>
            // <th>id_scan</th>
            // <th>emp_nik</th>
            // <th>QR-Token</th>
            // <th>Datetime Rec</th>
            // <th>Name</th>
            // <th>Department</th>
            // <th>Status</th>
            // <th>Date Rec</th>
            // <th>Time Rec</th>
            // <th>Action</th>
            // </tr>
        // </thead>
    // <tbody>
        // <?php $i = 1; ?>
        // <?php foreach ($list as $dt) : ?>
            // <tr>
                // <td><?php echo $i++; ?></td>
                // <td><?php echo $dt->_id_scan; ?></td>
                // <td><?php echo $dt->_emp_nik; ?></td>
                // <td><?php echo $dt->_qrtoken; ?></td>
                // <td><?php echo $dt->_datetime_rec; ?></td>
                // <td><?php echo $dt->_emp_name; ?></td>
                // <td><?php echo $dt->_emp_dept; ?></td>

                // <td>
                    // <?php if ($dt->_status == 1) : ?><?php echo "IN" ?>
                    // <?php else : ?><?php echo "OUT"; ?>
                    // <?php endif; ?>
                // </td>
                // <td><?php echo $dt->_date_rec; ?></td>
                // <td><?php echo $dt->_time_rec; ?></td>
                // <td><span onclick="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_1_edit">EDIT</span></td>
                // </tr>
            // <?php endforeach; ?>
        // </tbody>
    // </table>
// <div class="modal-footer">
    // <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
    // <button type="submit" class="btn btn-primary">Save changes</button>
    // </form>
    // </div>
// </div>
// </div>
// </div>


// <!--end::Modal-->
}