<div class="livewire-content">
                <!-- Stats Cards - Diubah untuk 3 card per baris di HP -->
                <div class="livewire-stats">
                    <div class="stat-card primary">
                        <div class="stat-header">
                            <div class="stat-title">Total Kamar</div>
                            <div class="stat-trend positive" x-show="roomChange > 0">
                                <i class="fas fa-arrow-up"></i>
                                <span x-text="roomChange + '%'"></span>
                            </div>
                        </div>
                        <div class="stat-content">
                            <div class="stat-value" x-text="roomCount"></div>
                            <div class="stat-icon primary">
                                <i class="fas fa-bed"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="stat-card secondary">
                        <div class="stat-header">
                            <div class="stat-title">Penghuni Aktif</div>
                            <div class="stat-trend positive">
                                <i class="fas fa-arrow-up"></i>
                                <span>+2 baru</span>
                            </div>
                        </div>
                        <div class="stat-content">
                            <div class="stat-value" x-text="tenantCount"></div>
                            <div class="stat-icon secondary">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="stat-card accent">
                        <div class="stat-header">
                            <div class="stat-title">Pendapatan Bulan Ini</div>
                            <div class="stat-trend positive">
                                <i class="fas fa-arrow-up"></i>
                                <span>8%</span>
                            </div>
                        </div>
                        <div class="stat-content">
                            <div class="stat-value">Rp 15.2Jt</div>
                            <div class="stat-icon accent">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="stat-card danger">
                        <div class="stat-header">
                            <div class="stat-title">Kamar Kosong</div>
                            <div class="stat-trend negative">
                                <i class="fas fa-arrow-down"></i>
                                <span>-2</span>
                            </div>
                        </div>
                        <div class="stat-content">
                            <div class="stat-value" x-text="vacantRooms"></div>
                            <div class="stat-icon danger">
                                <i class="fas fa-door-open"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts -->
                <div class="livewire-charts">
                    <div class="chart-container">
                        <div class="chart-header">
                            <h3 class="chart-title">Pendapatan 6 Bulan Terakhir</h3>
                            <select class="form-select" style="width: auto;" x-model="selectedYear" @change="updateChart">
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                            </select>
                        </div>
                        <div class="chart-wrapper">
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>
                    
                    <div class="chart-container">
                        <div class="chart-header">
                            <h3 class="chart-title">Status Kamar</h3>
                        </div>
                        <div class="chart-wrapper">
                            <canvas id="roomStatusChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="livewire-activity">
                    <div class="activity-header">
                        <h3 class="activity-title">Aktivitas Terbaru</h3>
                        <a href="#" style="color: var(--primary); text-decoration: none; font-size: 0.9rem; font-weight: 500;">Lihat Semua</a>
                    </div>
                    
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon income">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <div class="activity-details">
                                <div class="activity-text">Pembayaran diterima dari Andi (Kamar 101)</div>
                                <div class="activity-time">10 menit yang lalu</div>
                            </div>
                        </div>
                        
                        <div class="activity-item">
                            <div class="activity-icon tenant">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="activity-details">
                                <div class="activity-text">Penghuni baru: Sari (Kamar 205)</div>
                                <div class="activity-time">1 jam yang lalu</div>
                            </div>
                        </div>
                        
                        <div class="activity-item">
                            <div class="activity-icon maintenance">
                                <i class="fas fa-tools"></i>
                            </div>
                            <div class="activity-details">
                                <div class="activity-text">Perbaikan kamar 201 selesai</div>
                                <div class="activity-time">3 jam yang lalu</div>
                            </div>
                        </div>
                        
                        <div class="activity-item">
                            <div class="activity-icon booking">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div class="activity-details">
                                <div class="activity-text">Booking kamar 105 diterima</div>
                                <div class="activity-time">Hari ini, 09:30</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Bookings -->
                <div class="livewire-table">
                    <div class="table-header">
                        <h3 class="table-title">Pembayaran Terbaru</h3>
                        <a href="#" style="color: var(--primary); text-decoration: none; font-size: 0.9rem; font-weight: 500;">Lihat Semua</a>
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
                                            <button class="btn-action" @click="printReceipt(1)"><i class="fas fa-print"></i></button>
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
                                            <button class="btn-action" @click="approvePayment(2)"><i class="fas fa-check"></i></button>
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
                                            <button class="btn-action" @click="printReceipt(3)"><i class="fas fa-print"></i></button>
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
                                            <button class="btn-action" @click="reprocessPayment(4)"><i class="fas fa-redo"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>