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
                    <div class="col" style="padding-top: 4px;">
                        <label for="yearFilter">Year </label>
                        &nbsp;
                        <select id="yearFilter" style="border: solid; border-width: 1px; border-radius:10px; width: 7%;padding: 3px">
                            <option value="">All</option>
                        </select>
                        &nbsp;&nbsp;&nbsp;
                        <label for="revFilter">Rev No</label>
                        &nbsp;
                        <select id="revFilter" style="border: solid; border-width: 1px; border-radius:10px; width: 7%;padding: 3px">
                            <option value="">All</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <button onclick="add_mpp()" class="btn btn-primary btn-sm">Create</button>
                    </div>
                </div>
                <div class="tab-content">

                    <!--begin::Tab pane-->
                    <div id="kt_project_users_card_pane" class="tab-pane fade show active">
                        <!--begin::Row-->
                        <div class="row g-6 g-xl-9">
                            <!--begin::Col-->
                            <div class="col-md-12 col-xxl-12" style="overflow-x: auto;">
                                <table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                    <thead>

                                        <tr class="fw-bold fs-6 text-gray-800 px-7" style="text-align: center;">
                                            <th>No</th>
                                            <th>Year</th>
                                            <th>Entity</th>
                                            <th>Rev No</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                            <th>HOD1</th>
                                            <th>HOD1 Due Date </th>
                                            <th>HOD2</th>
                                            <th>HOD2 Due Date</th>
                                            <th>HOD3</th>
                                            <th>HOD3 Due Date</th>
                                            <th>Modified by</th>
                                            <th>Modified date</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($mmp_dat as $dt) : ?>
                                            <tr style="text-align: center;">
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $dt->year; ?></td>
                                                <td><?php echo $dt->ent; ?></td>
                                                <td><?php echo $dt->rev_no; ?></td>
                                                <td><?php echo $dt->start; ?></td>
                                                <td><?php echo $dt->end; ?></td>
                                                <td><?php echo $dt->rev_status; ?></td>
                                                <td>
                                                    <?php if ($dt->hod1_status == 1) : ?> <i class="fa fa-check" style="font-size:24px; color:green"></i>
                                                    <?php else : ?><i class="fa fa-close" style="font-size:24px; color: red"></i>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo $dt->hod1_end; ?></td>
                                                <td>
                                                    <?php if ($dt->hod2_status == 1) : ?> <i class="fa fa-check" style="font-size:24px; color:green"></i>
                                                    <?php else : ?><i class="fa fa-close" style="font-size:24px; color: red"></i>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo $dt->hod2_end; ?></td>
                                                <td>
                                                    <?php if ($dt->hod3_status == 1) : ?> <i class="fa fa-check" style="font-size:24px; color:green"></i>
                                                    <?php else : ?><i class="fa fa-close" style="font-size:24px; color: red"></i>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo $dt->hod3_end; ?></td>
                                                <td><?php echo $dt->modified_by; ?></td>
                                                <td><?php echo $dt->modified_date; ?></td>
                                                <td>
                                                    <span onclick="" class="btn btn-warning btn-sm">EDIT</span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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

                                    function add_mpp() {
                                        localStorage.clear();
                                        window.location.href = '<?php echo prefix_url; ?>app/add_mpp';
                                    }

                                    $(document).ready(function() {
                                        var originalData = <?php echo json_encode($mmp_dat); ?>;

                                        populateDropdown("yearFilter", "year");
                                        populateDropdown("revFilter", "rev_no");

                                        $("#yearFilter").change(function() {
                                            filterData();
                                        });

                                        $("#revFilter").change(function() {
                                            filterData();
                                        });

                                        renderTable(originalData);

                                        function renderTable(data) {
                                            var tableBody = $("tbody");

                                            tableBody.empty();

                                            var i = 1;
                                            data.forEach(function(dt) {
                                                var row = $("<tr style='text-align: center;'></tr>");
                                                row.append("<td>" + i++ + "</td>");
                                                row.append("<td>" + dt.year + "</td>");
                                                row.append("<td>" + dt.ent + "</td>");
                                                row.append("<td>" + dt.rev_no + "</td>");
                                                row.append("<td>" + dt.start + "</td>");
                                                row.append("<td>" + dt.end + "</td>");
                                                row.append("<td>" + dt.rev_status + "</td>");
                                                appendStatusColumn(row, dt.hod1_status);
                                                row.append("<td>" + dt.hod1_end + "</td>");
                                                appendStatusColumn(row, dt.hod2_status);
                                                row.append("<td>" + dt.hod2_end + "</td>");
                                                appendStatusColumn(row, dt.hod3_status);
                                                row.append("<td>" + dt.hod3_end + "</td>");
                                                row.append("<td>" + dt.modified_by + "</td>");
                                                row.append("<td>" + dt.modified_date + "</td>");
                                                row.append("<td><span onclick='' class='btn btn-warning btn-sm'>EDIT</span></td>");

                                                tableBody.append(row);
                                            });
                                        }

                                        function appendStatusColumn(row, status) {
                                            var statusColumn = $("<td></td>");

                                            if (status == 1) {
                                                statusColumn.append("<i class='fa fa-check' style='font-size:24px; color:green'></i>");
                                            } else {
                                                statusColumn.append("<i class='fa fa-close' style='font-size:24px; color:red'></i>");
                                            }

                                            row.append(statusColumn);
                                        }

                                        function filterData() {
                                            var selectedYear = $("#yearFilter").val();
                                            var selectedRevNo = $("#revFilter").val();

                                            var filteredData = originalData;

                                            if (selectedYear !== "") {
                                                filteredData = filteredData.filter(function(dt) {
                                                    return dt.year == selectedYear;
                                                });
                                            }

                                            if (selectedRevNo !== "") {
                                                filteredData = filteredData.filter(function(dt) {
                                                    return dt.rev_no == selectedRevNo;
                                                });
                                            }
                                            renderTable(filteredData);
                                        }

                                        function populateDropdown(dropdownId, fieldName) {
                                            var uniqueValues = Array.from(new Set(originalData.map(dt => dt[fieldName])));

                                            $("#" + dropdownId).empty();
                                            $("#" + dropdownId).append("<option value=''>All</option>");

                                            uniqueValues.forEach(function(value) {
                                                $("#" + dropdownId).append("<option value='" + value + "'>" + value + "</option>");
                                            });
                                        }
                                    });
                                </script>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_title">Submit Excel</h5>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon fs-2x"></span>
                </div>
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