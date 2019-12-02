{% extends 'layout.volt' %}

{% block title %}Jadwal Kuliah Prodi{% endblock %}

{% block content %}
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Periode Semester</h3>
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