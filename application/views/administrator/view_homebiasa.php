<section class="col-lg-12 connectedSortable">
    <div class='box'>
        <div class='box-header'>
            <h3 align="center">Laporan Tindakan Karantina Ikan dan Produk Perikanan Lainnya<br />
            </h3>
        </div>
        <div class='box-body'>
            <font size="4"><em>Laporan Tindakan Karantina Ikan dan Produk Perikanan Lainnya</em></font> <br />
            <br />
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr bgcolor="#6ACAEE">
                        <th style='width:10px'>No</th>
                        <th>Nama Ikan</th>
                        <th>Penolakan</th>
                        <th>Kesesuaian Isi</th>
                        <th>Status Dokumen </th>
                        <th>Tempat Pemasukan</th>
                        <th>Kategori Tingkat Resiko</th>
                        <th>Tindakan Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $record = $this->db->query("select * from karantinaikan");
                    foreach ($record->result_array() as $row) {
                        $dt = $this->db->query("select * from karantinaikan");
                        $d = $dt->row_array();

                        $idKarantina = $row[idKarantina];


                        $tr = $this->db->query("select * from tingkatresiko where kodeTR = '$row[tingkatResiko]'");
                        foreach ($tr->result_array() as $row10) {
                            $tingkatResiko = $row10[namaTR];
                        }

                        $tpm = $this->db->query("select * from tempatpemasukan where kodeTP = '$row[tempatPemasukan]'");
                        foreach ($tpm->result_array() as $row12) {
                            $tempatPemasukan = $row12[namaTP];
                        }

                        $sd = $this->db->query("select * from statusdokumen where kodeSD = '$row[statusDokumen]'");
                        foreach ($sd->result_array() as $row14) {
                            $statusDokumen = $row14[namaSD];
                        }

                        $ki = $this->db->query("select * from kesesuaianisi where kodeKI = '$row[kesesuaianIsi]'");
                        foreach ($ki->result_array() as $row15) {
                            $kesesuaianIsi = $row15[namaKI];
                        }

                        $pnl = $this->db->query("select * from penolakan where kodePenolakan = '$row[penolakan]'");
                        foreach ($pnl->result_array() as $row20) {
                            $penolakan = $row20[namaPenolakan];
                        }

                        $ta = $this->db->query("select * from tindakanakhir where kodeTA = '$row[tindakanAkhir]'");
                        foreach ($ta->result_array() as $row21) {
                            $tindakanAkhir = $row21[namaTA];
                        }

                        echo "<tr><td bgcolor='#A7D6EF'>$no</td>
							                <td>$row[nama_ikan]</td>
                              <td>$penolakan</td>
              							  <td>$kesesuaianIsi</td>
                              <td>$statusDokumen</td>
              							  <td>$tempatPemasukan</td>
                              <td>$tingkatResiko</td>              							  	
              							  <td>$tindakanAkhir</td>
                          </tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table> 
        </div>
    </div>

</section><!-- /.Left col -->