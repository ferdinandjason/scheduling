{% extends 'layout.volt' %}

{% block title %}Mahasiswa Perwalian{% endblock %}

{% block content %}

{{ flashSession.output() }}

<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Mahasiswa Perwalian</h3>
    </div>
    <div class="block-content">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th class="text-center">NRP</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                {% for mahasiswa in mahasiswaPerwalian %}
                    <tr>
                        <th class="text-center" scope="row">{{ mahasiswa.getNRP() }}</th>
                        <th class="text-center" scope="row">{{ mahasiswa.getNama() }}</th>
                        <th class="text-center" scope="row">
                            <a class="btn btn-sm btn-circle btn-outline-info mr-5 mb-5" role="button"
                            href="#"
                            >
                                <i class="fa fa-eye"></i></a>
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