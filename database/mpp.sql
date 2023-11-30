PGDMP                     
    {            ex_db    15.2    15.2 Q    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    16399    ex_db    DATABASE     |   CREATE DATABASE ex_db WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'English_Indonesia.1252';
    DROP DATABASE ex_db;
                postgres    false                        2615    22629    internal    SCHEMA        CREATE SCHEMA internal;
    DROP SCHEMA internal;
                postgres    false                       1259    22703    tb_access_modules    TABLE     �   CREATE TABLE internal.tb_access_modules (
    access_module_id bigint NOT NULL,
    level_access_id bigint,
    modules_id bigint,
    read bit(1),
    edit bit(1),
    add bit(1),
    delete bit(1),
    print bit(1)
);
 '   DROP TABLE internal.tb_access_modules;
       internal         heap    postgres    false    22                       1259    22702 &   tb_access_modules_access_module_id_seq    SEQUENCE     �   CREATE SEQUENCE internal.tb_access_modules_access_module_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ?   DROP SEQUENCE internal.tb_access_modules_access_module_id_seq;
       internal          postgres    false    22    259            �           0    0 &   tb_access_modules_access_module_id_seq    SEQUENCE OWNED BY     u   ALTER SEQUENCE internal.tb_access_modules_access_module_id_seq OWNED BY internal.tb_access_modules.access_module_id;
          internal          postgres    false    258            �            1259    22660    tb_draft_m_planning    TABLE     T  CREATE TABLE internal.tb_draft_m_planning (
    d_planning_id bigint NOT NULL,
    d_rev_id bigint,
    d_position_no smallint,
    d_gid bigint,
    d_sfid text,
    d_special bit(1),
    d_local_emp_id text,
    d_full_name text,
    d_dept text,
    d_job_title text,
    d_job_family text,
    d_job_position text,
    d_hay_grade text,
    d_cc_code text,
    d_cc_payroll_code text,
    d_company text,
    d_grouping text,
    d_start smallint,
    d_end smallint,
    d_remark text,
    d_notes text,
    d_approval smallint,
    d_hod1 text,
    d_hod1_email text,
    d_hod2 text,
    d_hod2_email text,
    d_hod3 text,
    d_hod3_email text,
    d_created_by text,
    d_created_date timestamp without time zone,
    d_modified_by text,
    d_modified_date timestamp without time zone,
    d_is_dlt bit(1),
    year character varying(4)
);
 )   DROP TABLE internal.tb_draft_m_planning;
       internal         heap    postgres    false    22            �           0    0 %   COLUMN tb_draft_m_planning.d_approval    COMMENT     k   COMMENT ON COLUMN internal.tb_draft_m_planning.d_approval IS '0 => HRBP, 1 => HOD1, 2 => HOD2, 3 => HOD3';
          internal          postgres    false    250            �            1259    22659 %   tb_draft_m_planning_d_planning_id_seq    SEQUENCE     �   CREATE SEQUENCE internal.tb_draft_m_planning_d_planning_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 >   DROP SEQUENCE internal.tb_draft_m_planning_d_planning_id_seq;
       internal          postgres    false    250    22            �           0    0 %   tb_draft_m_planning_d_planning_id_seq    SEQUENCE OWNED BY     s   ALTER SEQUENCE internal.tb_draft_m_planning_d_planning_id_seq OWNED BY internal.tb_draft_m_planning.d_planning_id;
          internal          postgres    false    249            �            1259    22669    tb_m_planning    TABLE     4  CREATE TABLE internal.tb_m_planning (
    m_planning_id bigint NOT NULL,
    rev_id bigint,
    position_no smallint,
    gid bigint,
    sfid text,
    special bit(1),
    local_emp_id text,
    full_name text,
    dept text,
    job_title text,
    job_family text,
    job_position text,
    hay_grade text,
    cc_code text,
    cc_payroll_code text,
    company text,
    "grouping" text,
    start smallint,
    "end" smallint,
    remark text,
    notes text,
    hod1 text,
    hod1_email text,
    hod2 text,
    hod2_email text,
    hod3 text,
    hod3_email text,
    created_by text,
    approval smallint,
    created_date timestamp without time zone,
    modified_by text,
    modified_date timestamp without time zone,
    is_dlt bit(1),
    rev_no integer,
    year character varying(4),
    ent text
);
 #   DROP TABLE internal.tb_m_planning;
       internal         heap    postgres    false    22            �           0    0    COLUMN tb_m_planning.approval    COMMENT     c   COMMENT ON COLUMN internal.tb_m_planning.approval IS '0 => HRBP, 1 => HOD , 2 => HOD2, 3 => HOD3';
          internal          postgres    false    252            �            1259    22668    tb_m_planning_m_planning_id_seq    SEQUENCE     �   CREATE SEQUENCE internal.tb_m_planning_m_planning_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 8   DROP SEQUENCE internal.tb_m_planning_m_planning_id_seq;
       internal          postgres    false    252    22            �           0    0    tb_m_planning_m_planning_id_seq    SEQUENCE OWNED BY     g   ALTER SEQUENCE internal.tb_m_planning_m_planning_id_seq OWNED BY internal.tb_m_planning.m_planning_id;
          internal          postgres    false    251            �            1259    22677 	   tb_m_user    TABLE     R  CREATE TABLE internal.tb_m_user (
    username text NOT NULL,
    gid text,
    email text,
    user_type smallint,
    level_user smallint,
    password text,
    status smallint,
    created_by text,
    created_date timestamp without time zone,
    modified_by text,
    modified_date timestamp without time zone,
    is_dlt bit(1)
);
    DROP TABLE internal.tb_m_user;
       internal         heap    postgres    false    22            �            1259    22636    tb_temp_emp    TABLE     ?  CREATE TABLE internal.tb_temp_emp (
    t_gid text,
    t_local_emp_id text,
    t_sfid text,
    t_full_name text,
    t_job_family text,
    t_job_position text,
    t_dept text,
    t_job_title text,
    t_hay_grade text,
    t_cc_code text,
    t_cc_payroll text,
    t_company text,
    t_grouping text,
    t_dob text,
    t_jog text,
    t_gender text,
    t_eoc text,
    t_contract_status text,
    t_contract_type text,
    t_hod1 text,
    t_hod1_email text,
    t_hod2 text,
    t_hod2_email text,
    t_hod3 text,
    t_hod3_email text,
    t_status smallint
);
 !   DROP TABLE internal.tb_temp_emp;
       internal         heap    postgres    false    22                       1259    22710    tb_user_modules    TABLE     k  CREATE TABLE internal.tb_user_modules (
    user_modules_id bigint NOT NULL,
    username text,
    modules_id bigint,
    read bit(1),
    edit bit(1),
    add bit(1),
    delete bit(1),
    print bit(1),
    created_by text,
    created_date timestamp without time zone,
    modified_by text,
    modified_date timestamp without time zone,
    is_dlt bit(1)
);
 %   DROP TABLE internal.tb_user_modules;
       internal         heap    postgres    false    22                       1259    22709 #   tb_user_modules_user_modules_id_seq    SEQUENCE     �   CREATE SEQUENCE internal.tb_user_modules_user_modules_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 <   DROP SEQUENCE internal.tb_user_modules_user_modules_id_seq;
       internal          postgres    false    261    22            �           0    0 #   tb_user_modules_user_modules_id_seq    SEQUENCE OWNED BY     o   ALTER SEQUENCE internal.tb_user_modules_user_modules_id_seq OWNED BY internal.tb_user_modules.user_modules_id;
          internal          postgres    false    260            �            1259    22631    tbm_emp    TABLE     	  CREATE TABLE internal.tbm_emp (
    gid text,
    local_emp_id text,
    sfid text,
    full_name text,
    job_family text,
    job_position text,
    dept text,
    job_title text,
    hay_grade text,
    cc_code text,
    cc_payroll text,
    company text,
    "grouping" text,
    dob text,
    jog text,
    gender text,
    eoc text,
    contract_status text,
    contract_type text,
    hod1 text,
    hod1_email text,
    hod2 text,
    hod2_email text,
    hod3 text,
    hod3_email text,
    status smallint
);
    DROP TABLE internal.tbm_emp;
       internal         heap    postgres    false    22                       1259    22694    tbm_level_access    TABLE     �   CREATE TABLE internal.tbm_level_access (
    level_access_id bigint NOT NULL,
    level_user smallint,
    user_type smallint,
    description text
);
 &   DROP TABLE internal.tbm_level_access;
       internal         heap    postgres    false    22                        1259    22693 $   tbm_level_access_level_access_id_seq    SEQUENCE     �   CREATE SEQUENCE internal.tbm_level_access_level_access_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 =   DROP SEQUENCE internal.tbm_level_access_level_access_id_seq;
       internal          postgres    false    22    257            �           0    0 $   tbm_level_access_level_access_id_seq    SEQUENCE OWNED BY     q   ALTER SEQUENCE internal.tbm_level_access_level_access_id_seq OWNED BY internal.tbm_level_access.level_access_id;
          internal          postgres    false    256            �            1259    22685    tbm_modules    TABLE     �   CREATE TABLE internal.tbm_modules (
    modules_id bigint NOT NULL,
    modules_code text,
    parents_code text,
    modules_name text,
    description text
);
 !   DROP TABLE internal.tbm_modules;
       internal         heap    postgres    false    22            �            1259    22684    tbm_modules_modules_id_seq    SEQUENCE     �   CREATE SEQUENCE internal.tbm_modules_modules_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE internal.tbm_modules_modules_id_seq;
       internal          postgres    false    255    22            �           0    0    tbm_modules_modules_id_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE internal.tbm_modules_modules_id_seq OWNED BY internal.tbm_modules.modules_id;
          internal          postgres    false    254            �            1259    22642    tbm_rev    TABLE     I  CREATE TABLE internal.tbm_rev (
    rev_id bigint NOT NULL,
    year character varying(4),
    rev_no integer,
    date_start date,
    date_end date,
    status smallint,
    created_by text,
    created_date timestamp without time zone,
    modified_by text,
    modified_date timestamp without time zone,
    is_dlt bit(1)
);
    DROP TABLE internal.tbm_rev;
       internal         heap    postgres    false    22            �           0    0    COLUMN tbm_rev.status    COMMENT     `   COMMENT ON COLUMN internal.tbm_rev.status IS '0 = draft, 1 = new, 2 = on going, 3 = completed';
          internal          postgres    false    246            �            1259    22641    tbm_rev_rev_id_seq    SEQUENCE     }   CREATE SEQUENCE internal.tbm_rev_rev_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE internal.tbm_rev_rev_id_seq;
       internal          postgres    false    246    22            �           0    0    tbm_rev_rev_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE internal.tbm_rev_rev_id_seq OWNED BY internal.tbm_rev.rev_id;
          internal          postgres    false    245            �            1259    22651    tbm_rev_sch    TABLE     j  CREATE TABLE internal.tbm_rev_sch (
    rev_sch_id bigint NOT NULL,
    rev_id bigint,
    hod1 bit(1),
    hod2 bit(1),
    hod3 bit(1),
    start date,
    "end" date,
    status smallint,
    created_by text,
    created_date timestamp without time zone,
    modified_by text,
    modified_date timestamp without time zone,
    is_dlt bit(1),
    ent text
);
 !   DROP TABLE internal.tbm_rev_sch;
       internal         heap    postgres    false    22            �            1259    22650    tbm_rev_sch_rev_sch_id_seq    SEQUENCE     �   CREATE SEQUENCE internal.tbm_rev_sch_rev_sch_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE internal.tbm_rev_sch_rev_sch_id_seq;
       internal          postgres    false    248    22            �           0    0    tbm_rev_sch_rev_sch_id_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE internal.tbm_rev_sch_rev_sch_id_seq OWNED BY internal.tbm_rev_sch.rev_sch_id;
          internal          postgres    false    247                       1259    30836    tbt_rev_sch    TABLE     k  CREATE TABLE internal.tbt_rev_sch (
    temp_rev_id bigint NOT NULL,
    rev_id bigint,
    hod1 bit(1),
    hod2 bit(1),
    hod3 bit(1),
    start date,
    "end" date,
    status smallint,
    created_by text,
    created_date timestamp without time zone,
    modified_by text,
    modified_date timestamp without time zone,
    is_dlt bit(1),
    ent text
);
 !   DROP TABLE internal.tbt_rev_sch;
       internal         heap    postgres    false    22                       1259    30835    tbt_rev_sch_temp_rev_id_seq    SEQUENCE     �   CREATE SEQUENCE internal.tbt_rev_sch_temp_rev_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE internal.tbt_rev_sch_temp_rev_id_seq;
       internal          postgres    false    263    22            �           0    0    tbt_rev_sch_temp_rev_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE internal.tbt_rev_sch_temp_rev_id_seq OWNED BY internal.tbt_rev_sch.temp_rev_id;
          internal          postgres    false    262            �           2604    22706 "   tb_access_modules access_module_id    DEFAULT     �   ALTER TABLE ONLY internal.tb_access_modules ALTER COLUMN access_module_id SET DEFAULT nextval('internal.tb_access_modules_access_module_id_seq'::regclass);
 S   ALTER TABLE internal.tb_access_modules ALTER COLUMN access_module_id DROP DEFAULT;
       internal          postgres    false    258    259    259            �           2604    22663 !   tb_draft_m_planning d_planning_id    DEFAULT     �   ALTER TABLE ONLY internal.tb_draft_m_planning ALTER COLUMN d_planning_id SET DEFAULT nextval('internal.tb_draft_m_planning_d_planning_id_seq'::regclass);
 R   ALTER TABLE internal.tb_draft_m_planning ALTER COLUMN d_planning_id DROP DEFAULT;
       internal          postgres    false    249    250    250            �           2604    22672    tb_m_planning m_planning_id    DEFAULT     �   ALTER TABLE ONLY internal.tb_m_planning ALTER COLUMN m_planning_id SET DEFAULT nextval('internal.tb_m_planning_m_planning_id_seq'::regclass);
 L   ALTER TABLE internal.tb_m_planning ALTER COLUMN m_planning_id DROP DEFAULT;
       internal          postgres    false    251    252    252            �           2604    22713    tb_user_modules user_modules_id    DEFAULT     �   ALTER TABLE ONLY internal.tb_user_modules ALTER COLUMN user_modules_id SET DEFAULT nextval('internal.tb_user_modules_user_modules_id_seq'::regclass);
 P   ALTER TABLE internal.tb_user_modules ALTER COLUMN user_modules_id DROP DEFAULT;
       internal          postgres    false    261    260    261            �           2604    22697     tbm_level_access level_access_id    DEFAULT     �   ALTER TABLE ONLY internal.tbm_level_access ALTER COLUMN level_access_id SET DEFAULT nextval('internal.tbm_level_access_level_access_id_seq'::regclass);
 Q   ALTER TABLE internal.tbm_level_access ALTER COLUMN level_access_id DROP DEFAULT;
       internal          postgres    false    257    256    257            �           2604    22688    tbm_modules modules_id    DEFAULT     �   ALTER TABLE ONLY internal.tbm_modules ALTER COLUMN modules_id SET DEFAULT nextval('internal.tbm_modules_modules_id_seq'::regclass);
 G   ALTER TABLE internal.tbm_modules ALTER COLUMN modules_id DROP DEFAULT;
       internal          postgres    false    254    255    255            �           2604    22645    tbm_rev rev_id    DEFAULT     t   ALTER TABLE ONLY internal.tbm_rev ALTER COLUMN rev_id SET DEFAULT nextval('internal.tbm_rev_rev_id_seq'::regclass);
 ?   ALTER TABLE internal.tbm_rev ALTER COLUMN rev_id DROP DEFAULT;
       internal          postgres    false    245    246    246            �           2604    22654    tbm_rev_sch rev_sch_id    DEFAULT     �   ALTER TABLE ONLY internal.tbm_rev_sch ALTER COLUMN rev_sch_id SET DEFAULT nextval('internal.tbm_rev_sch_rev_sch_id_seq'::regclass);
 G   ALTER TABLE internal.tbm_rev_sch ALTER COLUMN rev_sch_id DROP DEFAULT;
       internal          postgres    false    247    248    248            �           2604    30839    tbt_rev_sch temp_rev_id    DEFAULT     �   ALTER TABLE ONLY internal.tbt_rev_sch ALTER COLUMN temp_rev_id SET DEFAULT nextval('internal.tbt_rev_sch_temp_rev_id_seq'::regclass);
 H   ALTER TABLE internal.tbt_rev_sch ALTER COLUMN temp_rev_id DROP DEFAULT;
       internal          postgres    false    262    263    263            |          0    22703    tb_access_modules 
   TABLE DATA           |   COPY internal.tb_access_modules (access_module_id, level_access_id, modules_id, read, edit, add, delete, print) FROM stdin;
    internal          postgres    false    259   �s       s          0    22660    tb_draft_m_planning 
   TABLE DATA           �  COPY internal.tb_draft_m_planning (d_planning_id, d_rev_id, d_position_no, d_gid, d_sfid, d_special, d_local_emp_id, d_full_name, d_dept, d_job_title, d_job_family, d_job_position, d_hay_grade, d_cc_code, d_cc_payroll_code, d_company, d_grouping, d_start, d_end, d_remark, d_notes, d_approval, d_hod1, d_hod1_email, d_hod2, d_hod2_email, d_hod3, d_hod3_email, d_created_by, d_created_date, d_modified_by, d_modified_date, d_is_dlt, year) FROM stdin;
    internal          postgres    false    250   �s       u          0    22669    tb_m_planning 
   TABLE DATA           �  COPY internal.tb_m_planning (m_planning_id, rev_id, position_no, gid, sfid, special, local_emp_id, full_name, dept, job_title, job_family, job_position, hay_grade, cc_code, cc_payroll_code, company, "grouping", start, "end", remark, notes, hod1, hod1_email, hod2, hod2_email, hod3, hod3_email, created_by, approval, created_date, modified_by, modified_date, is_dlt, rev_no, year, ent) FROM stdin;
    internal          postgres    false    252   �s       v          0    22677 	   tb_m_user 
   TABLE DATA           �   COPY internal.tb_m_user (username, gid, email, user_type, level_user, password, status, created_by, created_date, modified_by, modified_date, is_dlt) FROM stdin;
    internal          postgres    false    253   �t       m          0    22636    tb_temp_emp 
   TABLE DATA           R  COPY internal.tb_temp_emp (t_gid, t_local_emp_id, t_sfid, t_full_name, t_job_family, t_job_position, t_dept, t_job_title, t_hay_grade, t_cc_code, t_cc_payroll, t_company, t_grouping, t_dob, t_jog, t_gender, t_eoc, t_contract_status, t_contract_type, t_hod1, t_hod1_email, t_hod2, t_hod2_email, t_hod3, t_hod3_email, t_status) FROM stdin;
    internal          postgres    false    244   �t       ~          0    22710    tb_user_modules 
   TABLE DATA           �   COPY internal.tb_user_modules (user_modules_id, username, modules_id, read, edit, add, delete, print, created_by, created_date, modified_by, modified_date, is_dlt) FROM stdin;
    internal          postgres    false    261   �t       l          0    22631    tbm_emp 
   TABLE DATA             COPY internal.tbm_emp (gid, local_emp_id, sfid, full_name, job_family, job_position, dept, job_title, hay_grade, cc_code, cc_payroll, company, "grouping", dob, jog, gender, eoc, contract_status, contract_type, hod1, hod1_email, hod2, hod2_email, hod3, hod3_email, status) FROM stdin;
    internal          postgres    false    243   u       z          0    22694    tbm_level_access 
   TABLE DATA           a   COPY internal.tbm_level_access (level_access_id, level_user, user_type, description) FROM stdin;
    internal          postgres    false    257   4�       x          0    22685    tbm_modules 
   TABLE DATA           j   COPY internal.tbm_modules (modules_id, modules_code, parents_code, modules_name, description) FROM stdin;
    internal          postgres    false    255   Q�       o          0    22642    tbm_rev 
   TABLE DATA           �   COPY internal.tbm_rev (rev_id, year, rev_no, date_start, date_end, status, created_by, created_date, modified_by, modified_date, is_dlt) FROM stdin;
    internal          postgres    false    246   n�       q          0    22651    tbm_rev_sch 
   TABLE DATA           �   COPY internal.tbm_rev_sch (rev_sch_id, rev_id, hod1, hod2, hod3, start, "end", status, created_by, created_date, modified_by, modified_date, is_dlt, ent) FROM stdin;
    internal          postgres    false    248   �       �          0    30836    tbt_rev_sch 
   TABLE DATA           �   COPY internal.tbt_rev_sch (temp_rev_id, rev_id, hod1, hod2, hod3, start, "end", status, created_by, created_date, modified_by, modified_date, is_dlt, ent) FROM stdin;
    internal          postgres    false    263   ��       �           0    0 &   tb_access_modules_access_module_id_seq    SEQUENCE SET     W   SELECT pg_catalog.setval('internal.tb_access_modules_access_module_id_seq', 1, false);
          internal          postgres    false    258            �           0    0 %   tb_draft_m_planning_d_planning_id_seq    SEQUENCE SET     V   SELECT pg_catalog.setval('internal.tb_draft_m_planning_d_planning_id_seq', 1, false);
          internal          postgres    false    249            �           0    0    tb_m_planning_m_planning_id_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('internal.tb_m_planning_m_planning_id_seq', 32, true);
          internal          postgres    false    251            �           0    0 #   tb_user_modules_user_modules_id_seq    SEQUENCE SET     T   SELECT pg_catalog.setval('internal.tb_user_modules_user_modules_id_seq', 1, false);
          internal          postgres    false    260            �           0    0 $   tbm_level_access_level_access_id_seq    SEQUENCE SET     U   SELECT pg_catalog.setval('internal.tbm_level_access_level_access_id_seq', 1, false);
          internal          postgres    false    256            �           0    0    tbm_modules_modules_id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('internal.tbm_modules_modules_id_seq', 1, false);
          internal          postgres    false    254            �           0    0    tbm_rev_rev_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('internal.tbm_rev_rev_id_seq', 34, true);
          internal          postgres    false    245            �           0    0    tbm_rev_sch_rev_sch_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('internal.tbm_rev_sch_rev_sch_id_seq', 219, true);
          internal          postgres    false    247            �           0    0    tbt_rev_sch_temp_rev_id_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('internal.tbt_rev_sch_temp_rev_id_seq', 396, true);
          internal          postgres    false    262            �           2606    22708 (   tb_access_modules tb_access_modules_pkey 
   CONSTRAINT     v   ALTER TABLE ONLY internal.tb_access_modules
    ADD CONSTRAINT tb_access_modules_pkey PRIMARY KEY (access_module_id);
 T   ALTER TABLE ONLY internal.tb_access_modules DROP CONSTRAINT tb_access_modules_pkey;
       internal            postgres    false    259            �           2606    22667 ,   tb_draft_m_planning tb_draft_m_planning_pkey 
   CONSTRAINT     w   ALTER TABLE ONLY internal.tb_draft_m_planning
    ADD CONSTRAINT tb_draft_m_planning_pkey PRIMARY KEY (d_planning_id);
 X   ALTER TABLE ONLY internal.tb_draft_m_planning DROP CONSTRAINT tb_draft_m_planning_pkey;
       internal            postgres    false    250            �           2606    22676     tb_m_planning tb_m_planning_pkey 
   CONSTRAINT     k   ALTER TABLE ONLY internal.tb_m_planning
    ADD CONSTRAINT tb_m_planning_pkey PRIMARY KEY (m_planning_id);
 L   ALTER TABLE ONLY internal.tb_m_planning DROP CONSTRAINT tb_m_planning_pkey;
       internal            postgres    false    252            �           2606    22683    tb_m_user tb_m_user_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY internal.tb_m_user
    ADD CONSTRAINT tb_m_user_pkey PRIMARY KEY (username);
 D   ALTER TABLE ONLY internal.tb_m_user DROP CONSTRAINT tb_m_user_pkey;
       internal            postgres    false    253            �           2606    22717 $   tb_user_modules tb_user_modules_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY internal.tb_user_modules
    ADD CONSTRAINT tb_user_modules_pkey PRIMARY KEY (user_modules_id);
 P   ALTER TABLE ONLY internal.tb_user_modules DROP CONSTRAINT tb_user_modules_pkey;
       internal            postgres    false    261            �           2606    22701 &   tbm_level_access tbm_level_access_pkey 
   CONSTRAINT     s   ALTER TABLE ONLY internal.tbm_level_access
    ADD CONSTRAINT tbm_level_access_pkey PRIMARY KEY (level_access_id);
 R   ALTER TABLE ONLY internal.tbm_level_access DROP CONSTRAINT tbm_level_access_pkey;
       internal            postgres    false    257            �           2606    22692    tbm_modules tbm_modules_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY internal.tbm_modules
    ADD CONSTRAINT tbm_modules_pkey PRIMARY KEY (modules_id);
 H   ALTER TABLE ONLY internal.tbm_modules DROP CONSTRAINT tbm_modules_pkey;
       internal            postgres    false    255            �           2606    22649    tbm_rev tbm_rev_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY internal.tbm_rev
    ADD CONSTRAINT tbm_rev_pkey PRIMARY KEY (rev_id);
 @   ALTER TABLE ONLY internal.tbm_rev DROP CONSTRAINT tbm_rev_pkey;
       internal            postgres    false    246            �           2606    22658    tbm_rev_sch tbm_rev_sch_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY internal.tbm_rev_sch
    ADD CONSTRAINT tbm_rev_sch_pkey PRIMARY KEY (rev_sch_id);
 H   ALTER TABLE ONLY internal.tbm_rev_sch DROP CONSTRAINT tbm_rev_sch_pkey;
       internal            postgres    false    248            �           2606    30843    tbt_rev_sch tbt_rev_sch_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY internal.tbt_rev_sch
    ADD CONSTRAINT tbt_rev_sch_pkey PRIMARY KEY (temp_rev_id);
 H   ALTER TABLE ONLY internal.tbt_rev_sch DROP CONSTRAINT tbt_rev_sch_pkey;
       internal            postgres    false    263            �           2606    22723 5   tb_draft_m_planning tb_draft_m_planning_d_rev_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY internal.tb_draft_m_planning
    ADD CONSTRAINT tb_draft_m_planning_d_rev_id_fkey FOREIGN KEY (d_rev_id) REFERENCES internal.tbm_rev(rev_id) NOT VALID;
 a   ALTER TABLE ONLY internal.tb_draft_m_planning DROP CONSTRAINT tb_draft_m_planning_d_rev_id_fkey;
       internal          postgres    false    246    3272    250            �           2606    22728 '   tb_m_planning tb_m_planning_rev_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY internal.tb_m_planning
    ADD CONSTRAINT tb_m_planning_rev_id_fkey FOREIGN KEY (rev_id) REFERENCES internal.tbm_rev(rev_id) NOT VALID;
 S   ALTER TABLE ONLY internal.tb_m_planning DROP CONSTRAINT tb_m_planning_rev_id_fkey;
       internal          postgres    false    252    246    3272            �           2606    22718 #   tbm_rev_sch tbm_rev_sch_rev_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY internal.tbm_rev_sch
    ADD CONSTRAINT tbm_rev_sch_rev_id_fkey FOREIGN KEY (rev_id) REFERENCES internal.tbm_rev(rev_id) NOT VALID;
 O   ALTER TABLE ONLY internal.tbm_rev_sch DROP CONSTRAINT tbm_rev_sch_rev_id_fkey;
       internal          postgres    false    3272    246    248            |      x������ � �      s      x������ � �      u   �   x��QI�0<'��T�h!���T��CQ%��j�R�Ll��h4aL�hCߕg���c���}<߯�9��F��*hSÉ�7�
�k��10Y�yy��<̞�v�[�G����.9eTwT���o����j\���5J��&��$��*r�H��*�:��gp�����.t��܎��n�����q�      v      x������ � �      m      x������ � �      ~      x������ � �      l      x��}]w�8��5�+|�����z,ɟ�N �	_����ܸ*Tŝ��=�_�ޒ���T�:gި��Q$m�g?s\!:�1�f����l�}��ʭI�t{�^gţio�.{ֿ�i��������e/�\���w9�?����:�z����2Կ����0Ɗ�˩����~�����W|Zt:�N�����m�����0J�+�Q_�:�;���dMGc_E7��]ԟϺ1��G��=.X���C�=�'������:���nw��d2�[�}�O�r�N��^b%�A4��#k|u�I�}��lf�ŏ��ٟx�q���8��,��<M㣦2�{q��̗��|���̖V�7��w��d�F���<��W�S7���X�qlΝ6f#���9| .�7��svoE�oً�f��l���h2�&Qg<�%���q:��/�{�~��G�v�8��{�Ԛ&������=ء�y�9�mب��q�w<9sǅ/۹�N�׍��,��ɏ��<� �Oh���J�Q��_gV4��K3��]��:��>,K��zO�4�����ϩ�9ŏ��lܥ�؎p�bv,�̎�P��ri���*�=[ONǓ�$�q��%�+q����^�x�<f�ŏ���yp��9������F�0�Y��<�����6!��P3�����Q�*&;؉./�3���h]z��w-��z �f��/gI��u	��l�]dC\9+wVa�{,�\���������h�9�o�F��l`�����)�C�M�ܣ�F�߲G���Y?�ni�]�.����6���oզr�{G��d��p� (6�Ϛl*�p����_m`�o��n�I��\G�k<�s�wb+�
�X�X\��e�F;�b'O���̳mW�V0�t�%_�K+_�	�j����~�2�/���#my�	��ù6�w3����y��^�͋u5���C�g$]
�\�Ʒ�y淅5nG��N0neKي�!BL�)'T��:�fM6�`Г�?���� ����I|}�/����{����71#���6+�W����7���V_��퀧���~o0,��i��.n�Y�޴?�½3���T�4�r7��Gi�<��ށ�&���g^y��Lk{�߂-�ƅA�s��sKy�����<��;���Yp���~uB�X*43�C�'Nޯr��2�L���*��gw^�3����vp=�w���n��`9`�I7�X���9{���h>�����:���ޅ_�����ӹ��,�{��b(7/~�ݥ���у�[`p�H����d�.#?\Y��8���u�ƣr�=������IN�x��N�6y��p�Lܶ��,��
�'�'le�` ��-���hN[�$�"���p�O�nգ���!� {є����Oy��� k��Js-O,@�;���N��I��7l�̦��u��}:�-�{��f�(�Mu9��z&���2��Q�T���BäN^7�.O^�r�������
�"ؠӨ�;���(�s��0�n�;V�uА���h0H?^s�E���ҪĻqh�]���`2p��O��C=pCEq�Mw`{�t�|��6��أiL��g�?+�a�)�$n�����U�������/���v��-桛��w�!Et�ņ�!d;���`0�^! E��ʎ6DmSZ�����t�Ľt��*�����6��X�<EF*f��pۈ)`�:p=��w�`����� (B9�I�����]�8�1�72N�gh&0�>���>��1�s�|0�ȩ�0[�	�	n%���D����.���YB#�kX�s�^��%�!�
�����cf��yX�^�t^Eq2�-��N^��Gh�q2`ib�ҩ��V>�ܺ��RT�~!wS������1�dvB�̎�>�C��s�wp�B՚_���f�^3���x	}!��J�"�n���͂ �ۻh���>	�ސTgeda�r�ִ�� ��ك5�M���Wһ�ş�H��X��w�P,��Y:~y�Ǧ��H��B乫��b�̖�++��8'-9���턼X$�f��Q�~s=J���`n_���÷�EV?�&O�3�H௞�g	ڲ�k��#��_ �E��P�8%��rG���}#�����|�����U�-����0?V4�܅�޶��%�@]�[C�G��Lu:�8X,�S+�C���8������}��I��~�D�.�4��w�wun`�����0���I�]p%,�L�؎J���/c]+}Ȟ0{{�:JZ�B�h�=�͛����˪���.`�޲��5����S�΂�K�˒D���l
p�;A'����#�շu�W�6���Mx�!]�����(��8���;�=�u��=�w�؅k�-d�E���Lw�3A�q���U�#�\�U��s<^Xn�ih;�&�ǋ�b���![.^�Ț@|� \_��� �aw<�q��p�K�!�u��n�d��m�������7ￛn .]x~��;xm�s8;)��r�}�a\�����~��|�	YƖ�Kc�h�����K��0]^.G]���A|5����vaq�ʁX�C*�?vCLp/0�����,��qA��+���cҹ�]���^�4:��Ox�^�t	C��;v�J-�����P���r½��n���p8J��R�	J0,g�-!I Ȅ��S�]����̀Eh�2�{���#�-T�ਁ��G�Ҵ\�`4������ю�UN^�����x�6Á	 J���h��'��'��;����|��N�k=��;Yp y"��H%��U	�{<[�$���ޝ���I�=���ڜ\:0Oy��oȰ�#�G9O5�l`E���3NMӄ̩�>�E�y��&pR�;2� [I���=�(N���[��n��R�wǑ[ǡ]E�4=�/����������1�"v���%���X�Q��q�=��F�(�>4-�8�si\>=W&!�%��([�\ �$� n�qkެC��k[o�k
��KD��EK=dX8�v[@�䒷Z��[ʷ���� ��X�o��2#[�GD�'��:��p>�����>Ӱ��.��9�T��? �&Gu>�	�eA���"-Ӕ��R:�$_�VS�a�qԏvj"�P�b_z/�����J	��k	K���*ԱU�������a2bjlͱ�Y�`��c�G��L��T����Iqo�K8!W��&�D�;U�R��J���4f���Dc:N��F],�z2_fu{�{��9����`&sgҴ�PC0����>�S��Qv�c�#�[�A\�g��a2EP��a�_�)��߰6�Z��àĵ`�����v��9�̕]_���w��ߋ�7K��Vz��'�������k����~��o?�`;�e�Rz��0[~B���Ǟ#����[��"�Al.1�����)_Z���ɺ�F��Q��/����U�.��@{��� �C�ҕh��mH؝�"�a_�t��t�Z��`�E��ByEM~�q%Z��� 7g��C��S����>���mʰ��_>V#�k�+���l�G���`|��;�W?���\^��zJ��~�<'M$&�y�&G:���*F�e��_���;��|�ۋt>���P�/a'�~��e�Or��ތ���k3J}�j�,����WC�kyz-�}U�Հ]̀��[�E�0�)m�3���<Y�;j��apj�N�m���j0X��f0)�]�ю����N���mW��6�ƋΗs0��e-d���r(l��	�?�,X�RYz�j�~�]�(�;.��}Om0z�vo�P��.pv,�^[�2�y��4�7�ǕeH5-��{mB����윛ϕ�]�n�
��]��r��/]0��^�fu�iږGa3��Kz�\��"i�)4WJ�۔��`��㰨� sBv�)P,0i��S�����>�T����UܦT��m)���ƻ-o��xZ��*@��Z�)%�����),��Ȋ�jb	У]|]��Ҩ7�'wB�I\�2;�՞:�SP    �6N]`�
���M�Me��*J�������x���b/��瀕_��G���>���k��fCe�h3*|���3q=�z�66)z4O�5����M�P���=8_+�q���>�
ڎ�Q�[�ϻ�?r+N+��5��k��E�!�^Ӆ��p������e�I2N����3�.�5��CO��T�v�cυ$(\�5x#gtbC����@X6�o��a��}�t=_Cd�s$p`����9��sÃyr�)�.�������Fk8�h6���� ���f�\ �h��Z�Y�QG�r@���e�j�_��d�"��텆(��8�K�hHܕ$�=1I��M����?��Z�GC���9�H��F��	���f<$���� ���ǃh�>�LY���n$Q��E��v���R�p%ؠ�g���Y�������ǣ�6����8u0�Bə��c��]#��~�/��k|�D}�|�9ƨ_�-�5���1�"`�"6�\g��W��]�|�	�[�u�6��L!h��:��;��es���q��e��[~_`^�ɸHWT�ݮ5Ok�h�vE�f��;��������԰+��]����C�c�.����Ry�4�ۏ���U�|��� ��;bNQo��I鮪�o
�ӳn{���˻�{5~�����ApSc�9/�A�Ս�A�Y/�/9l���4�g���&�7?6ۡ�OtH6��z"X��=Xp[��8�b�����|�z�R���񨆇@%�!sиU��;��t���ZZ���&�Ĉ����� K�.�B��`�B}���+�\����RQ���tp��d��r�ӕM�ul���_?�����$"`����ޠ��O��\�s��C�$\Gx�		5�؜�C�t�YWX���Ыd��9��V�%�9g�%��Ʊ�FE�J(P@�(z�&P W^kk d�#����G�� z���h~0��
i���n��[��eA��FG���9��w��o��H(������7Χ\�g�'7��F���߅�%��"	`2�rgNج�=3T��#��_8mt `� L��(L0F�2o!���]�����D��D���V�X-%^X2��1���J �D�_ ��q�fxR�f�33r��kB��� u���ƞ@���`��Ȭh)�P.~�Ϛ���l���A��`�&����#+Ͼ�<��z�����1�$���U�u�R�C	���wª�	���z��Ȟ�W������k�;��},xlV�ݨ��,޿�r s�8����5��Qsm7�->c-�>%��x�X��1��O+��G�X.�6p |�I�W��aAH,����1�?�`�A��
=�4 >����b�p��D����8]^�9���|�Q%Y��eၩv|N��ɦ�0H�`!��������xz�� ҂���H�N 9z���q������.���c�����z�'��u�6y=qJ.A�e�{xB?pe��,�s��/ ����^��t�����:t����U���R�8�,ں�p:] ��p$>�i|6l�,~X�؈Y2�YZ&�߰c~�yu�T�Z���		uN���� 7��?�7+��a�lT5\.�/I�|���m��=�Hg͉!?X�����X���t��G�⹔����g�:�
ҫ�'��9�{�1�2K{�	u���&��Fb��nlЌC@x��Z��	}��z	"��/{�%�y�]҈tr��UF�o�P�ް~��.A�s\�[f�?.q�쓧�(t��#�|w嶗7"��/^ʩ7骷[2�Y9sW�݂;F➓��\��E��_��Q~��7C�B+8�c���Z�Zz���M��r=��[W�E�G[d��.� [Z�ks�G���0�x�!�q^yѩtTՃc�������]�߶_��ɞ���)�J�V�k�J_����|�f�wp3��jjy�	X֔�N�{�I�e�]� �U_Q� ķ�����gzb=�!o�b:�b������ú[��c;�h����櫤ܠ���u�Q�ӕI� 	�PY����R,��� J��t��z�eP�U�� S���ly�Y4��
��"l1�.���M��n!�sW D�zo��9���Z[��7��ׂ�'���5�0�t�aU��Y���9�4� �+H�;�;}�%�bt�i�n��ҟz����T $t $:]L�L��E�͗�s�5�`�{��X]?!1�`Ho;&�œ�W�695�'p�o2����lw��bܥ]yF7ՑF)�D�ݬ}�!�R�B�mLl������J�9��#�pb�ΆT�����CDRٙ��ú?���D�sG�fj�3z�{����`�͒�<C�4�F��k����d�A�� ��I����pp�-W��Һ����s#�Z������g&c{z�]�LKh���9.la�w����!��8�O����t����9�#�]���]�6a��1G}��ꄁ��}�o�;���qcE߳g�*�F���%~�4���HbN-�p-��!#���d�޼�rΒu�D�����k����E� ���-ܻ^��/V�����d�.�2��l�����;���pbԀPJ��j8���	DJ����60�x�yIo���� ��e�9X���8�M��5̆�t�ʏ�o��m����Q{�G���1ǐ��˴�a�(Cf���	6�&��%��i��@C�$�Ҍ�_,5+�#��򞲬0H6���x<@z��5y/o|F��XBiFbK���|{�R=��ً�e_��>�mk�?�P�Bg�a[��
�dW��>�*�_2b�N����2��ۆ��*;z�U�#�Ƿ�H�CEx��s<��	G���@����	 2ck��S�̭��`�?����ێbh��utA�k���d��3_k��$!*-��h�+���e���ԷSM���H�i!����Sh�����gWw#� z~���_��@�Tǉ�]r��:�M�+�UX��O��N�LA�f!��:��aN?.�QQQ08���	�L�s�S �*��U��Ց��o;�ٴ�qi�ھ�P�-����@��9	G���|�YV����B3d�: ⟎�5�Sg'+�0����o�hu������ X��*�{5B���x~㷏G���؄��"��'��he21��1�|�C�PU!���!��c�2��+��?��x<E��=rvN��<��ֺP��*&pDO��lb	<w&�,%İ��6U�B~�UR��^��28X�+3�L	�qй�7k�M�u�۴�
$* 4�u��}aUnO�[��~*�$�=;���F�S$D�Ձ9K����;���MLn��{�5E�dd�FI+I[IQ@�?7�2�	�.��[`KZ�"�Kۆ�R�El3kI/;D�G�*�(��2]pc�(E�����h��T&��c�b���&�j�,�=�f����}��F16�z�EUW1��	�*/4��Ѡ:OU�}�ɉTi�a>�t^p���I��#��Դ$�ƭ�c�Ys��$r��ޖ�����n��I�A(]GȞ����X/�	K.�c0�#ږd
ﾏ��[�k�����Xnצʙ�HVQ�Yt�p��WH��(4�1H����C����5�U�� �vI��y���i|J��Q�"@�5�Y�bk�V�V��͵'S�E;Y�w�ؗ��À�A�1l�
�n�B�)G0�Ϊ=�:�84n�j�x
�Hm�`������1�ÂO�q���K
¨�L�'VS�yc5�O"	��C�`����=�Z磎s��Ѓ7ڗ�1���D�.�7�ǖ9���NN�M���Hg�n�D�BR�Ur ��d��?V��7��N�o�ƌg��N�Vٽ<|��$ԗ�������"��fq%����3��a�B9��;]����>����� z�3_Z�*܏�r����p/����M�Rkc�%L:(�z��#/a�ش;<d�잓�a��^�����fm]���^�}*_��E2C�F*�1ΩMII�`��@?{]}�l}��:j���Mò�nmʲy���1�E?[?    -�
b��^��d�d|�L�J�y��+5�gq�]�����5+��W� ���[��6�(��{MNH�5�+h��/hp�A�9�����GN�b�Aw�ȚytE�)Y� 7=Ru�
���B	%�� 3d'U$�~��\�y�A���,�o�e�~��{�Uk7hK7;�����>0��o^PX�z��������&��Ewq�K�;[:�pxd[P�k�޽��_�5�S9�����H�$S��gBv�$N>6��"g%w����m�m�Kf�ns�^ cx"�b^1lW� ,��UuU[;��ʚo�1�.k:�	�P^,�	���V�P�����Y�$@>��ŝ(�渤��'7bz��#Uz#!I0Ȇ%ߨ�t�,�ﺡ,?s]~��8?Y�=�/fo�M��) �<��Rݰ�?S���F�9R�a!��Ŭ�����`p�ST:�l��"{��$#�Dn�����+%��[K��# ��=��dv<ϋ�*��.tp�G߳��ңk0�5��g����N�`��8��AJ�9�����h7w�{�lbՕ�{�x%L�\��tsp���D�QY�`
A
���ݛ�9|V:A�3�ݧ�(���LǗ��l�UBsk��3ޡ�����(��N��=�gsE≀�/�������G����[X��c�S�y������N��@iࠟ��H<�����mjytK��ׂZ�/T���U��0H���er�����K���?`�Yd�2�F������w�R�r$�o���t'��v2c�E�	��+`�,�&���zH��/+��w?�#����pt�/4�=��0�C��P�>����1�)�$�(@���V�KN��r��Uv�}�d��ua��Ήd-+1$��ԓ��;���˃�� 0e[�u�W�x��J�~9���ȵ[;�]c��)��X3�'$�>�$v"�f5 ���.4ҷ�[a�E�� ;;j%ݝ��W��q2G�*���`;'\��]�x� }]��XZ�����K����0��Iw2����m�d�+a�r�U\�]Ņ�w��k�G|YP�����3Ю;U$f�޲��,;
.��&i�A��'��D�Ġ}z�+b��[��KQT�Ua0^C�6�)����lԚ���d]��Y@��jP�,�0O��|O/��t7�j�,,ð��(�(�®wHJ,�����I��r���]NZV�ʐ��v  ��6Y�T��Tv\��'
������B�}�-�>��Z��Gj��U��<��U��W�o\7���h���+p%�W�����Q�]������{4�fŢ�;�o�2�u�����)e�������S����&$�"2�^�d�GF��t<�	3�^G���;fr	��i�"z�/0�Z��Z6E���9x�u�6R
�UJ�z/zayr6��6ت.M��M�@X����n�ؠ?�Po�Z�Y��5�		_'MU5�o^6��0/�$����q�y%��,���X�X+�N�T�dҫ������G����]_�Pv��&��S�J�M7�P�wX�Lr������ߣůV�p��s[
TCW7�h� ̖�(��P�h8��M��/R�{s7j�qe�����9��߬�%���j��T��7n����*�/{!pSU�����@J�3-)��f����)5��,���}�g^@ :���se�e���J-vg��7+JTTn;~�ۍ��%����Vz�+�b�_���Fm��ν@��1���-;L�v���=tK�v�|��ݎ���W	'r��2v�,�y�:���[�m����U�/�0���ۻ��/��1P�Y���("p��]�&B�wp  �D$���h����4~�:��1��7�0I��ɦ N�3��+:��T�Y�_ԕ�mM(c�ݞP���7*����A�}|+���2�]�1#8Vu���=�ެ|;y�U��/�����瓱����x���7P6�Q�n�[K��A�otX��bX׸F'�o�";"[��\}��`�����{Q<�P}�"�����--KBr0���x�(*p����Z��h>\;n��0�JLZ�U�`@������@p����?.��aF0�2^��R���6��]M�[��Z��W=��	�60A��UtXg����%�a�Om���`�q��vkAYB���3�ެ�rq�Vy�W/6/����q����D��jd��#wm���6�v���uG ^Xg~o�F#�
;�u3��x0�}[��d�ʹ��r4/����R��ӆT �gHv�;���݀���Vp;�+�
l�Q�$�u{j��������bݚrť��6v��*s\����CT�c����ۨ���+���Z&���b��z���;I�N�^�˗����V9�B��A��t�3�f)�_��UZa��٠�8�o��~o��|�(�TNp69����p�;�v��������NnXGA���0����AQ���:��lJ��!鏧�]W�6>��A�]�Ic���ᯢ���Vs@z�oؿ��R����f)酉C�B�d��!���&�tuǒ�nVt{��]��Hm���n�94�K��I6?���X��~�_Z�kH	�����Hkơӂ:�ALw�}�?����a5�v�U��WE"�Jƣ�h^T؅�(�YI���W��P�~ �a��#YGѥ6��p=i*9�`y�=XV�t�o�l��	^�}l���R�����~����'ꞥ��*O���ʾ�
}�SZ �"�M��8$ �?�Y]D-cx�� ^q}�j_��H�UOs�@�]a�٧6T_�������,t�-���d���:�˭yj�4d�¹0=)�M�o٫�F�o/Łz�Z�4iӡ�]�S�A�����D@n��a�N@�|^ �{���@��ٟ:&�^:��,��$��^�����z�D�m�$%a�D�U�m�*��`a0�6�F�e0K0#y��a�v�e�d�O/����}h��H,������gЖ������@��F��h�M����U�P�o�c�0�.�CMǉ�
X���v_�9T6�J�-�dH%6x���cQC��`*��A�Q�xq0D�'�C��r�/��#|a�q?�B
���*?��!�^���&�����p�]:���X�
%��%&�6PQ����<�U�A�%���}�f��>ޫMR'��b�$].�)�,���A��F�����i����1o�o�e���+*I����*��q�<�/up��"XMެ%��撾�`0�Tu�j�;7���EK��$����.���4x�t���/�l��᝾�����tZ�ODi:�����r�&&Z�vH<ܓ�\5���}�Y���]M
�,�����]�Pn������0����X�<���/���{��O��D]e��� Q��v�I�s<��⇚�(�$�/Ć�G��X��(�w�k�����͘J	L�f.�ْ�؛��������l�6l��/�=��$��w��;.w��,��R�S@�ǭQX����ԓ��9����;�b����7Bk��R'�����ùD�ؚ�`�w���^��
]�>�k�J�S��!	T�J4̩����;�nn�K���!�����D�Ng��^��� c��4�}NW�92��(V',�5o(����l>�����9�Ƕ����E �"�\���ex"����s��[��dRȉ#[����gp㱒�^ �����Φ�D��j�Dyua�⚠'gy�I�T��K�س_���5\��Y�����Vu���{2����C�Fe)9$a qG�Qw�HW�9.�k��5����>[��;\���"���Ąj7���	P�Ą]>K)��c�t����ѽ�=!("u-���f�*�&�) BN%�N/F[�e��c
��=Qg̮�Q�Jz�5Rg���\	�G ��9]�`��i�C[g_M�g�O{���:��O�9��bo���ۡԮ��Ur0�^��;��$���ZrQ[[l�nT��|b�����hx(+Ц��!��E�l�B�@8"����ya����E�|�Q9��/>(���    v���b��L��T�%c�2� ���܀^����`t�D�9L������9˟�L윲J���ƺ��O�p6�Lu�s ���� ɉj�7�wu�EE0q�p��bȽ�m���G��9(�ٻ�2_<�(ܘ��{9�)���Wtދ��.,���h!8��Oo�]��!a����u��9���Ox�1�ĸ	j6qBn'%�c9��/���+�%^��V�g8��G�w]�MH�g�$ö<kX�Pf�m�ie��8���{�1m�l�"S��p���칱Q+A��.��QB�꜕�S�Q'z,�;Ղ��ݤ���-׸��;,CVN��ߦ_; �
�&���<�H���eU�.��1�����G�o+���f��w%����}Np��$�vL���$�
�ƕW��O��W�9�-�0z���a��8�s��׍݈��_s�L���4��h�:���I�o�N)���hj�����2�0�l^~�O�}�%G�y�.��9R����8�K?��I2qEV>��~��Q��&`��Y����\iӅ���(\=e/������i����V���Ћ���C>�G`fл�`2��&փ�^&�)|6̅^+�/�?I�: �J��0"�c��8ŉ���TB��d�U�׋����Ρ��-�21'�EBI�@k����:�+Ð�J�\�M�l����\uJ*]z�1ҳ�'�E<2��ۅ��|�~?���B��:�N�����M��'�6f��_��%Cق�:fV��|_#�N�=TI�ө��֯~��`��'ưd��;������&طeYQ�����{uA�d�F6��<��7��*q�Ǿ���n<��U�e�sv¹S���Gu{��=U�J�W�z�F���N�*�)����'v@4�]��� A���G���ul(BI���H�yN���N�	�_�R
$���4�O�CV~$imh�����H{U���e�1��pol��H��!��P�����,��(ӎ)��,���ؼX�����:�2�'�	�����WM\���Fl�P��`Q���H�s����{�:� ��������l%4C�������(�M�d�n,C[���	��?(�W����W�z�L�hI!b�
X5��Wƕ�O�
AH���c������N�5���6-�4*Ƽ�k��;A(�ɾP���u�Y"F�:N0�I��%^N�׽��N��~W��#�FTC�wd�;��Kx��7�t�����]��N����f�ry N-0�ޟ�J2NXZ�u�/�` ��C�m@v�W�'�1�VUZ��3����{0�0`�P)jp�����ں��Hվ����G)V����A0��Zw��P7��V�Űp`cE�q� ��)vY�a�~���:[w��X���x�Z���
Z/T ��f3?�;W#�q�9/�u�4�����Չ��U~�,冡��582����FD��f"��Q&�]ԀA�t�[����J�a�E�{;��XDQOn{���J�9:����z��/W|+��T�!�7�ڞ��؊���y;0x��2Ϭ���\�$��喩&U2ߗ	��z=����C���R���z��E�c�F�������a�\f����4�}�/� ���-|�˶�Z�p��R ��\,�K,�r�����j�X`�?9%�n�D�0]������l�\C-�vk����p�V��B�|�B��(�KSv/�Ѯn�l^�c�1�e_o;J��
ٮ�+��Y���؏��Y�DH#��U�)<>��1I��k�|�,���l�� ��A�����B�C\ݟ�Q�{�Ųn�d�[K7.�;�}]��h�B��C�����昴=�P��V�|�_��%�2�;r�ȧeu���xZ� �'�٭s��]�Fwf���j#����ƫf��#�E�ϵ�������[���d�]E8�S0�%ה�������FDc��|�M�YA1��	�Qq�m��`zDc���D�PE�@����)˖�+,l�e
�����d����r�P��=<�=<�II�cy�X�dj�9�����^GH2��`/n���f�ތ���{v�r��h<u�R�L闂�i�w?�}�uB�::�uJ�P�C-����u�PIQ.���L{�Vg5u}��i
EJت���;a(;�GN+�3~D�֧?r�߬t����N�1*�V����T�'kyL���ld�DH+A��%�5��� 2G��8�������;��G�| �����z�ۭ
��$ ���ƃ�ȵ��c� Y��e�u���q�y<�>%�یL\����|��'��$YJ�$NG�#+��)^�x[O�9�ҵe}�&����;�/��`�Q87t�BǕX�K��:�j��눨L(�G��+�v��	�]�S�����nN�@L��s*�S��L){�}#�o�~�\��
�{�$\W˙�DnV�{0F7��7���q��+e�!����o�Cp}��!. X�(>' x���}�.��i��HeW�0H�gp3/�؇����u�h;+�W�s2[�ٍ���)E��]���QV*�9(槴\��o�<k�!�-���ֈ,	UK\-_Ծ(0c%P�����3�qZ�YG��$ur�z�$s�=��)�-?N3ʥT4a��-[�����h��͎�h�}'h���W�K�!��.[Y��-H涿![��T(A�|co�	�bX×"9��Vz��#�]lc��=&Y�BԽ���{"L_��fP��_71��.I�I��~�|�P�o;(8����W�}?J�C�F�� �lԓɱ�BN�#��f�R���Jݟ��2��Y�h�[<(Q�i�m �۱�U�wR?�<9�1���h��+�#\��r����ۇ��i�v�����qt�v�:��_�2|p�^�����s�����6/Vw<��b\K%U����Yo�����s BU"�	7�	��|�|�Y�H��?�ʌ�>����A��3���e�o�ە�(��T�����\��ns��("x�ķ��������g�`�����(�y5��]A��@��`��%��`!��h!lFF�pe��6܌�Q�V�4�m�Ku����W[̐ɮ|�U�K��v����	9m���6���r0�`�$�c�E�@~?��&����6 _�g^#1jv�ԧ�x��(�����秼p���L$]���ZW����z�z�w8xL� D�c��%y$��e8@H>�_���x�!V,6N(c5��|`.ʄ��?�c���5��ų��;������A��1q�gI_���j�:s��(����9����K�tU�B<��/�'ԃAm�W�H���. /^�ܬ���`�5�)�I�
}x�4rR�s���l��fȸI�)�ը|,|˿Y��-ü��u�ΕCܿ��rmoK��4�|�W���@u�o�Xx��oZ& 1M{��xȊ���T\�_s,�b�x+7�}�sѤ�.H$4�Vx�{)�(σKc����Pu'�k�Y���f//��V@�Jzu������XM/�b7N�bթxaz�'��c{�T��w�Ҍb�����i�����uӻJ潶UY�U���V��B����C-v>Yg/�W<�ʩn︷�+B��z6�.
_��g�U�#�l9tڃI ��B�y܀5<����Rx��`X�͞��t������u�S��mv`��d�6F�R�[ǿa�N������N�4�\�VlUH���]��$0mk�>&����c�~���|�����x����}��GOʵ���U[
`�;H�)[C�P�u�z�n2jX�t��z��%�V�թ��֞�Dݣ�)��I�����pE��I�(�B~��zH��R[O3N�]��	hKrJb�[�d��ߥn B��A)%�q�f��qD�ǣ�x�Z�hJ�����~b��&
�+�־J`	��7�[crޓ5�5Z޿Y׳=�We���Z��
l��\��r��%h�&�S\b:�e]<@��фG'���(������\ a8-v�p�)�(���Xɽ��8�q�a��    �NrGb��o�!E���Nr������b���
�B�~���K�Ӝ!ic���.e�I�/��y�������ڝj�cC.�n8�k�K�C.�4��CF ҋ> osoW	�7Ԏ�=M���}���|v`2G�~�(A�3�����`��C��ƟO#�i�fk`�>���ډ�(���<�D&�T�ɼd�-���\�L|�r�2�t� wM��'��96>��2�0�|X=��2K�b���J�K���ݰQ�|���Bu[� �s�*�}_*!u�Ql�m��b������m)����U�t�Y����[���ߵ�U=���F: ���|a�;�*@9*��27<��ఋ�)�ԬAƺ��$)%�㑪�.s�JO��˜$��4���l��%�J�R�Z�D�o"���������Ԑ
t�� �}���`%'�����ϥ�Q<N,-�Cw�V��e����5�=�|hulC��I�=0�P�)�s��z��\Fh2�i*��R�G������4.���BI(W]k<���l��=��攳g��0���hAt�Q*�i1"t�s�{~~W�Y���1�&��{�Oo�CQ{�殭�>b�_UUa��R��	!5�����n��tU@F��JC� ]<eXf���>3�ْ�u26���:�đ����<����A�>�~�N�Xwv��gҐC�K�b�b}jV�j��ڎ��@��(ܤ�;���Ǜu�y�<gfkj�~�s��c�l]L��QlҌ4��|��)Ӥ���l`eJ�苦��>vìy�o�uL���J�5�#s5�iC]���&�m���V����x2Z�M�w�Ē$:ŉy�2�˫��$@�K0�U��g)�8��U/&��%Ø:���+�Ծ�{I���`�5=#C"n��AXv@�ou��᱊'2��
7jK�p���򙘭��#��[CJ� �!F	�����q�tO2�*כW�l���|ݼX�l�?P����P����d��*�en��e�]Ƥ�!�r�D!/0��&����d϶ɣ�oK�y!�\���vmc��;�J��v�<I9�Z���G��e�9Ē�C*`�oRL'�2�&U<-����9^A�d���ϓQ��T�
��l@0ק�'$�0Z}{ʗ���xtb�Z&����̨SHhtޅ����
���nrྛK��������P.c�����"��|1�/9���3v�ո�u�.2H�B	~)�[3ސ]9pd͒kC�o�"y'Q����%o]����k��<հ.�)$9�l��:!��J"��ݛ�.�mY-�Pe�xM�U~���h�#�H4HqՊ��P�վ꫁3u��mLJZ㶓��`��=4��I�YNe��n����X��P-,��r4�.o��`S�Q�#4�o^2�K�g)�mY�_�ޯ���G�ޕ�c�+L*ŋ�1�c��{�lH�u���Db��t����r���C�Ur�SF*]��t���vF�����
s���ҟ�q��BN��v:���PR0` 
��n��xz�a�\�&啙F��XS:eg{� �<W[��(~��M�B��{7�`��(����	R|�킷�KQ]��x�>������n%��U�w�(��s�z]=b�m��^��f+$e������G�kNt�h�X`�Y<U��=�	���c�7�o�IP�g}������� NQ�Ĕ��p��a|tf,�%��{!a�n�o`�@���2�M�MݹZ�9��1�2���TG�nl��U��a��W�d����|]�2��K�����1ځ��B-� ����#�N��r�a�u?˼�K�m7*d2�f�ݷ����F��@�B��q�9\F�O�tؐp�=j'�ل�����`U]�Lլ�0 L��;<=�n�pl��}��Yeg��B;��!yJ_�뺲F����*{��4@D�v�*[0��k���Dej�KЂX��,�Zֵx��L�g�Dnw4�% �m� �xE7��/_��q:b��^��^�]w�R2��ǽ��V�xp��l�>�pw�s%�SHEЉ��o�P�,N�0'z�lI6��9�m�1���p�Ԕp�K`�v�G�Z��;��n���fj����rՋ���mcM6M=l��D�[3s��K��f�P_&smؙ��$������˿�vbX���ei��,m��������35H��z�G⑺y^�W��?A�ഭ%�I���L�7&&��z`�ҡ|�=F٤oV��?=S�,��7�A�niד���.�j�ݺ�VV�������m�,7@��"\��.^^���{�\,����x����v];��!��~����ONi�fH�N���w`}���F}�|5�$��X꘻� \����w���s���y�o���!�V�V��;�1%/�tK
�t�$J� ��ֻR(�ݲ¬>A}ٯ�כ��fmQG%^"�]-��#�,��l#����
��'&ٿ3�C.ׅi�
����R����W%)QX��;���n{&�'�D��E{�I�����k�7V��W��NEID�n��t�Y�����M�F ^V�n6O�u�G"�&�kG �����SVD��28b�ݸ&}�x�̷�I�?P[ţ����04�3`�R���u��]���T�~�s�Ŏ��2�7h�|_�N:���A��LBh>J��,�W�8'<��r�&��\CD��1��t�p�jm�8�&L���A�![�.���������A�tK�����(�$�jP���l�?-Cip�#ڒig0��j�*h5�?����=be��X�������s��of������/4����'l�� �Pc��Ks���Q�^�'�"-�I��,_R]�{6�|�l����L ���Zz��$��֊7�Ͳm7l��Ir����ӹ-t��ƺ�����":,�Da�|[�����`�A��(�J�ֶ�����i��6�Ŷ��	ԍ���||�r7y�}Dw#l���٢!|M�(��H�]����t|y�x	��b��9�`$��	ɋQ���iM�( �5���58jVw�+0��Yk6�/�]G���/�I	C5���DW��[���S+9չg�>����z��	�`�;}���*���)�<���i���C��nāT��-k�e��l�=�I�2�źbKW-�C+��g����ȷ��8ZI]`@ְK�%[�ZΊ>C��3�*{}�2������H��B���:�������*�nl��!<F7Y���z�={E�Q�L�ڄ�,X#��[�SM�ʪ�б��3����;���Ț�]�!�f�B1�A7_YV��D��YzU^�-��N�r�*����'�.~����v�3�N��d� �A�"m'�h>tW}��	�������k����i3�c���m�  kCtN��ʐT����>�^�W�JE���¬$n�+��?�2��;��eS%���M�:���	�����Y(lP�X���I�~��N�d�;�zi��xL��Ⱥ��%�\�Ag�mh&���پ�h�o��j���e�Ͳ���_���r�L��N*�8���П�e����&��Y��A�W�B�����%�6�	8X�����*M��y�Y �X�WJҷ��:����7�D�hRVo���{��=�h���1�������G�{M���͟�kf�N���ĵ�R���
��z8G#�B�xk��H�h0������������܁��P(B�t��൜�Y2'�?H�m�4��`�?����$��PC����`|]��-ٙn�uꞮsj��pա�U����K��S/4a���e�9�W#�T��j6�a	`��/��!(h��4�s|�P�$U ���z'������R|�Ӛ��h�Gw��h�`�pb9�ڒ�_P��J����DO;��j�����:�a~��wY�c(�z$�׺��r��\hO��`&h�A�u~��IL�.|��� �hK�#tBNLط�5]��)T��q#��� �m���c9)H0���O�A������k��[ld�ŷMt)�4"J�'�';)@D��l��z�&�G�����8}d��Åh    +��:�oT8�v� �
x\��O�IԟM��amP�2��F��<!���!�'#q
�0'$�J����%����Q�P�1��-'>����sGԱ��c�Ru;�d%��*���?��6/��-���"���4k�vᒓ�8ׁ8���ʺȔ��R�l{�UqyT�AWK�w�Ok��9Z�#�Řd�t4�ӹ]=�q㆝��'�	�������dlf��=�����eSA`��f؝2�z��BHO��0"���V�`z/_�q�AM��R͍V���7�)V�V�R��ʝ�n3��c������7�����s{�T��5c,��(;n8���ܺ;���W�sM<�.����b�-���{��i!I4����+6Ҡ��6���^J`4�MB����6���R�����'pwVz)^��A��<1�հK�{.�b?�V�A^�2�K�{c*f�>S	*��o�U8*��+��W)B w-�"���yRZA�aG�x��À(�Gk�I�I�Ҙ�2��K�. �����U�kj�:/�E�2�!G(���_=d~����6�ǵ����0��)�i�0�h^+[�``{鴾�u��H~�V�GE���5|���ȃ`��昮M�ѻX�ҋ���G�c�| j睵�Ⴐ��~D�7�I6������%��R/e��E�?�j�J�.�Ml�H�	��0@�޻��-����;j���m�beI[PX���JXz���j�;��[�ɺ�j�A'p��kT���&�����=O����3���!A^t�f�P]�Drm"�{�����v
�OX��k�p�2C��T��UT�C���.��������|M��I���G!�t��U�4w^�Ki��@w8n�R�XB�~`-�����mC}�Z߫Mz!]�~�$��d����$[���Y�b���7�U���KovA[��
W�0�d[A3I��wh-Q��8���ki�!bR�k�G��7۲.V[���D���/��Ri��0u��LX8���/=���v�:��+$=%��T<�b�*�?VȒn6OH���!��ߘ/(�$�p��ݰs�I�7W��� z��Z�#i:p���N���!f8@X�\�4��w��?2+���K����X`����j���0����SH��oT/ڇ?T�!H��l
�K��h��Z�(`/ƃ�^�5��z5r�a���^a@� �uu �l���a�+](�0��E��xu���R��#q4l�e�����Ƒnh�[y Ph�euK�hִ�,�[�[3{�ڲ�z�y�+a�.����c�����-��*ٔ�h�%q�L��C��:����spτ�x�����vt�%����0H����칛h�Q�9*pi�aƞ�|��:#��/kԳȰ�^��;ьp�.;�\
1�~)�$�XG��۝:c�N�����gj���u�anTA�&a������a@�Mh  d��L���Ǩ~��^�N(�$U��!x�o�l:��m4�NK��Uq�׺��q�LTvj�'���J�MR�@�7X�0�	:��.��j��ۯZk�o��:s���l�,w)nT�~�i� ���^�ooWw�F��-��@����}_�i��w
��˅u�@�Pr��E�V�ITB��JOh}(3��S`b�s0��;ae���Ǯru_� ��[K��n��N�Ee|c��x7�*�HM��j�xϡ�	ey���A��:{���beY�(�r���m��C�N	��������c_��f}iV�}7�?�THBń�M�zVr*����RE���X(�����z�	�(Z�6��ɣ�H��Q��L�&&[�`�@��^o��>���lQ�'�F�W��= ���E*w���7%(% ���N'&�,�{���~�|m���+��q�MD
��I|:���Sm�y�Σ`��\[g�W8v�j'6mʿ�G�v/�m�ă�N\��$jqL��I.��z�$�ێ���c�jj��� ��<�"%���ߧ+h�Y�$Ğ�9ܔ�?�E�Ô	�i���+zj��'8����c�F��5|��~����D�n��
�Q��H�<[
֩A?{}ͬ�y�&I����X�ח�2A�<�)�+�A�a�"�rл�_���O�ӂ�"��̠O�lHyb;<`p�| e�� -�Ut��:wS���|8�'+1σ����\d���AJ��-L���5A�y;�N��e���zWH���4�ͷq�սA_v�6*F)%�:�RT���l:�l�d��hV4���p���hQ_cjW�?s���V-m'�e?��Յ$Y�!0&����<�B�G:�1�L�m�o�>��լ[�}��j���Le��4�Ah<�ǛJ��b����0����OO�̦]$g��W��n����ƬL\�"�����I����v��)���vnS���,��`0�x�^��5B"��(���5�) +@x���U�\*D<.3�e�ȡ}>�4*�ih��륖3(j>D��*U�@��ة��OQ�p0�J���!9�6߲5��)��R�t�{������}1K���ZQ�u��\��g7��W�q��s�$M{�L�)���"���E`�d�/�2�{�ץTn]�u9����Zkx���4r����+�7���l�0�Qtv(���D��.N�����Y����.���=��	,�����f�I+@��M�-l�GL�S���I�����lɞ$�?��>�x
Z�~!��t�}b,�߿g�p�c0���f���r=G�/��u��/��$�=�R�rᲵ��Ѵ�+b\����{�/P4RI��IH&�X$	C�zB�3�0�����1��[��SW.��F��T�>��jT�۹X�Oo`�>��s�K��<Q�{��^�:���{n��݊��h��{�I����}ۯ�>�UbG
"3�@�[�Y#�9D*	U--��eh �$�M��ʨ�]���>��T�s%��G����ai��(���O�-@`�� aR�T�t����k,t�ْ�*q�VXi�ʤc;w�3�!U(D��CMD����%��	���=V��*�c;��[Sn�̔��N����Jమ1� Y`�d�O\��,|5��7�I���He�/�/���F]�����d�T1Ȕ�����y,d���&������H:��0u��_a�~܍`�CMP���=�ؗ\���l�R+�؝v¡^f߳���qm-��<�O���l�*脡���T����ly������uo���Wi0��:�.�ʋ￫���n��;;E���(��\S����WVLi����}#F�Vie���]Mi�m$������-���%��=�,N��ˊ��A���6�f��"��z���j��~���]�~������/�8�ǿ��bGc��8�n�aB�}�T�;�r�rI�(4HieᲗٛn�����:-vpb}�_`�1��i�7$��W�O��)P�b���)$�����5f���E�`�9wN���a�в�2��e?b��M$U�Z���Q��-�T��v ��t�πIa�,�kƂ���_�.:�?���	������SQu]��:j�A��&��WC��]���l�@�%I
�8B�Q�k��YH5����9�fmϫ�_	[�8��4)�,������Zj]��,
-s�V�L�P�>S�v����(J�������u��^Ha��4�&�Գ�  ��2�Aw�G���#'v�=��NsP�ȧ\ԭ&�>����b��ҪP���J^L8�i����v���~�!^���;T9�fs�	��d,u}��w��G�A�l
�J_�&�([L,b�z.��Y���~�^�YWQQw��2���"�	i?"?�?#�����i=��j���"�	{t^���)[�봥�T��$�Gݏ� ��˰��D��LP�u�Yy�t��.��j ��:�i�n{��$��q���NCW324���������P  k	�j6�f��^#� �  ��W$ V}\�:�<���$���� �n��l�A٩�N�I�c�:ܿ/��#���X����ֻOn�a<��,N�&=#aB�\s�t�=�W�<��	C![����K����&����H�#�&��+e������KP�����z�g^��v9^1����WAُ~PW��k�i�T't
�6�aShvS-��Ey�s��v�y�<l��l�?gIa{��M�i�W�e����	U�7�1�G!�T�U! ܟ�3��$k 2$�Y��x-T1��������5�I���ҘJs�3_�-�ּ7�aT�5��[MҁG��@��6:*��	!���̖�X�OgT�ڋ��2*�4ֿZ��ť-��X�?#L�}Fe`�Ve`\dȤڽ#��d��II�z2�[���z��H����r)��5ڬכ���8[Rk5�NC�p�p����pWX�j�A�y|Fr�dv�WDZ$����,'0MI�hd�}��䮢U��:En�f4�������ig�      z      x������ � �      x      x������ � �      o   �   x�}�AB!C�p
.��t@`���č��R@�!_�Ih�̛����x4
"�.������f��&4�K"�F2���ʞ���!e�>4KjY��ҏ.g��w�����砯��<���i��HL'�s��W"k@5v���r�޿ \FQ      q   �  x����n�0���}&�I��Yv�:��aդ��5:F��&���������l�����w�	����~\�!=��Fde���E怇�������0���s�"t̸���)R�ԡ;��}L�e_�%=M��9��F�#���]|�Oֿ�O`c����c?Z3:��,|;�ׅ�@���X(凃EЧz�X���=�𜑣�B1�"t�q��B]6�^��X�Z;�f����UUY�7�a>�D�8�����V��7n�
�B:����p�V��ћ��b��������%�8��~1�Evց���N~���ի쨜�KaȔ��Mv�΄���:О�3���X����#>�dF@e毛�R�_���f�v�j�M�hݰ�?�w�����Ԏ�k�CF��+�_qƍ�+�>R�V�__ڶ��y��      �   �   x���A
�0E��)�@��L�I��F*��`��,Ju��0$���7�'9�(@��C�p����c�\���?/�y���x���/��e���4�	�x2q��qR:�6D-�K���Ͻ�e�ŝ�w�'�wQ_��.j@�	~9�?�T��     