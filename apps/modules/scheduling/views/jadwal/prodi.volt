{% extends 'layout.volt' %}

{% block title %}Jadwal Kuliah Prodi{% endblock %}

{% block content %}
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Hover Table</h3>
        <div class="block-options">
            <div class="block-options-item">
                <code>.table-hover</code>
            </div>
        </div>
    </div>
    <div class="block-content">
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
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                {% for jadwal in jadwalKuliah %}
                    <tr>
                        <th class="text-center" scope="row">{{ jadwal.getKelas().getMataKuliah().getKodeMatkul() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getKelas().getMataKuliah().getNama() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getKelas().getNama() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getHariString() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getHariString() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getPeriodeKuliah().getStringForm() }}</th>
                        <th class="text-center" scope="row">{{ jadwal.getPrasarana().getNama() }}</th>
                        <th class="text-center" scope="row"> - </th>
                    </tr>
                {% endfor %}

                 <tr>
                      <th class="text-center" scope="row"></th>
                      <td>Jesse Fisher</td>
                      <td class="d-none d-sm-table-cell">
                          <span class="badge badge-primary">Personal</span>
                      </td>
                      <td class="text-center">
                          <div class="btn-group">
                              <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                  <i class="fa fa-pencil"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete">
                                  <i class="fa fa-times"></i>
                              </button>
                          </div>
                      </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
{% endblock %}

{% block scripts %}

{% endblock %}