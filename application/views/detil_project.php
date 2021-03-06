<?php $this->load->view('page_header')?>

<link rel="stylesheet" href="<?= base_url('assets/css/detil_project.css')?>"/>
<?php foreach($project as $p){?>
<div class="bungkusDProject container">
	<div class="bungkusDetilProject2 columns">
		<div class="posProject column is-9">
			<h1 class="textJudulProjectDetil"><?= $p['judul_project']?></h1>
			<div class="textKategori"><?= $p['kategori']?></div>
			<span class="textBriefProject"><?= $p['short_desc']?></span>
			<div class="boxDetilProject">
				<div class="ant-tabs ant-tabs-top ant-tabs-line">
					<div role="tablist" class="ant-tabs-bar" tabindex="0">
							<div class="ant-tabs-nav-wrap">
								<div class="ant-tabs-nav-scroll">
									<nav class="navbar navbar-expand-sm justify-content-between" id="navMainMenu">
								      <ul class="navbar-nav nav-fill w-100 align-items-start">
								        <li class="nav-item">
								            <a class="nav-link active" id="ktg-menu" onclick="openMenu(event, 'story')">Story</a>
								        </li>
								        <li class="nav-item">
								            <a class="nav-link" id="ktg-menu" onclick="openMenu(event, 'jurnal')">Journal</a>
								        </li>
								        <li class="nav-item">
								            <a class="nav-link" id="ktg-menu" onclick="openMenu(event, 'colab')">Colaborators</a>
								        </li>
								     </ul>
								    </nav>
								</div>
							</div>
					</div>
					<div class="ant-tabs-content ant-tabs-content-animated" style="margin-left: 0%;">
						<div id="story" class="tabcontent backgorundProject">
						  	<img src="<?= base_url('assets/img/default-project.png')?>" alt="card" class="imgProject">
						  	<div class="paddingBungkusProject">
								<div class="textColabTimeline">Background Story</div>
									<div class="textBackStory"><?= $p['deskripsi']?></div>
									<div class="textColabTimeline">Collaborators’ Task &amp; Timeline</div>
								<div class="textBackStory"></div>
							</div>
						</div>
						<div id="jurnal" class="tabcontent backgorundProject">
						  	<div class="bungkusJurnalProject">
						  		<div class="bungkusJurnalProject2">'No journal available.'</div></div>
						</div>
						<div id="colab" class="tabcontent backgorundProject">
							<div class="">
								<div>
									<div class=""></div>
										<div class="CollaborationBungkus2 is-12">
											<?php
												$ci =& get_instance();
												$ci->load->model('krowd_model');
											?>
											<?php foreach($collab as $c){
												$data = $ci->krowd_model->get_collaborator_projects($c['id_user']);
												$data2 = $ci->krowd_model->get_initiated_projects($c['id_user']);?>
											<div class="css-nil columns is-mobile">
												<div class="CollabLokasi column is-2-desktop is-3-tablet is-6-mobile">
													<img src="<?= base_url('assets/img/user.jpg')?>" alt="card" class="CollabImage"></div>
													<div class="CollabNgaran column is-10-desktop is-9-tablet is-6-mobile">
														<span style="font-size: 1rem; color: rgb(155, 155, 155);" class="css-nil"><?= $c['username']?>
														</span>
														<span class="CollabDesc description">
															<div class="columns">
																<div class="column is-3">
																</div>
																<div class="column is-3">
																	<div><?= $c['kota']?></div>
																</div>
																<div class="column is-3">
																	<?php foreach($data as $d){?>
																	<div>Collaborated Project: <?= $d['colpro']?></div>
																	<?php }?>
																</div>
																<div class="column is-3">
																	<?php foreach($data2 as $d2){?>
																	<div>Initiated Project: <?= $d2['inpro']?></div>
																	<?php }?>
																</div>
															</div>
														</span>
													</div>
												<div class=""></div>
											</div>
											<?php }?>
										</div>
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
		<div class="posInitiator">
			<div class="bungkusInitiator">
				<img src="<?= base_url('assets/img/user.jpg')?>" alt="card" class="imgInitiator">
				<div class="body has-text-centered">
					<div class="textNamaInit"><?= $p['username']?></div>
					<div class="textJobdesk">
						<dl>
							<div>
								<dt><?= $p['bidang_keahlian']?></dt>
							</div>
						</dl>
					</div>
					<div class="textKota"><?= $p['lokasi']?></div>
					<progress class="progress is-danger is-12 is-small" value="<?= $p['joined_user']?>" max="<?= $p['max_user']?>" style="height: 6px; margin-top: 20px; margin-bottom: 5px;"></progress>
					<div class="columns is-mobile">
						<div class="column is-6 is-size-7 is-inline-block" align="left">
							<span class="textCollaborator is-black"><?= $p['joined_user']?>/<?= $p['max_user']?></span>Collaborators
						</div>
						<div class="column is-6 is-size-7 is-inline-block" align="right">
							<p class="time-left"><?= $p['days_left']?> days left</p>
						</div>
					</div>
					<?php if($p['joined_user'] != $p['max_user']) {
						if ($this->session->userdata('username') == FALSE) { ?>
							<form action="<?= base_url('auth/login')?>">
								<button type="submit" class="btnCollaborate">Collaborate</button>
							</form>
						<?php } else {?>
							<form action="<?= base_url('c_krowd_home/about')?>">
								<button type="submit" class="btnCollaborate">Collaborate</button>
							</form>
						<?php }?>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }?>

<?php $this->load->view('page_footer')?>