{% extends 'layout.volt' %}

{% block title %}Jadwal Kuliah Mahasiswa{% endblock %}

{% block content %}

<a class="btn btn-info" href="{{ url('/dosen/1/perwalian') }}">Back</a><br />

<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Jadwal Kuliah Mahasiswa</h3>
    </div>
    <div class="block-content">
        <table class="table table-hover table-vcenter">
            <thead>
                <tr>
                    <th class="text-center">Mata Kuliah</th>
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Hari</th>
                    <th class="text-center">Waktu</th>
                    <th class="text-center">Ruang</th>
                    <th class="text-center">Dosen</th>
                </tr>
            </thead>
            <tbody>
                {% for jadwal in jadwalKuliah %}
                    <tr>
                        <th class="text-center" scope="row">{{ jadwal.getKelas().getMataKuliah().getKodeMatkul()}} - {{jadwal.getKelas().getMataKuliah().getNama() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getKelas().getNama() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getHariString() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getPeriodeKuliah().getStringForm() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getPrasarana().getNama() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getDosen().getNama() }}</th>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>
{% endblock %}

{% block scripts %}

{% endblock %}