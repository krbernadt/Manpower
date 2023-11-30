<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Navbar-->
        <div class="card mb-8">
            <div class="card-body pt-9 pb-0">

                <!--end::Navbar-->
                <!--begin::Toolbar-->
                <div class="mb-3 row">
                    <div class="col">
                        <label for="filterFullName" class="form-label">NAME :</label>&nbsp;
                        <input type="text" class="form" id="filterFullName">&nbsp;
                        <label for="statusFilter">Employee Status Filter :</label>&nbsp;
                        <select id="statusFilter" style="border: solid; border-width: 1px; border-radius: 10px; width: 7%; padding: 3px">
                            <option value="all">All</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <span class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_1">Sync</span>
                    </div>
                </div>
                <!--end::Toolbar-->
                <!--begin::Tab Content-->
                <div class="tab-content">

                    <!--begin::Tab pane-->
                    <div id="kt_project_users_card_pane" class="tab-pane fade show active">
                        <!--begin::Row-->
                        <div class="row g-6 g-xl-9">
                            <!--begin::Col-->
                            <div class="col-md-12 col-xxl-12" style="overflow-x: auto;">
                                <!--begin::Card-->



                                <table id="kt_datatable_dom_positioning" class="table table-paginate table-striped table-row-bordered gy-5 gs-7 border rounded">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800 px-7" style="text-align: center;">
                                            <th>No</th>
                                            <th>GID</th>
                                            <th>NIK</th>
                                            <th>SFID</th>
                                            <th>Full Name</th>
                                            <th>Job Family</th>
                                            <th>Job title</th>
                                            <th>Dept</th>
                                            <th>Job Position</th>
                                            <th>Grade</th>
                                            <th>Status</th>
                                            <th>CC</th>
                                            <th>CC Payroll</th>
                                            <th>JoG</th>
                                            <th>EoC</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($list as $dt) : ?>
                                            <tr style="text-align: center;">
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $dt->gid; ?></td>
                                                <td><?php echo $dt->local_emp_id; ?></td>
                                                <td><?php echo $dt->sfid; ?></td>
                                                <td><?php echo $dt->full_name; ?></td>
                                                <td><?php echo $dt->job_family; ?></td>
                                                <td><?php echo $dt->job_title; ?></td>
                                                <td><?php echo $dt->dept; ?></td>
                                                <td><?php echo $dt->job_position; ?></td>
                                                <td><?php echo $dt->hay_grade; ?></td>
                                                <td><?php echo $dt->contract_status; ?></td>
                                                <td><?php echo $dt->cc_code; ?></td>
                                                <td><?php echo $dt->cc_payroll; ?></td>
                                                <td><?php echo $dt->jog; ?></td>
                                                <td><?php echo $dt->eoc; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                                <script>
                                    function editCompany(company_token) {
                                        $("#modal_body_edit").html('Loading...');
                                        $('#modal_title_edit').html('Edit');
                                        $.ajax({
                                            url: '<?php echo prefix_url; ?>html/editCompany',
                                            method: 'post',
                                            data: {
                                                company_token: company_token
                                            },
                                            dataType: "html",
                                            success: function(data) {
                                                $("#modal_body_edit").html(data);
                                            },
                                            error: function(data) {
                                                console.log(JSON.stringify(data));
                                                errorAlert(data.statusText);
                                            },
                                        });

                                    }

                                    function submitExcel() {
                                        var confirmed = confirm('Are you sure you want to sync?');

                                        if (confirmed) {
                                            // Get the uploaded file
                                            var fileInput = document.getElementById('excel_file');
                                            var file = fileInput.files[0];

                                            if (file) {
                                                // Disable user interactions
                                                $('input[type="file"]').prop('disabled', true);

                                                // Add a loading overlay
                                                $('body').append('<div class="loading-overlay">Loading...</div>');

                                                // Send an AJAX request to your server
                                                var formData = new FormData();
                                                formData.append('excel_file', file);

                                                $.ajax({
                                                    url: '<?php echo prefix_url; ?>app/upload_excel',
                                                    type: 'POST',
                                                    data: formData,
                                                    processData: false,
                                                    contentType: false,
                                                    success: function(response) {
                                                        // Remove loading overlay
                                                        $('.loading-overlay').remove();

                                                        var data = JSON.parse(response);
                                                        console.log(data.msg);

                                                        if (data.msg === 'clear') {
                                                            alert('Data cleared.');
                                                            $('#kt_modal_1').modal('hide');
                                                        } else {
                                                            alert('Update count: ' + data.update + '\nNew data count: ' + data.new_dat);
                                                            window.location.reload()
                                                        }

                                                        // Re-enable user interactions
                                                        $('input[type="file"]').prop('disabled', false);
                                                    },
                                                    error: function(error) {
                                                        console.error('Error syncing data:', error);

                                                        // Remove loading overlay
                                                        $('.loading-overlay').remove();

                                                        // Re-enable user interactions
                                                        $('input[type="file"]').prop('disabled', false);
                                                    }
                                                });
                                            } else {
                                                alert('Please select a file.');
                                            }
                                        }
                                    }


                                    $(document).ready(function() {
                                        var statusFilter = document.getElementById('statusFilter');
                                        var rows = document.querySelectorAll('#kt_datatable_dom_positioning tbody tr');

                                        $('#filterFullName').on('input', function() {
                                            var searchTerm = $(this).val().toLowerCase();

                                            rows.forEach(function(row) {
                                                var nameCell = row.cells[4]; // Assuming full_name is the 5th cell (index 4)
                                                var statusCell = row.cells[10]; // Assuming contract_status is the 11th cell (index 10)

                                                var nameMatch = nameCell.textContent.toLowerCase().indexOf(searchTerm) > -1;
                                                var statusMatch = statusFilter.value === 'all' ||
                                                    (statusFilter.value === 'active' && (statusCell.textContent === 'P' || statusCell.textContent === 'C')) ||
                                                    (statusFilter.value === 'inactive' && statusCell.textContent === 'I');

                                                row.style.display = nameMatch && statusMatch ? '' : 'none';
                                            });
                                        });

                                        statusFilter.addEventListener('change', function() {
                                            var selectedStatus = statusFilter.value;

                                            rows.forEach(function(row) {
                                                var nameCell = row.cells[4]; // Assuming full_name is the 5th cell (index 4)
                                                var statusCell = row.cells[10]; // Assuming contract_status is the 11th cell (index 10)

                                                var nameMatch = nameCell.textContent.toLowerCase().indexOf($('#filterFullName').val().toLowerCase()) > -1;
                                                var statusMatch = selectedStatus === 'all' ||
                                                    (selectedStatus === 'active' && (statusCell.textContent === 'P' || statusCell.textContent === 'C')) ||
                                                    (selectedStatus === 'inactive' && statusCell.textContent === 'I');

                                                row.style.display = nameMatch && statusMatch ? '' : 'none';
                                            });
                                        });
                                    });
                                </script>
                                <script>
                                    $(document).ready(function() {
                                        $('#kt_datatable_dom_positioning').DataTable();
                                        $('.dataTables_length').addClass('bs-select');
                                    });
                                </script>
                                <!--end::Card-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->

                    </div>
                    <!--end::Tab pane-->

                </div>
                <!--end::Tab Content-->
                <!--begin::Modals-->


                <!--end::Modals-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Content-->
    </div>
</div>


<!--begin::Modal-->
<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_title">Submit Excel</h5>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon fs-2x"></span>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body" id="modal_body">
                <div class="d-flex flex-column mb-6">
                    <label for="excel_file" class="form-label">Browse File :</label>
                    <input type="file" name="excel_file" id="excel_file" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button onclick="submitExcel()" type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->