{% extends 'layout.volt' %}

{% block title %}Jadwal Kuliah Prodi{% endblock %}

{% block content %}
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Jadwal Kuliah Prodi</h3>
    </div>
    <div class="block-content">
        <table class="table table-hover table-vcenter">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">Kode MK</th>
                    <th class="text-center">Mata Kuliah</th>
                    <th class="text-center">SKS</th>
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Hari</th>
                    <th class="text-center">Pukul</th>
                    <th class="text-center">Ruang</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                {% for jadwal in jadwalKuliah %}
                    <tr>
                        <th class="text-center" scope="row">{{ jadwal.getKelas().getMataKuliah().getKodeMatkul() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getKelas().getMataKuliah().getNama() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getKelas().getSksKelas() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getKelas().getNama() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getHariString() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getPeriodeKuliah().getStringForm() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getPrasarana().getNama() }}</th>
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