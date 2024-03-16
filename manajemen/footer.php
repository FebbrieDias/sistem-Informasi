<!-- footer  -->

</div>
</div>
<nav class="layout-footer footer bg-white">
    <div class="container-fluid d-flex flex-wrap justify-content-between text-center container-p-x pb-3">
        <div class="pt-3 d-none d-md-block">
            <span class="footer-text font-weight-semibold">&copy; CV. Dias Bersaudara</span>
        </div>
        <div class="pt-3">
            <span><strong>Copyright &copy; 2023</strong> - Sistem Informasi Laporan Keuangan</span>
        </div>
    </div>
</nav>

</div>

</div>
<div class="layout-overlay layout-sidenav-toggle"></div>
</div>

<!-- Core scripts -->
<script src="../assets/dist/js/pace.js"></script>
<script src="../assets/dist/js/jquery-3.3.1.min.js"></script>
<script src="../assets/dist/libs/popper/popper.js"></script>
<script src="../assets/dist/js/bootstrap.js"></script>
<script src="../assets/dist/js/sidenav.js"></script>
<script src="../assets/dist/js/layout-helpers.js"></script>
<script src="../assets/dist/js/material-ripple.js"></script>

<!-- Libs -->
<script src="../assets/dist/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="../assets/dist/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="../assets/bower_components/DataTables-1.13.6/js/jquery.dataTables.js"></script>
<script src="../assets/bower_components/DataTables-1.13.6/datatables.min.js"></script>


<!-- Demo -->
<script src="../assets/dist/js/demo.js"></script>
<script src="../assets/dist/js/analytics.js"></script>
<script>
    $(document).ready(function() {
        $('#table-datatable').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': true,
            "pageLength": 50,
        });

        var options = {
            series: [{
                    name: "Pemasukan",
                    data: [
                        <?php
                        for ($bulan = 1; $bulan <= 12; $bulan++) {
                            $thn_ini = date('Y');
                            $pemasukan = mysqli_query($koneksi, "select sum(transaksi_nominal) as total_pemasukan from transaksi where transaksi_jenis='Pemasukan' and month(transaksi_tanggal)='$bulan' and year(transaksi_tanggal)='$thn_ini'");
                            $pem = mysqli_fetch_assoc($pemasukan);

                            $total = $pem['total_pemasukan'];
                            if ($pem['total_pemasukan'] == "") {
                                echo "0,";
                            } else {
                                echo $total . ",";
                            }
                        }
                        ?>
                    ]
                },
                {
                    name: "Pengeluaran",
                    data: [
                        <?php
                        for ($bulan = 1; $bulan <= 12; $bulan++) {
                            $thn_ini = date('Y');
                            $pengeluaran = mysqli_query($koneksi, "select sum(transaksi_nominal) as total_pengeluaran from transaksi where transaksi_jenis='pengeluaran' and month(transaksi_tanggal)='$bulan' and year(transaksi_tanggal)='$thn_ini'");
                            $peng = mysqli_fetch_assoc($pengeluaran);

                            $total = $peng['total_pengeluaran'];
                            if ($peng['total_pengeluaran'] == "") {
                                echo "0,";
                            } else {

                                echo $total . ",";
                            }
                        }
                        ?>
                    ]
                },
            ],
            chart: {
                foreColor: "#bac0c7",
                height: 210,
                type: 'area',
                zoom: {
                    enabled: false
                },
                toolbar: {
                    show: false
                }
            },
            colors: ['#39DA8A', '#f1376e'],
            dataLabels: {
                enabled: false,
            },
            stroke: {
                show: true,
                curve: 'smooth',
                lineCap: 'butt',
                colors: undefined,
                width: 2,
                dashArray: 0,
            },
            fill: {
                gradient: {
                    shade: 'dark',
                    type: "vertical",
                    shadeIntensity: 0.5,
                    gradientToColors: undefined,
                    inverseColors: true,
                    opacityFrom: 0.5,
                    opacityTo: 0.2,
                    stops: [0, 50, 100],
                    colorStops: []
                },
            },
            grid: {
                borderColor: '#f7f7f7',
                row: {
                    colors: ['transparent'], // takes an array which will be repeated on columns
                    opacity: 0
                },
                yaxis: {
                    lines: {
                        show: true,
                    },
                },
            },
            legend: {
                position: 'top',
                horizontalAlign: 'left',
                show: true,
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                labels: {
                    show: true,
                },
                axisBorder: {
                    show: true
                },
                axisTicks: {
                    show: true
                },
                tooltip: {
                    enabled: true,
                },
            },
            yaxis: {
                labels: {
                    show: true,
                    formatter: function(val) {
                        return "Rp." + val.toLocaleString() + ",-";
                    }
                }

            },
        };
        var chart = new ApexCharts(document.querySelector("#grafik1"), options);
        chart.render();

        var options = {
            series: [{
                name: 'Pemasukan',
                data: [
                    <?php
                    $tahun = mysqli_query($koneksi, "select distinct year(transaksi_tanggal) as tahun from transaksi order by year(transaksi_tanggal) asc");
                    while ($t = mysqli_fetch_array($tahun)) {
                        $thn = $t['tahun'];
                        $pemasukan = mysqli_query($koneksi, "select sum(transaksi_nominal) as total_pemasukan from transaksi where transaksi_jenis='Pemasukan' and year(transaksi_tanggal)='$thn'");
                        $pem = mysqli_fetch_assoc($pemasukan);
                        $total = $pem['total_pemasukan'];
                        if ($pem['total_pemasukan'] == "") {
                            echo "0,";
                        } else {
                            echo $total . ",";
                        }
                    }
                    ?>
                ]
            }, {
                name: 'Pengeluaran',
                data: [
                    <?php
                    $tahun = mysqli_query($koneksi, "select distinct year(transaksi_tanggal) as tahun from transaksi order by year(transaksi_tanggal) asc");
                    while ($t = mysqli_fetch_array($tahun)) {
                        $thn = $t['tahun'];
                        $pemasukan = mysqli_query($koneksi, "select sum(transaksi_nominal) as total_pengeluaran from transaksi where transaksi_jenis='Pengeluaran' and year(transaksi_tanggal)='$thn'");
                        $pem = mysqli_fetch_assoc($pemasukan);
                        $total = $pem['total_pengeluaran'];
                        if ($pem['total_pengeluaran'] == "") {
                            echo "0,";
                        } else {
                            echo $total . ",";
                        }
                    }
                    ?>
                ]
            }],
            chart: {
                foreColor: "#bac0c7",
                type: 'bar',
                height: 210,
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: true
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    legend: {
                        position: 'bottom',
                        offsetX: -10,
                        offsetY: 0
                    }
                }
            }],
            grid: {
                show: true,
                borderColor: '#f7f7f7',
            },
            colors: ['#39DA8A', '#f64e60', '#39DA8A'],
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '45%',
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: [
                    <?php
                    $tahun = mysqli_query($koneksi, "select distinct year(transaksi_tanggal) as tahun from transaksi order by year(transaksi_tanggal) asc");
                    while ($t = mysqli_fetch_array($tahun)) {
                        $thn = $t['tahun'];
                        echo $thn . ",";
                    }
                    ?>
                ],
            },
            yaxis: {
                labels: {
                    formatter: function(value) {
                        return "Rp." + value.toLocaleString() + ",-";
                    }
                }
            },
            legend: {
                position: 'top',
                horizontalAlign: 'left',
                show: true,
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(value) {
                        return "Rp." + value.toLocaleString() + ",-";
                    }
                }
            },

        };

        var chart = new ApexCharts(document.querySelector("#grafik2"), options);
        chart.render();

        const img_preview = document.querySelectorAll('.img_preview');
        const select_image = document.querySelectorAll('.select-image');

        select_image.forEach((e, i) => {
            e.addEventListener('change', () => {
                const files = e.files[0];
                const fileReader = new FileReader();
                fileReader.readAsDataURL(files);
                fileReader.addEventListener("load", function() {
                    img_preview[i].src = this.result
                });
            })
        })

        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('alert')) {
            urlParams.delete('alert');
            const newURL = `${window.location.pathname}${urlParams.toString()}`;
            window.history.replaceState({}, document.title, newURL);
        } else if (urlParams.has('tanggal_dari')) {
            window.history.replaceState({}, document.title, window.location.pathname);
        }

        document.querySelector('.layout-sidenav-toggle').addEventListener('click', () => {
            if (window.getComputedStyle(document.querySelector('.app-title')).getPropertyValue('display') === 'none') {
                return false;
            }

            if (localStorage.getItem('layoutCollapsed') === 'true') {
                document.querySelector('.app-title').style.width = '250px';
                document.querySelector('.app-title').style.transition = '0.2s';
            } else {
                document.querySelector('.app-title').style.width = '70px';
                document.querySelector('.app-title').style.transition = '0.2s';
            }
        })
    });
</script>
</body>

</html>