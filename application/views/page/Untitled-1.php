<script>
    function save() {
        var data = {
            rev_year: document.getElementById('year').value,
            rev_no: document.getElementById('rev_no').value,
            rev_start: document.getElementById('start').value,
            rev_end: document.getElementById('end').value,
            rev_status: document.getElementById('status').value,
            hod1_ptct: document.getElementById('hod1_ptct').value,
            hod2_ptct: document.getElementById('hod2_ptct').value,
            hod3_ptct: document.getElementById('hod3_ptct').value,
            start_ptct: document.getElementById('start_ptct').value,
            end_ptct: document.getElementById('end_ptct').value,
            status_ptct: document.getElementById('status_ptct').value,
            hod1_scn: document.getElementById('hod1_scn').value,
            hod2_scn: document.getElementById('hod2_scn').value,
            hod3_scn: document.getElementById('hod3_scn').value,
            start_scn: document.getElementById('start_scn').value,
            end_scn: document.getElementById('end_scn').value,
            status_scn: document.getElementById('status_scn').value,
            hod1_sg: document.getElementById('hod1_sg').value,
            hod2_sg: document.getElementById('hod2_sg').value,
            hod3_sg: document.getElementById('hod3_sg').value,
            start_sg: document.getElementById('start_sg').value,
            end_sg: document.getElementById('end_sg').value,
            status_sg: document.getElementById('status_sg').value,
        }


        $.ajax({
            url: '<?php echo prefix_url; ?>app/add_rev_dat',
            type: 'POST',
            data: data,
            success: function(response) {

            }
        });
    }

    function set_local() {
        document.getElementById('year').classList.add('select-disabled');
        document.getElementById('rev_no').classList.add('select-disabled');
    }

    function setDisabledStateInLocalStorage() {

        localStorage.setItem('year_disabled', 'true');
        localStorage.setItem('rev_no_disabled', 'true');

    }

    function applyDisabledStateFromLocalStorage() {
        if (localStorage.getItem('year_disabled') === 'true') {
            document.getElementById('year').classList.add('select-disabled');
        }
        if (localStorage.getItem('rev_no_disabled') === 'true') {
            document.getElementById('rev_no').classList.add('select-disabled');
        }
    }
</script>