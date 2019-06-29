					<!-- Begin Page Content -->
					<div class="container-fluid">
						<!-- Page Heading -->
						<h1 class="h3 mb-4 text-gray-800">
							<?= $title; ?>
						</h1>
						<div class="jumbotron jumbotronsubmenu">
						</div>

						<div class="row">
							<div class="col-lg">
								<?php if(validation_errors()) :  ?>
								<div class="alert alert-danger" role="alert">
									<?= validation_errors(); ?>
								</div>
								<?php endif;  ?>
								<?= form_error('menu', '<div class="alert alert-danger" role="alert"> Email has not been activated!','</div>'); ?>
								<?= $this->session->flashdata('message'); ?>
								<a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add New Sub
									Menu</a>
								<table class="table table-hover">
									<thead>
										<tr>
											<th scope="col">No</th>
											<th scope="col">Title</th>
											<th scope="col">Menu</th>
											<th scope="col">Url</th>
											<th scope="col">Icon</th>
											<th>Is Active</th>
											<th colspan="2">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1;  ?>
										<?php foreach($subMenu as $sm) : ?>
										<tr>
											<th scope="row"><?= $i; ?></th>
											<td><?= $sm['Title']; ?></td>
											<td><?= $sm['NameMenu']; ?></td>
											<td><?= $sm['Url']; ?></td>
											<td><?= $sm['Icon']; ?></td>
											<td><?= $sm['IsActive']; ?></td>
											<td>
												<a href="#" class="badge badge-success">Edit</a>
												<a href="#" class="badge badge-danger">Delete</a>
											</td>
										</tr>
										<?php $i++;  ?>
										<?php endforeach;  ?>
									</tbody>
								</table>

							</div>
						</div>


					</div>
					<!-- /.container-fluid -->

					</div>
					<!-- End of Main Content -->

					<!-- MODALS -->
					<!-- Modal -->
					<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel"
						aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form action="<?= base_url('menu/submenu'); ?>" method="post">
									<div class="modal-body">
										<div class="form-group">
											<input type="text" class="form-control" id="Title" name="Title" placeholder="Submenu Title ..">
										</div>
										<div class="form-group">
											<select name="KodeMenu" id="kodemenu" class="form-control">
												<option value="">-- Select Menu --</option>
												<?php foreach($menu as $m) :  ?>
												<option value="<?= $m['KodeMenu'] ?>"><?= $m['NameMenu'] ?></option>
												<?php endforeach;  ?>
											</select>
											<div class="form-group">
												<input type="text" class="form-control" id="Url" name="Url" placeholder="Submenu Url">
											</div>
											<div class="form-group">
												<input type="text" class="form-control" id="Icon" name="Icon" placeholder="Submenu Icon">
											</div>
										</div>
										<div class="form-group">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="1" id="IsActive" name="IsActive" checked>
												<label class="form-check-label" for="IsActive">
													&nbsp;Active ?
												</label>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Add </button>
									</div>
								</form>
							</div>
						</div>
					</div>