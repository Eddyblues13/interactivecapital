@include('admin.header')
<div class="main-panel">
	<div class="content bg-dark">
		<div class="page-inner">
			@if(session('message'))
			<div class="alert alert-success mb-2">{{session('message')}}</div>
			@endif
			<div class="mt-2 mb-4">
				<h1 class="title1 text-light">total users lists</h1>
			</div>

			<div>
			</div>
			<div>
			</div>
			<div class="row">
				<div class="col-12">
					<a href="#" data-toggle="modal" data-target="#sendmailModal" class="btn btn-primary btn-lg"
						style="margin:10px;">Message all</a>
					<a href="" class="btn btn-warning btn-lg">KYC</a>

					<a href="{{route('add.user')}}" data-toggle="modal" data-target="#adduser"
						class="float-right btn btn-primary"> <i class='fas fa-plus-circle'></i> Open an Account</a>
					<!-- Modal -->
					<div class="modal fade" id="adduser" tabindex="-1" aria-h6ledby="exampleModalh6" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header bg-dark">
									<h3 class="mb-2 d-inline text-light">Manually Add Users</h3>
									<button type="button" class="close text-light" data-dismiss="modal" aria-h6="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body bg-dark">
									<div>
										{{-- <form role="form" method="post" action="{{ route('add.user') }}">
											{{ csrf_field()}} --}}
											<div class="form-row">
												<div class="form-group col-md-12">
													<h6 class="text-light">First Name</h6>
													<input type="text" id="input1"
														class="form-control bg-dark text-light" name="first_name"
														required>
												</div>
												<div class="form-group col-md-12">
													<h6 class="text-light">Last Name</h6>
													<input type="text" class="form-control bg-dark text-light"
														name="last_name" required>
												</div>
												<div class="form-group col-md-12">
													<h6 class="text-light">Email</h6>
													<input type="email" class="form-control bg-dark text-light"
														name="email" required>
												</div>
												<div class="form-group col-md-12">
													<h6 class="text-light">Password</h6>
													<input type="password" class="form-control bg-dark text-light"
														name="password" required>
												</div>
												<div class="form-group col-md-12">
													<h6 class="text-light">Confirm Password</h6>
													<input type="password" class="form-control bg-dark text-light"
														name="password_confirmation" required>
												</div>
											</div>
											<button type="submit" class="px-4 btn btn-primary">Add User</button>
										</form>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mb-5 row">

				<div class="col-md-12 shadow card p-4 bg-dark">
					<div class="row">
						<div class="col-12">
							<form class="form-inline">
								<div class="">
									<select class="form-control bg-dark text-light" id="numofrecord">
										<option>10</option>
										<option>20</option>
										<option>30</option>
										<option>40</option>
										<option>50</option>
										<option>100</option>
										<option>200</option>
										<option>300</option>
										<option>400</option>
										<option>500</option>
										<option>600</option>
										<option>700</option>
										<option>800</option>
										<option>900</option>
										<option>1000</option>
									</select>
								</div>
								<div class="">
									<select class="form-control bg-dark text-light" id="order">
										<option value="desc">Descending</option>
										<option value="asc">Ascending</option>
									</select>
								</div>
								<div>
									<input type="text" id="searchInput" placeholder="Search by name or email"
										class="float-right mb-2 mr-sm-2 form-control bg-dark text-light">
									<small id="errorsearch"></small>
								</div>
							</form>
						</div>
					</div>

					<div class="table-responsive" data-example-id="hoverable-table">
						<table class="table table-hover text-light" id="userTable">
							<thead>
								<tr>
									<th>SN</th>
									<th>Client Name</th>

									<th>Action</th>
								</tr>
							</thead>
							<tbody id="userslisttbl">
								@foreach($users as $index => $user)
								<tr id="user-row-{{ $user->id }}">
									<td>{{ $loop->iteration }}</td>
									<td style="display: flex; align-items: center;">
										<div
											style="width: 40px; height: 40px; border-radius: 50%; background: #007bff; color: white; display: flex; justify-content: center; align-items: center; font-weight: bold; margin-right: 10px;">
											{{ strtoupper(substr($user->first_name, 0, 1)) }}{{
											strtoupper(substr(strrchr($user->fist_name, ' '), 1, 1)) }}
										</div>
										<div>
											{{ $user->first_name }} {{ $user->last_name }}<br>
											<small>{{ strtolower($user->email) }}</small>
										</div>
									</td>


									<td>
										<a class="btn btn-secondary btn-sm"
											href="{{ route('admin.user.view', $user->id) }}" role="button">
											Manage
										</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>

					<!-- Pagination Controls -->
					<div id="pagination" class="mt-3"></div>

					<script>
						document.addEventListener("DOMContentLoaded", function () {
                            const searchInput = document.getElementById("searchInput");
                            const table = document.getElementById("userTable");
                            const tbody = document.getElementById("userslisttbl");
                            const rows = Array.from(tbody.getElementsByTagName("tr"));
                            const paginationDiv = document.getElementById("pagination");
                
                            let currentPage = 1;
                            let rowsPerPage = 5;
                
                            // Function to display rows for the current page
                            function displayTablePage(filteredRows, page) {
                                const start = (page - 1) * rowsPerPage;
                                const end = start + rowsPerPage;
                
                                rows.forEach(row => row.style.display = "none"); // Hide all rows
                                filteredRows.slice(start, end).forEach(row => row.style.display = "table-row"); // Show rows for the current page
                
                                generatePagination(filteredRows.length);
                            }
                
                            // Function to generate pagination buttons
                            function generatePagination(totalRows) {
                                paginationDiv.innerHTML = "";
                                const pageCount = Math.ceil(totalRows / rowsPerPage);
                
                                for (let i = 1; i <= pageCount; i++) {
                                    const btn = document.createElement("button");
                                    btn.innerText = i;
                                    btn.className = `btn btn-sm ${i === currentPage ? 'btn-primary' : 'btn-outline-primary'}`;
                                    btn.style.margin = "2px";
                                    btn.addEventListener("click", () => {
                                        currentPage = i;
                                        filterTable();
                                    });
                                    paginationDiv.appendChild(btn);
                                }
                            }
                
                            // Function to filter rows based on search input
                            function filterTable() {
                                const filter = searchInput.value.toLowerCase();
                                const filteredRows = rows.filter(row => row.innerText.toLowerCase().includes(filter));
                
                                currentPage = 1;
                                displayTablePage(filteredRows, currentPage);
                            }
                
                            // Event listener for search input
                            searchInput.addEventListener("input", filterTable);
                
                            // Initial display of the table
                            filterTable();
                        });
					</script>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('#input1').on('keypress', function(e) {
					return e.which !== 32;
				});
</script>
<script>
	function getallusers() {
        let number = document.querySelector('#numofrecord').value;
        let searchvalue = document.querySelector('#searchitem').value.trim();
        let ordervalue = document.querySelector('#order').value;
        let table = document.querySelector('#userslisttbl');

        // Construct URL with query parameters
        let url = "{{ route('admin.getusers') }}?" + new URLSearchParams({
            num: number,
            search: searchvalue,
            order: ordervalue
        });

        fetch(url)
        .then(res => res.json())
        .then(response => {
            table.innerHTML = response.data;
            document.querySelector('#searchitem').style.borderColor = 
                response.status === 201 ? 'red' : '';
        })
        .catch(err => console.error(err));
    }

    // Event listeners
    ['#numofrecord', '#order'].forEach(selector => {
        document.querySelector(selector).addEventListener('change', getallusers);
    });
    document.querySelector('#searchitem').addEventListener('input', getallusers);

    // Initial load
    getallusers();

    function viewuser(id) {
        window.location.href = "{{ route('admin.user.view', '') }}/" + id;
    }
</script>
<!-- send all users email -->
<div id="sendmailModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header bg-dark">
				<h4 class="modal-title text-light">This message will be sent to all your users.</h4>
				<button type="button" class="close text-light" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body bg-dark">
				<form method="post" action="">
					@csrf
					<div class=" form-group">
						<input type="text" name="subject" class="form-control bg-dark text-light" placeholder="Subject"
							required>
					</div>
					<div class=" form-group">
						<textarea placeholder="Type your message here" class="form-control bg-dark text-light"
							name="message" row="8" placeholder="Type your message here" required></textarea>
					</div>
					<div class=" form-group">
						<input type="submit" class="btn btn-light" value="Send">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /send all users email Modal -->








@include('admin.footer')