<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Buat Surat Kematian</h1>

                    <div id="msg_skmk" class="alert" style="display:none;">
                        <small class="msg_skmk"></small>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Surat Kematian</h6>
                        </div>
                        <div class="card-body">
                            <?= form_open('', 'method="post" id="formSkmk"');?>

                            <div class="row">
                                <div class="col-md-2">
                                    <label for="nomor">Nomor</label>
                                    <input type="number" id="nomor" class="form-control" name="nomor" value="<?= empty($value['id_pelapor']) ? sprintf("%03d", $nomor) : $value['id_pelapor'];?>" required="required">
                                </div>
                                <div class="col-md-4">
                                    <label for="no_skmk">No. SKMK</label>
                                    <input type="text" id="no_skmk" class="form-control" name="no_skmk" readonly="readonly" value="SKMK-<?= $kode_instansi->kode_instansi ?>/<?= format_bulan(date('Y-m-d'), 'ROMAWI');?>/<?= date('Y');?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="id_pejabat">Pejabat Penanda Tangan</label>
                                    <select id="id_pejabat" class="form-control" name="id_pejabat" required="required">
                                        <option value="">Pilih Pejabat</option>
                                        <?php foreach ($pejabat as $pjb) :?>
                                            <option value="<?= $pjb->id_pejabat ?>" 
                                            <?php if(empty(set_value('id_pejabat')) ? $value['id_pejabat'] : set_value('id_pejabat') == $pjb->id_pejabat) :?> selected="selected"<?php endif;?>>
                                            <?= $pjb->nama_pejabat ?>
                                                
                                            </option>
                                        
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row my-3">
                                <div class="col-md-6">
                                    <label for="nama_pelapor">Nama Pelapor</label>
                                    <input type="text" id="nama_pelapor" class="form-control" name="nama_pelapor" required="required" value="<?= $value['nama_pelapor'];?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="nama_terlapor">Nama Terlapor</label>
                                    <input type="text" id="nama_terlapor" class="form-control" name="nama_terlapor"required="required" value="<?= $value['nama_terlapor'];?>">
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col-md-6">
                                    <label for="no_ktp_pelapor">No. KTP Pelapor</label>
                                    <input type="text" id="no_ktp_pelapor" class="form-control" name="no_ktp_pelapor"required="required" value="<?= $value['no_ktp_pelapor'];?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="no_ktp_terlapor">No. KTP Terlapor</label>
                                    <input type="text" id="no_ktp_terlapor" class="form-control" name="no_ktp_terlapor"required="required" value="<?= $value['no_ktp_terlapor'];?>">
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col-md-6">
                                    <label for="tempat_lahir_pelapor">Tempat Lahir Pelapor</label>
                                    <input type="text" id="tempat_lahir_pelapor" class="form-control" name="tempat_lahir_pelapor"required="required" value="<?= $value['tempat_lahir_pelapor'];?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="tempat_lahir_terlapor">Tempat Lahir Terlapor</label>
                                    <input type="text" id="tempat_lahir_terlapor" class="form-control" name="tempat_lahir_terlapor"required="required" value="<?= $value['tempat_lahir_terlapor'];?>">
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col-md-6">
                                    <label for="tgl_lahir_pelapor">Tanggal Lahir Pelapor</label>
                                    <input type="date" id="tgl_lahir_pelapor" class="form-control" name="tgl_lahir_pelapor"required="required" value="<?= $value['tgl_lahir_pelapor'];?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="tgl_lahir_terlapor">Tanggal Lahir Terlapor</label>
                                    <input type="date" id="tgl_lahir_terlapor" class="form-control" name="tgl_lahir_terlapor"required="required" value="<?= $value['tgl_lahir_terlapor'];?>">
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col-md-4">
                                    <label for="pekerjaan_pelapor">Pekerjaan Pelapor</label>
                                    <input type="text" id="pekerjaan_pelapor" class="form-control" name="pekerjaan_pelapor" value="<?= $value['pekerjaan_pelapor'];?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="pekerjaan_terlapor">Pekerjaan Terlapor</label>
                                    <input type="text" id="pekerjaan_terlapor" class="form-control" name="pekerjaan_terlapor" value="<?= $value['pekerjaan_terlapor'];?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="hubungan">Hubungan dengan Terlapor</label>
                                    <select id="hubungan" class="form-control" name="hubungan" required="required">
                                        <option value="">Pilih Hubungan</option>
                                        <option value="ISTRI" <?php if($value['hubungan'] == 'ISTRI'):?>selected="selected"<?php endif;?>>ISTRI</option>
                                        <option value="SUAMI" <?php if($value['hubungan'] == 'SUAMI'):?>selected="selected"<?php endif;?>>SUAMI</option>
                                        <option value="IBU" <?php if($value['hubungan'] == 'IBU'):?>selected="selected"<?php endif;?>>IBU</option>
                                        <option value="AYAH" <?php if($value['hubungan'] == 'AYAH'):?>selected="selected"<?php endif;?>>AYAH</option>
                                        <option value="NENEK" <?php if($value['hubungan'] == 'NENEK'):?>selected="selected"<?php endif;?>>NENEK</option>
                                        <option value="KAKEK" <?php if($value['hubungan'] == 'KAKEK'):?>selected="selected"<?php endif;?>>KAKEK</option>
                                        <option value="ANAK" <?php if($value['hubungan'] == 'ANAK'):?>selected="selected"<?php endif;?>>ANAK</option>
                                        <option value="KAKAK" <?php if($value['hubungan'] == 'KAKAK'):?>selected="selected"<?php endif;?>>KAKAK</option>
                                        <option value="ADIK" <?php if($value['hubungan'] == 'ADIK'):?>selected="selected"<?php endif;?>>ADIK</option>
                                        <option value="SEPUPU" <?php if($value['hubungan'] == 'SEPUPU'):?>selected="selected"<?php endif;?>>SEPUPU</option>
                                        <option value="PAMAN" <?php if($value['hubungan'] == 'PAMAN'):?>selected="selected"<?php endif;?>>PAMAN</option>
                                        <option value="BIBI" <?php if($value['hubungan'] == 'BIBI'):?>selected="selected"<?php endif;?>>BIBI</option>
                                        <option value="LAINNYA" <?php if($value['hubungan'] == 'LAINNYA'):?>selected="selected"<?php endif;?>>LAINNYA</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col-md-6">
                                    <label for="alamat_pelapor">Alamat Pelapor</label>
                                    <textarea id="alamat_pelapor" name="alamat_pelapor" class="form-control" required="required"><?= $value['alamat_pelapor'];?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="alamat_terlapor">Alamat Terlapor</label>
                                    <textarea id="alamat_terlapor" name="alamat_terlapor" class="form-control" required="required"><?= $value['alamat_terlapor'];?></textarea>
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col-md-6">
                                    <label for="tgl_meninggal">Jam & Tanggal Meninggal</label>
                                    <input type="text" id="tgl_meninggal" class="form-control" name="tgl_meninggal"required="required" value="<?= $value['tgl_meninggal'];?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="lokasi_meninggal">Lokasi Meninggal</label>
                                    <input type="text" id="lokasi_meninggal" class="form-control" name="lokasi_meninggal"required="required" value="<?= $value['lokasi_meninggal'];?>">
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col-md-12">
                                    <label for="tembusan">Tembusan (Pisahkan dengan Koma)</label>
                                    <input type="text" id="tembusan" class="form-control" name="tembusan" value="<?= $value['tembusan'];?>">
                                </div>
                            </div>
                            <input id="submit" type="submit" class="my-3 btn btn-small btn-success" name="submit" value="Submit">
                            
                            <input type="reset" class="my-3 btn btn-small btn-primary" value="Reset">
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->