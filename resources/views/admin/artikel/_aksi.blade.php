<div class="btn-group">
    <a href="{{ $edit }}" class="btn btn-outline-success" title="Ubah data">
        <i class="fas fa-edit"></i>
    </a>
    <a href="{{ $show }}" class="btn btn-outline-info" title="Lihat detail">
        <i class="fas fa-eye"></i>
    </a>
    <button class="btn btn-outline-danger" onclick="hapus(`{{ $delete }}`)" title="Hapus data">
        <i class="fas fa-trash"></i>
    </button>
</div>
