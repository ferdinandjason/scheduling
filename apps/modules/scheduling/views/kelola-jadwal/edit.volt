{% extends 'layout.volt' %}

{% block title %}Periode Kuliah{% endblock %}

{% block content %}

{{ flashSession.output() }}

<div class="row">
    <div class="col-md-6">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Jadwal Kuliah</h3>
            </div>
            <div class="block-content">
                <form method="POST" action="{{ url('/kelola-jadwal/' ~jadwal.getId()~ '/edit') }}">
                    <div class="form-group row">
                        <label>Hari</label>
                        <select class="form-control" name="hari">
                            <option value=0 {% if jadwal.getHari() == 0 %} selected {% endif %}>Senin</option>
                            <option value=1 {% if jadwal.getHari() == 1 %} selected {% endif %}>Selasa</option>
                            <option value=2 {% if jadwal.getHari() == 2 %} selected {% endif %}>Rabu</option>
                            <option value=3 {% if jadwal.getHari() == 3 %} selected {% endif %}>Kamis</option>
                            <option value=4 {% if jadwal.getHari() == 4 %} selected {% endif %}>Jumat</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label>Periode Kuliah</label>
                        <select class="form-control" name="id_periode_kuliah">
                            {% for periode in periodeKuliah %}
                                <option value={{periode.getId()}} {% if periode.getId() == jadwal.getPeriodeKuliah().getId() %} selected {% endif %} >{{periode.getStringForm()}}</option>
                            {% endfor %}
                        </select>
                    </div>

                    <div class="form-group row">
                        <label>Kelas</label>
                        <select class="form-control" name="id_prasarana">
                            {% for kelas in prasarana %}
                                <option value={{kelas.getId()}} {% if periode.getId() == jadwal.getPrasarana().getId() %} selected {% endif %} >{{kelas.getNama()}}</option>
                            {% endfor %}
                        </select>
                    </div>

                    <div class="form-group row">
                        <label>Mata Kuliah</label>
                        <select class="form-control" name="id_kelas">
                            {% for mataKuliah in jadwalKuliah %}
                                <option value={{mataKuliah.getId()}} {% if mataKuliah.getId() == jadwal.getId() %} selected {% endif %}>{{mataKuliah.getNamaMatkulNamaKelasSKS()}}</option>
                            {% endfor %}
                        </select>
                    </div>

                    <button type="submit" class="btn btn-alt-primary mr-5 mb-5">
                        <i class="fa fa-floppy-o"></i> Simpan</button>
                    <a class="btn btn-alt-secondary mr-5 mb-5" role="button" href="{{ url('/kelola-jadwal') }}">
                        <i class="fa fa-times"></i> Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

{% endblock %}

{% block scripts %}

{% endblock %}