{% extends 'layout.volt' %}

{% block title %}Periode Kuliah{% endblock %}

{% block content %}

{{ flashSession.output() }}

<a class="btn btn-primary mb-5" href="periode-kuliah/tambah" role="button">
    <i class="fa fa-plus"></i> Tambah Data</a>

<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Periode Kuliah</h3>
    </div>
    <div class="block-content">
        <table class="table table-hover table-vcenter">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">ID</th>
                    <th class="text-center">Jam Mulai</th>
                    <th class="text-center">Jam Selesai</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                {% for periode in periodeKuliah %}
                    <tr>
                        <th class="text-center" scope="row">{{ periode.getId() }}</th>
                        <th class="text-center" scope="row">{{ periode.getStringFormMulai() }}</th>
                        <th class="text-center" scope="row">{{ periode.getStringFormSelesai() }}</th>
                        <th class="text-center" scope="row">
                            <form method="POST" action="{{ url('/periode-kuliah/' ~periode.getId()~ '/hapus') }}" 
                            onsubmit="return confirm('Apakah yakin untuk menghapus data?')">
                                    <a class="btn btn-sm btn-circle btn-outline-info mr-5 mb-5" role="button"
                                    href="{{ url('/periode-kuliah/' ~ periode.getId() ~ '/edit') }}"
                                    >
                                        <i class="fa fa-edit"></i></a>
                                    <input type="hidden" name="id_periode_kuliah" value="{{ periode.getId() }}" />
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