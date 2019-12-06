{% extends 'layout.volt' %}

{% block title %}Jadwal Kuliah Prodi{% endblock %}

{% block content %}

{{ flashSession.output() }}

<a class="btn btn-primary mb-5" href="semester/tambah" role="button">
    <i class="fa fa-plus"></i> Tambah Data</a>

<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Periode Semester</h3>
    </div>
    <div class="block-content">
        <table class="table table-hover table-vcenter">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">ID Semester</th>
                    <th class="text-center">Tahun Ajaran</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Singkatan</th>
                    <th class="text-center">Semester</th>
                    <th class="text-center">Semester Aktif</th>
                    <th class="text-center">Tanggal Mulai</th>
                    <th class="text-center">Tanggal Selesai</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                {% for semester in periodeSemester %}
                    <tr>
                        <th class="text-center" scope="row">{{ semester.getId() }}</th>
                        <th class="text-center" scope="row">{{ semester.getTahunAjaran() }}</th>
                        <th class="text-center" scope="row">{{ semester.getNama() }}</th>
                        <th class="text-center" scope="row">{{ semester.getSingkatan() }}</th>
                        <th class="text-center" scope="row">{{ semester.getSemester() }}</th>
                        <th class="text-center" scope="row">
                            {% if semester.getAktif() == 1 %}
                                <span class="badge badge-pill badge-primary">Aktif</span>
                            {% else %}
                                <span class="badge badge-pill badge-danger">Tidak Aktif</span>
                            {% endif %}
                            <!-- {{ semester.getAktif() }} -->
                        </th>
                        <th class="text-center" scope="row">{{ semester.getTanggalMulai() }}</th>
                        <th class="text-center" scope="row">{{ semester.getTanggalSelesai() }}</th>
                        <th class="text-center" scope="row">
                            <form method="POST" action="{{ url('/semester/' ~semester.getId()~ '/hapus') }}"
                            onsubmit="return confirm('Apakah yakin untuk menghapus data?')">
                                    <a class="btn btn-sm btn-circle btn-outline-info mr-5 mb-5" role="button"
                                    href="{{ url('/semester/' ~ semester.getId() ~ '/edit') }}"
                                    >
                                        <i class="fa fa-edit"></i></a>
                                    <input type="hidden" name="id_semester" value="{{ semester.getId() }}" />
                                    <button type="submit" class="btn btn-sm btn-circle btn-outline-danger mr-5 mb-5">
                                        <i class="fa fa-trash"></i>
                                    </button>
                            </form>
                        </th>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>
{% endblock %}

{% block scripts %}

{% endblock %}