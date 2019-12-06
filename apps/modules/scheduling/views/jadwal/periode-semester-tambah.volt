{% extends 'layout.volt' %}

{% block title %}Periode Kuliah{% endblock %}

{% block content %}

{{ flashSession.output() }}

<div class="row">
    <div class="col-md-6">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Kelola Semester</h3>
            </div>
            <div class="block-content">
                {% if action == 'Edit' %}
                <form method="post" action="{{ url('/semester/' ~periodeSemester.getId()~ '/edit') }}">
                    <div class="form-group row">
                        <label>ID Semester</label>
                        <input type="number" class="form-control" name="id_semester" readonly
                            placeholder="ID Semester" value="{{ periodeSemester.getId() }}" />
                    </div>
                {% else %}
                <form method="post" action="{{ url('/semester/tambah') }}">
                {% endif %}

                        <div class="form-group row">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama"
                                value="{{ periodeSemester.getNama() }}" />
                        </div>

                        <div class="form-group row">
                            <label>Singkatan</label>
                            <input type="text" class="form-control" name="singkatan"
                                value="{{ periodeSemester.getSingkatan() }}" />
                        </div>

                        <div class="form-group row">
                            <label>Tahun Ajaran</label>
                            <input type="text" class="form-control" name="tahun_ajaran"
                                value="{{ periodeSemester.getTahunAjaran() }}" />
                        </div>

                        <div class="form-group row">
                            <label>Semester</label>
                            <input type="text" class="form-control" name="semester"
                                value="{{ periodeSemester.getSemester() }}" />
                        </div>

                        <div class="form-group row">
                            <label>Aktif</label>
                            <input type="text" class="form-control" name="aktif"
                                value="{{ periodeSemester.getAktif() }}" />
                        </div>

                        <div class="form-group row">
                            <label>Tanggal Mulai</label>
                            <input type="text" class="form-control" name="tanggal_mulai"
                                value="{{ periodeSemester.getTanggalMulai() }}" />
                        </div>

                        <div class="form-group row">
                            <label>Tanggal Selesai</label>
                            <input type="text" class="form-control" name="tanggal_selesai"
                                value="{{ periodeSemester.getTanggalSelesai() }}" />
                        </div>


                        <button type="submit" class="btn btn-alt-primary mr-5 mb-5">
                            <i class="fa fa-floppy-o"></i> Simpan</button>
                        <a class="btn btn-alt-secondary mr-5 mb-5" role="button" href="{{ url('/semester') }}">
                            <i class="fa fa-times"></i> Batal</a>
                    </form>
            </div>
        </div>
    </div>
</div>

{% endblock %}

{% block scripts %}

{% endblock %}