{% extends 'layout.volt' %}

{% block title %}Jadwal Kuliah Prodi{% endblock %}

{% block content %}
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
                        <th class="text-center" scope="row">{{ semester.getAktif() }}</th>
                        <th class="text-center" scope="row">{{ semester.getTanggalMulai() }}</th>
                        <th class="text-center" scope="row">{{ semester.getTanggalSelesai() }}</th>
                        <th class="text-center" scope="row"> - </th>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>
{% endblock %}

{% block scripts %}

{% endblock %}