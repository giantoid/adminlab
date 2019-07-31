<?php include "../conf/config.php";?>

									<div class='bg-brown p-2'>
										<i class='icon-user pr-2'></i> BIODATA PENUMPANG
									</div>
									<div class='bg-dark p-2'>
										<div class='form-group'>
											<input type='text' name='pnama[]' class='form-control' placeholder='Nama Penumpang' style='color:#fff;' required>
										</div>
										<div class='form-group row'>
											<div class="col-12">Tanggal Lahir :</div>
											<div class="col-4">
												<select class="form-control" name="tg_lahir[]" style='color:#fff;' required>
													<option value=""> Tgl </option>
													<?php
														$tg_dapur	= 1;
														while($tg_dapur <= 31){
															if($tg_dapur < 10){
																echo"<option value='0".$tg_dapur."'>0".$tg_dapur."</option>";
															}else{
																echo"<option value='".$tg_dapur."'>".$tg_dapur."</option>";
															}
															
															$tg_dapur++;
														}
													?>
												</select>
											</div>
											<div class="col-4">
												<select class="form-control" name="bl_lahir[]" style='color:#fff;' required>
													<option value=""> Bln </option>
													<option value="01">Januari</option>
													<option value="02">Februari</option>
													<option value="03">Maret</option>
													<option value="04">April</option>
													<option value="05">Mei</option>
													<option value="06">Juni</option>
													<option value="07">Juli</option>
													<option value="08">Agustus</option>
													<option value="09">September</option>
													<option value="10">Oktober</option>
													<option value="11">November</option>
													<option value="12">Desember</option>
												</select>
											</div>
											<div class="col-4">
												<input type="number" placeholder="Tahun" style='color:#fff;' class="form-control" name="th_lahir[]" required>
											</div>
										</div>
										<div class='form-group'>
											<select class="form-control" name="pjk[]" style="color:#fff" required>
												<option value=""> Jenis Kelamin </option>
												<?php
													$sjede	= mysqli_query($konek,"select * from jk");
													while($djede = mysqli_fetch_array($sjede)){
														echo"<option value='".$djede['id_jk']."'>".$djede['nm_jk']."</option>";
													}
												?>
											</select>
										</div>
									</div>
