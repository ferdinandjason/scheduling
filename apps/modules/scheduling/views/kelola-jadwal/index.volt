{% extends 'layout.volt' %}

{% block title %}Jadwal Kuliah Prodi{% endblock %}

{% block styles%}
<style>
    .content {
        max-width:100% !important;
    }
</style>
{% endblock %}

{% block content %}
<div class="block" style="max-width: 100% !important;">
    <div class="block-header block-header-default">
        <h3 class="block-title">Jadwal Kuliah Prodi</h3>
    </div>
    <div class="block-content">
        <form action="/kelola-jadwal" method="GET" style="width: 50%;margin: 0 auto;">
            <div class="form-group row" style="display: flex;">
                <label for="material-select" style="line-height: 2.3;margin-right: 10px;">Pilih Hari : </label>
                <div class="" style="display: flex;">
                    <div class="form-material" style="display: flex;padding-top:0">
                        <select class="form-control" id="day" name="day" style="width: 100px;">
                            <option value="0" {% if request.getQuery('day') == 0 %}selected {% endif %}>Senin</option>
                            <option value="1" {% if request.getQuery('day') == 1 %}selected {% endif %}>Selasa</option>
                            <option value="2" {% if request.getQuery('day') == 2 %}selected {% endif %}>Rabu</option>
                            <option value="3" {% if request.getQuery('day') == 3 %}selected {% endif %}>Kamis</option>
                            <option value="4" {% if request.getQuery('day') == 4 %}selected {% endif %}>Jumat</option>
                        </select>
                        <button type="submit" class="btn btn-alt-primary">Cari</button>
                    </div>
                </div>
            </div>
        </form>
        <table class="table table-hover table-vcenter">
            <thead>
                <tr>
                    <th class="text-center">Periode Kuliah</th>
                    {% for kelas in prasarana %}
                        <th class="text-center">{{kelas.getNama()}}</th>
                    {% endfor %}
                </tr>
            </thead>
            <tbody>

                {% for periode in periodeKuliah %}
                    <tr>
                    <th class="text-center" scope="row">{{periode.getStringForm()}}</th>
                    {% for kelas in prasarana %}
                        {% set kosong = 1 %}
                        {% for jadwal in jadwalKuliah %}
                            {% if jadwal.getPrasarana().getNama() == kelas.getNama() 
                                AND jadwal.getPeriodeKuliah().getMulai() == periode.getMulai() 
                                AND jadwal.getPeriodeKuliah().getSelesai() == periode.getSelesai() %}
                                {% set kosong = 0 %}
                            <th class="text-center" scope="row"{% if !jadwal.isValid() %} style="background:red" {% endif %}>
                                <div>{{jadwal.getKelas().getMataKuliah().getNama()}} - {{jadwal.getKelas().getNama()}}</div>
                                <div>{{jadwal.getKodeMatkulNamaKelasSKS()}}</div>
                                <div>{{jadwal.getDosen().getNama()}}</div>
                                <form method="POST" action="{{ url('/kelola-jadwal/' ~jadwal.getId()~ '/hapus') }}" onsubmit="return confirm('Apakah yakin untuk menghapus data?')">
                                    <a class="btn btn-sm btn-circle btn-outline-info mr-5 mb-5" role="button" href="{{ url('/kelola-jadwal/' ~jadwal.getId()~ '/edit') }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="submit" class="btn btn-sm btn-circle btn-outline-danger mr-5 mb-5">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </th>
                            {% endif %}
                        {% endfor %}
                        {%if kosong == 1 %}
                            <th class="text-center" scope="row">
                                <form method="POST" action="{{ url('/kelola-jadwal/tambah') }}">
                                    <input type="hidden" id="periode" name="periode" value="{{periode.getStringForm()}}">
                                    <input type="hidden" id="periode" name="id_periode" value="{{periode.getId()}}">
                                    <input type="hidden" id="kelas" name="kelas" value="{{kelas.getNama()}}">
                                    <input type="hidden" id="periode" name="id_prasarana" value="{{kelas.getId()}}">
                                    <input type="hidden" id="hari" name="hari" value="{% if request.getQuery('day') != null %} {{request.getQuery('day')}} {% else %} {{0}} {% endif %}">
                                    <button type="submit" class="btn btn-sm btn-circle btn-outline-success mr-5 mb-5">
                                        <i class="fa fa-plus-circle"></i>
                                    </button>
                                </form>
                            </th>
                        {% endif %}
                    {% endfor %}
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
    <div style="text-align:center">
        <a class="btn btn-sm btn-circle btn-outline-info mr-5 mb-5" role="button" href="{{ url('/kelola-jadwal/' ~request.getQuery('day')~ '/validasi?day=' ~request.getQuery('day') ) }}">
            <i class="fa fa-save"></i>
        </a>
    </div>
</div>
{% endblock %}

{% block scripts %}

{% endblock %}