create table periode_kuliah(
    id int not null primary key,
    mulai time,
    selesai time
);

create table mata_kuliah(
    id int not null primary key,
    kode_matkul char(8),
    nama varchar(20),
    nama_inggris varchar(20),
    sks decimal(5,2),
    nomor_urut_transkrip int,
    hitung_pengumpulan boolean,
    deskripsi text
);

create table semester(
    id int not null primary key,
    id_tahun_ajaran int,
    nama varchar(20),
    nama_inggris varchar(20),
    singkatan varchar(16),
    singkatan_inggris varchar(16),
    semester boolean,
    aktif boolean,
    tanggal_mulai date,
    tanggal_selesai date
);

create table dosen(
    id int not null primary key,
    nama varchar(100),
    nik char(16),
    jenis_kelamin char(1),
    tempat_lahir varchar(100),
    tanggal_lahir date,
    -- golongan_darah char(4),
    gelar_depan varchar(25),
    gelar_belakang varchar(25),
    nidn char(10),
    nip char(18),
    -- npwp char(15),
    -- nama_wajib_pajak varchar(100),
    email_pertama varchar(255),
    -- email_kedua varchar(255),
    -- email_ketiga varchar(255),
    -- kartu_pegawai varchar(25),
    -- askes varchar(25),
    -- taspen varchar(25),
    nomor_telepon varchar(16),
    nomor_handphone varchar(16)
    -- tanggal_wafat date,
    -- tanggal_pensiun date,
    -- fingerprint int,
    -- id_pddikti int,
    -- id_google_scholar varchar(20),
    -- id_scopus varchar(20),
    -- id_sinta varchar(20),
    -- id_simpeg_pegawai varchar(18)
);

create table kelas(
    id int not null primary key,
    id_semester int,
    foreign key (id_semester) REFERENCES semester(id),
    id_mata_kuliah int,
    foreign key (id_mata_kuliah) REFERENCES mata_kuliah(id),
    nama varchar(20),
    nama_inggris varchar(20),
    daya_tampung smallint,
    jumlah_terisi smallint,
    sks_kelas decimal(5,2),
    rencana_tatap_muka int(2),
    realisasi_tatap_muka int(2),
    kelas_jarak_jauh boolean,
    validasi_tatap_muka boolean,
    waktu_validasi_tatap_muka timestamp
);

create table aktivitas_mengajar (
    id_dosen int,
    foreign key (id_dosen) REFERENCES dosen(id),
    id_kelas int,
    foreign key (id_kelas) REFERENCES kelas(id),
    urutan int(2),
    sks_mengajar decimal(5,2),
    rencana_tatap_muka int(2),
    realisasi_tatap_muka int(2),
    validasi_tatap_muka boolean,
    waktu_validasi_tatap_muka timestamp
);