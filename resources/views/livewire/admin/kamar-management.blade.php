<div>
    <div class="livewire-table" style="margin: 20px">
        <div class="table-header">
            <h3 class="table-title">Daftar kamar</h3>
            <button class="status-badge status-paid" onclick="showModal('modalCreateKamar')">Tambah Kamar</button>
        </div>

        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nomor</th> <th>Nama Kamar</th>
                        <th>Fasilitas</th>
                        <th>Status</th>
                        <th>Harga (3 Bln)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    </tbody>
            </table>
        </div>

        <div id="modalCreateKamar" class="modal-overlay">
            <div class="modal-container">
                <div class="form-header">
                    <h2 style="margin:0;">Tambah Kamar Kost</h2>
                    <button class="btn-close" onclick="hideModal('modalCreateKamar')">&times;</button>
                </div>

                <form wire:submit.prevent="store">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Nomor Kamar</label>
                            <input type="text" wire:model="number" name="number" class="form-input" placeholder="Cth: A-01">
                            @error('number') <span class="text-error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nama / Tipe Kamar</label>
                            <input type="text" wire:model="name" name="name" class="form-input" placeholder="Cth: Kamar Standard">
                            @error('name') <span class="text-error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select wire:model="status" name="status" class="form-select">
                                <option value="">Pilih Status</option>
                                <option value="tersedia">Tersedia</option>
                                <option value="terisi">Tidak tersedia</option>
                                <option value="perbaikan">Dalam Perbaikan</option>
                            </select>
                            @error('status') <span class="text-error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Fasilitas</label>
                            <input wire:model="facility" name="facility" type="text" class="form-input" placeholder="Cth: WiFi, AC">
                            @error('facility') <span class="text-error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Harga 3 Bulan</label>
                            <input wire:model="harga3bulan" name="harga3bulan" type="number" class="form-input" placeholder="0">
                            @error('harga3bulan') <span class="text-error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Harga 6 Bulan</label>
                            <input type="number" wire:model="harga6bulan" name="harga6bulan" class="form-input" placeholder="0">
                            @error('harga6bulan') <span class="text-error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">Harga 1 Tahun</label>
                            <input type="number" wire:model="harga1tahun" name="harga1tahun" class="form-input" placeholder="0">
                            @error('harga1tahun') <span class="text-error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">Foto Kamar</label>
                            <input type="file" wire:model="image" name="image" class="form-input" accept="image/*">

                            <div wire:loading wire:target="image" style="color: blue; font-size: 12px;">Sedang mengupload...</div>
                            @error('image') <span class="text-error">{{ $message }}</span> @enderror

                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" width="100" style="margin-top:10px; border-radius:5px;">
                            @endif
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">Deskripsi</label>
                            <textarea wire:model="description" name="description" rows="4" class="form-textarea" placeholder="Detail deskripsi..."></textarea>
                            @error('description') <span class="text-error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit"  class="btn btn-primary">
                            <span wire:loading.remove>Simpan Data</span>
                            <span wire:loading>Menyimpan...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
