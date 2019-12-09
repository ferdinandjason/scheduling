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
                <form method="POST" action="{{ url('/kelola-jadwal/tambah') }}">
                    <div class="form-group row">
                        <label>Hari</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            name="day" 
                            readonly
                            placeholder="Hari" 
                            value="{% if hari == 0 %} Senin
                            {% elseif hari == 1 %} Selasa
                            {% elseif hari == 2 %} Rabu
                            {% elseif hari == 3 %} Kamis
                            {% elseif hari == 4 %} Jumat {% endif %}" />
                    </div>
                    <div class="form-group row">
                        <label>Periode Kuliah</label>
                        <input type="number" class="form-control" name="periode_kuliah" readonly
                            placeholder="{{ periode }} " value="{{ periode }}" />
                    </div>

                    <div class="form-group row">
                        <label>Kelas</label>
                        <input type="number" class="form-control" name="kelas" readonly
                            placeholder="{{ kelas }}" value="{{ kelas }}" />
                    </div>

                    <div class="form-group row">
                        <label>Mata Kuliah</label>
                        <select class="form-control" name="id_kelas">
                            {% for mataKuliah in jadwalKuliah %}
                                <option value={{mataKuliah['id_kelas']}}>{{mataKuliah['nama_matkul']}} {{mataKuliah['nama_kelas']}}</option>
                            {% endfor %}
                        </select>
                    </div>

                    <input type="hidden" id="periode" name="id_periode_kuliah" value="{{id_periode}}">
                    <input type="hidden" id="kelas" name="id_prasarana" value="{{id_prasarana}}">
                    <input type="hidden" id="hari" name="hari" value="{{hari}}">

                    <button type="submit" class="btn btn-alt-primary mr-5 mb-5">
                        <i class="fa fa-floppy-o"></i> Simpan</button>
                    <a class="btn btn-alt-secondary mr-5 mb-5" role="button" href="{{ url('/kelola-jadwal/create') }}">
                        <i class="fa fa-times"></i> Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

{% endblock %}

{% block scripts %}

{% endblock %}