{% extends 'layout.volt' %}

{% block title %}Jadwal Kuliah Prodi{% endblock %}

{% block content %}
<div class="block">
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
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
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
                        {% for jadwal in jadwalKuliah %}
                            {% if jadwal.getPrasarana().getNama() == kelas.getNama() 
                                AND jadwal.getPeriodeKuliah().getMulai() == periode.getMulai() 
                                AND jadwal.getPeriodeKuliah().getSelesai() == periode.getSelesai() %}
                            <th class="text-center" scope="row">
                                <div>{{jadwal.getKelas().getMataKuliah().getNama()}}</div>
                                <div>{{jadwal.getKelas().getMataKuliah().getKodeMatkul()}}</div>
                                <div>{{jadwal.getDosen().getNama()}}</div>
                            </th>
                            {% endif %}
                        {% endfor %}
                    {% endfor %}
                    </tr>
                    <!-- <tr>
                        <th class="text-center" scope="row">{{ jadwal.getKelas().getMataKuliah().getKodeMatkul() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getKelas().getMataKuliah().getNama() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getKelas().getSksKelas() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getKelas().getNama() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getHariString() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getPeriodeKuliah().getStringForm() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getPrasarana().getNama() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getDosen().getNama() }}</th>
                    </tr> -->
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>
{% endblock %}

{% block scripts %}

{% endblock %}