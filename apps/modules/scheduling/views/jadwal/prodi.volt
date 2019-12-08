{% extends 'layout.volt' %}

{% block title %}Jadwal Kuliah Prodi{% endblock %}

{% block content %}
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Jadwal Kuliah Prodi</h3>
    </div>
    <div class="block-content">
        <form action="/jadwal/prodi" method="GET" style="width: 50%;margin: 0 auto;">
            <div class="form-group row" style="display: flex;">
                <label for="material-select" style="line-height: 2.3;margin-right: 10px;">Pilih Periode Kuliah : </label>
                <div class="" style="display: flex;">
                    <div class="form-material" style="display: flex;padding-top:0">
                        <select class="form-control" id="tahun" name="tahun" style="width: 100px;">
                            <option>{{ request.getQuery('tahun') }}</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                        </select>
                        <select class="form-control" id="tipe" name="tipe" style="width: 100px;">
                            <!-- <option>{{ request.getQuery('tipe') }}</option> -->
                            <option value="1" {% if request.getQuery('tipe') == 1 %} selected {% endif %}>Gasal</option>
                            <option value="2" {% if request.getQuery('tipe') == 2 %} selected {% endif %}>Genap</option>
                            <option value="3" {% if request.getQuery('tipe') == 3 %} selected {% endif %}>Pendek</option>
                        </select>
                        <button type="submit" class="btn btn-alt-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
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
                    <th class="text-center">Dosen</th>
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