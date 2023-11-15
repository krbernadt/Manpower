WITH combined_data AS (
    SELECT 
        internal.tbm_rev_sch.*, 
        internal.tbm_rev.year,
        internal.tbm_rev.date_start,
        internal.tbm_rev.date_end,
	    internal.tbm_rev.status as rev_status
    FROM 
        internal.tbm_rev_sch 
    INNER JOIN 
        internal.tbm_rev ON internal.tbm_rev_sch.rev_id = internal.tbm_rev.rev_id
)

SELECT 
    DISTINCT ON (internal.tb_m_planning.year, internal.tb_m_planning.ent)
    internal.tb_m_planning.rev_id,
    internal.tb_m_planning.year, 
    internal.tb_m_planning.ent, 
    internal.tb_m_planning.rev_no, 
	timeline_data.rev_status,
    timeline_data.start,
    timeline_data.end,
    hod1_data.hod1_status, 
    hod1_data.hod1_end, 
    hod2_data.hod2_status, 
    hod2_data.hod2_end, 
    hod3_data.hod3_status, 
    hod3_data.hod3_end,
    internal.tb_m_planning.modified_by,
    internal.tb_m_planning.modified_date
FROM 
    internal.tb_m_planning
LEFT JOIN 
    (
        SELECT 
            DISTINCT ON (combined_data.rev_id, internal.tb_m_planning.ent)
            combined_data.date_start as start,
            combined_data.date_end as end,
		    combined_data.rev_status as rev_status,
            combined_data.rev_id
        FROM 
            combined_data
        INNER JOIN
            internal.tb_m_planning ON combined_data.year = internal.tb_m_planning.year
        WHERE 
            combined_data.hod1 = '1' 
    ) AS timeline_data ON  internal.tb_m_planning.rev_id = timeline_data.rev_id 
LEFT JOIN 
    (
        SELECT 
            DISTINCT ON (combined_data.rev_id, internal.tb_m_planning.ent)
            combined_data.status AS hod1_status, 
            combined_data.end AS hod1_end, 
            combined_data.rev_id,
            internal.tb_m_planning.ent as tb_ent
        FROM 
            combined_data
        INNER JOIN
            internal.tb_m_planning ON combined_data.year = internal.tb_m_planning.year
        WHERE 
            combined_data.hod1 = '1' AND
            combined_data.ent =  internal.tb_m_planning.ent
    ) AS hod1_data ON  internal.tb_m_planning.rev_id = hod1_data.rev_id AND internal.tb_m_planning.ent = hod1_data.tb_ent
LEFT JOIN 
    (
        SELECT 
            DISTINCT ON (combined_data.rev_id, internal.tb_m_planning.ent) 
            combined_data.status AS hod2_status, 
            combined_data.end AS hod2_end, 
            combined_data.rev_id,
            internal.tb_m_planning.ent as tb_ent
        FROM 
            combined_data
        INNER JOIN
            internal.tb_m_planning ON combined_data.year = internal.tb_m_planning.year
        WHERE 
            combined_data.hod2 = '1' AND
            combined_data.ent =  internal.tb_m_planning.ent
    ) AS hod2_data ON  internal.tb_m_planning.rev_id = hod2_data.rev_id AND internal.tb_m_planning.ent = hod2_data.tb_ent
LEFT JOIN 
    (
        SELECT 
            DISTINCT ON (combined_data.rev_id, internal.tb_m_planning.ent) 
            combined_data.status AS hod3_status, 
            combined_data.end AS hod3_end, 
            combined_data.rev_id,
            internal.tb_m_planning.ent as tb_ent
        FROM 
            combined_data 
        INNER JOIN
            internal.tb_m_planning ON combined_data.year = internal.tb_m_planning.year
        WHERE 
            combined_data.hod3 = '1' AND
            combined_data.ent =  internal.tb_m_planning.ent
    ) AS hod3_data ON internal.tb_m_planning.rev_id = hod3_data.rev_id AND internal.tb_m_planning.ent = hod3_data.tb_ent

;
