{% extends 'layout.volt' %}

{% block title %}Periode Kuliah{% endblock %}

{% block styles %}
{% endblock %}

{% block content %}

{{ flashSession.output() }}

<div class="row">
    <div class="col-md-6">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Kelola Periode Kuliah</h3>
            </div>
            <div class="block-content">
                {% if action == 'Edit' %}
                <form method="post" action="{{ url('/periode-kuliah/' ~periodeKuliah.getId()~ '/edit') }}">
                    <div class="form-group row">
                        <label>ID Periode Kuliah</label>
                        <input type="number" class="form-control" name="id_periode_kuliah" readonly
                            placeholder="ID Periode Kuliah" value="{{ periodeKuliah.getId() }}" />
                    </div>
                {% else %}
                    <form method="post" action="{{ url('/periode-kuliah/tambah') }}">
                {% endif %}

                        <div class="form-group row">
                            <label>Jam Mulai</label>
                            <input type="text" class="form-control" name="jam_mulai" placeholder="00.00"
                                value="{{ periodeKuliah.getStringFormMulai() }}" />
                        </div>

                        <div class="form-group row">
                            <label>Jam Selesai</label>
                            <input type="text" class="form-control" name="jam_selesai" placeholder="00.00"
                                value="{{ periodeKuliah.getStringFormSelesai() }}" />
                        </div>

                        <button type="submit" class="btn btn-alt-primary mr-5 mb-5">
                            <i class="fa fa-floppy-o"></i> Simpan</button>
                        <a class="btn btn-alt-secondary mr-5 mb-5" role="button" href="{{ url('/periode-kuliah') }}">
                            <i class="fa fa-times"></i> Batal</a>
                    </form>
            </div>
        </div>
    </div>
</div>

{% endblock %}

{% block scripts %}
{% endblock %}