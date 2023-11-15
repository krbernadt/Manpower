<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Navbar-->
        <div class="card mb-8">
            <div class="card-body pt-9 pb-0">

                <!--end::Navbar-->


                <!--begin::Toolbar-->
                <div class="flex-wrap flex-stack pb-7">
                    <!--begin::Title-->

                    <!--end::Toolbar-->
                    <!--begin::Tab Content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div id="kt_project_users_card_pane" class="tab-pane fade show active" style="margin-top: 2%;">
                            <!--begin::Row-->
                            <div class="row g-6 g-xl-12">
                                <!--begin::Col-->
                                <div class="col-md-12 col-xxl-12">
                                    <!--begin::Card-->
                                    <label for="yearFilter">Filter by Year:</label>
                                    <select id="yearFilter" style="border: solid; border-width: 1px; border-radius:10px; width: 7%;padding: 3px">
                                        <option value="">All</option>
                                    </select>
                                </div>

                                <div class="col-md-12 col-xxl-12 text-end">
                                    <!--begin::Card-->
                                    <a href="<?php echo prefix_url; ?>app/add_rev" class="btn btn-primary btn-sm">ADD</a>
                                </div>

                                <table id="kt_datatable" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">

                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800 px-7 text-center">
                                            <th>Year</th>
                                            <th>Rev No</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                            <th>Last Modified</th>
                                            <th>Modified By</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($list as $dt) : ?>
                                            <tr class="text-center" style="word-wrap: break-word;">
                                                <td><?php echo $dt->year; ?></td>
                                                <td><?php echo $dt->rev_no; ?></td>
                                                <td><?php echo $dt->date_start; ?></td>
                                                <td><?php echo $dt->date_end; ?></td>
                                                <td><?php echo $dt->status; ?></td>
                                                <td><?php echo $dt->modified_date; ?></td>
                                                <td>
                                                    <?php echo $dt->modified_by; ?>
                                                </td>
                                                <td>
                                                    <span onclick="edit_rev_sch('<?php echo $dt->rev_id; ?>')" class="btn btn-warning btn-sm">EDIT</span>
                                                    <span onclick="delRev('<?php echo $dt->rev_id; ?>')" class="btn btn-danger btn-sm">DELETE</span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>

                                <script>
                                    function edit_rev_sch(rev_id) {
                                        // Create a form element
                                        var form = document.createElement('form');
                                        form.method = 'POST';
                                        form.action = '<?php echo prefix_url; ?>app/edit_rev';

                                        // Create a hidden input field for the rev_id
                                        var input = document.createElement('input');
                                        input.type = 'hidden';
                                        input.name = 'rev_id';
                                        input.value = rev_id;

                                        // Append the input field to the form
                                        form.appendChild(input);

                                        // Append the form to the document and submit it
                                        document.body.appendChild(form);
                                        form.submit();
                                    }

                                    function add_rev_sch() {
                                        // Create a form element
                                        var form = document.createElement('form');
                                        form.method = 'POST';
                                        form.action = '<?php echo prefix_url; ?>app/edit_rev';

                                        // Create a hidden input field for the rev_id
                                        var input = document.createElement('input');
                                        input.type = 'hidden';
                                        input.name = 'rev_id';
                                        input.value = rev_id;

                                        // Append the input field to the form
                                        form.appendChild(input);

                                        // Append the form to the document and submit it
                                        document.body.appendChild(form);
                                        form.submit();
                                    }

                                    function delRev(rev_id) {
                                        if (confirm('Delete the Data ?')) {
                                            $.ajax({
                                                url: '<?php echo prefix_url; ?>app/del_rev',
                                                method: 'post',
                                                data: {
                                                    rev_id: rev_id
                                                },
                                                dataType: 'html',
                                                success: function(data) {
                                                    setTimeout(
                                                        function() {
                                                            window.location.href = '<?php echo prefix_url; ?>app';
                                                        }, 1800);
                                                }
                                            });
                                        }

                                    }
                                </script>

                                <script>
                                    $(document).ready(function() {
                                        // Get the table rows
                                        var rows = $("#kt_datatable tbody tr");

                                        // Populate the dropdown with unique years from the table
                                        var uniqueYears = [];
                                        rows.each(function() {
                                            var yearColumn = $(this).find("td:first-child").text();
                                            if (yearColumn !== "") {
                                                if (!uniqueYears.includes(yearColumn)) {
                                                    uniqueYears.push(yearColumn);
                                                    $("#yearFilter").append("<option value='" + yearColumn + "'>" + yearColumn + "</option>");
                                                }
                                            }
                                        });

                                        // When the year filter changes
                                        $("#yearFilter").change(function() {
                                            var selectedYear = $(this).val();

                                            // Show all rows if no year is selected
                                            if (selectedYear === "") {
                                                rows.show();
                                                return;
                                            }

                                            // Hide rows that don't match the selected year
                                            rows.hide();
                                            rows.each(function() {
                                                var yearColumn = $(this).find("td:first-child").text();
                                                if (yearColumn === selectedYear) {
                                                    $(this).show();
                                                }
                                            });
                                        });
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