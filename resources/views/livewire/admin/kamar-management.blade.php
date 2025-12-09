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
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kamar</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#001</td>
                        <td>Budi Santoso</td>
                        <td>101</td>
                        <td>Rp 1,200,000</td>
                        <td>15 Jan 2024</td>
                        <td><span class="status-badge status-paid">Lunas</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-action" @click="viewPayment(1)"><i class="fas fa-eye"></i></button>
                                <button class="btn-action" @click="printReceipt(1)"><i
                                        class="fas fa-print"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>#002</td>
                        <td>Sari Dewi</td>
                        <td>205</td>
                        <td>Rp 1,500,000</td>
                        <td>14 Jan 2024</td>
                        <td><span class="status-badge status-pending">Pending</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-action" @click="approvePayment(2)"><i
                                        class="fas fa-check"></i></button>
                                <button class="btn-action" @click="viewPayment(2)"><i class="fas fa-eye"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>#003</td>
                        <td>Rudi Hartono</td>
                        <td>103</td>
                        <td>Rp 1,200,000</td>
                        <td>13 Jan 2024</td>
                        <td><span class="status-badge status-paid">Lunas</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-action" @click="viewPayment(3)"><i class="fas fa-eye"></i></button>
                                <button class="btn-action" @click="printReceipt(3)"><i
                                        class="fas fa-print"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>#004</td>
                        <td>Maya Sari</td>
                        <td>302</td>
                        <td>Rp 1,800,000</td>
                        <td>12 Jan 2024</td>
                        <td><span class="status-badge status-cancelled">Batal</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-action" @click="viewPayment(4)"><i class="fas fa-eye"></i></button>
                                <button class="btn-action" @click="reprocessPayment(4)"><i
                                        class="fas fa-redo"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="modalCreateKamar" class="modal-overlay">
            <div class="modal-container">
                <div class="form-header">
                    <h2 style="margin:0;">Tambah Kamar Kost</h2>
                    <button  class="btn-close" onclick="hideModal('modalCreateKamar')">&times;</button>
                </div>

                <form wire:submit.prevent="store">
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Nomor Kamar</label>
                            <input type="text" name="nomor_kamar" class="form-input" placeholder="Cth: A-01">
                            @error('number')
                                <span class="text-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nama / Tipe Kamar</label>
                            <input type="text" name="nama_kamar" class="form-input"   placeholder="Cth: Kamar Standard">
                            @error('name')
                                <span class="text-alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="tersedia">Tersedia</option>
                                <option value="terisi">Tidak tersedia</option>
                            </select>
                            @error('status')
                                <span class="text-alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Fasilitas</label>
                            <input type="text" name="fasilitas" class="form-input"  placeholder="Cth: WiFi, AC, Kamar Mandi Dalam">
                            @error('facility')
                                <span class="text-alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Harga 3 Bulan</label>
                            <input type="number" name="harga_3bulan" class="form-input" placeholder="0">
                            @error('harga3bulan')
                                <span class="text-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Harga 6 Bulan</label>
                            <input type="number" name="harga_6bulan" class="form-input" placeholder="0">
                            @error('harga6bulan')
                                <span class="text-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">Harga 1 Tahun</label>
                            <input type="number" name="harga_1tahun" class="form-input" placeholder="0">
                            @error('harga1tahun')
                                <span class="text-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">Foto Kamar</label>
                            <input type="file" name="foto" class="form-input" accept="image/*">
                            @error('image')
                                <span class="text-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="description" rows="4" class="form-textarea" placeholder="Masukkan detail deskripsi kamar..."></textarea>
                            @error('description')
                                <span class="text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" onclick="hideModal('modalCreateKamar')"
                            class="btn btn-secondary">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
